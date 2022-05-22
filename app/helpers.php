<?php

/**
 * Theme helpers.
 */

namespace App;


function pageBanner ($args = NULL){
    if (isset($args['title'])){
        if (get_field('page_banner_title') AND !is_archive() AND !is_home()){
            $args['title'] = get_field('page_banner_title');
        }else{
            $args['title'] = get_the_title();
        }
    }
    if (isset($args['subtitle'])){
        $args['subtitle'] = get_field('page_banner_subtitle');
    }
    if (isset($args['background'])){
        if (get_field('page_banner_background_image') AND !is_archive() AND !is_home()){
            $args['background'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        }else{
            $args['background'] = get_theme_file_uri('/src/img/bg.jpg');
        }
    }

    ?>
    <div>
        <section class="banner bg-gray-700 bg-no-repeat bg-center bg-cover"
                 style="background-image: url(<?php echo isset($args['background']); ?>);
                     background-repeat: no-repeat;
                     background-position: 50% 50%;
                     background-size: cover;">

            <div class="py-24 md:py-32 bg-gradient-to-t from-backgroundDark bg-backgroundDark bg-opacity-70 h-full flex flex-col">
                <div class="container mx-auto pt-16">
                    <div class="w-full md:w-4/6 px-6 md:px-0">
                        <h1><?php echo isset($args['title']); ?></h1>
                        <h2><?php echo isset($args['subtitle']);?></h2>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php }
