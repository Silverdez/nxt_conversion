<footer class="footer ">
  <div class="w-full bg-footerBg pt-8 pb-4">
    <div class="container mx-auto flex flex-col lg:flex-row items-center lg:items-start h-full justify-between px-6">
      <div class="footer_site-logo mb-8 lg:mb-0">
        <a class="brand" href="{{ home_url('/') }}">
          @svg('images.logo_nxt_conversion_h', ['class' => 'logo'])
        </a>
      </div>



      @if (has_nav_menu('footer_navigation'))
        <nav class="nav-primary flex flex-col text-center lg:text-left noListImage" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav-footer mb-0', 'echo' => false]) !!}
        </nav>
      @endif
    </div>

  </div>
  <div class="copyright bg-footerBgCopyright ">
    <div class="container mx-auto flex flex-col py-4 text-center px-6">
      <p class="text-0.7 mb-0 text-gray-500">
        {{--        /* translators: 1: Theme name, 2: Theme author. */--}}
        @php(printf(esc_html__('Copyright © %1$s', 'nxtconversion-theme'), 'nxtconversion'))
        <span class="sep"> | <?php echo date("M Y"); ?></span>. All rights reserved | Created by <a target="_blank" class="text-footerLink underline" href="{!! esc_url('https://www.silverconcept.com/') !!}">Silverconcept.com</a>
      </p>
    </div>

  </div>
</footer>
