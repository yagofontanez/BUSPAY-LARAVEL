<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\TipoComprador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('cadastro');
    }

    public function cadastro(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'US_NOME' => ['required', 'string', 'max:255'],
            'US_EMAIL' => ['required', 'string', 'email', 'max:255', 'unique:USUARIOS,US_EMAIL'],
            'US_SENHA' => ['required', 'string', 'min:8'],
            'US_TIPOCOMPRADOR' => ['required', 'string'],
            'US_DOCUMENTO' => ['nullable', 'string', 'max:20'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'US_NOME' => $data['US_NOME'],
            'US_EMAIL' => $data['US_EMAIL'],
            'US_SENHA' => Hash::make($data['US_SENHA']),
            'US_TIPOCOMPRADOR' => TipoComprador::from($data['US_TIPOCOMPRADOR'])->value,
            'US_DOCUMENTO' => $data['US_DOCUMENTO'],
        ]);
    }
}

