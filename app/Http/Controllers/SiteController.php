<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Review;

class SiteController extends Controller
{
    public function home()
    {
        $reviews = Review::latest()->get();

        return view('welcome', compact('reviews'));
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
