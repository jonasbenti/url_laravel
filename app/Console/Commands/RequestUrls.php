<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RequestUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'request:RequestAllUrls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Request of all registered urls, then updates the url table in the database';

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
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
