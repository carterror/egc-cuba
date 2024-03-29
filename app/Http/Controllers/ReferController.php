<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ReferController extends Controller
{
    public function index()
    {
        $refers = User::where('master', Auth::user()->id)->paginate(15);

        $cant = User::where('master', Auth::user()->id)->count();

        return view('referido.index', compact('refers', 'cant'));
    }
    
    public function order($id)
    {
        if ($id) {
            $refers = User::where('master', Auth::user()->id)->latest('puntos')->paginate(10);
        } else {
            $refers = User::where('master', Auth::user()->id)->latest('rango')->paginate(10);
        }

        return view('referido.index', compact('refers'));
    }

    public function help()
    {
        return view('referido.help');
    }

    public function termi()
    {
        return view('referido.termi');
    }

    public function referir($id)
    {
        $user = User::find($id);
        return view('auth.referir', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'master' => $request->refer,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
