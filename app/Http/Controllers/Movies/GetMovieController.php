<?php

namespace App\Http\Controllers\Movies;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Contracts\MovieContract;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Transformers\Movies\MovieTransformer;

class GetMovieController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, MovieTransformer $transformer): JsonResponse
    {
        
        if ($request->input(MovieContract::ID)) {
            try {
                
                $movie = Movie::findorFail($request->input(MovieContract::ID));

            } catch (ModelNotFoundException $exception) {
                return response()->json("Not found", Response::HTTP_NOT_FOUND);
            }
            return response()->json($transformer->transformModelToApiData($movie), Response::HTTP_OK);   
        }
        if ($request->input(MovieContract::TITLE)) {

            $movies = Movie::where('title','like',$request->input(MovieContract::ID).'%')->orderBy('title', 'ASC')->get();
            if (count($movies) > 0) {
                return response()->json($transformer->transformCollectionsToApiData($movies), Response::HTTP_OK);
            }
            return response()->json("No results found for your search", Response::HTTP_NOT_FOUND);
        }
        $movies = Movie::get();
        return response()->json($transformer->transformCollectionsToApiData($movies), Response::HTTP_OK);
    }
}
