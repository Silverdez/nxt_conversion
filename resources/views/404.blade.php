@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <section class="section__content py-12">
    <div class="container mx-auto px-6 ">

      @if (! have_posts())
        <x-alert class="bg-transparent text-titleAccent text-3xl font-bold mb-6" type="warning">
          {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
        </x-alert>

        {!! get_search_form(false) !!}
      @endif
    </div>
  </section>
@endsection
