<?php

namespace Staskjs\CommitsBehind\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

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
        $branch = $this->option('branch');
        $type = $this->option('type');

        if ($type == 'local') {
            $behind = $this->getLocalBehind($branch);
        }
        else if ($type == 'cap') {
            $behind = $this->getCapBehind($branch);
        }

        $this->info("{$behind} commits behind");
    }

    private function getBehind($dir, $branch) {
        $behindProcess = new Process("git -C {$dir} rev-list --count {$branch}..HEAD");
        $behindProcess->run();
        $behind = trim($behindProcess->getOutput());
        if ($behind == '') {
            throw new \Exception('Cannot get number of commits behind');
        }
        return $behind;
    }

    private function getLocalBehind($branch) {
        return $this->getBehind('.', $branch);
    }

    private function getCapBehind($branch) {
        return $this->getBehind('../repo', $branch);
    }
}
