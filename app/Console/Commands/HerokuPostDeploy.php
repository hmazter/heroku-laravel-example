<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class HerokuPostDeploy extends Command
{
    /**
     * @var string
     */
    protected $signature = 'heroku:post-deploy';

    /**
     * @var string
     */
    protected $description = 'Command to handle post deploy actions in Heroku';

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
