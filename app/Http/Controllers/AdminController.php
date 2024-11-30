<?php

namespace App\Http\Controllers;

use App\Models\IntroBenefit;
use App\Models\IntroHome;
use App\Models\IntroVideo;
use App\Models\VideoUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
    public function admin()
    {

        return view("admin.dashboard");
    }
    public function homeIntro()
    {
        $intro = IntroHome::firstOrFail();
        $benefits = IntroBenefit::all();
        return view("admin.intros.intro", compact("intro", "benefits"));

    }
    public function storeHomeIntro(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,webp,jpg,gif|max:2048',
            "description" => 'required',
        ]);
        $filename = "";
        try {
            if ($request->hasFile('image')) {
                $filename = uniqid() . '.' . $request->image->getClientOriginalName();
                $request->image->move(public_path("introImages"), $filename);
                IntroHome::create([
                    'title' => $request->title,
                    'image' => '/introImages/' . $filename,
                    'description' => $request->description,
                ]);
            }
            return redirect()->route('admin.homeIntro')->with('success', 'intro images created successfully.');
        } catch (\Exception $th) {
            $existingImagePath = public_path('/introImages/' . $filename);
            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }
            return redirect()->back()->with('info', 'Opp error serve.');
        }
    }
    public function updateIntro(Request $request, IntroHome $intro)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,webp,jpg,gif|max:2048',
            "description" => 'required',
        ]);
        try {
            // Kiểm tra xem checkbox có được chọn hay không
            $filename = "";
            $image = "";
            if ($request->hasFile('image')) {
                $existingImagePath = public_path($intro->image);
                if (File::exists($existingImagePath)) {
                    File::delete($existingImagePath);
                }
                $filename = uniqid() . '.' . $request->image->getClientOriginalName();
                $request->image->move(public_path("introImages"), $filename);
                $image = '/introImages/' . $filename;
            } else {
                $image = $request->imageExisting;
            }
            $intro->update([
                'title' => $request->title,
                'image' => $image,
                'description' => $request->description,
            ]);
            return redirect()->route('admin.homeIntro')->with('success', 'intro updated successfully.');
        } catch (\Throwable $th) {
            $existingImagePath = public_path('/introImages/' . $filename);
            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }
            return redirect()->route('admin.homeIntro')->with('success', 'Opp error serve');
        }
    }
    public function storeIntroBenefit(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $benefit = IntroBenefit::create($request->all());
        return response()->json($benefit, 201);
    }
    public function editIntroBenefit($id)
    {
        $benefit = IntroBenefit::findOrFail($id);
        return response()->json($benefit, 201);
    }
    public function updateIntroBenefit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $itemUpdate = IntroBenefit::findOrFail($id);
        $itemUpdate->update([
            'title' => $request->title,
        ]);
        return response()->json($itemUpdate, 200);
    }
    public function deleteIntroBenefit($id)
    {
        $benefit = IntroBenefit::findOrFail($id);
        $benefit->delete();
        return redirect()->route('admin.homeIntro')->with('successBenefit', 'Delete item successfully');
    }
    //video url home
    public function introVideo()
    {
        $introMovie = IntroVideo::first();
        return view("admin.intros.video", compact("introMovie"));
    }
    public function storeVideoIntro(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'urlVideo' => 'required',
            "description" => 'required',
        ]);
        IntroVideo::create($request->all());
        return redirect()->route('admin.introVideo')->with('success', 'create item successfully');
    }
    public function updateVideoIntro(Request $request,IntroVideo $introMovie)
    {

        $request->validate([
            'title' => 'required',
            'urlVideo' => 'required',
            "description" => 'required',
        ]);
        $introMovie->update([
            'title' => $request->title,
            'urlVideo' => $request->urlVideo,
            "description" => $request->description
        ]);
        return redirect()->route('admin.introVideo')->with('success', 'update item successfully');
    }
}
