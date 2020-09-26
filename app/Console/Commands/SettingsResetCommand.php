<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SettingsResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset system settings to the one provided with UrlHum';

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
        $settings = SettingsSetCommand::defaultSettingsList();

        setting()->set($settings);
        setting()->save();

        $this->info('Settings successfully reset!');
    }
}
