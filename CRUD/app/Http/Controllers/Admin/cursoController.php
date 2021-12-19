<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\curso;
use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class cursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.cursos.index')->only('index');
        $this->middleware('can:admin.cursos.create')->only('create','store');
        $this->middleware('can:admin.cursos.edit')->only('edit','update');
        $this->middleware('can:admin.cursos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::pluck('name','id');
        
        return view('admin.cursos.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        $curso = curso::create($request->all());
        $url = Storage::put('cursos',$request->file('file'));
        $curso->image()->create([
            'url' => $url
        ]);
        
        return redirect()->route('admin.cursos.edit',$curso)->with('info','El curso se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(curso $curso)
    {
        return view('admin.cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(curso $curso)
    {

        $this->authorize('author',$curso);

        $categories = category::pluck('name','id');
        return view('admin.cursos.edit', compact('curso','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request,curso $curso)
    {
        $this->authorize('author',$curso);

        $curso->update($request->all());

        if($request->file('file')){
            $url= Storage::put('cursos',$request->file('file'));

            if($curso->image){
                Storage::delete($curso->image->url);

                $curso->image->update([
                    'url' => $url
                ]);
            }else{
                $curso->image()->create([
                'url' => $url
                ]);
            }
        }
        Cache::flush();
        return redirect()->route('admin.cursos.edit',$curso)->with('info','El curso se actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(curso $curso)
    {  
        $this->authorize('author',$curso);
        $curso->delete();
        Cache::flush();
        return redirect()->route('admin.cursos.index',$curso)->with('info','El curso se elimino con exito');
    }
}
