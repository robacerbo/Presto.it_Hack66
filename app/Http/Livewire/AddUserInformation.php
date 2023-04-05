<?php

namespace App\Http\Livewire;

use App\Models\Info;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddUserInformation extends Component
{
    public $user_id, $city, $telNumber, $birthDate, $motto, $sex, $create;

    

    protected $rules = [
       
        'city' => 'required',
        'telNumber' => 'required',
        'birthDate' => 'required',
        'motto' => 'required',
        'sex' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function storeProfilo(){
        $this->validate();
        $user = Auth::user();
        $info = $user->infos();
        if($this->create == false){
            $info->update([
                'city' => $this->city,
                'telNumber' => $this->telNumber,
                'birthDate' => $this->birthDate,
                'motto' => $this->motto,
                'sex' => $this->sex,
            ]);
            return redirect(route('user.index', ['userId'=>Auth::user()->id]))->with('infoCreated', 'Hai correttamente aggiornato il tuo profilo');
        } elseif($this->create == true){
            $info->create([
                'city' => $this->city,
                'telNumber' => $this->telNumber,
                'birthDate' => $this->birthDate,
                'motto' => $this->motto,
                'sex' => $this->sex,
            ]);
            $this->create = false;
            return redirect(route('user.index', ['userId'=>Auth::user()->id]))->with('infoCreated', 'Hai correttamente aggiornato il tuo profilo');

        }
        // QUESTI MESSAGGI FLASHATI CON livewire, SONO GESTIBILI SOLO ALL'INTERNO DI UN COMPONENTE LW
        // RICHIAMIAMO LA FUNZIONE PER SVUOTARE I CAMPI DOPO L'INSERIMENTO
        // $this->cleanForm();
    }


    public function mount()
{
    // dd(Auth::user()->infos);
   if(Auth::user()->infos()->exists()){
    $this->create = false;
   } else{
    $this->create = true;

   }
}

    public function render()
    {
        return view('livewire.add-user-information');
    }
}