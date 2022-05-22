<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;800&family=Shadows+Into+Light&family=Smooch&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class('no-js fonts-loading'); ?>>
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app" data-barba="wrapper" data-scroll>
      <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>

    <script>
      // inline loadJS
      function loadJS(e, t) {
        "use strict";
        let n = window.document.getElementsByTagName("script")[0],
          o = window.document.createElement("script");
        return o.src = e, o.async = !0, n.parentNode.insertBefore(o, n), t && "function" == typeof t && (o.onload = t), o
      }
      // then load your JS
      if (sessionStorage.getItem('fonts-loaded')) {
        // fonts cached, add class to document
        document.documentElement.classList.remove('fonts-loading');
      } else {
        // load script with font observing logic
        //loadJS("<?php //get_theme_file_uri('/dist/scripts/font-css-async.js') ?>//");
      }
    </script>
  </body>
</html>
