<x-layout>
  <x-header/>
    <div class="container my-5">
      <div class="row justify-content-between">
          <div class="col-12 col-md-7 my-md-0">
            

            {{-- INIZIO CAROSELLO VERTICALE--}}
           
                <div class="gallery-container h-75">
                  <div class="swiper-container gallery-main h-100 RadiusCustom">
                    <div class="swiper-wrapper RadiusCustom border-0">
                      @if ($product->images)
                      @foreach ($product->images as $image)
                      <div class="swiper-slide border-0">
                        <img class="img-fluid h-100 RadiusCustom border-0" src="{{!$product->images()->get()->isEmpty() ? $image->getUrl(400,400) : "https//picsum.photos/200"}}" alt="Slide 01">
                      </div>
                      @endforeach
                      @endif
                      <div class="swiper-button-prev tx-a"></div>
                      <div class="swiper-button-next tx-a"></div>
                    </div>
                  </div>
                  <div class="swiper-container mySwipeCont gallery-thumbs RadiusCustom">
                    <div class="swiper-wrapper RadiusCustom">
                      @if ($product->images)
                      @foreach ($product->images as $image)
                      <div class="swiper-slide my-1">
                        <img class="RadiusCustom slideResponsive" src="{{!$product->images()->get()->isEmpty() ? $image->getUrl(400,400) : "https//picsum.photos/200"}}" alt="Slide 01">
                      </div>
                      @endforeach
                      @endif
                    </div>
                  </div>
                </div>
              
          </div>
           {{-- FINE CAROSELLO VERTICALE--}}
          <div class="col-12 col-md-5 px-4">
              <div>
                  <h1 class="RadiusCustom fw-bold display-4 tx-a">{{$product->name}}</h1>
                  <h3 class="display-6 fw-bold text-muted">{{$product->brand}}</h3>
                  <span class="d-flex">
                      <p class="display-6">{{__('ui.prezzo')}}</p>
                      <p class="display-6 fw-bold">€ {{$product->price}}</p>
                  </span>
                  {{-- <div class="d-flex align-items-center mt-1">
                      <i class="bi bi-heart fs-2 text-danger mt-3" id="addFavourite"></i>
                      <i class="bi bi-cart4 fs-2 mt-2 ms-3"></i>
                  </div> --}}
              </div>

              <hr>

              <h4 class="fw-bold">{{__('ui.infoprod')}}</h4>
              <p class="showDescription lead">{{$product->description}}</p>
              
              <div class="d-flex align-items-center justify-content-between pt-4">
                  <div class="ms-3">
                    @switch(App::getLocale())
                    @case('es')
                    <h4 class="fw-bold">{{__('ui.categoriaprod')}} </h4>
                    <p class="lead">{{$product->category->esp}}</p>
                    @break
                    @case('en')
                    <h4 class="fw-bold">{{__('ui.categoriaprod')}} </h4>
                    <p class="lead">{{$product->category->eng}}</p>
                    @break
                    @default
                    <h4 class="fw-bold">{{__('ui.categoriaprod')}} </h4>
                    <p class="lead">{{$product->category->type}}</p>
                    @endswitch
                      
                  </div>
                  <div class="me-3">
                      <h4 class="fw-bold">{{__('ui.condizioneprod')}}</h4>
                      <p class="lead">{{$product->usage}}</p>
                  </div>
              </div>
              
              <hr>

              @if ($product->user_id == null)
              <div class="">
                  <p class="lead">{{__('ui.bynull')}}</p>
              </div>
              @else 
              <div>
                
                <a href="{{route('user.index', ['userId'=>$product->user->id])}}" class="card__author" title="author">
                  <p class="lead">{{__('ui.creatoda')}} {{$product->user->name}}, {{__('ui.il')}} {{$product->created_at->format('d/m/Y')}}</p>
                </a>
                  <div class="d-flex justify-content-between">
                    <a href="{{route('product.index')}}" class="btn btn-dark text-light lead">{{__('ui.tornaindietro')}}</a>
                    @if (Auth::user() && Auth::user()->id == $product->user_id)
                    <a href="{{route('product.edit', compact('product'))}}"><button type="submit" class="btn btn-warning text-dark lead ">{{__('ui.modificaannuncio')}}</button></a>
                    @endif
                </div>
              </div>
              @endif
          </div>
          
      </div>
    </div>
</x-layout>