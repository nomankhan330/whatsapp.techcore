<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        $request->validate([
            'name' => ['required'],
            'password' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,NULL,id,deleted_at,NULL'],
        ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'user_type' => $request->role_id,
                // 'password_show'=>$request->password,
                'password' => Hash::make($request->password),
                'created_at' => date("Y-m-d h:i:s"),
            ]);
            $data = Client::create([
                'user_id' => $user->id,
                'client_name' => $request->name,
                'email' => $request->email,
                'status' => '1',
            ]);
            $user->attachRole($request->role_id);
            event(new Registered($user));
            Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
