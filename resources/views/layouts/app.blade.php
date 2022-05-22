@include('partials.header')

<main data-scroll-content id="main" class="main relative">
  <div class="content" data-barba="container">
    @yield('content')
  </div>
</main>

@include('partials.footer')
