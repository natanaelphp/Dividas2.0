<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Auth\Guard as Auth;
use Illuminate\Contracts\Hashing\Hasher as Hasher;

class ChangePasswordController extends Controller
{
    public function form()
    {
        return View('changePasswordForm');
    }

    public function changePassword(ChangePasswordRequest $request, Auth $auth, Hasher $hash)
    {
        $user = $auth->user();

        if ($hash->check($request->password, $user->password) == false) {
            return redirect('changePassword')->withErrors('Senha atual incorreta.');
        }

        $user->password = $hash->make($request->new_password);
        $user->save();

        return redirect('/');

    }
}
