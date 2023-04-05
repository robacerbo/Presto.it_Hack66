<x-layout>
    {{-- ERRORE ACCESSO UTENTE --}}
    @if (session('nope'))
    <div class="alert alert-danger marginAlert">
        {{ session('nope') }}
    </div>
    @endif
    
    {{-- MIDDLEWARE REVISORE --}}
    @if (session('accessDenied'))
    <div class="alert alert-danger marginAlert">
        {{ session('accessDenied') }}
    </div>
    @endif
    
    {{-- ALERT PER DIVENTARE REVISORE --}}
    @if (session('messageBecome'))
    <div class="alert alert-warning marginAlert">
        {{ session('messageBecome') }}
    </div>
    @endif
    {{-- ALERT DOPO AVER RESO REVISORE --}}
    
    @if (session('messageMake'))
    <div class="alert alert-success marginAlert">
        {{ session('messageMake') }}
    </div>
    @endif
    
    @if (session('messageDelete'))
    <div class="alert alert-success marginAlert">
        {{ session('messageDelete') }}
    </div>
    @endif
    
    
    {{-- INIZIO CAROSELLO --}}
    
    <div class="container-fluid">
        <div class="row ">
            <div class="swiper mySwiper3 p-0 vh-100">
                <div class="swiper-wrapper">
                    <div class="swiper-slide vh-100">
                        <div class="parallax-bg1"></div>
                        <div class="slideCustom mt-md-5 pt-md-5 d-flex flex-column align-items-md-start justify-content-center marginWelcome">
                            <h1 data-aos="zoom-in-right" data-aos-duration="1100" class="tx-a fw-bold display-2 text-md-start text-center text-md-start mb-0">Presto.it</h1>
                            <p class="text-start display-6 text-md-start text-center hidden-left">{{__('ui.titolo1')}}</p>
                            <h5 class="text-start mb-2 display-6 text-md-start text-center hidden-left">{{__('ui.sottotitolo1')}}</h5>
                            <div class="containerBtn3 fw-semibold hidden-top">
                                <a class="btn3" href="{{route('product.index')}}"><span>{{__('ui.tasto1')}}</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide vh-100">
                        <div class="parallax-bg2"></div>
                        <div class="slideCustom mt-md-5 pt-md-5 d-flex flex-column align-items-md-start justify-content-center marginWelcome">
                            <h1 data-aos="zoom-in-right" data-aos-duration="1100" class="tx-a fw-bold display-3 text-md-start text-center mb-0">{{__('ui.titolo')}}</h1>
                            <p class="text-start display-6 text-md-start text-center text-light hidden-left">{{__('ui.titolo2')}}</p>
                            <h5 class="text-start mb-2 display-6 text-md-start text-center text-light hidden-left">{{__('ui.sottotitolo2')}}</h5>
                            <div class="containerBtn3 fw-semibold hidden-top">
                                @if(Auth::user())
                                <a class="btn3" href="{{route('product.create')}}"><span>{{__('ui.tasto2')}}</span></a>
                                @else
                                <a class="btn3" href="{{route('register')}}"><span>{{__('ui.tasto2')}}</span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide vh-100">
                        <div class="parallax-bg3"></div>
                        <div class="slideCustom mt-md-5 pt-md-5 d-flex flex-column align-items-md-start justify-content-center marginWelcome">
                            <h1 data-aos="zoom-in-right" data-aos-duration="1100" class="tx-a fw-bold display-3 text-md-start text-center mb-0">{{__('ui.title')}}</h1>
                            <p class="text-start display-6 text-md-start text-center text-light hidden-left">{{__('ui.titolo3')}}</p>
                            <h5 class="text-start mb-2 display-6 text-md-start text-center text-light hidden-left">{{__('ui.sottotitolo3')}}</h5>
                            <div class="containerBtn3 fw-semibold hidden-top">
                                <a class="btn3" href="{{route('product.index')}}"><span class="p-3">{{__('ui.tasto3')}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    {{-- FINE CAROSELLO --}}
    
    <div class="container d-flex justify-content-center">
        <h3 data-aos="zoom-in" class="my-5 display-5">{{__('ui.ultimi')}}</h3>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <section class="customer-logos2 slider">
                @foreach ($products as $product)
                <div class="slide fs-5">
                    <x-cardProduct :Product="$product" />
                </div>
                @endforeach
            </section>          
        </div>
        
        <div class="row">
            <div class="d-flex justify-content-center my-5 containerBtn3 fw-bold">
                <a class="btn3 hidden-top" href="{{route('product.index')}}"><span>{{__('ui.annunci')}}</span></a>            </div>
        </div>   
        
    </div>
    
    <div class="flex-container mt-1">
        <div class="flex-slide home">
            <a href="{{ route('category.show', $categories->firstWhere('id', 2)->id) }}">
                <div class="flex-title fw-bold fs-5">{{__('ui.informatica')}}</div>
                <button class="ms-4 btn-category">
                    <i class="fw-bold bi bi-chevron-right text-white"></i>
                </button>
            </a>
        </div>
        <div class="flex-slide about">
            <a href="{{ route('category.show', $categories->firstWhere('id', 3)->id) }}">
                <div class="flex-title fw-bold fs-5">{{__('ui.console')}}</div>
                <button class="ms-4 btn-category">
                    <i class="fw-bold bi bi-chevron-right text-white"></i>
                </button>
            </a>
        </div>
        <div class="flex-slide work">
            <a href="{{ route('category.show', $categories->firstWhere('id', 4)->id) }}">
                <div class="flex-title fw-bold fs-5">{{__('ui.fotografia')}}</div>
                <button class="ms-4 btn-category">
                    <i class="fw-bold bi bi-chevron-right text-white"></i>
                </button>
            </a>
        </div>
        <div class="flex-slide bamba">
            <a href="{{ route('category.show', $categories->firstWhere('id', 9)->id) }}">
                <div class="flex-title fw-bold fs-5">{{__('ui.sport')}}</div>
                <button class="ms-4 btn-category">
                    <i class="fw-bold bi bi-chevron-right text-white"></i>
                </button>
            </a>
        </div>
    </div>    
    
    <div class="vh-25 pb-5 position-relative hidden-left">
            <video class="videoCustom" autoplay muted loop>
            <source src="{{('/media/giradischi.mp4') }}" type="video/mp4">
            </video>
            <h4 class="titleVideo display-1">{{__('ui.musica')}}</h4>
            <p class="pVideo lead">{{__('ui.textWelcome')}}<br> {{__('ui.textWelcome2')}} </p>
            
            <div class="btnVideo">
                <div class="containerBtn3 fw-bold">
                    <a class="btn3" href="{{ route('category.show', $categories->firstWhere('id', 8)->id) }}"><span><i class="bi bi-arrow-right fw-bold fs-2"></i></span></a>
                </div>
            </div>
        </div>
        
    </x-layout>
