<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class UserProfileController extends Controller
{
    public function show(): View
    {
        $user = User::find(1);

        return view('user-profile')->with([
            'user' => $user
        ]);
    }
}
