<?php

namespace Vnet\Types;

use Vnet\Constants\PostTypes;

class TypeCity extends PostType
{

    protected $slug = PostTypes::CITY;


    function setup()
    {
        $this->menuAwesomeIco('f64f');

        $this->register([
            'label' => 'Города',
            'has_archive' => false,
            'exclude_from_search' => false,
            'supports' => ['title', 'thumbnail', 'editor']
        ]);
    }
}
