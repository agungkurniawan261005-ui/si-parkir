<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$users = DB::table('users')->select('nama', 'avatar_url')->get();
foreach ($users as $u) {
    echo $u->nama . ' => ' . $u->avatar_url . PHP_EOL;
}
