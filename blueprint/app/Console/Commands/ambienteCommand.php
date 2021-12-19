<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ambienteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ambiente:trabajo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commando para ambiente de trabajo listo';

    

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Artisan

        return Command::SUCCESS;
    }
}
