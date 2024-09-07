<?php

namespace App\Http\Controllers;

use App\Models\Passagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function index_vender(Request $request)
    {

        $user = Auth::user();
        $empresaNome = $user->US_NOME;
        $query = Passagem::query();
        $query->where('PAS_EMPRESA', $empresaNome);

        if ($request->has('date_from') && $request->get('date_from')) {
            $query->where('PAS_DIAIDA', '>=', $request->get('date_from'));
        }

        if ($request->has('date_to') && $request->get('date_to')) {
            $query->where('PAS_DIAVOLTA', '<=', $request->get('date_to'));
        }

        $perPage = 10;

        $passagens = $query->paginate($perPage);

        return view('vender-passagem', [
            'passagens' => $passagens,
            'currentPage' => $passagens->currentPage(),
            'total' => $passagens->total(),
            'perPage' => $perPage,
            'empresaNome' => $empresaNome
        ]);
    }

    public function create()
    {
        return view('passagens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'PAS_ESTADOIDA' => 'required|string',
            'PAS_CIDADEIDA' => 'required|string',
            'PAS_ESTADOVOLTA' => 'nullable|string',
            'PAS_CIDADEVOLTA' => 'nullable|string',
            'PAS_HORASIDA' => 'required|string',
            'PAS_HORASVOLTA' => 'nullable|string',
            'PAS_DIAIDA' => 'required|date',
            'PAS_DIAVOLTA' => 'nullable|date',
            'PAS_PRECO' => 'required|string',
            'PAS_EMPRESA' => 'required|string',
        ]);

        $data = $request->all();
        $data['PAS_PRECO'] = str_replace(',', '.', $data['PAS_PRECO']);

        $passagem = Passagem::create($data);

        $user = Auth::user();
        $empresaNome = $user->US_NOME;
        $query = Passagem::query();
        $query->where('PAS_EMPRESA', $empresaNome);

        if ($request->has('date_from') && $request->get('date_from')) {
            $query->where('PAS_DIAIDA', '>=', $request->get('date_from'));
        }

        if ($request->has('date_to') && $request->get('date_to')) {
            $query->where('PAS_DIAVOLTA', '<=', $request->get('date_to'));
        }

        $perPage = 10;

        $passagens = $query->paginate($perPage);

        return view('vender-passagem', [
            'passagens' => $passagens,
            'currentPage' => $passagens->currentPage(),
            'total' => $passagens->total(),
            'perPage' => $perPage,
            'empresaNome' => $empresaNome
        ])->with('success', 'Passagem adicionada com sucesso!');

        // return view('vender-passagem')->with('success', 'Passagem adicionada com sucesso!');
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

    public function destroy($id)
    {
        $passagem = Passagem::findOrFail($id);
        $passagem->delete();

        $user = Auth::user();
        $empresaNome = $user->US_NOME;
        $query = Passagem::query();
        $query->where('PAS_EMPRESA', $empresaNome);

        $perPage = 10;

        $passagens = $query->paginate($perPage);

        return view('vender-passagem', [
            'passagens' => $passagens,
            'currentPage' => $passagens->currentPage(),
            'total' => $passagens->total(),
            'perPage' => $perPage,
            'empresaNome' => $empresaNome,
        ])->with('success', 'Passagem apagada com sucesso!');
    }

    public function comprar(Request $request)
    {
    }

    public function adicionar(Request $request)
    {
    }

    public function salvarPassagem(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:PASSAGENS,id'
        ]);

        $passagem = Passagem::findOrFail($request->id);

        $userId = Auth::id();

        if ($passagem->PAS_SALVADA) {
            $salvadas = json_decode($passagem->PAS_SALVADA, true);

            if (!in_array($userId, $salvadas)) {
                $salvadas[] = $userId;
            }
        } else {
            $salvadas = [$userId];
        }

        $passagem->PAS_SALVADA = json_encode($salvadas);
        $passagem->save();

        return response()->json([
            'message' => 'Passagem salva com sucesso!',
            'passagem' => $passagem
        ]);
    }

    public function goToCart(Request $request) {
        $passagemId = $request->query('id');

        $passagem = Passagem::find($passagemId);

        return view('buy-ticket', [
            'passagem' => $passagem
        ])->with('success', 'Passagem adicionada com sucesso!');
    }
}
