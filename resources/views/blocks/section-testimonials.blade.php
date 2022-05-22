@php
  $fields           = get_fields(get_queried_object_id());
  $testimonials     = get_field('testimonials', 'option');
  $numTestimonials  = count($testimonials)
@endphp

<div class="section-testimonials py-12 {{ $block->classes }}">
  @hasfield('title_testimonials')
  <h2 class="">
    @field('title_testimonials')
  </h2>
  @endfield

  @hasfield('description_testimonials')
  <p class="mt-2 mb-16">@field('description_testimonials')</p>
  @endfield

  @if($testimonials)
    <div class="">
        <ul class="testimonials_listing noListImage w-full flex relative items-center justify-center" >
            @foreach($testimonials as $key=>$testimonial)
              @include('partials.testimonials', [$testimonial, $key, $numTestimonials])
            @endforeach
        </ul>
    </div>
  @endif

</div>
