<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class OnceReview
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $movie_id = $request->route()->parameter('movie_id');
        //dd($movie_id);
        $reviews = Review::select('id')->where('user_id', auth()->user()->id)->Where('movie_id', $movie_id)->get();
        //dd($reviews[0]->id);
        $reviews_exist = Review::select('id')->where('user_id', auth()->user()->id)->Where('movie_id', $movie_id)->exists();
        //dd($reviews_exist);

        //settype($movie_id, "string");
        //$type_movie_id = gettype($movie_id);
        //dd($type_movie_id);

        if($reviews_exist == true) {
            //$type_movie_id = gettype($movie_id);
            //dd($type_movie_id);
            return redirect()->route('review.edit', ['movie_id' => $movie_id, 'review' => $reviews[0]->id]);
        }else{
            return $next($request);
        };
    }
}
