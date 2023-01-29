<?php
namespace App\Transformers\Movies;

use App\Transformers\ApiTransformer;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\CategoryContract;
use Illuminate\Database\Eloquent\Collection;

class CategoryTransformer extends ApiTransformer{

   public function transformModelToApiData($category) : array
    {
        return array_filter([
            CategoryContract::ID => $category->id,
            CategoryContract::NAME => $category->name,
        ]);
    }
}

