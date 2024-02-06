<?php

require_once __DIR__ . '/vendor/autoload.php';

\Vnet\Loader::getInstance()
    ->setTimeZone()


    ->setMessages([
        'serverError' => __("Произошла серверная ошибка."),
    ])


    ->setJquerySrc('assets/jquery3/jquery3.min.js')

    ->addAdminStyle('admin-index', THEME_URI . 'assets/css/admin.index.css')
    ->addAdminScript('admin-index', THEME_URI . 'assets/js/admin.index.js')

    ->addFrontScript('theme-index', THEME_URI . 'assets/js/index.js')

    ->setup();

// регестрируем таксономии
\Vnet\Types\TaxEstateType::getInstance()->setup();

// регестрируем типы постов
\Vnet\Types\TypeEstate::getInstance()->setup();
\Vnet\Types\TypeCity::getInstance()->setup();


\Vnet\Admin::getInstance()->setup();