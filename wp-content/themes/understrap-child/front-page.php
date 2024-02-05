<?php

use Vnet\Theme\Template;
use Vnet\Helpers\Constant;

get_header();

Template::theSection('home/section-estate');
Template::theSection('home/section-city');

get_footer();
