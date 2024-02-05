<?php

require_once __DIR__ . '/vendor/autoload.php';

\Vnet\Loader::getInstance()
    ->setTimeZone()

    ->setMessages([
        'required' => __("Заполните поле", 'vnet'),
    ])

    ->setup();

\Vnet\Types\TypeEstate::getInstance()->setup(); 
\Vnet\Types\TypeCity::getInstance()->setup();     
