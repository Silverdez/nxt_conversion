@php
  $fields           = get_fields(get_queried_object_id());
@endphp

<section class="section section--hero hero">
  <div class="container mx-auto px-6 pt-12 lg:pt-24">

    <main class="hero__main pt-8 pb-8 lg:pt-48 lg:pb-16">
      <div class="flex flex-col lg:flex-row space-x-0 lg:space-x-20 items-center ">
        <div class="flex flex-col lg:w-2/3 mb-12">
          <h1 class="noDecoration capitalize text-5xl lg:text-6xl drop-shadow-md">{!! $fields['title'] !!}</h1>
          <p class="mt-2 mb-8">{!! $fields['hero_description'] !!}</p>
          <a class="bg-CTA py-3 w-full lg:w-64 text-center inline-block rounded-md uppercase transition hover:text-accent hover:bg-white" href="{!! $fields['hero_link_url']['url'] !!}">
            {!! $fields['hero_link_url']['title'] !!}
          </a>
        </div>
        <div class="transform lg:rotate-4 lg:-translate-x-10">
          <img class="rounded-2xl shadow-2xl" src="{!! $fields['hero_image']['url'] !!}" alt="{!! $fields['title'] !!}">
        </div>
      </div>



      <button class="hero__scroll">
        @svg('images.icons.arrow-down', ['class' => 'icon'])
      </button>
      <div class="hero__gradient js-gradient" data-direction="horizontal" data-opacity="0.33"></div>
      <div class="hero__background js-background"></div>
    </main>

  </div>
</section>
