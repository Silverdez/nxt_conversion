@php
  $fields           = get_fields($service);
  $iconValue        = get_field('service_icon', $service) ? get_field('service_icon', $service) : "-";

  $icon             = "images/icons/".$iconValue;
@endphp

<li class="service relative">
  @if(!isset($pageValue))
    <div class="hidden lg:block service_num absolute text-9xl text-quaternary opacity-20 font-semibold -z-1 -top-12 left-0 transform -translate-x-1/2">{!! $key + 1 !!}</div>
    @if($fields && $fields['service_link_url'])
      <a class="bg-CTA hidden lg:w-auto text-center lg:inline-block rounded-md absolute z-1 uppercase bottom-0 right-8 translate-y-1/2 transform transition py-2 px-12 hover:text-accent hover:bg-white" href="{!! $fields['service_link_url']['url'] !!}"> Go </a>
    @endif
  @endif
  <div class="bg-cardBaseBg relative text-cardBaseText h-full max-w-lg p-6 overflow-hidden {!! !isset($pageValue) ? 'rounded-2xl' : '' !!}">
    @if(!isset($pageValue))
    <div class="hidden lg:block service_num absolute text-9xl font-semibold opacity-10 -top-12 left-0 transform -translate-x-1/2">{!! $key + 1 !!}</div>
    @endif
    <div class="service_image bg-quaternary w-10 h-10 lg:w-16 lg:h-16 rounded-xl flex items-center justify-center mb-6 transform rotate-45">
      @if($fields && $fields['service_icon'])
        {!! get_svg($icon, ['class' => 'text-white w-8 h-8 transform -rotate-45'] ) !!}
      @else
        @svg('images.icons.achievement', ['class' => 'text-white w-8 h-8 transform -rotate-45'])
      @endif
    </div>
      @if($fields && $fields['service_link_url'])
        <a href="{!! $fields ? $fields['service_link_url']['url'] : "#" !!}">
      @endif
        <h4 class="noDecoration text-0.8 lg:text-xl capitalize leading-4 mb-0">{!! $fields ? $fields['service_title'] : $service->post_title !!}</h4>
      @if($fields && $fields['service_link_url'])
        </a>
      @endif
      @if(!isset($pageValue))
        @if($fields && $fields['service_description'])
          <p class="hidden lg:block mt-2 mb-8 text-0.7 lg:text-0.9 text-quinary leading-4 mt-0 lg:mt-8">{!! $fields ? $fields['service_description'] : $service->post_excerpt !!}</p>
        @endif

      @endif
  </div>
</li>
