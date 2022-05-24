<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

add_action( 'init', function() {
    register_extended_post_type( 'service', [

        'show_in_feed' => true,
        'show_in_rest' => false,
        "supports" => [ "title", "editor", "thumbnail", "excerpt", "post-formats" ],
        'menu_icon'    => 'dashicons-edit',
        'archive' => [
            'nopaging' => true,
        ],
        'rewrite'  => [
            'slug' => 'service',
        ],

    ], [

        'singular' => 'Service',
        'plural'   => 'Services',
        'slug'     => 'services',
    ]);

} );
