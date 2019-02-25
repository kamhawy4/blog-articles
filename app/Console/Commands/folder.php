<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class folder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:folder  {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create:folder and 3 file index create update';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $listing = $this->argument('name');
       mkdir('resources/views/admin/'.$listing, 0777, true);
       fopen('resources/views/admin/'.$listing.'/index.blade.php',"w");
       fopen('resources/views/admin/'.$listing.'/craete.blade.php',"w");
       fopen('resources/views/admin/'.$listing.'/show.blade.php',"w");
       fopen('resources/views/admin/'.$listing.'/edit.blade.php',"w");
       $this->info('success make folder');
    }
}
