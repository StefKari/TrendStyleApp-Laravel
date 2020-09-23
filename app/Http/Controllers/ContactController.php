<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
  /**
    * Forwards to the contact page.
    *
    * @param  void
    * @return View
    */
    public function create() {

      return view('contact.kontakt');
    }

    /**
     * Sends data to mail
     *
     * @param  Request
     * @return array
     */
    public function store(Request $request) {

      $contact = request()->validate([
        'ime_prezime' => 'required',
        'telefon' => 'required|numeric|',
        'email' => 'required|email:rfc,dns',
        'usluga' => 'required',
        'dan' => 'required',
        'mesec' => 'required',
        'vreme' => 'required',
        'poruka' => 'nullable'
      ]);

      Mail::to('trendstyle2006@gmail.com')->send(new ContactMail($contact));

      return redirect('/kontakt')->with('success','Rezervacija je poslata!');
    }
}
