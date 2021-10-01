<?php

namespace App\Http\Controllers;

use App\Models\Img;
use App\Models\Tablero;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DB;
use Illuminate\Database\MySqlConnection;
use Illuminate\Support\Collection;

/**
 * Class ImgController
 * @package App\Http\Controllers
 */
class ImgController extends Controller
{
    /**metodo de la vista del index
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $imgs=DB::table('imgs')
        ->join('tableros','tableros.id', '=' ,'imgs.idtablero')
        ->select('imgs.id as id','imgs.idtablero as idtablero','imgs.img as img','tableros.estado as estado')
        ->where('estado','=',1)->paginate(10);
        return view('img.index', compact('imgs'));
    }

    /**metodo que crea un nuevo dato
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $img = new Img();
        $tableros = Tablero::orderBy('id')->get();
        return view('img.create', compact('img','tableros'));
    }

    /**metodod que prepara un datos para ser guardado
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Img::$rules);

        /*$img = Img::create($request->all());
        */
         $Img = $request->all();

         if($img = $request->file('img')){
             $rutaGuardarImg = 'imagen/';
             $imgRuta = date('YmdHis'). "." . $img->getClientOriginalExtension();
             $img->move($rutaGuardarImg,$imgRuta);
             $Img['img'] = "$imgRuta";
         }
         Img::create($Img);

        return redirect()->route('imgs.index')
            ->with('success', 'Img created successfully.');
    }

    /**metodo para ver los datos
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $img = Img::find($id);

        return view('img.show', compact('img'));
    }

    /**metodo para editar los datos
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $img = Img::find($id);
        $tableros = Tablero::orderBy('id')->get();
        return view('img.edit', compact('img','tableros'));
    }

    /**metodo para actualizar un dato
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Img $img
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Img $i)
    {
        request()->validate(Img::$rules);

        $Imge = $request->all();

         if($img = $request->file('img')){
             $rutaGuardarImg = 'imagen/';
             $imgRuta = date('YmdHis'). "." . $img->getClientOriginalExtension();
             $img->move($rutaGuardarImg,$imgRuta);
             $Imge['img'] = "$imgRuta";
         }else{
             unset($Imge['img']);
         }
         $i->update($Imge);

        return redirect()->route('imgs.index')
            ->with('success', 'Img updated successfully');
    }

    /**metodo para eliminar un dato
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $img = Img::find($id)->delete();

        return redirect()->route('imgs.index')
            ->with('success', 'Img deleted successfully');
    }
}
