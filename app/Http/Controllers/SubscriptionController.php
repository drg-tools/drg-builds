<?php

namespace App\Http\Controllers;

use App\User;

class SubscriptionController extends Controller
{
    public function unsubscribe($userId)
    {
        $user = User::findOrFail($userId);

        $user->can_email = false;
        $user->save();

        return view('subscription.unsubscribed');
    }
}
