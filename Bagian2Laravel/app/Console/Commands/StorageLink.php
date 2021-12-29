<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StorageLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'company:link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'company storage link';

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
		ob_start();
		$basePath = base_path();
		$from = $basePath . '/storage/app/company';
		$to = $basePath . '/public';
		$shell = "ln -s $from $to";
        $this->info("Perintah Link Storage company logo, Tes di LINUX ");
		$result =  shell_exec($shell);
		$this->info($shell);
		ob_end_clean(); 
    }
}
