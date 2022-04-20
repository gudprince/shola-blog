<?php

namespace App\Listeners;

use App\Events\CommentProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\PostComment;
use Illuminate\Notifications\Notifiable;
use Notification;

class SendCommentNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CommentProcessed  $event
     * @return void
     */
    public function handle(CommentProcessed $event)
    {
        
        $notify_data['post_id'] = $event->post->id;
        $notify_data['post_title'] = $event->post->title;
        $notify_data['post_slug'] = $event->post->slug;
        $notify_data['commenter_name'] = $event->commenter_name;
        $notify_data['post_url'] = route('post.details', $event->post->slug);
        $notify_data['message'] = 'commented on your post:';

        $userSchema = $event->user;
        
        Notification::send($userSchema, new PostComment($notify_data));
    }
}
