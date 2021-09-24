<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Jobs\SendEmailJob;
use App\Mail\SendMail;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function store(PostStoreRequest $request){
        $website = Website::find($request->website_id);
        if($website){
            $post = Post::create($request->validated());
            $maildata = [
                'title'   => $post->title,
                'description'   => $post->description,
                'message' => 'New post has been created',
            ];
            $subscribers = $website->subscribers;
           foreach($subscribers as $subscriber){
            $maildata['email'] = $subscriber->email;
  
            dispatch(new SendEmailJob($maildata));
            // Mail::to()->send(new SendMail($maildata));
           }
            

            return response()->json([
                'status'=> true,
                'message'=>"Post has been successfully created",
            ],201);
        }else{
            return response()->json([
                'status'=> false,
                'message'=>"You've provide the wrong website ID",
            ],404);
        }
    }
}
