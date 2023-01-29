<?php
namespace App\Transformers\Movies;

use App\Contracts\MovieContract;
use App\Contracts\CategoryContract;
use App\Transformers\ApiTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class MovieTransformer extends ApiTransformer{

   public function transformModelToApiData($movie) : array
    {
        // return [$movie];
        return array_filter([
            MovieContract::ID => $movie->id,
            MovieContract::TITLE => $movie->title,
            MovieContract::DESCRIPTION => $movie->description,
            MovieContract::PRODUCER => $movie->producer,
            MovieContract::RELEASE_YEAR => $movie->release_year,
            MovieContract::BANNER => $movie->banner,
            MovieContract::THUMBNAIL => $movie->thumbnail,
            MovieContract::DURATION => $movie->duration,
            MovieContract::LANGUAGE => $movie->language,
            MovieContract::FILE => $movie->file,
            MovieContract::CATEGORY => [
                CategoryContract::ID =>$movie->movie_category->id,
                CategoryContract::NAME =>$movie->movie_category->name
            ],
            MovieContract::SUBTITLE => $movie->subtitle,
            MovieContract::UPLOADED_BY => $movie->uploaded_by,
            MovieContract::CREATED_AT => $movie->created_at,
            MovieContract::UPDATED_AT => $movie->updated_at,
        ]);
    }
}

