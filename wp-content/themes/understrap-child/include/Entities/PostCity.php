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
     * - Получает недвижимости
     */
    function getEstates()
    {
        $estates = [];

        $checked = get_post_meta($this->getId(), 'relation_estates', true);

        if (!$checked) {
            return $estates;
        }

        $checked = unserialize($checked);
        foreach ($checked as $item) {

            if(count($estates) == 10){
                break;
            }

            $estate = PostEstate::getById($item);
            if (!$estate) {
                continue;
            }

            $estates[] = $estate;
        }
       
        return  $estates;
    }


    /**
     * - Получает активные города
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
