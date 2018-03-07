<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Mail;
use App\Post;

class PagesController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('id', 'desc')->paginate(4);
       return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout(){
    	$first = "Hero";
    	$last = "Gustin";

    	$full = $first. " ". $last;
    	$email = "herogustin@gmail.com";
    	return view('pages.about')->withFullname($full)->withEmail($email); // 'fullname': gtri hien thi tren view

    	// Cach 2:
    	// $data = [];
    	// $data['email'] = $email;
    	// $data['fullname'] = $full;
    	// return view('pages.about')->withData($data);
    }

    public function getContact(){
    	return view('pages.contact');
    }

    public function postContact(Request $request){
        $request->validate([
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10',
        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message,
        ];

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('herogustin1986@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your email was sent!');
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
