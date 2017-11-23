<?php

namespace Staskjs\CommitsBehind\Commands;

use Illuminate\Console\Command;

class CommitsBehind extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commits-behind {--branch=develop} {--type=local}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Determine number of commits that current project is behind chosen branch';

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
    }
}
