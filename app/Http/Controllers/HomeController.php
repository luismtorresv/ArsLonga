<?php

namespace App\Http\Controllers;

use App\Services\ExternalApiService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['products'] = ExternalApiService::getProducts();

        return view('home.index')->with('viewData', $viewData);
    }
}
