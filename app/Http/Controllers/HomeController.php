<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Chat;
use Musonza\Chat\Models\MessageNotification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id','!=',auth()->user()->id)->get();
        return view('home', compact('users'));
    }
    public function chat($id)
    {
        return view('home')->withUserId($id);
    }
    public function getConversation($id){
        $user1 = User::find($id);
        if($id == auth()->user()->id || !$user1){
            return response(['error'=>'Invalid Details']);
        }
        $user2 = auth()->user();
        $conversation = Chat::conversations()->between($user1, $user2);
        if(!$conversation){
            $conversation = Chat::makeDirect()->createConversation([$user1, $user2]);
        }
//        Chat::message('Hello 3')
//            ->from($user2)
//            ->to($conversation)
//            ->send();
        $userInfo1 = $user1->role == 'Student'?$user1->studentInfo : $user1->tutorInfo;
        $userInfo2 = $user2->role == 'Student'?$user2->studentInfo : $user2->tutorInfo;
        $profilePic1 = url('images').($userInfo1->profile_photo? '/users/'.$user1->id.'/'.$userInfo1->profile_photo: '/avatar.png');
        //$profilePic2 = url('images').($userInfo2->profile_photo? '/users/'.$userInfo2->profile_photo: '/avatar.png');
        $messages = Chat::conversation($conversation)->setParticipant($user2);
        //$messages->readAll();
        $messages = $messages->getMessages()->all();

        return response(['userInfo1' => $userInfo1,'user1' => $user1, 'profilePic1' => $profilePic1, 'messages' => $messages], 200);
    }
    public function sendMessage(Request $request,$id){
        $request->validate(['message' => 'required']);
        $user1 = User::find($id);
        if($id == auth()->user()->id || !$user1){
            return response(['error' => 'Invalid Details'], 404);
        }
        $user2 = auth()->user();
        $conversation = Chat::conversations()->between($user1, $user2);
        if(!$conversation){
            return response(['error' => 'Invalid Details'], 404);
        }
        $chat = Chat::message($request->message)
            ->from($user2)
            ->to($conversation)
            ->send();
        return response(['message' => $chat], 200);
    }
    public function getNewMessages(Request $request){
        $request->validate(['user_id'=> 'required']);
        $id = $request->user_id;
        $user1 = User::find($id);
        if($id == auth()->user()->id || !$user1){
            return response(['error' => 'Invalid Details'], 404);
        }
        $user2 = auth()->user();
        $conversation = Chat::conversations()->between($user1, $user2);
        if(!$conversation){
            return response(['error' => 'No Conversation Found'], 404);
        }
        $notifications = $conversation->unreadNotifications($user2);
        $messages = [];
        foreach ($notifications as $notification){
            $messages[] = Chat::messages()->getById($notification->message_id);
        }
        return response(['messages' => $messages], 200);
    }


}
