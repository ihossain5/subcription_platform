<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberStoreRequest;
use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribeWebsite(SubscriberStoreRequest $request){
        $website = Website::find($request->website_id);
        if($website){
            $suscriber = Subscriber::where('website_id', $website->id)
            ->where('email',$request->email)->first();
            if($suscriber){
                return response()->json([
                    'status'=> false,
                    'message'=>"You've alerady subscribed this website",
                ],200);
            }else{
                $store_subscriber = Subscriber::create($request->validated());
                return response()->json([
                    'status'=> true,
                    'message'=>"You've successfully subscribed the website",
                ],201);
            }
      
        }else{
            return response()->json([
                'status'=> false,
                'message'=>"You've provide the wrong website ID",
            ],404);
        }
       
    }
}
