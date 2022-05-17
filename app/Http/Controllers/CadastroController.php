<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formulario');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->only([
            'name',
            'email',
        ]);
        $datanasc = $request->get('dt_nascimento');
        $data['dt_nascimento'] = Carbon::parse($datanasc)->format('Y-m-d');
        
        try {

            $Cadastro = Cadastro::create($data);
            return redirect()->route('cadastro.retorno', ['id' => $Cadastro->id]);
        } catch (Exception $e) {
            return  redirect()->route('cadastro.index')->with('error','Não foi possível cadastrar tente novamente');
        }
    }


    public function retorno($id)
    {
        $Cadastro = Cadastro::find($id);
        $date = Carbon::createFromFormat('Y-m-d', $Cadastro->dt_nascimento);
        $anos = $date->diffInYears(Carbon::now());
        $Cadastro['anos'] = $anos;
        return view('retorno',compact('Cadastro'));
    }
}
