<x-layout>


    <x-header>
    <div class="container mt-5 pt-5">
        <div class="row mt-5">
            <div class="col-md-8 col-sm-12 mx-auto">
                <div class="card py-4">
                    <div class="card-body">
                    
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success text-center">Una mail è stata inviata al tuo indirizzo per verificare il tuo account</div>
                        @endif
                        <div class="text-center mb-5">
                            
                            <h3>Verifica il tuo indirizzo e-mail</h3>
                            <p>Devi verificare il tuo indirizzo email per accedere a questa pagina.</p>
                        </div>
                        <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                            @csrf
                            <button type="submit" class="btn btn-primary">Reinvia la mail di verifica</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-header>




</x-layout>