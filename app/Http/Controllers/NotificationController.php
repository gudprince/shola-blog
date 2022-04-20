<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function view (request $request) {

      
        $Notification = auth()->user()->Notifications->find($request->notify_id);
        if($Notification){
            $Notification->markAsRead();
        }

        return redirect('post/details/'.$request->post_slug);
        
        
    }

    public function delete(request $request) {

        $Notification = auth()->user()->Notifications->find($request->id);
        if($Notification){
            $Notification->delete();
            Session()->flash('message', 'Notification Deleted Successfully');
            return response()->json(['message'=> 'Notification Deleted Successfully']);
        }
        
    }
}
