<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::all(); 
        
        return view('dashboard', [
            'carros' => $carros
        ]);
    }

    public function create()
    {
        return view('carros.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'cor' => 'required|string|max:50',
            'ano_fabricacao' => 'required',
            'quilometragem_atual' => 'required',
            'valor_total' => 'required|numeric',
            'detalhes' => 'nullable|string|max:1000',
            'imagem_1_url' => 'nullable|url|max:255',
            'imagem_2_url' => 'nullable|url|max:255',
            'imagem_3_url' => 'nullable|url|max:255', 
        ]);

        Carro::create($validatedData);

        return redirect('/dashboard')->with('status', 'Carro cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $carro = Carro::find($id);
        
        return view('carros.edit', [
            'carro' => $carro,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'cor' => 'required|string|max:50',
            'ano_fabricacao' => 'required',
            'quilometragem_atual' => 'required',
            'valor_total' => 'required|numeric',
            'detalhes' => 'nullable|string|max:1000',
            'imagem_1_url' => 'nullable|url|max:255',
            'imagem_2_url' => 'nullable|url|max:255',
            'imagem_3_url' => 'nullable|url|max:255', 
        ]);
        
        $carro = Carro::find($id);
        $carro->update($validatedData);

        return redirect('/dashboard')->with('status', 'Carro alterado com sucesso!');
    }

    public function destroy($id)
    {
        $carro = Carro::find($id);
        $carro->delete();
        
        return redirect('/dashboard')->with('status', 'Carro excluído com sucesso!');
    }

    public function publicIndex()
    {
        $carros = Carro::all(); 
        return view('catalogo.index', [
            'carros' => $carros,
        ]);
    }

    public function publicShow($id)
    {
        $carro = Carro::find($id);
        
        return view('catalogo.show', [
            'carro' => $carro,
        ]);
    }
}