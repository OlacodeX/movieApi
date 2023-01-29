<?php

namespace App\Http\Controllers\Movies;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Contracts\MovieContract;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Transformers\Movies\MovieTransformer;
use App\Http\Requests\Movies\CreateMovieRequest;

class CreateMovieController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateMovieRequest $request, MovieTransformer $transformer) : JsonResponse
    {
        $validatedInput = $request->safe();
        $movie = new Movie;

        $movie->title  = $validatedInput[MovieContract::TITLE];
        $movie->description  = $validatedInput[MovieContract::DESCRIPTION];
        $movie->uploaded_by  = $validatedInput[MovieContract::UPLOADED_BY];
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

        return response()->json($transformer->transformModelToApiData($movie), Response::HTTP_CREATED);
    }
}
