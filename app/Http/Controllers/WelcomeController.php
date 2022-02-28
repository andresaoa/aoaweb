<?php

namespace App\Http\Controllers;

use App\Models\Marquee;
use App\Models\Nav;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $item_navs = Nav::all();
        $marquee = Marquee::get()->first();
        return view('welcome',compact('item_navs','marquee'));
    }
}
