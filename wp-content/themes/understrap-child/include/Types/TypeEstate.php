<?php

namespace Vnet\Types;

use Vnet\Constants\PostTypes;
use Vnet\Constants\Taxonomies;

class TypeEstate extends PostType
{

    protected $slug = PostTypes::ESTATE;


    function setup()
    {
        $this->menuAwesomeIco('f1ad');
        $this->menuColorOrange();

        $this->register([
            'label' => 'Недвижимость',
            'has_archive' => false,
            'exclude_from_search' => false,
            'supports' => ['title', 'thumbnail'],
            'taxonomies' => [Taxonomies::ESTATE_TYPE]
        ]);
    }
}
