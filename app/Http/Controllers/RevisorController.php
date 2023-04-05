<?php

namespace App\Http\Controllers;

// C'è UN ALTERNATIVA SULL'IMPORT DI USER
use App\Models\User;
use App\Models\Product;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    
    public function index(){
      
        $product_to_check = Product::where('is_accepted', null)->orderBy('created_at', 'DESC')->get();
   
        return view('revisor.index', compact('product_to_check'));
    }
    
    public function acceptProduct(Product $product){
        $product->setAccepted(true);
        return redirect()->back()->with('productAccepted', 'Complimenti,hai accettato l\'annuncio');
    }
    
    public function rejectProduct(Product $product){
        $product->setAccepted(false);
        return redirect()->back()->with('productRejected', 'Complimenti,hai rifiutato l\'annuncio');
    }

    public function undoProduct(){

        // $product_checked = Product::latest('updated_at')->where('is_accepted', "!=", null)->first();
        $product_checked = Product::where('is_accepted', "!=", null)->orderBy('updated_at', 'DESC')->first();
        if($product_checked){
            $product_checked->setAccepted(null);
            return redirect()->back()->with('productUndo', 'Attenzione, hai annullato l\'ultima operazione');
        } else{
            return redirect()->back()->with('productUndo2', 'Attenzione, non ci sono operazione da annullare');
        }
    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect('/')->with('messageBecome', 'Grazie per averci contattato, le faremo sapere');
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ["email"=>$user->email]);
        return redirect('/')->with('messageMake', 'Complimenti, l\'utente è diventato un revisore');
    }

    public function deleteRevisor(User $user){
        Artisan::call('app:delete-revisor-role', ["email"=>$user->email]);
        return redirect('/')->with('messageDelete', 'Complimenti, l\'utente non è più un revisore');
    }
}
