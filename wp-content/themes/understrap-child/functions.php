<?php

require_once __DIR__ . '/vendor/autoload.php';

\Vnet\Loader::getInstance()
    ->setTimeZone()

    ->setMessages([
        'required' => __("Заполните поле", 'vnet'),
    ])

    ->setup();

// регестрируем таксономии
\Vnet\Types\TaxEstateType::getInstance()->setup();

// регестрируем типы постов
\Vnet\Types\TypeEstate::getInstance()->setup(); 
\Vnet\Types\TypeCity::getInstance()->setup();     

