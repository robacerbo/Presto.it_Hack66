<nav class="navbar bg-light fixed-top NavbarCustom shadow">
  <div class="container-fluid">
    <div class="d-flex mx-auto mx-md-0 ps-4">
      <a class="navbar-brand" href="{{route('homepage')}}">
        <img data-aos="zoom-in" src="/media/presto.png" class="logoHover" alt="Logo">
      </a>
      <a class="navbar-brand navResponsive categorie lead ms-4" href="{{route('product.index')}}">{{__('ui.annunci')}}</a>
      <a class="navbar-brand navResponsive dropdown-toggle categorie lead ms-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{__('ui.categorie')}}
      </a>
      <div class="container d-flex justify-content-center p-0">
        <ul id="dropdownShow" class="dropdown-menu dropdown-menu-category submenu m-0 border-0 bg-light">

          @foreach ($categories as $category)
          @switch(App::getLocale())
              @case('es')
                <li class="dropItem"><a class="dropdown-item bg-transparent tx-m m-0 lead" href="{{route('category.show', compact('category'))}}">{{$category->esp}}</a></li>
              @break
              @case('en')
                <li class="dropItem"><a class="dropdown-item bg-transparent tx-m m-0 lead" href="{{route('category.show', compact('category'))}}">{{$category->eng}}</a></li>
              @break
              @default
                <li class="dropItem"><a class="dropdown-item bg-transparent tx-m m-0 lead" href="{{route('category.show', compact('category'))}}">{{$category->type}}</a></li>   
          @endswitch
          @endforeach
        </ul>
      </div>
    </div>
    <div class="d-flex iconsNav">
      <form class="d-flex ms-3 formSearch" role="search" action="{{route('products.search')}}" method="GET">
        <input class="form-control me-2 RadiusCustom" type="search" placeholder="{{__('ui.cerca')}}" aria-label="Search" name="searched">
        <button class="btn categorie RadiusCustom border-0" type="submit">
          <i class="bi bi-search fs-3"></i>
        </button>
      </form>
      <div class="dropLang ms-3">
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-globe-europe-africa fs-3"></i>
          </button>
          <ul class="dropdown-menu bg-light dropdown-menu-lang submenuLang ">
            <li><a class="dropdown-item" href="#"></a><x-_locale lang='it'/></li>
            <li><a class="dropdown-item" href="#"></a><x-_locale lang='en'/></li>
            <li><a class="dropdown-item" href="#"></a><x-_locale lang='es'/></li>
          </ul>
        </div>
      </div>
      
      <button class="navbar-toggler border-0 ms-2 categorie" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list fs-3"></i>  
      </button>
    </div>
  </div>
</nav>

