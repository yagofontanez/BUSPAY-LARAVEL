<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AuthAdminController extends Controller
{
    public function loginAdmin(Request $request) {
        $credentials = $request->validate([
            'ADM_EMAIL' => ['required', 'email'],
            'ADM_SENHA' => ['required'],
            'ADM_TOKENACESSO' => ['required'],
        ]);

        $admin = Admin::where('ADM_EMAIL', $credentials['ADM_EMAIL'])->first();

        if ($admin && Hash::check($credentials['ADM_SENHA'], $admin->ADM_SENHA)) {
            Auth::login($admin);
            $request->session()->regenerate();
            return redirect()->intended('/home-adm')->with('success', 'Login realizado com sucesso!');
        }

        return back()->with('error', 'Falha ao autenticar administrador');
    }

    public function cadastro(Request $request) {
        $this->validator($request->all())->validate();

        $adm = $this->create($request->all());

        return redirect()->route('login')->with('success', 'Cadastro de Admin realizado com sucesso!');
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'ADM_NOME' => ['required', 'string', 'max:255'],
            'ADM_EMAIL' => ['required', 'string', 'email', 'max:255', 'unique:ADMS,ADM_EMAIL'],
            'ADM_DOCUMENTO' => ['nullable', 'string', 'max:20'],
            'ADM_SENHA' => ['required', 'string', 'min:8'],
            'ADM_TOKENACESSO' => ['required', 'string', 'min:15'],
        ]);
    }

    protected function create(array $data) {
        return Admin::create([
            'ADM_NOME' => $data['ADM_NOME'],
            'ADM_EMAIL' => $data['ADM_EMAIL'],
            'ADM_DOCUMENTO' => $data['ADM_DOCUMENTO'],
            'ADM_SENHA' => Hash::make($data['ADM_SENHA']),
            'ADM_TOKENACESSO' => $data['ADM_TOKENACESSO'],
        ]);
    }
}
