<form wire:submit.prevent="store" enctype="multipart/form-data">
    @csrf
    
    @if (session('productCreated'))
    <div class="alert alert-success">
        {{ session('productCreated') }}
    </div>
    @endif
    
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}
        
        <div>
            <label for="name" class="form-label lead my-1">{{__('ui.nomeProdotto')}}</label>
            <input wire:model.lazy="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" >
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="brand" class="form-label lead my-1">{{__('ui.marchio')}}</label>
            <input wire:model.lazy="brand" type="text" class="form-control @error('brand') is-invalid @enderror" id="brand">
            @error('brand') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="description" class="form-label lead my-1">{{__('ui.descrizione')}}</label>
            <textarea wire:model.lazy="description" id="description" cols="30" rows="7" class="form-control @error('description') is-invalid @enderror"></textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>
        
        <div>
            <label for="price" class="form-label lead my-1">{{__('ui.prezzo')}}</label>
            <input wire:model.lazy="price" type="double" class="form-control @error('price') is-invalid @enderror" id="price">
            @error('price') <span class="error">{{ $message }}</span> @enderror
        </div>
        
        <div>
            <label for="temporary_images" class="form-label lead my-1">{{__('ui.inserisciImmagine')}}</label>
            <input name="images"  wire:model="temporary_images" type="file" multiple class="form-control @error('temporary_images') is-invalid @enderror" id="temporary_images">
            @error('temporary_images') <span class="error">{{ $message }}</span> @enderror
        </div>
        
        @if (!empty($images))
        <div class="row">
            
            <div class="col-12">
                <p class="lead pt-5 fs-3">{{__('ui.anteprima')}}</p>
                <div class="row">
                    @foreach($images as $key => $image)
                    
                    <div class="col my-3">
                        <div class="img-preview mx-auto img-fluid" style="background-image: url({{$image->temporaryUrl()}});"></div>
                        <button type="button" class="btn bg-a d-block text-white text-center mx-auto rounded-pill mt-3" wire:click="removeImage({{$key}})"><i class="bi bi-x"></i></button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        {{-- <div class="mb-3">
            <label for="bestsellers" class="form-label">I Film campioni d'incassi</label>
            <select wire:model="bestsellers" id="bestsellers" multiple class="form-control">
                @foreach($movies as $movie)
                <option value="{{$movie->id}}">{{$movie->title}}, {{$movie->director}}</option>
                @endforeach
                
            </select>
        </div> --}}
        
        {{-- INPUT --}}
        
        <div class="form-check my-2">
            <input class="form-check-input @error('usage') is-invalid @enderror" type="radio" wire:model="usage" value="usato">
            
            <label class="form-check-label lead" for="usato" >
                {{__('ui.usato')}}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input @error('usage') is-invalid @enderror" type="radio" wire:model="usage" value="nuovo">
            <label class="form-check-label lead" for="nuovo">
                {{__('ui.nuovo')}}
            </label>
        </div>
        
        <div>
            <select wire:model.defer="category" id="category" class="form-control @error('category') is-invalid @enderror">
                <option disabled class="lead my-1">{{__('ui.scegliCategoria')}}</option>
                @error('category') <span class="error">{{ $message }}</span> @enderror
                @foreach($categories as $category)
                @switch(App::getLocale())
                    @case('es')
                        <option value="{{$category->id}}">{{$category->esp}}</option>
                    @break
                    @case('en')
                        <option value="{{$category->id}}">{{$category->eng}}</option>
                    @break
                    @default
                        <option value="{{$category->id}}">{{$category->type}}</option>
                    @endswitch
                @endforeach
            </select>
        </div>
        
        
        <a href="{{route('product.create')}}">
            <button type="submit" class="btn bg-a mt-3 text-white lead">{{__('ui.conferma')}}</button>
        </a>
        
    </form>