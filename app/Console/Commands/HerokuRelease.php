<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class HerokuRelease extends Command
{
    /**
     * @var string
     */
    protected $signature = 'heroku:release';

    /**
     * @var string
     */
    protected $description = 'Command to handle release actions in Heroku';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->migrateDatabase();
    }

    private function migrateDatabase(): void
    {
        $this->info('Migrating database...');
        Artisan::call('migrate', ['--force' => true]);
    }
}
