<?php

namespace Vnet\Entities;

use Vnet\Cache;
use Vnet\Constants\Cache as ConstantsCache;
use Vnet\Constants\PostTypes;


class PostCity extends Post
{

    protected static $postType = PostTypes::CITY;


    function getImage($size = 'post-thumbnail'): string
    {
        if ($img = $this->getThumbnailUrl($size)) {
            return $img;
        }
        return get_the_post_thumbnail_url($this->getId(), $size);
    }


    /**
     * - Получает активные недвижемости
     * @return self[]
     */
    static function getActive(int $perPage = -1): array
    {
        return Cache::fetch(ConstantsCache::CITYS_ACTIVE . $perPage, function () use ($perPage) {
            $args = [
                'posts_per_page' => $perPage,
            ];

            return parent::getPublished($args);
        });
    }
}
