<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;


class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function about(){
        return view ('pages.about');
    }
    public function contact(){
        return view ('pages.contact');
    }
    public function tosend (Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required|min:50'
        ]);
            $name= $request->input('name');
            $email= $request->input('email');
            $subject= $request->input('subject');

            Mail::to('jaz_cris@live.fr')->send(new contactUs($name , $email, $subject));
            return redirect('/contact')->whith('success' , 'I got your message');
    }
}
