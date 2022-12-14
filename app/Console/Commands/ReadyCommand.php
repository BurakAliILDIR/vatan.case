<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ReadyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ready';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Uygulamayı kurar.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');
        Artisan::call('optimize');

        dump("Uygulama kurulumu başarılı.");
        return Command::SUCCESS;
    }
}
