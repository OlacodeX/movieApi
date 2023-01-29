<?php

namespace App\Http\Requests\Movies;

use App\Contracts\MovieContract;
use App\Http\Requests\ApiRequests;

class CreateMovieRequest extends ApiRequests
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            MovieContract::TITLE => 'required|string|max:150',
            MovieContract::DESCRIPTION => 'required',
            MovieContract::PRODUCER =>'required|string|max:150',
            MovieContract::RELEASE_YEAR => 'required|string|max:4',
            MovieContract::BANNER => 'required',
            MovieContract::THUMBNAIL => 'nullable',
            MovieContract::DURATION => 'required',
            MovieContract::LANGUAGE => 'required|string|max:50',
            MovieContract::FILE => 'required',
            MovieContract::CATEGORY =>'required|integer|numeric',
            MovieContract::SUBTITLE => 'required',
            MovieContract::UPLOADED_BY => 'required|integer|numeric',
        ];
    }
}
