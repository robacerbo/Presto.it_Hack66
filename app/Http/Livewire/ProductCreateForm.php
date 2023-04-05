<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\AddWatermark;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductCreateForm extends Component
{
    use WithFileUploads;
    
    public $name, $brand, $description, $price, $usage, $images = [], $temporary_images, $product;
    
    public $category;
    
    
    protected $rules =[
        'name' => 'required|min:2',
        'brand' => 'required|min:2',
        'description' => 'required',
        'price' => 'required|numeric',
        'usage' => 'required',
        'category' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
        'temporary_images' => 'required',
    ];
    
    protected $messages = [
        'name.required' => 'Il campo nome non puo essere vuoto.',
        'name.min' => 'Il tuo nome deve essere almeno di due caratteri.',
        'brand.required' => 'Il campo marchio non puo essere vuoto.',
        'brand.min' => 'Il tuo marchio deve essere almeno di due caratteri.',
        'description.required' => 'Il campo descrizione non puo essere vuoto.',
        'price.required' => 'Inserisci il prezzo del tuo prodotto',
        'price.numeric' => 'Il prezzo deve essere numerico',
        'usage.required' => 'Inserisci in che condizione è il tuo prodotto',
        'category.required' => 'Inserisci la categoria',
        'images.*.required' => 'Inserisci un\'immagine',
        'images.*.image' => 'L\'immagine deve essere un immagine',
        'images.*.max' => 'L\'immagine deve essere massimo un 1MB',
        'temporary_images.*.image' => 'L\'immagine deve essere un immagine',
        'temporary_images.*.max' => 'L\'immagine deve essere massimo un 1MB',
        'temporary_images.required' => 'Inserisci un\'immagine',
       
    ];
    
    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*'=>'required|image|max:1024',
            'temporary_images' => 'required',
            ])) {
                foreach ($this->temporary_images as $image) {
                    $this->images[] = $image;
                }
            }
        }
        
        public function removeImage($key){
            if (in_array($key, array_keys($this->images))) {
                unset($this->images[$key]);
            }
        }
        
                    
                    public function updated($propertyName)
                    {
                        $this->validateOnly($propertyName);
                    }
                    
                    
                    
                    public function store(){
                        
                        $this->validate();
                        
                        $this->product = Category::find($this->category)->products()->create($this->validate());
                        $this->product->user()->associate(Auth::user());
                        $this->product->save();
                        if(count($this->images)){
                            foreach ($this->images as $image){
                                // $this->product->images()->create(['path'=>$image->store('images','public')]);
                                $newFileName = "products/{$this->product->id}";
                                $newImage = $this->product->images()->create(['path'=>$image->store($newFileName,'public')]);
                                

                                RemoveFaces::withChain([
                                    // new AddWatermark($newImage->id), job non più usato ma messo nel Resize
                                    new ResizeImage($newImage->path, 400, 400),
                                    new ResizeImage($newImage->path, 600, 400),
                                    new GoogleVisionSafeSearch($newImage->id),
                                    new GoogleVisionLabelImage($newImage->id),
                                ])->dispatch($newImage->id);
                                //dispatch(new ResizeImage($newImage->path, 800, 800));
                                //dispatch(new ResizeImage($newImage->path, 800, 600));

                            }
                            File::deleteDirectory(storage_path('/app/livewire-tmp'));
                            
                        }     
                        
                        // $category = Category::find($this->category);
                        // $category->products()->create([
                            //     'name' => $this->name,
                            //     'brand' => $this->brand,
                            //     'description' => $this->description,
                            //     'price' => $this->price,
                            //     'usage' => $this->usage,
                            //     'user_id' => Auth::user()->id,
                            // ]);
                            
                            session()->flash('productCreated', 'Il tuo annuncio è stato inserito correttamente, sarà cura dei nostri revisori controllarlo prima di essere pubblicato');
                            $this->reset();
                            
                        }
                        
                        public function render()
                        {
                            return view('livewire.product-create-form');
                        }
                    }
