<?php

use Vnet\Theme\Template;

get_header();

Template::theSection('home/section-estate');
Template::theSection('home/section-city');
Template::theSection('home/section-form');

get_footer();
