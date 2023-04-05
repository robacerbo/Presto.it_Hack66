<x-layout>

    <x-header>
        <div class="container ">
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-8 mt-5">
            @switch(App::getLocale())
              @case('es')
                    <h1 data-aos="zoom-out" data-aos-duration="700"  class="prestoBackgroundAnimate RadiusCustom fw-bold display-4 text-white">{{$category->esp}}</h1>
              @break
              @case('en')
                    <h1 data-aos="zoom-out" data-aos-duration="700"  class="prestoBackgroundAnimate RadiusCustom fw-bold display-4 text-white">{{$category->eng}}</h1>
              @break
              @default
                    <h1 data-aos="zoom-out" data-aos-duration="700"  class="prestoBackgroundAnimate RadiusCustom fw-bold display-4 text-white">{{$category->type}}</h1>
            @endswitch
                    
                </div>
            </div>
        </div>
    </x-header>
   
    <div class="container-fluid">
        <div class="row p-md-5 text-center">
            @forelse ($category->products->where('is_accepted', true) as $product)
            <div class="col-12 col-md-4 p-4">
                <x-cardProduct :Product="$product" />
            </div>
            
            @empty
            <h1 class="py-5">{{__('ui.prodottinontrovati')}}</h1>
            @endforelse
        </div>
    </div>
</x-layout>