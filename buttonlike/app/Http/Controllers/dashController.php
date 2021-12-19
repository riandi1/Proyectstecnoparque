<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller as BaseController;


class dashController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $posts = Post::with('comments','likes')->get();
        return view('dashboard',compact('posts'));
    }

    public function presslike(Request $request)
    {
        $post = Post::find($request->post_id);
        if ($post->likes->contains('user_id',auth()->id())) {
            $post->likes()->where('user_id',auth()->id())->delete();
            
        }
        else {
            $post->likes()->create(['user_id'=>auth()->id()]);
        }
        return response()->json(['likes'=>$post->likes()->count()]);
    }
}
