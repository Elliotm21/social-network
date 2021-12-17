<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\MyNotification;
  
class NotificationController extends Controller
{
    public function show(User $user)
    {
        return view('notifications.show', ['user' => $user]);
    }
}