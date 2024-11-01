<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Passagem;
use App\Models\User;
use App\Models\Onibus;

class AuthAdminController extends Controller
{
    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'ADM_EMAIL' => ['required', 'email'],
            'ADM_SENHA' => ['required'],
            'ADM_TOKENACESSO' => ['required'],
        ]);

        $admin = Admin::where('ADM_EMAIL', $credentials['ADM_EMAIL'])->first();

        if ($admin && Hash::check($credentials['ADM_SENHA'], $admin->ADM_SENHA)) {
            Auth::login($admin);
            $request->session()->regenerate();

            return redirect()->route('home-adm')->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'ADM_EMAIL' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    public function showHomeAdm()
    {
        $passagens = Passagem::all();
        $clientes = User::where('US_TIPOCOMPRADOR', 'Comprador')->get();
        $empresas = User::where('US_TIPOCOMPRADOR', 'Vendedor')->get();
        $onibus = Onibus::all();

        return view('home-adm', compact('passagens', 'clientes', 'empresas', 'onibus'));
    }

    public function cadastro(Request $request)
    {
        $this->validator($request->all())->validate();

        $adm = $this->create($request->all());

        return redirect()->route('login')->with('success', 'Cadastro de Admin realizado com sucesso!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ADM_NOME' => ['required', 'string', 'max:255'],
            'ADM_EMAIL' => ['required', 'string', 'email', 'max:255', 'unique:ADMS,ADM_EMAIL'],
            'ADM_DOCUMENTO' => ['nullable', 'string', 'max:20'],
            'ADM_SENHA' => ['required', 'string', 'min:8'],
            'ADM_TOKENACESSO' => ['required', 'string', 'min:15'],
        ]);
    }

    protected function create(array $data)
    {
        return Admin::create([
            'ADM_NOME' => $data['ADM_NOME'],
            'ADM_EMAIL' => $data['ADM_EMAIL'],
            'ADM_DOCUMENTO' => $data['ADM_DOCUMENTO'],
            'ADM_SENHA' => Hash::make($data['ADM_SENHA']),
            'ADM_TOKENACESSO' => $data['ADM_TOKENACESSO'],
        ]);
    }

    public function index(Request $request)
    {
        if (Auth::check()) {
            dd('Usuário autenticado:', Auth::user());
        } else {
            dd('Usuário não autenticado.');
        }

        $query = Passagem::query();

        if ($request->has('date_from') && $request->get('date_from')) {
            $query->where('PAS_DIAIDA', '>=', $request->get('date_from'));
        }

        if ($request->has('date_to') && $request->get('date_to')) {
            $query->where('PAS_DIAVOLTA', '<=', $request->get('date_to'));
        }

        $perPage = 10;
        $passagens = $query->paginate($perPage);

        return view('home-adm', [
            'passagens' => $passagens,
        ]);
    }

    public function destroy($id)
    {
        $passagem = Passagem::find($id);

        if (!$passagem) {
            return redirect()->route('home-adm')
                ->with('error', 'Passagem não encontrada.');
        }

        $passagem->delete();

        return redirect()->route('home-adm')
            ->with('success', 'Passagem deletada com sucesso!');
    }

    public function destroyClient($id)
    {
        $cliente = User::find($id);

        if (!$cliente) {
            return redirect()->route('home-adm')
                ->with('error', 'Cliente não encontrado.');
        }

        $cliente->delete();

        return redirect()->route('home-adm')
            ->with('success', 'Cliente deletado com sucesso!');
    }

    public function destroyEmpresa($id)
    {
        $empresa = User::find($id);

        if (!$empresa) {
            return redirect()->route('home-adm')
                ->with('error', 'Empresa não encontrada.');
        }

        if ($empresa->US_TIPOCOMPRADOR !== 'Vendedor') {
            return redirect()->route('home-adm')
                ->with('error', 'O usuário selecionado não é uma empresa.');
        }

        $passagensEmpresa = Passagem::where('PAS_EMPRESA', $empresa->US_NOME);

        $passagensEmpresa->delete();
        $empresa->delete();

        return redirect()->route('home-adm')
            ->with('success', 'Empresa e passagens relacionadas a ela deletadas com sucesso!');

    }

    public function destroyOnibus($id)
    {
        $onibus = Onibus::find($id);

        if (!$onibus) {
            return redirect()->route('home-adm')
                ->with('error', 'Ônibus não encontrado.');
        }

        $onibus->delete();

        return redirect()->route('home-adm')
            ->with('success', 'Ônibus deletado com sucesso!');
    }
}
