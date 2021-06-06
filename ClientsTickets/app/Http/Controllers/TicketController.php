<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tickets'] = Ticket::paginate(5);
        return view('ticket.indexTicket', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.createTicket');
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
            'tipo'=>'required|string|max:100',
            'precio'=>'required|string|max:100',
            'fecha'=>'required|date',
            'cif'=>'required|string',
            'clientes_id'=>'required|string',
        ];
        $mensaje = [
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosTicket = request()->except('_token');
        Ticket::insert($datosTicket);
        return redirect('ticket')->with('mensaje','Ticket Agragado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('ticket.editTicket', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'tipo'=>'required|string|max:100',
            'precio'=>'required|string|max:100',
            'fecha'=>'required|date',
            'cif'=>'required|string',
            'clientes_id'=>'required|string',
        ];
        $mensaje = [
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosTicket = request()->except(['_token','_method']);
        Ticket::where('idTicket',"=",$id)->update($datosTicket);

        $ticket = Ticket::findOrFail($id);
        return redirect('ticket')->with('mensaje','Ticket Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::destroy($id);
        return redirect('ticket')->with('mensaje','Ticket Borrado');
    }
}
