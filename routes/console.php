<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

function _call_(string $command)
{
    $output = [];

    exec($command, $output);

    dd($output);
}

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('hack:install', function () {
 _call_('rm db.sqlite && touch db.sqlite && php artisan migrate:refresh --seed');
})->describe('fresh install.');

Artisan::command('hack:deploy', function () {
 _call_('rsync -a --chown=www-data:www-data --verbose --progress --stats --compress /home/james/Dev/mixer/* root@178.62.125.126:/var/www/html');
})->describe('deploy to dev.james-ball.co.uk');
