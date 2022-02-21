<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);
        if (User::where('email', $validate['email'])->exists()) {
            return redirect(route('registration'))->withErrors([
                'email' => 'Этот маил уже зареган дружок'
            ]);
        }

        $user = User::create($validate);

        if ($user) {
            Auth::login($user);
            return redirect(route('private'));
        }

        return redirect(route('login'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);
    }
}
