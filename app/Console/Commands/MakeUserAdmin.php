<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-user-admin {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rendi un utente Admin';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // CATTURIAMO L'UTENTE DA RENDERE ADMIN CON LA MAIL
        $user = User::where('email', $this->argument('email'))->first();
        // se non c'è, esce un messaggio di errore
        if(!$user){
            $this->error('Utente non trovato');
            return;
        }
        // SE C'è DIVENTA TRUE
        $user->is_admin = true;
        $user->save();
        $this->info("l'utene {$user->name} è un admin");
    }
}
