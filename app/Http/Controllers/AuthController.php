<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    public function loginUsuario(Request $request)
    {
        $credentials = $request->validate([
            'US_EMAIL' => ['required', 'email'],
            'US_SENHA' => ['required'],
        ]);

        if (Auth::attempt(['US_EMAIL' => $credentials['US_EMAIL'], 'password' => $credentials['US_SENHA']])) {
            $request->session()->regenerate();

            $user = Auth::user();
            $tipoComprador = $user->US_TIPOCOMPRADOR;
            return redirect()->intended('/home')
                ->with('tipoComprador', $tipoComprador)
                ->with('success', 'Login realizado com sucesso!');
        }

        return back()->with('error', 'Falha ao autenticar usuário');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
