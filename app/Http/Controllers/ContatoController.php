<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Puxar a classe/model para chamar no bd
use App\Models\Contato;

class ContatoController extends Controller
{
    //Construção da classe bem simples
    private $objCont;
    public function __construct() {
        $this->objCont = new Contato();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd($this->objCont->all());
        $contatos = $this->objCont->all();
        return view('index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cr = $this->objCont->create([
            'nm_contato'=>$request->nome,
            'nm_email'=>$request->email,
            'nm_telefone'=>$request->fone,
            'nm_obs'=>$request->obs
        ]);

        if($cr){
            return redirect('contatos');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contato=$this->objCont->find($id);
        return view('update', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->objCont->where(['id'=>$id])->update([
            'nm_contato'=>$request->nome,
            'nm_email'=>$request->email,
            'nm_telefone'=>$request->fone,
            'nm_obs'=>$request->obs
        ]);
        return redirect('contatos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contato=$this->objCont->destroy($id);
        return redirect('contatos');     
        }
}
