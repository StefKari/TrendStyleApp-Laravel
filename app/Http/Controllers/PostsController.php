<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    public function __construct() {
      $this->middleware('is_admin',['except' => ['index','show']]);
    }

    /**
     * Display a listing of the data.
     *
     * @param void
     * @return View
     */
    public function index() {

      $posts = Post::orderBy('id','desc')->paginate(4);
      $categories = Category::all();
      return view('posts.usluge',[
        'posts'=>$posts,
        'categories' => $categories
      ]);

    }

    /**
     * Forwards to the usluge page.
     *
     * @param void
     * @return View
     */
    public function create() {

      if(auth()->user()->is_admin == 1) {
        $posts = Post::all();
        $category = Category::all();
        return view('posts.kreiraj',[
          'posts'=> $posts,
          'category'=> $category
        ]);
      }
      else {
        redirect('/')->with('error','Nemate pristup. Niste admin!');
      }

    }

    /**
     * Store new data into the database.
     *
     * @param  Request
     * @return array
     */
    public function store(Request $request) {

      $this->validate($request, [
        'title' => 'required',
        'body' => 'required',
        'image' => 'image|nullable|max:1999',
        'category_id' => 'required'
      ]);

      // trkeljisanje sa upload
      if($request->hasFile('image')) {
        // vracanje filename sa ekstenzijom
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        // vracanje samo filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // vracanje ekstenzije
        $extension = $request->file('image')->getClientOriginalExtension();
        // ubacivanje filename u bazu
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        // upload image i ubacivanje u odredjeni fajl
        $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
      }
      else {
        $fileNameToStore = 'NoImages.png';
      }

      $post = new Post();
      $post->title = $request->input('title');
      $post->body = $request->input('body');
      $post->user_id = auth()->user()->is_admin == 1;
      $post->image = $fileNameToStore;
      $post->category_id = $request->input('category_id');
      $post->save();

      return redirect('/usluge')->with('success','Usluga je kreirana!');

    }

      /**
    * Display the specified data.
    *
    * @param  int  $id
    * @return array
    */
      public function show($id) {

        $post = Post::find($id);
        return view('posts.usluga')->with('post',$post);
    }

    /**
    * Displays the record being edited from the database.
    *
    * @param  int
    * @return array
    */
    public function edit($id) {

      $post = Post::find($id);
      $category = Category::all();
      if(!auth()->user()->is_admin == 1) {
          return redirect('/')->with('error','Nemate pristup. Niste Admin!');
      }
      return view('posts.edit',[
        'post'=> $post,
        'category'=> $category
      ]);
    }

    /**
     * Update data from database.
     *
     * @param  Request
     * @param  int
     * @return array
     */
    public function update(Request $request, $id) {

      $this->validate($request,[
        'title' => 'required',
        'body' => 'required',
        'image' => 'image|nullable|max:1999',
        'category_id' => 'required'
      ]);

      // trkeljisanje sa upload
      if($request->hasFile('image')) {
        // vracanje filename sa ekstenzijom
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        // vracanje samo filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // vracanje ekstenzije
        $extension = $request->file('image')->getClientOriginalExtension();
        // ubacivanje filename u bazu
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        // upload image i ubacivanje u odredjeni fajl
        $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
      }

      $post = Post::find($id);
      $post->title = $request->input('title');
      $post->body = $request->input('body');
      $post->category_id = $request->input('category_id');
      if($request->hasFile('image')) {
        Storage::delete('public/image/' . $post->image);
        $post->image = $fileNameToStore;
      }
      $post->save();

      return redirect('/usluge')->with('success', 'Usluga je update!');
    }

    /**
    * Deletes data from the database.
    *
    * @param  int
    * @return array
    */
    public function destroy($id) {

      $post = Post::find($id);
      if(!auth()->user()->is_admin == 1) {
          return redirect('/')->with('error','Nemate pristup. Niste Admin!');
        }
        if($post->image != 'NoImages.png') {
          Storage::delete('public/image/' . $post->image);
        }
        $post->delete();

        return redirect('/usluge')->with('success','Usluga je izbrisana!');
    }

}
