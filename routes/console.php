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

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('hack:out', function () {
    $this->comment(exec('echo 1'));
})->describe('fresh install.');

Artisan::command('hack:install', function () {
    $this->comment(exec('rm db.sqlite'));
    $this->comment(exec('touch db.sqlite'));
    $this->comment(exec('php artisan migrate:refresh --seed'));
})->describe('fresh install.');

Artisan::command('hack:deploy', function () {
    $this->comment(exec('rsync -a --chown=www-data:www-data --verbose --progress --stats --compress /home/james/Dev/mixer/* root@178.62.125.126:/var/www/mixer'));
    $this->comment(exec('ssh cd /var/www/mixer/ && rm public/storage && php artisan storage:link'));
})->describe('deploy to mixer.james-ball.co.uk');
