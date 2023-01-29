<?php
namespace App\Transformers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection as SupportCollection;

abstract class ApiTransformer{

    public function transformCollectionsToApiData(Collection $collection): array {
        $transformed = $collection->map([$this, 'transformModelToApiData']);

        return $transformed->all();
    }

    abstract public function transformModelToApiData(Model $model): array;

    // abstract public function transformApiDataToCollection(array $apiData): SupportCollection;
}
