<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use App\Models\IntroTvgs;
use App\Models\News;
use App\Models\Outstanding;
use App\Models\PanelJobImage;
use Session;

use App\Models\IntroBenefit;
use App\Models\IntroHome;
use App\Models\IntroVideo;
use App\Models\PanelJob;
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
        $intro = IntroHome::first();
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
    public function panelJob()
    {
        
        $panelJob = Session::get('panelJob', null);
        $panels = PanelJob::all();
        return view("admin.panels.index",compact("panels",'panelJob'));
    }
    public function createPanelJob(Request $request)
    {
        $request->validate([
            'title' => 'required',
            "description" => 'required',
            "type" => 'required',
        ]);
        $status = $request->status == null?false:true;
        PanelJob::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "type"=>$request->type,
            "status"=>$status,
        ]);
        return redirect()->route('admin.panelJob.index')->with('success', 'create job successfully');

    }
    public function editPanelJob($id)
    {
        $panelJob = PanelJob::findOrFail($id);
        Session::put('panelJob', $panelJob);
        return redirect()->route('admin.panelJob.index')->with('success', 'create job successfully');

    }
    public function updatePanelJob(Request $request,PanelJob $panelJob)
    {
        $request->validate([
            'title' => 'required',
            "description" => 'required',
            "type" => 'required',
        ]);
        $status = $request->status == null?false:true;
       $panelJob -> update([
            "title"=>$request->title,
            "description"=>$request->description,
            "type"=>$request->type,
            "status"=>$status,
        ]);
        Session::put('panelJob', null);
        return redirect()->route('admin.panelJob.index')->with('success', 'create job successfully');

    }
    
    public function canelForm($id)
    {
        Session::put('panelJob', null);
        Session::put('panelJobImage', null);
        Session::put('outstanding', null);
        Session::put('feedback', null);
        return redirect()->back()->with('info', 'cancel successfully.');

    }
    public function deletePanelJob($id)
    {
        $panelJob = PanelJob::findOrFail($id);
        $panelJob->delete();
        return redirect()->route('admin.panelJob.index')->with('success', 'create job successfully');

    }
    public function detailPanelJob($id)
    {
        $panelJob = PanelJob::findOrFail($id);
        $panelJobImages = $panelJob->panelJobImages;
        $panelJobImage = Session::get('panelJobImage', null);
        return view("admin.panels.detail",compact("panelJob","panelJobImages","panelJobImage"));
      
    }
    public function editPanelJobImage($id)
    {
        $panelJobImage = PanelJobImage::find($id);
        Session::put('panelJobImage', $panelJobImage);
        return redirect()->back();

    }
    public function storePanelJobImage(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'panel_id' => 'required',
        ]);
        $filename = "";
        $status = $request->status == null?false:true;
        try {
            if ($request->hasFile('image')) {
                $filename = uniqid() . '.' . $request->image->getClientOriginalName();
                $request->image->move(public_path("panelJobImages"), $filename);
                PanelJobImage::create([
                    'status' => $status,
                    'image' => '/panelJobImages/' . $filename,
                    'panel_id' => $request->panel_id,
                ]);
            }
            return redirect()->back()->with('success', 'panel images created successfully.');
        } catch (\Exception $th) {
            $existingImagePath = public_path('/panelJobImages/' . $filename);
            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }
            return redirect()->back()->with('info', 'Opp error serve.');
        }
    }
    public function updatePanelJobImage(Request $request,PanelJobImage $panelJobImage)
    {
        $request->validate([
            'image' => 'required',
            'panel_id' => 'required',
        ]);
        try {
            // Kiểm tra xem checkbox có được chọn hay không
            $filename = "";
            $image = "";
            $status = $request->status == null?false:true;
            if ($request->hasFile('image')) {
                $existingImagePath = public_path($panelJobImage->image);
                if (File::exists($existingImagePath)) {
                    File::delete($existingImagePath);
                }
                $filename = uniqid() . '.' . $request->image->getClientOriginalName();
                $request->image->move(public_path("panelJobImages"), $filename);
                $image = '/panelJobImages/' . $filename;
            } else {
                $panelJobImage = $request->imageExisting;
            }
            $panelJobImage->update([
                'status' => $status,
                'image' => $image,
                'panel_id' => $request->panel_id
            ]);
            Session::put('panelJobImage', null);
            return redirect()->back()->with('info', 'updated panel job image successfully');
        } catch (\Throwable $th) {
            $existingImagePath = public_path('/panelJobImages/' . $filename);
            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }
            return redirect()->back()->with('info', 'Opp error serve.');
        }
    }

    public function deletePanelJobImage($id)
    {
        $panelJob = PanelJobImage::findOrFail($id);
        $existingImagePath =  $panelJob->image;
        $panelJob->delete();
        if (File::exists($existingImagePath)) {
            File::delete($existingImagePath);
        }
        return redirect()->back()->with('success', 'panel images deleted successfully.');
    }
    //outstandings
    public function outstanding()
    {     
        $outstandings = Outstanding::all();
        $outstanding = Session::get('outstanding', null);
        return view("admin.outstanding.index",compact("outstandings","outstanding"));
    }
    public function storeOutstanding(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,webp,jpg,gif|max:2048',
            'title' => 'required',
        ]);
        $filename = "";
        $status = $request->status == null?false:true;
        try {
            if ($request->hasFile('image')) {
                $filename = uniqid() . '.' . $request->image->getClientOriginalName();
                $request->image->move(public_path("outStandingImages"), $filename);
                Outstanding::create([
                    'status' => $status,
                    'image' => '/outStandingImages/' . $filename,
                    'title' => $request->title,
                ]);
            }
            return redirect()->back()->with('success', 'panel images created successfully.');
        } catch (\Exception $th) {
            $existingImagePath = public_path('/outStandingImages/' . $filename);
            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }
            return redirect()->back()->with('info', 'Opp error serve.');
        }
    }
    public function editOutstanding($id)
    {
        $outstanding= Outstanding::find($id);
        Session::put('outstanding', $outstanding);
        return redirect()->back();
    }
    public function updateOutstanding(Request $request,Outstanding $outstanding)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,webp,jpg,gif|max:2048',
            'title' => 'required',
        ]);
        try {
            // Kiểm tra xem checkbox có được chọn hay không
            $filename = "";
            $image = "";
            $status = $request->status == null?false:true;
            if ($request->hasFile('image')) {
                $existingImagePath = public_path($outstanding->image);
                if (File::exists($existingImagePath)) {
                    File::delete($existingImagePath);
                }
                $filename = uniqid() . '.' . $request->image->getClientOriginalName();
                $request->image->move(public_path("outStandingImages"), $filename);
                $image = '/outStandingImages/' . $filename;
            } else {
                $outstanding = $request->imageExisting;
            }
            $outstanding->update([
                'status' => $status,
                'image' => $image,
                'title' => $request->title
            ]);
            Session::put('outstanding', null);
            return redirect()->back()->with('info', 'updated outstanding job image successfully');
        } catch (\Throwable $th) {
            $existingImagePath = public_path('/outStandingImages/' . $filename);
            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }
            return redirect()->back()->with('info', 'Opp error serve.');
        }
    }
    //feedback
    public function feedback()
    {     
        $feedbacks = Feedback::all();
        $feedback = Session::get('feedback', null);
        return view("admin.feedbacks.index",compact("feedbacks","feedback"));
    }
    public function storeFeedback(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,webp,jpg,gif|max:2048',
            'name' => 'required',
            'description' => 'required',
        ]);
        $filename = "";
        $status = $request->status == null?false:true;
        try {
            if ($request->hasFile('image')) {
                $filename = uniqid() . '.' . $request->image->getClientOriginalName();
                $request->image->move(public_path("feedbackImages"), $filename);
                Feedback::create([
                    'status' => $status,
                    'image' => '/feedbackImages/' . $filename,
                    'name' => $request->name,
                    'description' => $request->description,
                ]);
            }
            return redirect()->back()->with('success', 'panel images created successfully.');
        } catch (\Exception $th) {
            $existingImagePath = public_path('/feedbackImages/' . $filename);
            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }
            return redirect()->back()->with('info', 'Opp error serve.');
        }
    }
    public function editFeedback($id)
    {
        $feedback= Feedback::find($id);
        Session::put('feedback', $feedback);
        return redirect()->back();
    }
    public function updateFeedback(Request $request,Feedback $feedback)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,webp,jpg,gif|max:2048',
            'name' => 'required',
            'description' => 'required',
        ]);
        try {
            // Kiểm tra xem checkbox có được chọn hay không
            $filename = "";
            $image = "";
            $status = $request->status == null?false:true;
            if ($request->hasFile('image')) {
                $existingImagePath = public_path($feedback->image);
                if (File::exists($existingImagePath)) {
                    File::delete($existingImagePath);
                }
                $filename = uniqid() . '.' . $request->image->getClientOriginalName();
                $request->image->move(public_path("feedbackImages"), $filename);
                $image = '/feedbackImages/' . $filename;
            } else {
                $feedback = $request->imageExisting;
            }
            $feedback->update([
                'status' => $status,
                'image' => $image,
                'name' => $request->name,
                'description' => $request->description
            ]);
            Session::put('feedback', null);
            return redirect()->back()->with('info', 'updated feddback job image successfully');
        } catch (\Throwable $th) {
            $existingImagePath = public_path('/feedbackImages/' . $filename);
            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }
            return redirect()->back()->with('info', 'Opp error serve.');
        }
    }
    public function deleteFeedback($id)
    {
        $feedback = Feedback::findOrFail($id);
        $existingImagePath =  $feedback->image;
        $feedback->delete();
        if (File::exists($existingImagePath)) {
            File::delete($existingImagePath);
        }
        return redirect()->back()->with('success', 'feedback deleted successfully.');
    }
    public function viewTvsg()
    {
        $introTVSG = IntroTvgs::first();
        $newsTVSG = News::where('type', 'TVGS')->get();
        return view("admin.tvgs.index",compact("introTVSG","newsTVSG"));
    }
    public function createIntroTVSG(Request $request)
    {
        $request->validate([
            "description" => 'required',
        ]);
        IntroTvgs::create([
            "description"=>$request->description,
        ]);
        return redirect()->back()->with('success', 'intro created successfully.');

    }
    public function updateIntroTVSG(Request $request,IntroTvgs $introTVSG)
    {
        $request->validate([
            "description" => 'required',
        ]);
        $introTVSG->update([
            "description"=>$request->description,
        ]);
        return redirect()->back()->with('success', 'intro updated successfully.');

    }

    
}

