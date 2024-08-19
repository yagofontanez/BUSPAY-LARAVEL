<?php

namespace App\Http\Controllers;

use App\Models\Passagem;
use Illuminate\Http\Request;

class PassagemController extends Controller
{
    public function index(Request $request)
    {
        $query = Passagem::query();

        if ($request->has('date_from') && $request->get('date_from')) {
            $query->where('PAS_DIAIDA', '>=', $request->get('date_from'));
        }

        if ($request->has('date_to') && $request->get('date_to')) {
            $query->where('PAS_DIAVOLTA', '<=', $request->get('date_to'));
        }

        $passagens = $query->get();

        $perPage = 10;
        $page = $request->input('page', 1);
        $total = Passagem::count();
        $passagens = Passagem::skip(($page - 1) * $perPage)->take($perPage)->get();
        return view('home', [
            'passagens' => $passagens,
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $page,
        ]);
    }

    public function create()
    {
        return view('passagens.create');
    }

    public function store(Request $request)
    {
        $passagem = Passagem::create($request->all());
        return redirect()->route('passagens.index')->with('success', 'Passagem adicionada com sucesso!');
    }

    public function show(Passagem $passagem)
    {
        return view('passagens.show', compact('passagem'));
    }

    public function edit(Passagem $passagem)
    {
        return view('passagens.edit', compact('passagem'));
    }

    public function update(Request $request, Passagem $passagem)
    {
        $passagem->update($request->all());
        return redirect()->route('passagens.index')->with('success', 'Passagem atualizada com sucesso!');
    }

    public function destroy(Passagem $passagem)
    {
        $passagem->delete();
        return redirect()->route('passagens.index')->with('success', 'Passagem removida com sucesso!');
    }

    public function comprar(Request $request)
    {

    }

    public function adicionar(Request $request)
    {
    }
}
