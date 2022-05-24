@php
  $fields           = get_fields(get_queried_object_id());
  $testimonials     = get_field('testimonials', 'option');
@endphp

<div id="{{ 'section-testimonials-' . $block->block->id }}" class="section-testimonials py-12 {{ $block->classes }}">
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
            <li id="{!! $key + 1 !!}" class="testimonial w-full lg:w-1/2 h-full relative ">
              @svg('quotes', 'w-24 h-24 absolute text-accent text-opacity-20 -z-1 transform -top-4 -left-4')
              <div class="text-cardBaseText rounded-2xl h-full w-full p-6">
                <p class="mt-2 mb-8 text-textLighter">{!! $testimonial['testimonial_description'] !!}</p>
                <h4 class="noDecoration italic inline-block font-serif w-full text-3xl leading-5 text-right pr-8 lg:pr-12 capitalize">{!! $testimonial['testimonial_author'] !!}</h4>
                <div class="w-32 h-32 flex items-center justify-center absolute bg-cardDarkerBg overflow-hidden -z-1 opacity-40 -top-12 left-1/2 transform -translate-x-1/2 rounded-full">
                  @if($testimonial['testimonial_avatar'])
                    <img class="" src="{!! $testimonial['testimonial_avatar']['url'] !!}" alt="{!! $testimonial['testimonial_author'] !!}">
                  @else
                    <span>
                      @svg('user', 'w-16 h-16')
                    </span>
                  @endif
                </div>

              </div>
            </li>
            @endforeach
        </ul>
    </div>
  @endif

</div>
