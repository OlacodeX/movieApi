<?php

namespace App\Http\Controllers\Movies;

use App\Models\Movie;
use Illuminate\Http\Response;
use App\Contracts\MovieContract;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Transformers\Movies\MovieTransformer;
use App\Http\Requests\Movies\EditMovieRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EditMovieController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\Movies\EditMovieRequest  $request
     * @param  \App\Transformers\Movies\MovieTransformer $transformer
     * @return \Illuminate\Http\Response
     */
    public function __invoke(EditMovieRequest $request, MovieTransformer $transformer) : JsonResponse
    {
        $validatedInput = $request->safe();
        if ($request->input(MovieContract::ID)) {
            try {
                
                $movie = Movie::findorFail($request->input(MovieContract::ID));

            } catch (ModelNotFoundException $exception) {
                return response()->json("Not found", Response::HTTP_NOT_FOUND);
            }
            $movie->title  = $validatedInput[MovieContract::TITLE];
            $movie->description  = $validatedInput[MovieContract::DESCRIPTION];
            $movie->subtitle  = $validatedInput[MovieContract::SUBTITLE];
            $movie->duration  = $validatedInput[MovieContract::DURATION];
            $movie->banner  = $validatedInput[MovieContract::BANNER];
            $movie->file  = $validatedInput[MovieContract::FILE];
            $movie->category  = $validatedInput[MovieContract::CATEGORY];
            $movie->producer  = $validatedInput[MovieContract::PRODUCER];
            $movie->release_year  = $validatedInput[MovieContract::RELEASE_YEAR];
            if ($request->input(MovieContract::THUMBNAIL)) {
                $movie->thumbnail  = $validatedInput[MovieContract::THUMBNAIL];
            }
            
            $movie->language  = $validatedInput[MovieContract::LANGUAGE];
            $movie->save();
    
            return response()->json($transformer->transformModelToApiData($movie), Response::HTTP_OK);   
        }
        return response()->json("Please specify a movie to edit", Response::HTTP_NOT_FOUND);
    }
}
