<header class="header">
  <div class="header_primary">
    <div class="header_site-logo">
      <a class="brand" href="{{ home_url('/') }}">
        @svg('images.logo_nxt_conversion', ['class' => 'logo'])
      </a>
    </div>


    @if (has_nav_menu('primary_navigation'))
      <nav class="header_main-nav nav-primary noListImage h-full header__menu menu hidden lg:flex" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-header mb-0', 'echo' => false]) !!}
      </nav>
    @endif


    <button class="header_menu-toggle bg-cardAccentBg h-12 w-12 rounded-md  flex flex-col justify-center items-start p-2">
      <span class="w-full rounded-full h-1 inline-block bg-secondary my-0.5"></span>
      <span class="w-2/3 rounded-full h-1 inline-block bg-secondary my-0.5"></span>
      <span class="w-full rounded-full h-1 inline-block bg-secondary my-0.5"></span>
    </button>

  </div>

</header>
