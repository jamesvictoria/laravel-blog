<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Mail;

class PagesController extends Controller {

	public function getIndex() {
		$posts = Post::latest('created_at')->limit(4)->get();
		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout() {
		$first = 'James';
		$last = 'Victoria';

		$fullname = $first . " " . $last;
		$email = 'victoriajamesroger@gmail.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}

	public function getContact() {
		return view('pages.contact');
	}

	public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10'
		]);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
		);

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('victoriajamesroger@gmail.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your Email was Sent Successfuly');

        return redirect('/');
	}


}