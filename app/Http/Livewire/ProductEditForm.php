<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductEditForm extends Component
{
    
    public $name, $brand, $description, $price, $temporary_images, $images = [], $usage, $category_id, $type, $is_accepted;
    public $product;
    public $category;

    protected $rules =[
        'name' => 'required|min:2',
        'brand' => 'required|min:2',
        'description' => 'required',
        'price' => 'required|numeric',
        'usage' => 'required',
        'category' => 'required',
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
       
    ];
    
    public function update(){
            $this->validate();
            $this->product->setAccepted(null);
            $this->product->update([
                'name' => $this->name,
                'brand' => $this->brand,
                'description' => $this->description,
                'price' => $this->price,
                'usage' => $this->usage,
                'category_id' => $this->category,

            ]);

            session()->flash('productUpdate', 'Hai aggiornato correttamente l\'annuncio, sarà cura nostri revisori controllarlo prima di essere pubblicato');
        

    }

   

    
    public function mount(){
        $existingImages = $this->product->images; // Assume che il campo "images" sia un array di URL di immagini esistenti
        $this->images = [];

        foreach ($existingImages as $image) {
        $this->images[] = [
            'url' => $image,
            'temporary' => false
        ];

        $this->name = $this->product->name;
        $this->brand = $this->product->brand;
        $this->description = $this->product->description;
        $this->price = $this->product->price;
        $this->usage = $this->product->usage;
        $this->category = $this->product->category->id;

        
    }
    
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('productDeleted', 'Hai eliminato l\'annuncio');
    }


    public function render()
    {
        return view('livewire.product-edit-form');
    }

}
