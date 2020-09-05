<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
      return view('pages.index');
    }

    public function onama() {
      return view('pages.o-nama');
    }

    public function cene() {
      return view('pages.cene');
    }

    public function politika_privatnosti() {
      return view('pages.politika-privatnosti');
    }


}
