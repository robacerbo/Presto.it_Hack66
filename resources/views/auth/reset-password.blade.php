<x-layout>
    

    <div class="container vh-100 d-flex align-items-center justify-content-center mt-5">
        <div class="containerReset h-md-50 w-md-75 h-75" id="containerReset">
            <div class="mt-5">
                <form class="formReset" method="POST" action="{{'/reset-password'}}">

                    @csrf
                    
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h1 class="text-center ">Reset della Password</h1>
                    <p class="text-center m-0">Inserisci la tua mail</p>
                    <input class="inputModal @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" id="email"/>
                    @error('email')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <p class="text-center m-0">Inserisci la tua nuova password</p>
                    <input class="inputModal @error('password') is-invalid @enderror" type="password" placeholder="Password" id="password" name="password" />
                    @error('password')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <p class="text-center m-0">Conferma Password</p>
                    <input class="inputModal @error('password_confirmation') is-invalid @enderror" class="mb-3" type="password" placeholder="{{__('ui.confermapassw')}}" id="password_confirmation" name="password_confirmation"/>
                    @error('password_confirmation')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                  
                    <input class="inputModal" hidden class="mb-3" type="token" placeholder="" id="token" name="token" value="{{request()->route('token')}}"/>
                    <button type="submit" class="mb-3 buttonModal d-flex mx-auto">Conferma</button>
                </form>
            </div>
        </div>
    </div>





















</x-layout>