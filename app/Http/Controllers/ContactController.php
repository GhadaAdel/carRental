<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\CreateMessage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\DatabaseNotification;

class ContactController extends Controller
{

    public function sendEmail(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string|max:400'
        ]);

        $posts = Contact::create($data);
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $user_create = auth()->user()->name;
        Notification::send($users, new CreateMessage($posts->id, $user_create, $posts->message));

        // $userToNotify = User::find($posts->id); // Replace $userId with the actual ID of the user you want to notify

        // if ($userToNotify) {
        //     $userToNotify->notify(new CreateMessage()); // Replace 'YourNotification' with the name of your notification class
        // }

        Mail::to('ghada@gmail.com')->send(new contactMail($data));

        return redirect()->back()->with('success', 'Email sent successfully!');
    }
    
    public function index()
    {
        $contact = Contact::get();
       return view('admin/messagesList', compact('contact'));
    }
    public function show(string $id)
    {
       $contact = Contact::findOrFail($id);
       $getID = DB::table('notifications')->where('data->contact_id', $id)->pluck('id');
    //    $userID = DB::table('notifications')->where('data->contact_id', $id)->pluck('id');
       DB::table('notifications')->where('id',$getID)->update(['read_at'=>now()]);
       return view('admin/showMessage', compact('contact'));
    }

    // public function showw(string $id) {
    //     $contact = Contact::findOrFail($id);
    //     $user = Auth::user();
    //     $user->unreadNotifications()->update(['read_at' => now()]);
    //     return view('admin/showMessage', compact('contact'));

    //     }

    public function create()
    {
       return view('web/contact');
    }

    public function markAsRead()
    {
        $user = User::find(auth()->user()->id);

        foreach ($user->unreadNotifications as $notification){
            $notification->markAsRead();
        }

       return redirect()->back();
    }
    // public function unread()
    // {
    // $unreadMessages = User::where('id', auth()->id())
    //                          ->where('read', false)
    //                          ->latest()
    //                          ->get();

    // return view('admin/messagesList', compact('unreadMessages'));
    // }

    // public function markAsRead($id)
    // {
    //     $message = Contact::findOrFail($id);
    //     $message->read = true;
    //     $message->save();
    
    //     // Optionally, create a record in the read_messages table
    // }
    // public function unread()
    // {
    //   $unreadContacts = Contact::unread(auth()->id())->get();
    //   return view('admin/unreadMessage', compact('unreadContacts'));
    // }
//    public function unread(){

//     $userId = auth()->id();

//    $unreadContacts = Contact::whereNull('read_at')->get();
//    return view('admin/cars', compact('unreadContacts'));
//    }



        // public function getUnreadMessages()
        // {
        // $user = Auth::user();
        // $unreadMessages = $user->contacts()->unread()->get();

        // return view('layouts/admin', compact('unreadMessages'));
        // }
}
