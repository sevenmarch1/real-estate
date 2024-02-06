<?php

namespace Vnet\Entities;

use Vnet\Cache;
use Vnet\Constants\Cache as ConstantsCache;
use Vnet\Constants\PostTypes;
use Vnet\Constants\Taxonomies;

class PostEstate extends Post
{

    protected static $postType = PostTypes::ESTATE;


    function getImage($size = 'post-thumbnail'): string
    {
        if ($img = $this->getThumbnailUrl($size)) {
            return $img;
        }
        return get_the_post_thumbnail_url($this->getId(), $size);
    }


    /**
     * - Получает площадь
     */
    function getSquare(): string
    {
        return $this->getField('square');
    }


    /**
     * - Получает цену
     */
    function getPrice(): string
    {
        return $this->getField('price');
    }


    /**
     * - Получает адрес
     */
    function getAddress(): string
    {
        return $this->getField('address');
    }


    /**
     * - Получает живую площадь
     */
    function getHouseroom(): string
    {
        return $this->getField('houseroom');
    }


    /**
     * - Получает этаж
     */
    function getFloor(): string
    {
        return $this->getField('floor');
    }



    /**
     * - Получает типы
     */
    function getTypes()
    {
        $types = get_the_terms($this->getId(), Taxonomies::ESTATE_TYPE);

        return $types;
    }



    /**
     * - Получает характеристики
     */
    function getCharacteristics(): array
    {
        $characteristics = [];

        if ($square = $this->getSquare()) {
            $characteristics[__('Площадь')] = $square;
        }

        if ($price = $this->getPrice()) {
            $characteristics[__('Цена')] = $price;
        }

        if ($address = $this->getAddress()) {
            $characteristics[__('Адрес')] = $address;
        }

        if ($houseroom = $this->getSquare()) {
            $characteristics[__('Живая площадь')] = $houseroom;
        }

        if ($floor = $this->getFloor()) {
            $characteristics[__('Этаж')] = $floor;
        }

        return $characteristics;
    }



    /**
     * - Получает активные недвижемости
     * @return self[]
     */
    static function getActive(int $perPage = -1): array
    {
        return Cache::fetch(ConstantsCache::ESTATES_ACTIVE . $perPage, function () use ($perPage) {
            $args = [
                'posts_per_page' => $perPage,
            ];

            return parent::getPublished($args);
        });
    }


    /**
     * - Создает запись
     */
    static function create($title, $data)
    {
        $newPost = [
            'post_title' => $title,
            'post_type' => self::$postType,
            'post_status' => 'draft',
        ];

        $postId = wp_insert_post($newPost);

        foreach ($data as $key => $item) {
            update_field($key, $item, $postId);
        }

        return $postId;
    }
}
