<x-layout>
    <x-header>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-8 mt-5">
                    <h1 class="mt-5 tx-a fw-bold display-4 hidden">{{__('ui.Diventa Revisore')}}</h1>
                </div>
            </div>
        </div>
    </x-header>

    <div class="container-fluid">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-5 order-last order-md-first hidden-left">
                <div class="h-100 p-5 pb-3 text-white text-shadow-1 prestoBackgroundAnimate RadiusCustom">
                    <img src="/media/prestowhite.png" width="300" alt="">
                    <h3 class="my-5 display-6 lh-1 fw-bold">{{__('ui.titolocard')}}</h3>
                    <p class="my-5"><strong>1. {{__('ui.titolo1formRev')}} </strong> - {{__('ui.desc1formRev')}}</p>
                    <p class="my-5"><strong>2. {{__('ui.titolo2formRev')}} </strong> - {{__('ui.desc2formRev')}} </p>
                    <p class="my-5"><strong>3. {{__('ui.titolo3formRev')}} </strong> - {{__('ui.desc3formRev')}} </p>
                  </div>
            </div>

            <div class="col-12 col-md-5 border shadow RadiusCustom stickyForm2 hidden-right">
                <form id="contactForm" class="w-100 contactFormAni" method="GET" action="{{route('become.revisor')}}">
                    @csrf
                    
                    <div class="my-3">
                        <label class="form-label lead " for="name">{{__('ui.camponome')}}</label>
                        <input class="form-control ff-m lead @error('name') is-invalid @enderror" id="name" name="name" type="text" data-sb-validations="required" value="{{ old('name') }}" />
                        <div class="invalid-feedback bg-alert" data-sb-feedback="name:required">{{__('ui.errorenome')}}</div>
                        
                    </div>
                    
                    <div class="my-3">
                        <label class="form-label lead" for="email">{{__('ui.campoemail')}}</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" data-sb-validations="required, email" value="{{ old('email') }}" />
                        <div class="invalid-feedback bg-alert" data-sb-feedback="emailAddress:required">{{__('ui.erroreemail')}}</div>
                        
                    </div>
                    
                    <div class="my-3">
                        <label class="form-label lead" for="message">{{__('ui.parlacidite')}}</label>
                        <textarea class="form-control  @error('message') is-invalid @enderror" id="message" name="message" type="text" style="height: 10rem;" data-sb-validations="required" value="{{ old('message') }}"></textarea>
                        <div class="invalid-feedback bg-alert" data-sb-feedback="message:required">{{__('uierroreparlaci.')}}</div>
                    </div>
                    {{-- PHP INLINE PER RICEZIONE MESSAGGIO --}}
                    <div>
                        @if (isset ($_GET[ 'message']))
                            @php
                                $reason = $_GET['message'];
                                echo "<p>$reason</p>";
                            @endphp
                        @endif
                    </div>
                    
                    <div>
                        <button class="btn bg-a mt-3 text-white lead">{{__('ui.inviarichiesta')}}</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</x-layout>