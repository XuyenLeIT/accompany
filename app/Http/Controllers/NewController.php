<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
  public function newsDetail()
  {
      // $newsDetail = News::find($id);
      // return view("client.newDetail",compact("newsDetail"));
      return view("client.detailNews");
  }
}
