<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
    public function news()
    {
  
      return view("client.news");
    }

    public function newsDetail()
    {
  
      return view("client.detail");
    }
}
