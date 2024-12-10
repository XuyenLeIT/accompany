<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function contact()
    {
      $contact = Contact::first();
      return view("client.contact",compact("contact"));
    }
    public function index()
    {
      $contact = Contact::first();
      return view("admin.contact.index", compact("contact"));
    }
    public function edit($id)
    {
      $contact = Contact::find($id);
      return view('admin.contact.edit', compact('contact'));
    }
  
    public function update(Request $request, Contact $contact)
    {
      $request->validate([
        'logo' => 'image|mimes:jpeg,png,webp,jpg,gif|max:2048',
        'phone' => 'required',
        'address1' => 'required',
        'email' => 'required',
        'person' => 'required'
      ]);
      try {
        // Kiểm tra xem checkbox có được chọn hay không
        $filename = "";
        if ($request->hasFile('logo')) {
          $existingImagePath = public_path($contact->logo);
          if (File::exists($existingImagePath)) {
            File::delete($existingImagePath);
          }
          $filename = uniqid() . '.' . $request->logo->getClientOriginalName();
          $request->logo->move(public_path("projectImages"), $filename);
          $image = '/projectImages/' . $filename;
        } else {
          $image = $request->imageExisting;
        }
        $contact->update([
          'phone' => $request->phone,
          'address1' => $request->address1,
          'address2' => $request->address2,
          'email' => $request->email,
          'person' => $request->person,
          'logo' => $image
        ]);
        return redirect()->route('admin.contact.index')->with('success', 'contact updated successfully.');
      } catch (\Throwable $th) {
        $existingImagePath = public_path('/projectImages/' . $filename);
        if (File::exists($existingImagePath)) {
          File::delete($existingImagePath);
        }
        return redirect()->back()->with('info', 'Opp error serve.' . $th);
      }
    }
  
}
