<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;

class SiteController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function profile()
    {
        $statuses = StatusEnum::toArrayWithKeys();
        $selectedStatus = request()->input('status');

        $query = auth()->user()->orders()
            ->with(['service', 'price', 'employee'])
            ->orderByDesc('id');

        if ($selectedStatus && array_key_exists($selectedStatus, $statuses)) {
            $query->where('status', $selectedStatus);
        }

        $orders = $query->get();

        return view('pages.profile', compact('orders', 'statuses', 'selectedStatus'));
    }
}
