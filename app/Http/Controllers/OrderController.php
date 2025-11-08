<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['orders'] = Order::with(['items.artwork'])->where('user_id', Auth::user()->getId())->get();

        return view('order.index')->with('viewData', $viewData);
    }
}
