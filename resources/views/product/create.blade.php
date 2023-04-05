{{-- <x-layout>
    <x-header>
      <h1 class="mt-5 tx-a fw-bold">Inserisci Annuncio</h1>
    </x-header>


    <div class="container-fluid">
        <div class="row justify-content-center my-5">
            <div class="col-12 col-md-6 border shadow p-3"> 

                @livewire('product-create-form')

            </div>
        </div>
    </div>
</x-layout>
 --}}

 <x-layout>
    <x-header>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-8 mt-5">
                    <h1 data-aos="zoom-out" data-aos-duration="700" class="RadiusCustom fw-bold display-4 tx-a">{{__('ui.inserisciCreate')}}</h1>
                </div>
            </div>
        </div>
    </x-header>

    <div class="container-fluid ">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-5 order-last order-md-first stickyForm hidden-left">
                <div class="h-100 p-5 pb-3 text-white text-shadow-1 prestoBackgroundAnimate RadiusCustom">
                    <img src="/media/prestowhite.png" width="300" alt="">
                    <h3 class="my-5 display-6 lh-1 fw-bold">{{__('ui.seguiconsigli')}}</h3>
                    <h4>{{__('ui.scattafoto')}}</h4>
                    <p class="lead">1. {{__('ui.scattafotodesc')}}</p>
                    <h4>{{__('ui.scegliprezzo')}}</h4>
                    <p class="lead">2. {{__('ui.scegliprezzodesc')}}</p>
                    <h4>{{__('ui.scriviannuncio')}}</h4>
                    <p class="lead">3. {{__('ui.scriviannunciodesc')}}</p>
                  </div>
            </div>

            <div class="col-12 col-md-5 border shadow p-3 RadiusCustom hidden-right"> 
                @livewire('product-create-form')
            </div>
        </div>
    </div>
</x-layout>