<?php

namespace App\Http\Controllers;

use App\Sales;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stats = [
            'total_profit_made' => Sales::get_total_profit_made(),
            'profitable_items' => Sales::get_profitable_items()
        ];

        return view('dashboard', ['stats' => $stats]);
    }
}
