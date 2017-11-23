<?php namespace Staskjs\CommitsBehind;

class CommitsBehindController {

    public function show() {
        if (!config('app.debug')) {
            return '';
        }

        $branch = request('branch', 'develop');
        $type = request('type', 'local');

        $args = [
            '--branch' => $branch,
            '--type' => $type,
        ];

        \Artisan::call('commits-behind', $args);
        return \Artisan::output();
    }

}
