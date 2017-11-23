<?php namespace Staskjs\CommitsBehind;

class CommitsBehindController {

    public function show() {
        $branch = request('branch', 'develop');
        $type = request('type', 'local');
    }

}
