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

/**
 * Main task
 */
task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'deploy:symlink',
    'cleanup',
    'artisan:cache:clear',
])->desc('Deploy your project');

after('deploy', 'success');

// Production Server
server('prod1', 'prod.donate')
    ->configFile('/home/vagrant/.ssh/config')
    ->env('deploy_path', '/home/forge/donate.openarmsministry.org')
    ->env('stage_name', 'production')
    ->stage('production');
