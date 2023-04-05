<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteRevisorRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-revisor-role {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Toglie il ruolo revisore ad un utente';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // CATTURIAMO L'UTENTE CON LA MAIL
        $user = User::where('email', $this->argument('email'))->first();
        // se non c'è, esce un messaggio di errore
        if(!$user){
            $this->error('Utente non trovato');
            return;
        }
        // SE C'è DIVENTA TRUE
        $user->is_revisor = false;
        $user->save();
        $this->info("l'utene {$user->name} non è più un Revisore");
    }
}
