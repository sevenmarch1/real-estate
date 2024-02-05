<?php

namespace Vnet\Types;

use Vnet\Constants\PostTypes;
use Vnet\Constants\Taxonomies;

class TaxEstateType extends Taxonomy
{

    protected $slug = Taxonomies::ESTATE_TYPE;


    function setup()
    {
        $this->register([
            'label' => 'Тип недвижимости',
            'publicly_queryable' => false
        ], [PostTypes::ESTATE]);
    }
}
