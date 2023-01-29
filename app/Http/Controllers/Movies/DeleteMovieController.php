<?php

namespace App\Http\Controllers\Movies;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Contracts\MovieContract;
use App\Http\Controllers\Controller;

class DeleteMovieController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->input(MovieContract::ID)) {
            try {
                
                $movie = Movie::findorFail($request->input(MovieContract::ID));

            } catch (ModelNotFoundException $exception) {
                return response()->json("Not found", Response::HTTP_NOT_FOUND);
            }
            $movie->delete();
    
            return response()->json("Movie deleted successfully!", Response::HTTP_OK);   
        }
        return response()->json("Please specify a movie to delete", Response::HTTP_OK);
    }
}
