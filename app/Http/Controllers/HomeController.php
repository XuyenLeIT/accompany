<?php

namespace App\Http\Controllers;

use App\Models\Carausel;
use App\Models\IntroBenefit;
use App\Models\IntroHome;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function home()
  {
    $carausels = Carausel::all();
    $homeIntro = IntroHome::firstOrFail();
    $benefitItems = IntroBenefit::all()->toArray();;
    $features_chunks = array_chunk($benefitItems, count($benefitItems) / 2);
    return view("client.home",compact("homeIntro","features_chunks","carausels"));
  }

}
