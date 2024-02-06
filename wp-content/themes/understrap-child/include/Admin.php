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
        add_action('save_post_city', [__CLASS__,  'save_city_metabox']);
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
        $id = $post->ID;

        $estatesMeta = get_post_meta($id, 'relation_estates', true);
        if ($estatesMeta) {
            $checked = unserialize($estatesMeta);
        } else {
            $checked = [];
        }

        $estates = PostEstate::getActive();
        Template::theTemplate('admin/estates-select', ['estates' => $estates, 'checked' => $checked]);
    }


    static function save_city_metabox()
    {
        $id = isset($_POST['ID']) ? $_POST['ID'] : false;
        if (isset($_POST['estates'])) {
            $data =  serialize($_POST['estates']);
            update_post_meta($id, 'relation_estates',  $data);
        } else {
            if (get_post_meta($id, 'relation_estates', true)) {
                update_post_meta($id, 'relation_estates',  '');
            }
        }
    }
}
