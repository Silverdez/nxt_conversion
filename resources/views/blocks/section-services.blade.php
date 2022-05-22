@php
  $fields           = get_fields(get_queried_object_id());
  $services         = get_field('section_services')
@endphp

  <div class="section-services py-12 {{ $block->classes }}">
    @hasfield('title_services')
      <h2 class="">
        @field('title_services')
      </h2>
    @endfield

    @hasfield('description_services')
      <p class="mt-2 mb-16">@field('description_services')</p>
    @endfield

    @hasfield('section_services')
        <ul class="services_listing noListImage grid grid-cols-2 lg:grid-cols-3 gap-2 lg:gap-12" >
          @foreach($services as $key=>$service)
            @include('partials.services', [$key, $service])
          @endforeach
        </ul>
    @endfield

  </div>
