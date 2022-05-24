@php
  $fields           = get_fields(get_queried_object_id());
  $services         = get_field('section_services')
@endphp

  <div id="{{ 'section-services-' . $block->block->id }}" class="section-services py-12 {{ $block->classes }}">
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
            @php($value = get_fields($service->ID))

            <li class="service relative">

                <div class="hidden lg:block service_num absolute text-9xl text-quaternary opacity-20 font-semibold -z-1 -top-12 left-0 transform -translate-x-1/2">{!! $key + 1 !!}</div>
                @if(isset($value['service_link_url']['url']))
                  <a class="bg-CTA hidden lg:w-auto text-center lg:inline-block rounded-md absolute z-1 uppercase bottom-0 right-8 translate-y-1/2 transform transition py-2 px-12 hover:text-accent hover:bg-white" href="{!! $value['service_link_url']['url'] !!}"> Go </a>
                @endif

              <div class="bg-cardBaseBg relative text-cardBaseText h-full max-w-lg p-6 overflow-hidden {!! !isset($pageValue) ? 'rounded-2xl' : '' !!}">
                @if(!isset($pageValue))
                  <div class="hidden lg:block service_num absolute text-9xl font-semibold opacity-10 -top-12 left-0 transform -translate-x-1/2">{!! $key + 1 !!}</div>
                @endif
                <div class="service_image bg-quaternary w-10 h-10 lg:w-16 lg:h-16 rounded-xl flex items-center justify-center mb-6 transform rotate-45">
                  @if( isset($value['service_icon']))
                    {!! get_svg($value['service_icon'], ['class' => 'text-white w-8 h-8 transform -rotate-45'] ) !!}
                  @else
                    @svg('achievement', ['class' => 'text-white w-8 h-8 transform -rotate-45'])
                  @endif
                </div>
                @if(isset($value['service_link_url']['url']))
                  <a href="{!! $value ? $value['service_link_url']['url'] : "#" !!}">
                    @endif
                    <h4 class="noDecoration text-0.8 lg:text-xl capitalize leading-4 mb-0">{!! $value ? $value['service_title'] : $service->post_title !!}</h4>
                    @if(isset($value['service_link_url']['url']))
                      </a>
                    @endif
                @if(!isset($pageValue))
                  @if(isset($value['service_description']))
                    <p class="hidden lg:block mt-2 mb-8 text-0.7 lg:text-0.9 text-quinary leading-5 mt-0 lg:mt-8">{!! $value ? $value['service_description'] : $service->post_excerpt !!}</p>
                  @endif
                @endif
              </div>
            </li>
          @endforeach
        </ul>
    @endfield

  </div>
