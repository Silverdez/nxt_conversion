@php
  $fields           = get_fields(get_queried_object_id());
  $test = get_field('biography_avatar')['url']
@endphp

<div class="section-bio py-12 {{ $block->classes }}">
  @hasfield('title_bio')
    <h2 class="">
      @field('title_bio')
    </h2>
  @endfield

  @hasfield('description_bio')
    <p class="mt-2 mb-16">@field('description_bio')</p>
  @endfield


    <div class="bio-container">
        <div class="bio w-full lg:w-2/3 flex flex-col lg:flex-row justify-center items-center mx-auto">
          <div class="text-cardBaseText w-full">
            @hasfield('biography_name')
            <h4 class="noDecoration font-serif capitalize text-4xl lg:text-5xl">@field('biography_name')</h4>
            @endfield
            @hasfield('biography_description')
            <p class="mt-2 mb-8 text-textLighter">@field('biography_description')</p>
            @endfield
            @hasfield('biography_position')
            <span class="italic inline-block font-serif w-full text-3xl leading-5 text-right pr-8 lg:pr-12 capitalize">@field('biography_position')</span>
            @endfield
          </div>
          @hasfield('biography_avatar')
          <div class="relative" >
            <img class="w-64 lg:w-120 " src="@field('biography_avatar', 'url')" alt="@field('biography_name')">
            <div class="bg-cardDarkerBg rounded-full w-96 h-96 -z-1 absolute -top-6 left-1/2 transform -translate-x-1/2 shadow-black shadow-xl ring-opacity-40"></div>
          </div>
          @endfield
        </div>

    </div>

</div>
