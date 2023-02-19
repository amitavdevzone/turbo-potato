<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdatePassword
{
    use AsAction;
    public function handle(User $user, string $password): User
    {
        $user->password = bcrypt($password);
        $user->save();

        return $user;
    }

    public function asController(Request $request)
    {
        $user = User::find(1);

        $this->handle(
            $user,
            'myNewPassword'
        );

        return $user;
    }

    public function htmlResponse(User $user, Request $request)
    {
        return redirect()->route('view.profile')->with([
            'user' => $user,
        ]);
    }

    public function jsonResponse(User $user, Request $request)
    {
        return response([
            'user' => $user,
            'success' => true,
        ], 201);
    }
}
