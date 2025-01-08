<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 

class WelcomeController extends Controller
{
    public function index()
{   
    $posts= post::all();
    return view ('Welcome', compact('posts'));
}
}
