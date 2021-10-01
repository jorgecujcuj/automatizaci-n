<?php

namespace App\Http\Controllers;

use App\Models\Operacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class OperacioneController
 * @package App\Http\Controllers
 */
class OperacioneController extends Controller
{
    /**datos de la visata del index
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $operaciones=DB::table('operaciones')
        ->join('catalogovariables','catalogovariables.id', '=' ,'operaciones.idcatalogo')
        ->select('operaciones.id as id','catalogovariables.descripcion as descripcion1',
         'operaciones.created_at as fecha')
        ->where('operaciones.created_at','LIKE','%'.$texto.'%')
        ->orderBy('operaciones.created_at','desc')
        ->paginate(15);
        //return ($operacione);
        return view('operacione.index', compact('operaciones','texto'));
    }

    /**metodo para crear los datos
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operacione = new Operacione();
        return view('operacione.create', compact('operacione'));
    }

    /**metodos para preparar los datos para guardar
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Operacione::$rules);

        $operacione = Operacione::create($request->all());

        return redirect()->route('operaciones.index')
            ->with('success', 'Operacione created successfully.');
    }

    /**metodo para ver los datos
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operacione = Operacione::find($id);

        return view('operacione.show', compact('operacione'));
    }

    /**metodo para la dicion
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operacione = Operacione::find($id);

        return view('operacione.edit', compact('operacione'));
    }

    /**metodo para actualizar
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Operacione $operacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operacione $operacione)
    {
        request()->validate(Operacione::$rules);

        $operacione->update($request->all());

        return redirect()->route('operaciones.index')
            ->with('success', 'Operacione updated successfully');
    }

    /**metodo para eliminar
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $operacione = Operacione::find($id)->delete();

        return redirect()->route('operaciones.index')
            ->with('success', 'Operacione deleted successfully');
    }
}
