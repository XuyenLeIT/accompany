<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\IntroTvgs;
use App\Models\News;
use App\Models\ProcessSup;
use App\Models\SpecialAds;
use Illuminate\Http\Request;

class TVGSController extends Controller
{
    public function tvgs()
    {
        $introtvgs = IntroTvgs::first();
        $newsTVSG = News::where('type', 'TVGS')->get();
        $newsStandountTVSG = News::where('type', 'TVGSAT')->get();
        $ads = Ads::all();
        $specialAds = SpecialAds::first();
        return view("client.tvgs", compact(
            "introtvgs",
            "newsTVSG",
            "newsStandountTVSG",
            "ads",
            "specialAds"
        ));
    }
    public function newsDetail($slug)
    {
        $parts = explode('-', $slug);
        // Lấy phần tử cuối cùng trong mảng
        $lastPartId = (int) end($parts);
        $newsDetail = News::find($lastPartId);
        $newsOther = News::where('id', '!=', $lastPartId)->get();
        $adsDetail = Ads::where('type', 'DETAILNEWS')->get();
        return view("client.detailNews", compact("newsDetail", "newsOther", "adsDetail"));

    }
    //admin
    public function viewTvsg()
    {
        $introTVSG = IntroTvgs::first();
        $newsTVSG = News::where('type', 'TVGS')->get();
        $adsTVSG = Ads::where('type', 'TVGS')->get();
        $specialAds = SpecialAds::first();
        return view("admin.tvgs.index", compact("introTVSG", "newsTVSG", "adsTVSG", "specialAds"));
    }
    public function createIntroTVSG(Request $request)
    {
        $request->validate([
            "description" => 'required',
        ]);
        IntroTvgs::create([
            "description" => $request->description,
        ]);
        return redirect()->back()->with('success', 'intro created successfully.');

    }
    public function updateIntroTVSG(Request $request, IntroTvgs $introTVSG)
    {
        $request->validate([
            "description" => 'required',
        ]);
        $introTVSG->update([
            "description" => $request->description,
        ]);
        return redirect()->back()->with('success', 'intro updated successfully.');

    }

    public function process()
    {
        $processes = ProcessSup::orderBy('order', 'asc')->get();
        return view("admin.process.index", compact('processes'));
    }
    public function storeProcess(Request $request)
    {
        $request->validate([
            "title" => 'required',
        ]);
        $maxOrder = ProcessSup::max('order'); // Lấy order lớn nhất
        $newOrder = $maxOrder + 1; // Tăng thêm 1
        ProcessSup::create([
            "title" => $request->title,
            "order" => $newOrder,
        ]);
        return redirect()->back()->with('success', 'process item created successfully.');
    }
    public function updateOrder(Request $request)
    {
        $order = $request->input('order'); // Nhận dữ liệu từ AJAX

        foreach ($order as $item) {
            // Cập nhật thứ tự mới vào database
            ProcessSup::where('id', $item['id'])->update(['order' => $item['position']]);
        }

        return response()->json(['success' => true]);
    }
}
