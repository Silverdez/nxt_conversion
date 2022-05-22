@extends('layouts.app')

@php
  $paged            = get_query_var('paged') ? get_query_var('paged') : 1;
  $fields           = get_fields(get_queried_object_id());
@endphp

@section('content')

  @include('partials.hero')
  <section class="section__content py-12">
    <div class="container mx-auto px-6 ">
      @while(have_posts()) @php(the_post())
      {{ the_content() }}
      @endwhile
    </div>
  </section>

@endsection
