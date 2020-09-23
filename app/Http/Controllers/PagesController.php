<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  /**
   * Display a index page.
   *
   * @param void
   * @return View
   */
    public function index() {
      return view('pages.index');
    }

    /**
     * Display a o-nama page.
     *
     * @param void
     * @return View
     */
    public function onama() {
      return view('pages.o-nama');
    }

    /**
     * Display a cene page.
     *
     * @param void
     * @return View
     */
    public function cene() {
      return view('pages.cene');
    }

    /**
     * Display a politika_privatnosti page.
     *
     * @param void
     * @return View
     */
    public function politika_privatnosti() {
      return view('pages.politika-privatnosti');
    }


}
