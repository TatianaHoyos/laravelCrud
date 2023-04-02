<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use \PDF;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ColaboradorController extends Controller
{

    public function index()
    {
        $datos['colaboradores'] = Colaborador::all();
        return view('colaborador.index', $datos);


    }


    public function create()
    {
        return view('colaborador.create');
    }



    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'Nombres' => 'required|string|max:100',
                'Apellidos' => 'required|string|max:100',
                'Correo' => 'required|email',
                'Foto' => 'required|max:10000|mimes:jpeg,png,jpg',
            ],
            [
                'required'=>'El :attribute es requerido',
                'Foto.require'=>'La foto es requerida'
            ]
        );
        $datosColaborador = request()->except('_token');
        if ($request->hasFile('Foto')) {
            $datosColaborador['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Colaborador::insert($datosColaborador);

        //return response()->json($datosColaborador);
        return redirect('colaborador')->with('mensaje', 'Colaborador agregado con éxito');
    }


    public function show(Colaborador $colaborador)
    {

    }


    public function edit($id)
    {
        $colaborador = Colaborador::findOrFail($id);
        return view('colaborador.edit', compact('colaborador'));
    }


    public function update(Request $request, $id)
    {
        
        $this->validate(
            $request,
            [
                'Nombres' => 'required|string|max:100',
                'Apellidos' => 'required|string|max:100',
                'Correo' => 'required|email',
                'Foto' => 'required|max:10000|mimes:jpeg,png,jpg',
            ],
            [
                'required'=>'El :attribute es requerido',
                'Foto.require'=>'La foto es requerida'
            ]
        );

        $datosColaborador = request()->except(['_token', '_method']);

        if ($request->hasFile('Foto')) {
            $colaborador = Colaborador::findOrFail($id);
            Storage::delete('public/' . $colaborador->Foto);
            $datosColaborador['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }


        Colaborador::where('id', '=', $id)->update($datosColaborador);

        $colaborador = Colaborador::findOrFail($id);
        //return view('colaborador.edit', compact('colaborador'));
        return redirect('colaborador')->with('mensaje', 'Colaborador Actualizado con exito.');

    }


    public function destroy($id)
    {
        $colaborador = Colaborador::findOrFail($id);
        if (Storage::delete('public/' . $colaborador->Foto)) {

            Colaborador::destroy($id);
        }

        return redirect()->back()->with('mensaje', 'Colaborador eliminado con exito.');
    }

    public function generar_pdf(){
        $datos['colaboradores'] = Colaborador::all();
        $pdf= PDF::loadView('colaborador.pdf',$datos);
        //return $pdf->download('reporte.pdf');
        return $pdf->stream();
    }
}