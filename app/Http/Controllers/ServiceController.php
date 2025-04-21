<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Http\Requests\BookRequest;
use App\Http\Requests\ChoseRequest;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServicePrice;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::with([
            'services' => function ($query) {
                $query->with([
                    'category:id,title',
                    'prices' => fn($q) => $q->with('employeeCategory:id,title')
                ]);
            }
        ])->get();

        return view('pages.services.index', compact('categories'));
    }

    public function booking(Service $service)
    {
        $order = $service->orders()
            ->where('status', StatusEnum::New)
            ->orderByDesc('id')
            ->first();

        if (!$order) return redirect()->route('services');

        $busyEmployeeIds = Order::where(function ($query) use ($order) {
            $query->where('start', '<', $order->end)
                ->where('end', '>', $order->start)
                ->whereNot('status', StatusEnum::New);
        })->pluck('employee_id')->unique();

        $employees = Employee::whereNotIn('id', $busyEmployeeIds)
            ->where('category_id', $order->price->employee_category_id)
            ->whereHas('serviceCategories', function ($query) use ($order) {
                $query->where('service_categories.id', $order->price->service_id);
            })
            ->get();

        return view('pages.services.booking', compact('service', 'employees'));
    }

    public function book(BookRequest $request, Service $service)
    {
        $data = $request->validated();

        $order = $service->orders()
            ->where('status', StatusEnum::New)
            ->orderByDesc('id')
            ->first();

        $order->update([
            'status' => StatusEnum::InProgress,
            'employee_id' => $data['employee_id'],
        ]);

        return redirect()->route('home');
    }

    public function choose(Service $service)
    {
        $prices = $service->prices()->with('employeeCategory')->get();

        $prices = $prices->map(function ($price) {
            return [
                'id' => $price->id,
                'category' => $price->employeeCategory->title,
                'price' => $price->price,
            ];
        });

        return view('pages.services.choose', compact('service', 'prices'));
    }

    public function chose(ChoseRequest $request, Service $service)
    {
        $data = $request->validated();

        $start = Carbon::parse($data['start']);
        $price = ServicePrice::find($data['price_id']);

        $duration = $service->duration->format('H:i');
        $times = explode(':', $duration);

        $durationH = $times[0];
        $durationM = $times[1];

        $end = $start->copy()
            ->addHours((int)$durationH)
            ->addMinutes((int)$durationM);

        $busyEmployeeIds = Order::where(function ($query) use ($start, $end) {
            $query->where('start', '<', $end)
                ->where('end', '>', $start)
                ->whereNot('status', StatusEnum::New);
        })->pluck('employee_id')->unique();

        $availableEmployees = Employee::whereNotIn('id', $busyEmployeeIds)
                ->where('category_id', $price->employee_category_id)
                ->whereHas('serviceCategories', function ($query) use ($price) {
                    $query->where('service_categories.id', $price->employee_category_id);
                })
                ->exists();

        if ($availableEmployees) {
            Order::create([
                'start' => $start,
                'end' => $end,
                'service_id' => $price->service_id,
                'price_id' => $price->id,
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('services.booking', $service);
        }
        return back()->withErrors([
            'error' => 'Сотрудники заняты в это время'
        ]);
    }
}
