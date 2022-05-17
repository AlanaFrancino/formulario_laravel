<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Exception;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function index()
    {
        return view('formulario');
    }

    public function store($request)
    {
        $data = $request->only([
            'descricao',
        ]);
        $data['ativo'] = true;
        
        try {

            Cadastro::create($data);
            
            return redirect()->route('generos.index')->with('success','Genero Criado Com Sucesso');
        } catch (Exception $e) {
            return view('generos.generos', compact('generos', 'parameter'));
        }
    }
}
