<?php

namespace App\Http\Controllers;

use App\Models\IntroTvgs;
use Illuminate\Http\Request;

class TVGSController extends Controller
{
    public function tvgs()
    {
      $introtvgs = IntroTvgs::first();
      
      return view("client.tvgs",compact("introtvgs"));
    }
}
