<?php

namespace App\Http\Controllers;

use App\Models\Tablero;
use Illuminate\Http\Request;

/**
 * Class TableroController
 * @package App\Http\Controllers
 */
class TableroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableros = Tablero::paginate(10);

        return view('tablero.index', compact('tableros'))
            ->with('i', (request()->input('page', 1) - 1) * $tableros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tablero = new Tablero();
        return view('tablero.create', compact('tablero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tablero::$rules);

        $tablero = Tablero::create($request->all());

        return redirect()->route('tableros.index')
            ->with('success', 'Tablero creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tablero = Tablero::find($id);

        return view('tablero.show', compact('tablero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tablero = Tablero::find($id);

        return view('tablero.edit', compact('tablero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tablero $tablero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tablero $tablero)
    {
        request()->validate(Tablero::$rules);

        $tablero->update($request->all());

        return redirect()->route('tableros.index')
            ->with('success', 'Accion realizada');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tablero = Tablero::find($id)->delete();

        return redirect()->route('tableros.index')
            ->with('success', 'Dato eliminado con éxito');
    }
}
