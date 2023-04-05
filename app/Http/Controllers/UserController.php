<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\AvatarRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
{
    $this->middleware('auth')->except('showProfile');
}

public function requestRevisor(){
    return view('user.diventaRevisore');
}
    // // PARAMETRO OPZIONALE
    // public function index(User $user = NULL)
    // {
        // if(!$user){
        //     $products = Product::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        // }else{
        //     $products = Product::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        // }


        // return view('user.index', compact('products'));
    // }

    // IN QUALCHE MODO HA FUNZIONATO, solo per utenti loggati
    public function showProfile($userId)
{

    $user = User::findOrFail($userId);
     // $products = Product::where('user_id', $user->id)->get();
     $products = Product::where('user_id', $user->id)->orderBy('created_at', 'DESC')->paginate(12);

    // if(Auth::user()){
    //     if (Auth::user()->id && $userId) {
    //         $user = User::findOrFail($userId);
    //         $products = Product::where('user_id', $user->id)->get();
    //     } else {
    //         $user = Auth::user();
    //         $products = Product::where('user_id', $user->id)->get();
    //     }
    // }
    

    return view('user.index', ['user' => $user, 'products' => $products]);
}
    
     // GESTISCI IL REQUIRED DEL CAMPO UPDATE NEL FORMA DENTRO L'index.blade
     public function changeAvatar(User $user, AvatarRequest $request){
        // $validated = $request->validate([
        //     'profilePicture' => 'required|image|max:1024',
        // ]);
    
        $user->update([
            'profilePicture' => $request->file('profilePicture')->store('public/avatar')
        ]);
        return redirect()->back()->with('avatarUpdated', 'Complimenti hai aggiornato il tuo avatar');
    }
    
    public function updateInfo()
    {
        return view('user.update');

    }
}

