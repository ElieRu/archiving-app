@servers('archiving' => ['user@127.0.0.1']);

@task('restart-queues', ['on' => 'archiving'])
    cd /home/user/example.com
    php artisan queue:restart
@endtask

