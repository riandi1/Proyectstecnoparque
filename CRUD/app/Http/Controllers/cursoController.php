<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\curso;

use Illuminate\Support\Facades\Cache;

class cursoController extends Controller
{
    public function index()
    {
        if (request()->page) {
            $key = 'cursos'.request()->page;
        }
        else{
            $key = 'cursos';
        }
        if (Cache::has($key)) {
            $cursos = Cache::get($key);
        } else {
            $cursos = curso::where('status',2)->latest('id')->paginate(8);
            Cache::put($key, $cursos);
        }

        return view('cursos.index',compact('cursos'));
    }
    public function show(curso $curso)
    {
        $this->authorize('published', $curso);
        $similares = curso::where('category_id',$curso->category_id)->where('status',2)->where('id','!=',$curso->id)->latest('id')->take(4)->get();
        return view('cursos.show',compact('curso','similares'));
    }
    public function category(category $category)
    {
        $cursos = curso::where('category_id',$category->id)->where('status',2)->latest('id')->paginate(6);
        return view('cursos.category', compact('cursos','category'));
    }
}
