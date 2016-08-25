<?php namespace Deployer;

require 'recipe/laravel.php';

set('ssh_type', 'ext-ssh2');
set('default_stage', 'production');

// Set configurations
set('repository', 'git@github.com:openarmsministry/donate.git');
set('writable_dirs', ['storage']);
set('writable_use_sudo', false);
set('shared_files', ['.env']);
set('shared_dirs', [
    'storage/app',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);

task('copy:dotenv', function () {
    $sourceDotEnv = env('deploy_path') . '/.env';
    $targetDotEnv = env('deploy_path') .'/shared/.env';
    run("cp $sourceDotEnv $targetDotEnv");
})->desc('Copying .env file from file published by CI WebOps');

after('deploy:symlink', 'copy:dotenv');

// Production Server
server('prod1', 'prod.donate')
    ->configFile('/home/vagrant/.ssh/config')
    ->env('deploy_path', '/home/forge/donate.openarmsministry.org')
    ->env('stage_name', 'production')
    ->stage('production');
