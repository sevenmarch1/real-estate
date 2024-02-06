<?php

namespace Vnet;

use Vnet\Entities\PostEstate;
use Vnet\Helpers\Acf;
use Vnet\Helpers\ArrayHelper;
use Vnet\Helpers\Path;
use Vnet\Theme\Template;
use Vnet\Traits\Instance;

class Admin
{
    use Instance;

    function setup(): self
    {
        add_action('add_meta_boxes', [__CLASS__, 'add_city_metabox']);

        return $this;
    }

    static function add_city_metabox()
    {
        add_meta_box(
            'estate_metabox',
            'Недвижимость',
            [__CLASS__, 'display_city_metabox'],
            'city',
        );
    }

    static function display_city_metabox($post)
    {
        $estates = PostEstate::getActive();
        Template::theTemplate('admin/estates-select', ['estates' => $estates]);
    }
}
