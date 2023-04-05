<x-layout>
    
    <div class="container vh-100 d-flex align-items-center justify-content-center mt-5">
        <div class="containerModal h-md-50 w-md-75 h-75" id="containerModal">
            <div class="form-container sign-up-container">
                <form class="formModal" method="POST" action="{{route('register')}}">

                    @csrf
                    <h1 class="text-center ">{{__('ui.registrati')}}</h1>
                    <div class="social-container d-flex justify-content-center text-center m-0">
                        <a href="#" class="social"><i class="bi bi-google fs-5"></i></a>
                        <a href="#" class="social"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="social"><i class="bi bi-twitter fs-5"></i></a>
                    </div>
                    <p class="text-center lead m-0">{{__('ui.latuamail')}}</p>
                    <input class="inputModal @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{__('ui.namelabel')}}" id="name"/>
                    @error('name') 
                    <span class="error text-danger">{{ $message }}</span> 
                    @enderror
                    <input class="inputModal @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" id="email"/>
                    @error('email')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <input class="inputModal @error('password') is-invalid @enderror" type="password" placeholder="Password" id="password" name="password" />
                    @error('password')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <input class="inputModal @error('password_confirmation') is-invalid @enderror" class="mb-3" type="password" placeholder="{{__('ui.confermapassw')}}" id="password_confirmation" name="password_confirmation"/>
                    @error('password_confirmation')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <button class="mb-3 buttonModal d-flex ">{{__('ui.crea')}}</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form class="formModal" method="POST" action="{{route('login')}}">
                    @csrf
                    <h1>{{__('ui.login')}}</h1>
                    <div class="social-container d-flex">
                        <a href="#" class="social"><i class="bi bi-google fs-5"></i></a>
                        <a href="#" class="social"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="social"><i class="bi bi-twitter fs-5"></i></a>
                    </div>
                    <p class="text-center lead">{{__('ui.latuamail')}}</p>
                    <input class="inputModal @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" id="email"/>
                    @error('email')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <input class="inputModal @error('password') is-invalid @enderror" type="password" placeholder="Password" id="password" name="password" />
                    @error('password')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <input class="inputModal" type="checkbox" class="form-check-input" id="remember" checked>
                    <label class="form-check-label" for="remember">{{__('ui.ricordami')}}</label>
                    <a href="#">{{__('ui.pswdimenticata')}}</a>
                    <button class="mt-2 buttonModal ">{{__('ui.accedi')}}</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>{{__('ui.accediconaccount')}}</h1>
                        <p>{{__('ui.inseriscidati')}}</p>
                        <button class="ghost border btnIntro2" id="signIn">{{__('ui.login')}}</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>{{__('ui.iscrivitiora')}}</h1>
                        <p>{{__('ui.registratipochi')}}</p>
                        <button class="ghost border btnIntro2" id="signUp">{{__('ui.registrati')}}</button>
                    </div>
                </div>
            </div>
        </div>  
        
    </div>
    
</div>
</div>
</div>

</div>           

</x-layout>