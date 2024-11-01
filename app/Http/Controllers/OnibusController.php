<?php

namespace App\Http\Controllers;

use App\Models\Onibus;
use App\Models\Poltrona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnibusController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ON_MARCA' => 'required|string|max:255',
            'ON_QTDEPOLTRONAS' => 'required|integer',
            'ON_PLACA' => 'required|string|max:10',
        ]);

        $onibus = Onibus::create([
            'ON_MARCA' => $request->ON_MARCA,
            'ON_QTDEPOLTRONAS' => $request->ON_QTDEPOLTRONAS,
            'ON_PLACA' => $request->ON_PLACA,
            'ON_EMPRESA_ID' => $request->ON_EMPRESA_ID,
        ]);

        for ($i = 1; $i <= $request->ON_QTDEPOLTRONAS; $i++) {
            Poltrona::create([
                'POL_NUMERO' => $i,
                'POL_CLIENTE' => null,
                'POL_DISPONIVEL' => true,
                'POL_ONIBUSID' => $onibus->id
            ]);
        }

        return redirect()->route('vender-passagem')
            ->with('success', 'Ônibus criado com sucesso!');
    }

    public function destroy($id)
    {
        $onibus = Onibus::findOrFail($id);
        $onibus->delete();

        $user = Auth::user();
        $empresaNome = $user->US_NOME;

        $query = Onibus::query();
        $query->where('ON_EMPRESA_ID', $user->id);
        $perPage = 10;
        $passagens = $query->paginate($perPage);

        return redirect()->route('vender-passagem')->with([
            'passagens' => $passagens,
            'currentPage' => $passagens->currentPage(),
            'total' => $passagens->total(),
            'perPage' => $perPage,
            'empresaNome' => $empresaNome,
            'success' => 'Onibus apagado com sucesso!'
        ]);
    }

}