{{-- SIDERBAR --}}
<div class="offcanvas offcanvas-end RadiusCustom overflow-auto" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  @auth
  <div class="offcanvas-header flex-column position-relative">
    <div class="mx-auto">
      <a href="{{route('user.index', ['userId'=>Auth::user()->id])}}">
        @if(Auth::user()->profilePicture)
                        <img src="{{ Storage::url(Auth::user()->profilePicture) }}" alt="Generic placeholder image"
                        class="img-fluid mt-4 border-0 shadow" style="width: 180px; height: 180px; z-index: 1; border-radius: 100%;">                        
                       
                        @else
                        <img src="/media/guest.png" alt="Generic placeholder image"
                        class="img-fluid img-thumbnail mt-4 mb-2 border-0" style="width: 150px; z-index: 1">

                        @endif

        {{-- <img class="img-fluid rounded-pill" src="{{Storage::url(Auth::user()->profilePicture)}}" width="100" alt="">    --}}
      </a>
    </div>
    <div>
    <a class="text-decoration-none" href="{{route('user.index', ['userId'=>Auth::user()->id])}}">
    <h5 class="lead pt-2 fw-bold text-center">{{Auth::user()->name}}</h5>
    </a>
    </div>
    <button type="button" class="btn-close btnSideBarCustom" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div>
    <div class="offcanvas-body categorie py-3">
      <a class="navbar-brand lead fs-5 d-flex" href="{{route('user.index', ['userId'=>Auth::user()->id])}}"><i class="bi bi-person fs-3"></i></i>
        <h5 class="my-auto ms-3">{{__('ui.profilo')}}</h5>
      </a>
    </div>
    <div class="offcanvas-body categorie py-3">
      <a class="navbar-brand lead fs-5 d-flex" href="{{route('product.create')}}"><i class="bi bi-plus-circle fs-3"></i>
        <h5 class="my-auto ms-3">{{__('ui.inserisci')}}</h5>
      </a>
    </div>
    <div class="offcanvas-body categorie py-3">
      <a class="navbar-brand lead fs-5 d-flex" href="{{route('product.index')}}"><i class="bi bi-collection fs-3"></i>
        <h5 class="my-auto ms-3">{{__('ui.annunci')}}</h5>
      </a>
    </div>
    
    <div class="offcanvas-body categorie py-3">
      @if (Auth::user()->is_revisor)
      <a href="{{route('revisor.index')}}" class="navbar-brand lead fs-5 position-relative d-flex" aria-current="page">
        <i class="bi bi-bell fs-3"></i>
        <h5 class="ms-3 my-auto">{{__('ui.revisore')}}</h5>
        <span class="translate-middle badge rounded-pill bg-danger notificationCustom">
          {{App\Models\Product::toBeRevisionedCount()}}
          <span class="visually-hidden">{{__('ui.messaggi')}}</span>
        </span>
      </a>  
      @else
      <a class="navbar-brand lead fs-5 d-flex" href="{{route('user.diventaRevisore')}}"><i class="bi bi-briefcase fs-3"></i>
        <h5 class="my-auto ms-3">{{__('ui.lavora')}}</h5>
      </a>
      @endif
    </div>
    {{-- @if (Auth::user()->is_admin)
    <div class="offcanvas-body  categorie py-3">
      <a href="{{route('admin.index')}}" class="navbar-brand lead fs-5 position-relative d-flex" aria-current="page">
        <i class="bi bi-gear fs-3"></i>
        <h5 class="ms-3 my-auto">{{__('ui.zona')}}</h5>
      </a> 
    </div>
      @else 
    @endif --}}
    {{-- <div class="offcanvas-body categorie py-3">
      <a class="navbar-brand lead fs-5 d-flex" href="#"><i class="bi bi-envelope fs-3"></i>
        <h5 class="my-auto ms-3">{{__('ui.contattaci')}}</h5>
      </a>
    </div> --}}
    <div class="offcanvas-body categorie py-3">
      <a class="navbar-brand lead fs-5 d-flex" href="{{route('ourTeam')}}"><i class="bi bi-question-lg fs-3"></i>
        <h5 class="my-auto ms-3">{{__('ui.siamo')}}</h5>
      </a>
    </div>
    <div class="offcanvas-body categorie py-3">
      <a class="navbar-brand lead fs-5 d-flex" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
        <i class="bi bi-box-arrow-left fs-3"></i>
        <h5 class="my-auto ms-3">{{__('ui.esci')}}</h5>
      </a>
      <form id="form-logout" method="POST" action="{{route('logout')}}" class="d-none">@csrf</form>
    </a>
  </div>
</div>

@else

<div class="offcanvas-header d-flex position-relative mb-3">
  <div class="mx-auto">
    <a href="{{route('login')}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      <img class="img-fluid rounded-pill" src="/media/guest.png" width="100" alt="">
    </a>
    <h5 class="lead pt-2 fw-bold text-center">{{__('ui.guest')}}</h5>
  </div>
  <button type="button" class="btn-close btnSideBarCustom" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div>
  <div class="offcanvas-body categorie">
    <a class="navbar-brand lead fs-5 d-flex" href="{{route('login')}}"><i class="bi bi-person fs-3"></i>
      <h5 class="my-auto ms-3">{{__('ui.login')}}</h5>
    </a>
  </div>
  <div class="offcanvas-body categorie">
    <a class="navbar-brand lead fs-5 d-flex" href="{{route('register')}}"><i class="bi bi-box-arrow-in-right fs-3"></i>
      <h5 class="my-auto ms-3">{{__('ui.registrati')}}</h5>
    </a>
  </div>
  <div class="offcanvas-body categorie">
    <a class="navbar-brand lead fs-5 d-flex" href="{{route('product.index')}}"><i class="bi bi-collection fs-3"></i>
      <h5 class="my-auto ms-3">{{__('ui.annunci')}}</h5>
    </a>
  </div>
  {{-- <div class="offcanvas-body categorie">
    <a class="navbar-brand lead fs-5 d-flex" href="#"><i class="bi bi-envelope fs-3"></i>
      <h5 class="my-auto ms-3">{{__('ui.contattaci')}}</h5>
    </a>
  </div> --}}
  <div class="offcanvas-body categorie">
    <a class="navbar-brand lead fs-5 d-flex" href="{{route('ourTeam')}}"><i class="bi bi-question-lg fs-3"></i>
      <h5 class="my-auto ms-3">{{__('ui.siamo')}}</h5>
    </a>
  </div>
</div>
@endauth
</div>





