<?php
namespace App\Contracts;

class MovieContract implements ContractInterface{

    public const ID = 'id';
    public const TITLE = 'title';
    public const PRODUCER = 'producer';
    public const RELEASE_YEAR = 'release_year';
    public const DURATION = 'duration';
    public const LANGUAGE = 'language';
    public const SUBTITLE = 'subtitle';
    public const FILE = 'file';
    public const BANNER = 'banner';
    public const THUMBNAIL = 'thumbnail';
    public const DESCRIPTION = 'description';
    public const CATEGORY = 'category';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETED_AT = 'deleted_at';
}
