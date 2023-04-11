<x-layout>
    

    <div class="container vh-100 d-flex align-items-center justify-content-center mt-5">
        <div class="containerForgot h-md-50 w-md-75 h-75" id="containerForgot">
            <div class="mt-5">
                <form class="formForgot" method="POST" action="{{'forgot-password'}}">

                    @csrf
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-success alert alert-success text-green-600">
                        {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="text-center ">Recupera la tua Password</h1>
                    <p class="text-center m-0">Inserisci la tua mail</p>
                    <input class="border inputModal @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" id="email"/>
                    @error('email')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <button class="mb-3 buttonModal d-flex mx-auto">Conferma</button>
                </form>
            </div>
        </div>
    </div>





















</x-layout>