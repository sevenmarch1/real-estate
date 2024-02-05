<?php

namespace Vnet\Entities;

use Vnet\Cache;
use Vnet\Helpers\Date;
use WP_Query;
use WPSEO_Primary_Term;

class Post
{

    protected static $postType = '';

    /**
     * @var static[]
     */
    private static $instances = [];

    /**
     * @var \WP_Post
     */
    protected $post = null;


    protected function __construct(\WP_Post $post)
    {
        $this->post = $post;
    }



    /**
     * @return static[] 
     */
    static function getPublished(?array $queryArgs = null): array
    {

        $args = [
            'post_type' => static::$postType,
            'posts_per_page' => isset($queryArgs['posts_per_page']) ? $queryArgs['posts_per_page'] : -1,
            'post_status' => 'publish',
        ];

        if ($queryArgs) {
            $args = array_merge($args, $queryArgs);
        }

        return Cache::fetch(serialize($args), function () use ($args) {
            $query = new WP_Query($args);

            $res = [];

            foreach ($query->posts as $post) {
                $res[] = new static($post);
            }

            return $res;
        });
    }


    /**
     * @param int $id 
     * @return static|null
     */
    static function getById(int $id): ?self
    {
        if (isset(self::$instances[$id])) {
            return self::$instances[$id];
        }

        $post = get_post($id);

        if (!$post || is_wp_error($post)) {
            self::$instances[$id] = null;
        } else {
            self::$instances[$id] = new static($post);
        }

        return self::$instances[$id];
    }


    /**
     * - Получает текущий пост
     * @return null|static
     */
    static function getCurrent(): ?self
    {
        global $post;

        if (!$post) {
            return null;
        }

        if (!isset(self::$instances[$post->ID])) {
            self::$instances[$post->ID] = new static($post);
        }

        return self::$instances[$post->ID];
    }


    function getPost(): \WP_Post
    {
        return $this->post;
    }


    function getTitle(): string
    {
        return $this->post->post_title;
    }


    function getId(): int
    {
        return $this->post->ID;
    }


    function getMeta(string $key, $single = false)
    {
        return get_post_meta($this->getId(), $key, $single);
    }


    function getField($selector)
    {
        return get_field($selector, $this->getId(), true);
    }


    function getPermalink(): string
    {
        return get_permalink($this->getId());
    }


    function getThumbnailUrl($size = 'thumbnail', $icon = false): string
    {
        if ($img = get_post_thumbnail_id($this->getPost())) {
            $src = wp_get_attachment_image_url($img, $size, $icon);
            return $src ? $src : '';
        }
        return '';
    }


    function getPostDate(?string $format = null): string
    {
        $date = $this->post->post_date;

        if (!$format) {
            return $date;
        }

        return Date::format($format, $date);
    }


    function getExcerpt(): string
    {
        return get_the_excerpt($this->getPost());
    }


    function getContent(): string
    {
        return $this->post->post_content;
    }


    protected function fetchCache(string $key, callable $fetchFuntion)
    {
        return Cache::fetch($this->getCacheKey($key), $fetchFuntion);
    }


    protected function setCache(string $key, $value)
    {
        Cache::set($this->getCacheKey($key), $value);
    }


    protected function getCache(string $key, $def = null)
    {
        return Cache::get($this->getCacheKey($key), $def);
    }


    private function getCacheKey(string $key): string
    {
        return 'posts:' . $this->getId() . ':' . $key;
    }


    static function urlArchive(): string
    {
        $url = get_post_type_archive_link(self::$postType);
        return $url ? $url : '';
    }

}
