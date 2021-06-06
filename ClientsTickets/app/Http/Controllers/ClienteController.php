<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use League\CommonMark\Inline\Element\Strong;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['clientes'] = Cliente::paginate(5);
        return view('cliente.indexCliente', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.createCliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'apellido'=>'required|string|max:100',
            'numero_telefono'=>'required|string|max:9|min:9',
            'email'=>'required|email',
            'dni'=>'required|string|max:9|min:9',
            'direccion'=>'required|string|max:100',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje = [
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosCliente = request()->except('_token');

        if($request->hasFile('foto')) {
            $datosCliente['foto'] = $request->file('foto')->store('uploads','public');
        }

        Cliente::insert($datosCliente);
        return redirect('cliente')->with('mensaje','Cliente Agragado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.editCliente', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'apellido'=>'required|string|max:100',
            'numero_telefono'=>'required|string|max:9|min:9',
            'email'=>'required|email',
            'dni'=>'required|string|max:9|min:9',
            'direccion'=>'required|string|max:100',
        ];
        $mensaje = [
            'required'=>'El :attribute es requerido',
        ];

        if($request->hasFile('foto')) {
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje=['foto.required'=>'La foto es requerida'];
        }

        $this->validate($request, $campos, $mensaje);

        $datosCliente = request()->except(['_token','_method']);

        if($request->hasFile('foto')) {
            $cliente = Cliente::findOrFail($id);
            Storage::delete('public/'.$cliente->foto);
            $datosCliente['foto'] = $request->file('foto')->store('uploads','public');
        }

        Cliente::where('idCliente',"=",$id)->update($datosCliente);

        $cliente = Cliente::findOrFail($id);
        return redirect('cliente')->with('mensaje','Cliente Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        if(Storage::delete('public/'.$cliente->foto)){
            Cliente::destroy($id);
        }

        return redirect('cliente')->with('mensaje','Cliente Borrado');
    }
}
