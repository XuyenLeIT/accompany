<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Project;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DOMDocument;

class ProjectController extends Controller
{
  public function project()
  {
    $projects = Project::all();
    $quote = Quote::where('type', 'DUAN')->first();
    return view("client.project", compact("projects", "quote"));
  }
  public function index()
  {
    $projects = Project::all();
    return view("admin.project.index", compact("projects"));
  }
  public function create()
  {
    return view("admin.project.create");
  }
  public function store(Request $request)
  {
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,webp,jpg,gif|max:2048',
      'title' => 'required',
      'type' => 'required',
      'year' => 'required',
      'description' => 'required',
      'owner' => 'required',
      'area' => 'required'
    ]);
    $filename = "";
    $filename = "";
    try {
      // Kiểm tra nếu có tệp ảnh được tải lên
      if ($request->hasFile('image')) {
        // Tạo tên tệp ảnh độc nhất
        $filename = uniqid() . '.' . $request->image->getClientOriginalName();
        // Lưu ảnh vào thư mục 'public/knowImages'
        $request->image->move(public_path("projectImages"), $filename);
        // Xử lý nội dung editor
        $description = $request->input('description');
        // Làm sạch HTML
        $description = $this->cleanHtml($description);
        $dom = new DOMDocument('1.0', 'UTF-8');
        libxml_use_internal_errors(true); // Bỏ qua các lỗi không quan trọng

        // Tải HTML vào DOMDocument
        $dom->loadHTML(mb_convert_encoding($description, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors(); // Xóa các lỗi đã xảy ra
        // Xử lý các ảnh base64 trong nội dung
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
          $src = $img->getAttribute('src');
          // Chỉ xử lý ảnh base64
          if (preg_match('/^data:image\/(\w+);base64,/', $src)) {
            $data = substr($src, strpos($src, ',') + 1);
            $data = base64_decode($data);
            $image_name = time() . '_' . uniqid() . '.png';
            $path = public_path('projectImages/' . $image_name);
            // Lưu file vào storage
            file_put_contents($path, $data);
            // Cập nhật đường dẫn ảnh trong nội dung
            $img->removeAttribute('src');
            $img->setAttribute('src', '/projectImages/' . $image_name);
          }
        }
        $description = $dom->saveHTML();

        // Tạo bản ghi mới trong cơ sở dữ liệu
        Project::create([
          'title' => $request->title,
          'year' => $request->year,
          'type' => $request->type,
          'owner' => $request->owner,
          'area' => $request->area,
          'description' => $description,
          'image' => '/projectImages/' . $filename,
        ]);
      } else {
        // Nếu không có ảnh tải lên, chuyển hướng về trang danh sách với thông báo lỗi
        return redirect()->back()->with('info', 'image is required.');
      }
      // Chuyển hướng về trang danh sách với thông báo thành công
      return redirect()->route('admin.project.index')->with('success', 'project created successfully.');
    } catch (\Exception $th) {
      $existingImagePath = public_path('/projectImages/' . $filename);
      if (File::exists($existingImagePath)) {
        File::delete($existingImagePath);
      }
      return redirect()->back()->with('info', `Opp error serve.`);
    }
  }
  public function edit($id)
  {
    $project = Project::find($id);
    return view('admin.project.edit', compact('project'));
  }

  public function update(Request $request, Project $project)
  {
    $request->validate([
      'image' => 'image|mimes:jpeg,png,webp,jpg,gif|max:2048',
      'title' => 'required',
      'type' => 'required',
      'description' => 'required',
      'year' => 'required',
      'owner' => 'required',
      'area' => 'required'
    ]);
    try {
      // Xử lý tải ảnh thumbnail
      if ($request->hasFile('image')) {
        // Tạo tên tệp ảnh độc nhất
        $filename = uniqid() . '.' . $request->image->getClientOriginalExtension();
        // Lưu ảnh vào thư mục 'public/knowImages'
        $request->image->move(public_path("projectImages"), $filename);
        $image = "/projectImages/" . $filename;
        $imagePath = public_path($request->imageExisting);
        if (File::exists($imagePath)) {
          File::delete($imagePath);
        }
      } else {
        // Giữ nguyên thumbnail cũ nếu không có ảnh mới
        $image = $request->input('imageExisted');
      }
      // Lấy và xử lý nội dung mô tả
      $description = $request->input('description');
      $deletedImages = json_decode($request->input('deleted_images'), true);
      // Xóa các ảnh đã được đánh dấu để xóa
      if ($deletedImages) {
        foreach ($deletedImages as $image) {
          $parsedUrl = parse_url($image, PHP_URL_PATH);
          $imagePathUrl = ltrim($parsedUrl, '/');
          $imagePath = public_path($imagePathUrl);
          if (file_exists($imagePath)) {
            unlink($imagePath); // Xóa file khỏi public
          }
        }
      }
      // Làm sạch và xử lý các ảnh base64 trong nội dung
      $description = $this->cleanHtml($description);
      $dom = new DOMDocument('1.0', 'UTF-8');
      libxml_use_internal_errors(true); // Bỏ qua các lỗi không quan trọng

      // Tải HTML vào DOMDocument
      $dom->loadHTML(mb_convert_encoding($description, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
      libxml_clear_errors(); // Xóa các lỗi đã xảy ra

      $images = $dom->getElementsByTagName('img');

      foreach ($images as $img) {
        $src = $img->getAttribute('src');
        // Xử lý chỉ các ảnh base64
        if (preg_match('/^data:image\/(\w+);base64,/', $src)) {
          $data = substr($src, strpos($src, ',') + 1);
          $data = base64_decode($data);
          $image_name = time() . '_' . uniqid() . '.png';
          $path = public_path('projectImages/' . $image_name);

          // Lưu tệp vào storage
          file_put_contents($path, $data);

          // Cập nhật đường dẫn ảnh trong nội dung HTML
          $img->removeAttribute('src');
          $img->setAttribute('src', '/projectImages/' . $image_name);
        }
      }

      $description = $dom->saveHTML();
      // Cập nhật bản ghi Knowledge
      $project->update([
        'title' => $request->title,
        'description' => $description,
        'year' => $request->year,
        'type' => $request->type,
        'owner' => $request->owner,
        'area' => $request->area,
        'image' => $image
      ]);
      // Chuyển hướng về trang danh sách với thông báo thành công
      return redirect()->route('admin.project.index')->with('success', 'project updated successfully.');
    } catch (\Throwable $th) {
      return redirect()->back()->with('info', 'Opp error serve.');
    }

  }
  public function delete($id)
  {
    try {
      $project = Project::find($id);
      $imagePath = public_path($project->image);
      if (File::exists($imagePath)) {
        File::delete($imagePath);
      }
      // Xóa các hình ảnh liên quan từ mô tả
      $dom = new DOMDocument('1.0', 'UTF-8');
      libxml_use_internal_errors(true); // Bỏ qua các cảnh báo từ HTML không hợp lệ
      $dom->loadHTML(mb_convert_encoding($project->description, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
      libxml_clear_errors();
      $images = $dom->getElementsByTagName('img');
      foreach ($images as $img) {
        $src = $img->getAttribute('src');
        // Xử lý URL của hình ảnh
        $parsedUrl = parse_url($src, PHP_URL_PATH);
        $imagePath = public_path(ltrim($parsedUrl, '/')); // Đường dẫn file từ public
        // Xóa tệp hình ảnh nếu tồn tại
        if (file_exists($imagePath)) {
          unlink($imagePath); // Xóa file
        }
      }
      // Xóa bài viết khỏi cơ sở dữ liệu
      $project->delete();
      return redirect()->route("admin.project.index")->with("success", "delete project successfully");
    } catch (\Throwable $th) {
      return redirect()->back()->with('message', 'Opp something went wrong');
    }

  }
  protected function cleanHtml($html)
  {
    // Danh sách các thẻ không hợp lệ
    $invalid_tags = ['canvas', 'script', 'iframe']; // Thêm các thẻ không hợp lệ khác nếu cần

    foreach ($invalid_tags as $tag) {
      // Loại bỏ các thẻ không hợp lệ
      $html = preg_replace('/<' . $tag . '[^>]*>.*?<\/' . $tag . '>/', '', $html);
      $html = preg_replace('/<' . $tag . '[^>]*>/', '', $html);
    }

    return $html;
  }
  public function detailProject($slug)
  {
    $parts = explode('-', $slug);
    // Lấy phần tử cuối cùng trong mảng
    $lastPartId = (int) end($parts);
    $detailProject = Project::find($lastPartId);
    $cleanDescription = $this->cleanDescription($detailProject->description);
    $projectOther = Project::where('id', '!=', $lastPartId)->get();
    $adsDetail = Ads::where('type', 'DETAILNEWS')->get();
    return view("client.detailProject", compact("detailProject", "projectOther", "adsDetail", "cleanDescription"));
  }
  // Hàm làm sạch description
  private function cleanDescription($description)
  {
    // 1. Giải mã HTML entities (ví dụ: &agrave; thành à)
    $description = html_entity_decode($description);

    // 2. Loại bỏ tất cả thẻ HTML
    $description = strip_tags($description);

    // 3. Cắt bỏ khoảng trắng thừa ở đầu và cuối
    $description = trim($description);

    // Trả về mô tả đã làm sạch
    return $description;
  }
}
