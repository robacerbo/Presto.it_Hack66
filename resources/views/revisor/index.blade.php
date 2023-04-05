<x-layout>
    <x-header>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-8 mt-5">
                    <h1 class="prestoBackgroundAnimate RadiusCustom fw-bold display-4 text-white">{{__('ui.zonaRev')}}</h1>
                </div>
            </div>
        </div>
    </x-header>
    
    @if (session('productAccepted'))
    <div class="alert alert-success d-flex align-items-center">
        {{ session('productAccepted') }}
    </div>
    @endif
    @if (session('productRejected'))
    <div class="alert alert-danger d-flex align-items-center">
        {{ session('productRejected') }}
    </div>
    @endif
    @if (session('productUndo'))
    <div class="alert alert-dark">
        {{ session('productUndo') }}
    </div>
    @endif
    @if (session('productUndo2'))
    <div class="alert alert-dark">
        {{ session('productUndo2') }}
    </div>
    @endif
    
    <div class="container-fluid">
        
        <div class="row justify-content-center">
            <div class="col-10 mb-5">
                <div class="mb-4 mx-auto">
                    <h2 class="text-center">{{__('ui.Operazioni')}}</h2>
                    <form class="text-center" action="{{route('revisor.undo_product')}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn bg-a text-white">{{__('ui.Annulla')}}</button>
                    </form>
                </div>
                {{-- <div class="d-flex justify-content-between">
                    <p class="lead fs-4">{{__('ui.confermati')}}: 0</p>
                    <p class="lead fs-4">{{__('ui.sospeso')}}: 0</p>
                    <p class="lead fs-4">{{__('ui.annullati')}}: 0</p>
                </div> --}}
            </div>
        </div>
        
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-10">
                <div class="accordion" id="accordionExample">
                    
                    @forelse ($product_to_check->where('is_accepted', null) as $item)
                        {{-- @dd($item->images[1]->labels) --}}
                        {{-- acc totale --}}
                        <div class="">
                            {{-- acc chiuso --}}
                            <div class="accordion-header d-flex align-items-center border">
                                {{--CARO ANTONIO LOOP ITERATION SERVE DAVVERO? --}}
                                <div class="accordion-button lead fs-5 text-black" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne_{{$loop->iteration}}" aria-expanded="true" aria-controls="collapseOne">
                                    <form action="{{route('revisor.accept_product' , ['product'=>$item])}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn bg-a m-1 p-3 text-white">
                                            <i class="fs-5 bi bi-check-lg"></i>
                                        </button>
                                    </form>
                                    <form action="{{route('revisor.reject_product' , ['product'=>$item])}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn bg-dark m-1 p-3 text-white">
                                            <i class="fs-5 bi bi-x-lg"></i>
                                        </button>
                                    </form>
                                    <h2 class="fw-light ms-3">{{__('ui.annuncio')}} | {{$item->name}}</h2>
                                </div>
                            </div>
                            {{-- acc aperto --}}
                            <div id="collapseOne_{{$loop->iteration}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body border-bottom shadow d-flex">
                                    <div id="" class="row">
                                        <div class="d-flex flex-column flex-md-row ">
                                            <div class="col-12 col-md-4 text-center text-md-start">
                                                <p class="ps-3 fs-4 lead"><strong class="fs-4 tx-a">{{__('ui.namelabel')}}</strong>: {{$item->user->name}}</p>
                                                <p class="ps-3 fs-4 lead"><strong class="fs-4 tx-a">{{__('ui.prezzo')}}</strong> €{{$item->price}}</p>
                                                <p class="ps-3 fs-4 lead"><strong class="fs-4 tx-a">{{__('ui.categoriaprod')}}</strong> {{$item->category->type}}</p>
                                                <p class="ps-3 fs-4 lead"><strong class="fs-4 tx-a">Creato:</strong> {{$item->created_at->format('d/m/Y')}}</p>
                                            </div>
                                            <div class="col-12 col-md-8 fs-3 text-center text-md-start text-justify">
                                                <p class="mt-3 mt-md-0 mb-0 fs-4 lead" ><strong class="fs-4 tx-a fw-light">{{__('ui.descrizione')}}</strong></p>
                                                <p class=" fs-5 lead">{{$item->description}}</p>
                                            </div>

                                            {{-- <h5 class="ps-3 fs-3 fw-bold">{{$item->user->name}}</h5>
                                            <h5 class="ps-3 fs-4">€{{$item->price}}</h5>
                                            <h5 class="ps-3 fs-4 fw-light">{{$item->category->type}}</h5>
                                            <p class="ps-3 lead">{{$item->description}}</p> --}}
                                        </div>
                                        @if ($item->images)
                                        
                                        @foreach ($item->images as $image)
                                        <div class="col-12 col-md-3 text-center">
                                            <img src="{{!$item->images()->get()->isEmpty() ?  $image->getUrl(400,400) : "https//picsum.photos/200"}}" class="img-fluid RadiusCustom my-3 " width="80%" alt="">
                                        </div>
                                        <div class="col-12 col-md-3 col-md-6 d-block mt-3">
                                            
                                            <h5 class="ps-3">Tags:</h5>
                                            @if ($image->labels)
                                            <div class="ps-3 mb-3 mb-md-0">
                                            @foreach ($image->labels as $label)
                                            <span>
                                                <p class="d-inline me-2 text-start">#{{$label}}</p>
                                            </span>
                                            @endforeach
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="card-body">
                                                <h5 class="ps-3 pb-2">Revisione immagini:</h5>
                                                <p class="lead ps-3">Adulti: <span class="{{$image->adult}}"></span></p>
                                                <p class="lead ps-3">Satira: <span class="{{$image->spoof}}"></span></p>
                                                <p class="lead ps-3">Medicina: <span class="{{$image->medical}}"></span></p>
                                                <p class="lead ps-3">Violenza: <span class="{{$image->violence}}"></span></p>
                                                <p class="lead ps-3">Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>
                                                <hr>
                                            </div>
                                        </div> 
                                        @endforeach
                                        @endif
                                    </div> 
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            
                                <h1 class="text-center">Ottimo lavoro! Non ci sono annunci da revisionare</h1>
                            
                        </div>
                    </div>
                        
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>


