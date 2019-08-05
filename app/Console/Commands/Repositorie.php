<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Repositorie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:repositorie {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Repositorie class';


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
        $name = $this->argument('name');

        mkdir('app/Repositories/'.$name, 0777, true);

        $filename = 'app/Repositories/'.$name.'/'.$name.'Repositories.php';

        $content = 
            '<?php' . PHP_EOL .
            PHP_EOL .
            'namespace App\Repositories\\'.$name.';'. PHP_EOL .
            PHP_EOL .
            'use Illuminate\Database\Eloquent\Model;'. PHP_EOL .
            'use App\Repositories\RepositoryInterface;'. PHP_EOL .
            PHP_EOL .
            'class '.$name.'Repositorie implements RepositoryInterface {'. PHP_EOL .
              PHP_EOL .
                //
              PHP_EOL .
            '}';

        file_put_contents($filename, $content);

        $this->info('Success Make Repositories');
    }
}
