<article class="card card--1 m-0 hidden">
      <div class="card__info-hover">
        {{-- <i class="bi bi-bag-plus fs-3"></i>
        <i class="bi bi-heart fs-3 ms-3"></i> --}}
        <div class="card__clock-info text-end">
            <i class="bi bi-stopwatch fs-3 text-black fw-bold"></i>
            <small class="fw-bold">{{$product->created_at->format('d/m/Y')}}</small>
        </div> 
    </div>
    
    <div class="card__img" style="background-image: url({{!$product->images()->get()->isEmpty() ? $product->images()->first()->getUrl(400,400) : 'https://picsum.photos/200'}})"></div>
    <a href="{{route('product.show', compact('product'))}}" class="card_link">
        <div class="card__img--hover" style="background-image: url({{!$product->images()->get()->isEmpty() ? $product->images()->first()->getUrl(600,400) : 'https://picsum.photos/200'}})"></div>
    </a>
    <div class="card__info text-start">
        @switch(App::getLocale())
              @case('es')
                <span class="lead overflowCardCustom">{{$product->category->esp}}</span>
              @break
              @case('en')
                <span class="lead overflowCardCustom">{{$product->category->eng}}</span>
              @break
              @default
                <span class="lead overflowCardCustom">{{$product->category->type}}</span>
        @endswitch
        <h3 class="overflowCardCustom">{{$product->name}}</h3>
        <h2 class="fw-bold">€ {{$product->price}}</h2>
        <div class="d-flex justify-content-between">
        <span class="overflowCardCustom">by <a href="{{route('user.index', ['userId'=>$product->user->id])}}" class="card__author" title="author">{{$product->user->name}}</a></span>
            <a href="{{route('product.show', compact('product'))}}">
              <button class="ms-4 btn-annunci">
                <i class="fw-bold bi bi-chevron-right tx-m"></i>
              </button>
            </a>
        </div>
    </div>
</article>