{{-- <div class="col-12 col-md-3">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner RevisorCarousel">
            @if ($item->images)
            @foreach ($item->images as $image)
            <div class="carousel-item active">
                <img src="{{!$item->images()->get()->isEmpty() ?  $image->getUrl(400,400) : "https//picsum.photos/200"}}" class="img-fluid" alt="">
            </div>                              
            @endforeach
            @endif
        </div>
        <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">{{__('ui.precedente')}}</span>
        </button>
        <button class="carousel-control-next bg-dark" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">{{__('ui.successivo')}}</span>
        </button>
    </div>
</div>
<div class="col-12 col-md-3 col-md-6 d-block">
    <h5 class="ps-3 fs-3 fw-bold">{{$item->user->name}}</h5>
    <h5 class="ps-3 fs-4">€{{$item->price}}</h5>
    <h5 class="ps-3 fs-4 fw-light">{{$item->category->type}}</h5>
    <p class="ps-3 lead">{{$item->description}}</p>
    <h5 class="ps-3">Tags:</h5>
    @if ($image->labels)
    @foreach ($image->labels as $label)
    <span class="ps-3">
        <p class="d-inline">#{{$label}}</p>
    </span>
    @endforeach
    @endif
    <p class="ps-3 mt-3 lead">{{$item->created_at->format('d/m/Y')}}</p>
</div>
<div class="col-12 col-md-3">
    <div class="card-body">
        <h5 class="ps-3 pb-2">Revisione immagini:</h5>
        <p class="lead ps-3">Adulti: <span class="{{$image->adult}}"></span></p>
        <p class="lead ps-3">Satira: <span class="{{$image->spoof}}"></span></p>
        <p class="lead ps-3">Medicina: <span class="{{$image->medical}}"></span></p>
        <p class="lead ps-3">Violenza: <span class="{{$image->violence}}"></span></p>
        <p class="lead ps-3">Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>
    </div>
</div> --}}