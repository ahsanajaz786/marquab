<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Chat;
use Musonza\Chat\Models\MessageNotification;

class ChatController extends Controller
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
        //$users = User::find(auth()->user()->id);
        $participants  = Chat::conversations()->setPaginationParams(['sorting' => 'desc'])
            ->setParticipant(auth()->user())
            ->limit(10)
            ->page(1)
            ->isDirect()
            ->get();
        $conversations = [];
        foreach ($participants->items() as $request){
            $conversations[] = $request->conversation;
        }
        return view('tutor.requests')->withRequests($conversations);
    }
    public function chat($id)
    {
        $user = User::find($id);
        if($id == auth()->user()->id || !$user){
            abort(404, 'Page Not Found.');
        }
        $user2 = auth()->user();
        $conversation = Chat::conversations()->between($user, $user2);
        if(!$conversation){
            Chat::createConversation([$user, $user2])->makeDirect();
        }
        return  $conversation;
        $userInfo = $user->role == 'Student'?$user->studentInfo : $user->tutorInfo;
        $profilePic = url('images').($userInfo->profile_photo? '/users/'.$user->id.'/'.$userInfo->profile_photo: '/avatar.png');
        return view('chat', compact('user','userInfo', 'profilePic'));
    }
    public function getConversation($id, $pageNo = 1){
        $user1 = User::find($id);
        if($id == auth()->user()->id || !$user1){
            return response(['error'=>'Invalid Details']);
        }
        $user2 = auth()->user();
        $conversation = Chat::conversations()->between($user1, $user2);
        if(!$conversation){
            return response(['error'=>'Invalid Details']);
        }
        $messages = Chat::conversation($conversation)
            ->setPaginationParams(['sorting' => 'desc'])
            ->setParticipant($user2)
            ->limit(5)
            ->page($pageNo)
            ->getMessages()
            ->all();
//        $messages = $messages->getMessages()->all();
        return response(['messages' => $messages], 200);
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
