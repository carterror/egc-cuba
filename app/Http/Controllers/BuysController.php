<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buy;
use Illuminate\Support\Facades\Auth;

class BuysController extends Controller
{
    public function index()
    {
        $buys = Buy::with(['card'])->where('user_id', Auth::user()->id)->paginate(6);

        return view('buys.index', compact('buys'));
    }
}
