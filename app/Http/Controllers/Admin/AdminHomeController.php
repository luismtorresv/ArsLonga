<?php

/**
 * @author Wendysita
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function index()
    {
        $viewData = [];

        return view('admin.index')->with('viewData', $viewData);
    }
}
