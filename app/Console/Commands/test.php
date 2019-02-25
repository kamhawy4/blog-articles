<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Tag;
class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create user email:admin2@admin.com pass:123456';

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
    public function handle(Tag $tag)
    {
        $tag->name     = 'tag';
        $tag->slug     = 'tag-tag';
        $tag->save();
    }
}
