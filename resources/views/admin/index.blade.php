<x-layout>
  <x-header>
      <div class="container">
          <div class="row justify-content-center mt-5">
              <div class="col-12 col-md-8 mt-5">
                  <h1 class="bg-dark RadiusCustom fw-bold display-4 text-white">Zona ADMIN</h1>
              </div>
          </div>
      </div>
  </x-header>
  
  @if (session('productAccepted'))
  <div class="alert alert-dark d-flex align-items-center">
      {{ session('productAccepted') }}
  </div>
  @endif
  @if (session('productRejected'))
  <div class="alert alert-dark d-flex align-items-center">
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
                  <h2 class="text-center ps-3">Operazioni</h2>
                  <form class="ps-4 text-center" action="{{route('revisor.undo_product')}}" method="POST">
                      @csrf
                      @method('PATCH')
                      <button type="submit" class="btn bg-a text-white">Annulla operazione</button>
                  </form>
              </div>
              <div class="d-flex justify-content-between">
                  <p class="lead fs-4">Revisori attuali: 0</p>
                  <p class="lead fs-4">Revisori in sospeso: 0</p>
                  <p class="lead fs-4">Revisori licenziati: 0</p>
              </div>
          </div>
      </div>
      
      <div class="row justify-content-center mb-5">
          <div class="col-12 col-md-10">
              <div class="accordion" id="accordionExample">
                  {{-- @foreach ($product_to_check as $item) --}}
                  <div class="accordion-item">
                      <div class="accordion-header d-flex align-items-center">
                          <form action="" method="POST">
                              @csrf
                              @method('PATCH')
                              <button type="submit" class="btn bg-a m-2 py-2 px-3 text-white">
                                  <i class="fs-5 bi bi-check-lg"></i>
                              </button>
                          </form>
                          <form action="" method="POST">
                              @csrf
                              @method('PATCH')
                              <button type="submit" class="btn bg-dark m-2 py-2 px-3 text-white">
                                  <i class="fs-5 bi bi-x-lg"></i>
                              </button>
                          </form>
                          <button class="accordion-button lead fs-5 text-black" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <h2 class="fw-light">Revisore | Nome Revisore</h2>
                          </button>
                      </div>
                      <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body d-flex">
                              <div id="carouselExample" class="carousel slide" width=50>
                                  <div class="carousel-inner">
                                      {{-- @if ($item->images)
                                      @foreach ($item->images as $image) --}}
                                      <div class="carousel-item active">
                                          <img src="" class="card-img-top p-3 rounded" alt="">
                                      </div>
                                      {{-- @endforeach
                                      @endif --}}
                                  </div>
                                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                  </button>
                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                  </button>
                              </div>
                              <div class="d-block">
                                  <h4 class="px-3 pb-1">Nome Revisore</h4>
                                  <p class="px-3 pb-1 lead">Descrizione</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  {{-- @endforeach --}}
              </div>
          </div>
      </div>
  </div>
</div>
</x-layout>