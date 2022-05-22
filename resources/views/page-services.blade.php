@extends('layouts.app')

@php
  $paged            = get_query_var('paged') ? get_query_var('paged') : 1;

  $argsServices=[
      'post_type' => 'service',
      'posts_per_page' => -1,
      'paged' => $paged,
      'order' => "DESC",
      'post_status' => 'publish',
  ];

  $services         = new WP_Query($argsServices);
  $pageValue        = 'services'
@endphp

@section('content')
  @include('partials.page-header')

  <section class="section__content py-12">
    <div class="container mx-auto px-6">
      <ul class="services_listing noListImage grid grid-cols-2 lg:grid-cols-3" >
        @foreach($services->get_posts() as $key=>$service)
          @include('partials.services', [$key, $service, $pageValue])
        @endforeach
      </ul>
    </div>
  </section>

  <section class="section__content py-12">
    <div class="container mx-auto px-6 ">
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-page', 'partials.content'])
      @endwhile
    </div>
  </section>
@endsection
