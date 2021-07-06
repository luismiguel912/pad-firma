<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignaturePadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('signaturePad');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // Funcion que guarda la firma en formato imagen
    public function upload( Request $request){
        // Carpeta donde guardar las firmas
        $folderPath = public_path('upload/');
        // Separamos la cadena del que llega del request (;base64)
        $image_parts = explode(";base64,", $request->signed);
        // Separamos la cadena como se tiene en un arreglo (;image/)
        $image_type_aux = explode("image/", $image_parts[0]);
        // Se recupero el formato (.png)
        $image_type = $image_type_aux[1];
        // SE convierte los datos binarios en una representación utilizando únicamente caracteres del código ASCII
        $image_base64 = base64_decode($image_parts[1]);
        // Se genera un ID único basado en el microtime para diferenciar por el nombre y se concatena con el formato
        $file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
        return back()->with('success', 'SE GUARDO CORRECTAMENTE LA FIRMA.');
    }
}
