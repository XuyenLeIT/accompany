<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TVGSController extends Controller
{
    public function tvgs()
    {
  
      return view("client.tvgs");
    }
}
