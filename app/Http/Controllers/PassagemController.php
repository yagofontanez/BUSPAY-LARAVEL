<?php

namespace App\Http\Controllers;

use App\Models\Passagem;
use Illuminate\Http\Request;

class PassagemController extends Controller
{
    // Listar passagens
    public function index()
    {
        $passagens = Passagem::all(); // Recupera todas as passagens
        return view('home', compact('passagens')); // Passa as passagens para a view
    }

    // Exibir formulário para criar nova passagem
    public function create()
    {
        return view('passagens.create');
    }

    // Salvar nova passagem
    public function store(Request $request)
    {
        $passagem = Passagem::create($request->all());
        return redirect()->route('passagens.index')->with('success', 'Passagem adicionada com sucesso!');
    }

    // Exibir uma passagem específica
    public function show(Passagem $passagem)
    {
        return view('passagens.show', compact('passagem'));
    }

    // Exibir formulário de edição
    public function edit(Passagem $passagem)
    {
        return view('passagens.edit', compact('passagem'));
    }

    // Atualizar uma passagem existente
    public function update(Request $request, Passagem $passagem)
    {
        $passagem->update($request->all());
        return redirect()->route('passagens.index')->with('success', 'Passagem atualizada com sucesso!');
    }

    // Deletar uma passagem
    public function destroy(Passagem $passagem)
    {
        $passagem->delete();
        return redirect()->route('passagens.index')->with('success', 'Passagem removida com sucesso!');
    }

    // Método para comprar uma passagem
    public function comprar(Request $request)
    {
        // Lógica de compra aqui
    }

    // Método para adicionar uma passagem pela empresa
    public function adicionar(Request $request)
    {
        // Lógica de adição aqui
    }
}
