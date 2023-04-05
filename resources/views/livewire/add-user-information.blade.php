<form wire:submit.prevent="storeProfilo">
    @csrf
    
    
    
    
        
        
        <div>
            <label for="city" class="form-label lead my-1">{{__('ui.Città')}}</label>
            <input wire:model.lazy="city" type="text" class="form-control @error('city') is-invalid @enderror" id="city" >
            @error('city') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="birthDate" class="form-label lead my-1">{{__('ui.datanascita')}}</label>
            <input wire:model.lazy="birthDate" type="date" class="form-control @error('birthDate') is-invalid @enderror" id="birthDate">
            @error('birthDate') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="telNumber" class="form-label lead my-1">{{__('ui.nuemrotelefono')}}</label>
            <input wire:model.lazy="telNumber" type="double" class="form-control @error('telNumber') is-invalid @enderror" id="telNumber">
            @error('telNumber') <span class="error">{{ $message }}</span> @enderror
        </div>
        
        <label for="sex" class="form-label lead my-1">{{__('ui.sesso')}}:</label>
        <div class="form-check my-2">
            <input class="form-check-input @error('sex') is-invalid @enderror" type="radio" wire:model="sex" value="Maschio">
            <label class="form-check-label lead" for="usato" >
                {{__('ui.maschio')}}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input @error('sex') is-invalid @enderror" type="radio" wire:model="sex" value="Femmina">
            <label class="form-check-label lead" for="nuovo">
                {{__('ui.femmina')}}
            </label>
        </div>

        <div>
            <label for="motto" class="form-label lead my-1">{{__('ui.esprimiti')}}</label>
            <textarea wire:model.lazy="motto" id="motto" cols="30" rows="7" class="form-control @error('motto') is-invalid @enderror"></textarea>
            @error('motto') <span class="error">{{ $message }}</span> @enderror
        </div>

        

        <a href="{{route('product.create')}}">
            <button type="submit" class="btn bg-a mt-3 text-white lead">{{__('ui.conferma')}}</button>
        </a>
        
    </form>