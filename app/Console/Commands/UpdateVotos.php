<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Voto;

class UpdateVotos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-votos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            // Crear una nueva instancia de Votos con todos los campos
            $votos = new Voto([
                'voto' => false,
                'status' => true,
                'process' => true,
                'statusjr' => true,
            ]);

            // Guardar la relación entre el usuario y los documentos
            $user->votos()->save($votos);
        }

        $this->info('Votos statuses updated for all users.');
    }
}
