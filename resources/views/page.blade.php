@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <section class="section__content py-12">
    <div class="container mx-auto px-6 ">
      @while(have_posts()) @php(the_post())

        @includeFirst(['partials.content-page', 'partials.content'])
      @endwhile
    </div>
  </section>
@endsection
