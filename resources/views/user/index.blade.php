<x-layout>
    <x-header>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-8">
                </div>
            </div>
        </div>
    </x-header>
    
    
    
    {{-- COMUNE A TUTTI --}}
    <div class="row d-flex justify-content-center align-items-center mb-5 m-0">
        <div class="col-12 col-md-10">
            <div class="border-0 m-0">
                <div class="text-white d-flex flex-row topCardProfile prestoBackgroundAnimate RadiusCustom">
                    <div class="ms-4 me-5 mt-4 d-flex flex-column divPfp" style="width: 200px; height: 200px; ">
                        
                        
                        
                        @if($user->profilePicture)
                        <img   class="fotoprofilo shadow" 
                        class="img-fluid" style="background-image: url({{ Storage::url($user->profilePicture) }}); width: 200px; height: 200px; background-position: center;  background-size: cover;
                        ">
                        @else
                        <img src="\media\guest.png" alt=""
                        class="img-fluid  mt-4 mb-2" style="width: 150px; z-index: 1">
                        @endif
                        
                    </div>
                    
                    <div class="ms-4 ms-md-0 ms-md-0 nomeprofilo" style="margin-top: 130px;">
                        <h1>{{ $user->name }}</h1>
                    </div>
                    
                </div>
                {{-- SE SONO SUL MIO PROFILO - PERSONAL AREA --}}
                @if (Auth::user() && Auth::user()->id == $user->id)
                
                
                @if (session('avatarUpdated'))
                <div class="alert alert-success marginAlert">
                    {{ session('avatarUpdated') }}
                </div>
                @endif
                
                <div class="card-body pt-5 px-4 text-black">
                    <h3 class="fw-light mt-2 ms-2 mb-1"> {{__('ui.areaPersonale')}}</h3>
                    <div class="mb-2 bg-light RadiusCustom">
                        <div class="container p-4 text-black">
                            <div class="row">
                                <div class="col-12 col-md-6 py-2">
                                    <p class="lead tx-a fs-4">
                                        {{__('ui.campoFoto')}}
                                    </p>
                                    
                                    <form action="{{ route('user.avatar', ['user' => Auth::user()]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        {{-- ERRORI FORM --}}
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        
                                        <input  type="file" name="profilePicture" class="my-2 d-block">
                                        <button type="submit" class="btn btnIntro px-2" data-mdb-ripple-color="dark"
                                        style="z-index: 1;">
                                        {{__('ui.modificaFoto')}}
                                    </button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            {{-- SE NON è IL MIO PROFILO, NON LO VEDO --}}
            
            @endif
            
            @if (session('infoCreated'))
            <div class="alert alert-success">
                {{ session('infoCreated') }}
            </div>
            @endif
            {{-- COMUNE A TUTTI --}}
            
            @forelse($user->infos as $info)
            
            
            <div class="card-body pt-1 px-4 text-black">
                <div>
                    <div class="d-flex">
                        <h3 class="fw-light my-4 ms-2 mb-1"> {{__('ui.info')}} </h3>
                        @if (Auth::user()->id == $user->id)
                        <a href="{{route('user.update', compact('user'))}}" class="btn btn-transparent pt-4 fs-4">
                            <i class="bi bi-gear categorie"></i>
                        </a>
                        @endif
                    </div>
                    <div class="container py-3 tx-m bg-light RadiusCustom">
                        <div class="row p-0 w-100 mx-0 margineTop">
                            <div class="col-12 col-md-3 col-md-3 p-0 h-50 my-auto mx-auto">
                                <p class="lead tx-a fs-4 text-center">{{__('ui.eta')}}</p>
                                <p class="lead text-center fs-5">{{$info->birthDate}}</p>
                                <hr class="mt-0 tx-a">
                            </div>
                            <div class="col-12 col-md-3 col-md-3 p-0 h-50 my-auto mx-auto">
                                <p class="lead tx-a fs-4 text-center">{{__('ui.citta')}}</p>
                                <p class="lead text-center fs-5">{{$info->city}}</p>
                                <hr class="mt-0 tx-a">
                            </div>
                            <div class="col-12 col-md-3 col-md-3 p-0 h-50 mx-auto my-auto">
                                <p class="lead tx-a fs-4 text-center">{{__('ui.numerotel')}}</p>
                                <p class="lead text-center fs-5">{{$info->telNumber}}</p>
                                <hr class="mt-0 tx-a">
                            </div>
                            <div class="col-12 col-md-3 col-md-3 p-0 h-50 mx-auto my-auto">
                                <p class="lead tx-a fs-4 text-center">{{__('ui.campoemail')}}</p>
                                <p class="lead text-center fs-5">{{$user->email}}</p>
                                <hr class="mt-0 tx-a">
                            </div>
                        </div>
                    </div>
                    {{-- SE SONO SUL MIO PROFILO --}}
                    <div class="d-flex justify-content-between align-items-center mb-5 mt-2 RadiusCustom bg-light">
                        <div class="d-flex mt-1">
                            <p class="fw-bold tx-a fs-4 py-2 mt-1 ms-4">{{__('ui.fraseMotivazionale')}}:</p>
                            <p class="fw-light fs-4 py-2 mt-1 ms-4">{{$info->motto}}</p>
                        </div>
                    </div>
                    @empty
                    <div class="card-body pt-1 px-4 text-black">
                        <div>
                            <div class="d-flex">
                                <h3 class="fw-light my-4 ms-2 mb-1"> {{__('ui.info')}} </h3>
                                @if (Auth::user()->id == $user->id)
                                <a href="{{route('user.update', compact('user'))}}" class="btn btn-transparent pt-4 fs-4">
                                    <i class="bi bi-gear categorie"></i>
                                </a>
                                @endif
                            </div>
                            <div class="container py-3 tx-m bg-light RadiusCustom">
                                <div class="row p-0 w-100 mx-0 margineTop">
                                    <div class="col-12 col-md-3 mt-3 col-md-3 p-0 h-50 my-auto mx-auto">
                                        <p class="lead tx-a fs-4 text-center">{{__('ui.eta')}}</p>
                                        <p class="lead text-center fs-5">/</p>
                                        <hr class="mt-0 tx-a">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3 col-md-3 p-0 h-50 my-auto mx-auto">
                                        <p class="lead tx-a fs-4 text-center">{{__('ui.citta')}}</p>
                                        <p class="lead text-center fs-5">/</p>
                                        <hr class="mt-0 tx-a">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3 col-md-3 p-0 h-50 mx-auto my-auto">
                                        <p class="lead tx-a fs-4 text-center">{{__('ui.numerotel')}}</p>
                                        <p class="lead text-center fs-5">/</p>
                                        <hr class="mt-0 tx-a">
                                    </div>
                                    <div class="col-12 col-md-3 mt-3 col-md-3 p-0 h-50 mx-auto my-auto">
                                        <p class="lead tx-a fs-4 text-center">{{__('ui.campoemail')}}</p>
                                        <p class="lead text-center fs-5">/</p>
                                        <hr class="mt-0 tx-a">
                                    </div>
                                </div>
                            </div>
                            {{-- SE SONO SUL MIO PROFILO --}}
                            <div class="d-flex justify-content-between align-items-center mb-5 mt-2 RadiusCustom bg-light">
                                <div class="d-flex mt-1">
                                    <p class="fw-bold tx-a fs-4 py-2 mt-1 ms-4">{{__('ui.fraseMotivazionale')}}: /</p>
                                </div>
                                
                            </div>
                            @endforelse
                            
                            {{-- SE NON SONO SUL MIO PROFILO --}}
                            <div class="d-flex justify-content-between align-items-center my-5 RadiusCustom prestoBackgroundAnimate">
                                <h3 class="fw-light py-2 mt-1 ms-4 text-white">{{__('ui.annuncidi')}} {{$user->name}}</h3>
                                <p class="fw-light m-0 me-3 text-white">Totale Annunci: {{$products->total()}}</p>
                            </div>
                            
                            
                            {{-- COMUNE A TUTTI MA RIVEDI L'HOVER DELLE CARD --}}
                            <div class="container">
                                <div class="row">
                                    @forelse ($products as $product)
                                    <div class="col-12 col-lg-4 my-3">
                                        <div class="slide fs-5">
                                            <x-cardProduct :Product="$product" />
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12">
                                        <h1>{{__('ui.noAnn')}}</h1>
                                        
                                        {{-- SE SONO SUL MIO PROFILO, ma controlla --}} 
                                        @if (Auth::user()->id == $user->id)
                                        
                                        <p> {{__('ui.inserisciprimoAnn')}} </p>
                                        <a href="{{ route('product.create') }}" class="btn btn-dark">{{__('ui.inserisciAnn')}}</a>
                                        @endif
                                    </div>
                                    @endforelse
                                    <div class="d-flex justify-content-center">
                                        {{$products->links()}}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                    
                    {{-- chiusura riga 83--}}
                </div> {{-- chiusura riga 38--}}
            </div> {{-- chiusura riga 37--}}
        </div> {{-- chiusura riga 36--}}
    </x-layout>