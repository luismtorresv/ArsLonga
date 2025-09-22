<?php

/**
 * @author Jeronimo Acosta
 */

namespace App\Http\Controllers;

use Illuminate\View\View;

class BidController extends Controller
{
    public function create(): View
    {
        return view('bid.create');
    }
}
