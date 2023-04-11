<x-layout>


    <div class="container vh-100 d-flex align-items-center justify-content-center mt-5">
        <div class="containerConfirm h-md-50 w-md-75 h-75" id="containerConfirm">
            <div class="form-container sign-up-container">
                <form class="formConfirm" method="POST" action="{{route('confirm-password')}}">

                    @csrf
                    <h1 class="text-center ">{{__('ui.registrati')}}</h1>
                    <input class="inputConfirm @error('password') is-invalid @enderror" type="password" placeholder="Password" id="password" name="password" />
                    @error('password')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <button class="mb-3 buttonModal d-flex ">Conferma</button>
                </form>
            </div>
        </div>
    </div>





















</x-layout>