<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
	public function __construct() {
	  $this->middleware('is_admin',['except'=>['showAll']]);
	}

	/**
	 * Display a listing of the data.
	 *
	 * @param  void
	 * @return object
	 */
	public function index() {

	  $category = Category::all();

	  return view('category.kategorije')->with('category',$category);
	  
	}

	/**
	 * Store new data into the database.
	 *
	 * @param  Request $request
	 * @return object
	 */
	public function store(Request $request) {

	  $this->validate($request, [
		'ime' => 'required'
	  ]);

	  $cat = new Category();
	  $cat->name = $request->input('ime');
	  $cat->save();

	  return redirect('/kategorije')->with('success', 'Kategorija je dodata!');
	}

	/**
	* Display the specified data.
	*
	* @param  string $name
	* @return object
	*/
	public function showAll($name) {

	  $category = Category::all()->where('name','=',$name)->first();
	  if($category != NULL) {
		$posts = Post::all()->where('category_id','=',$category->id)->sortByDesc('id');
		return view('category.usluge-kategorija')->with('posts', $posts);
	  }

	  return redirect('/usluge');
	}


	/**
   * Deletes data from the database.
   *
   * @param  int $id
   * @return object
   */
	public function destroy($id) {

	  $cat = Category::find($id);
	  if(!auth()->user()->is_admin == 1) {
		  return redirect('/')->with('error','Nemate pristup. Niste Admin!');
		}
	  $cat->delete();

	  return redirect('/kategorije')->with('success','Kategorija je izbrisana!');
	}
}
