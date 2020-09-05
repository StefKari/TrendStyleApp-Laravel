<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Gallery;
use File;


class GalleryController extends Controller
{

  public function __construct() {

    $this->middleware('is_admin',['except' => ['index','show']]);

  }

  public function index() {

    $images = Gallery::paginate(6);

    return view('gallery.galerija')->with('images',$images);
  }

  public function create() {

    if(auth()->user()->is_admin == 1) {
      return view('gallery.kreiraj');
    }
    else {
      redirect('/')->with('error','Nemate pristup. Niste admin!');
    }

  }

  public function store(Request $request) {

    $this->validate($request, [
      'image' => 'required',
      'image.*' => 'image|mimes:jpeg,png,jpg,|max:1999'
    ]);

    $images = $request->image;
    foreach ($images as $image) {
      $image_New_Name = time() . $image->getClientOriginalName();
      $image->move('gallery', $image_New_Name);
      $gallery = new Gallery();
      $gallery->user_id = auth()->user()->is_admin == 1;
      $gallery->gallery = 'gallery/' . $image_New_Name;
      $gallery->save();
    }

    return redirect('/galerija')->with('success', 'Image je dodata u galeriju!');

 }

   public function destroy($id) {

      $gallery = Gallery::find($id);
      if(!auth()->user()->is_admin == 1) {
          return redirect('/')->with('error','Nemate pristup. Niste Admin!');
      }
      $image_gallery_path = public_path().'/'.$gallery->gallery;
      unlink($image_gallery_path);
      $gallery->delete();


      return redirect('/galerija')->with('success','Image iz galerije je izbrisana!');
   }


}
