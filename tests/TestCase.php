<?php

namespace Freefall\Follow\Test;

use CreateLikesTable;
use CreateUsersTable;
use Illuminate\Filesystem\Filesystem;

class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    public function createApplication()
    {
        $app = require __DIR__ . '/../vendor/laravel/laravel/bootstrap/app.php';
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
//
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite.database', ':memory:');

        return $app;
    }

//
    protected function setUp(): void
    {
        parent::setUp();


        $this->app['config']->set('follow.user_model', User::class);
//        if (empty($this->config)) {
//            $this->config = require __DIR__ . '/../config/follow.php';
//        }

//        $this->app['config']->set('follow', $this->config);
//        $this->app['config']->set('follow.user_model', User::class);
        $this->migrate();
        $this->seed();
    }

//
    public function migrate()
    {
//        $fileSystem->requireOnce(  __DIR__ . '/database/migrations/);
        $fileSystem = new Filesystem();
//
        $fileSystem->copy(
            __DIR__ . '/../database/migrations/create_likes_table.php',
            __DIR__ . '/database/migrations/create_likes_table.php'
        );
//
        foreach ($fileSystem->files(__DIR__ . '/database/migrations') as $file) {
            $fileSystem->requireOnce($file);
        }
//
//        (new \CreateLaravelFollowTables())->up();
        (new CreateUsersTable())->up();
        (new CreateLikesTable())->up();
//        (new \CreateOthersTable())->up();
//        (new \CreateOthersTable())->up();
    }

    public function seed($classname = null)
    {
        User::create(['name' => 'John']);
        User::create(['name' => 'Allison']);
        User::create(['name' => 'Ron']);

//        Other::create(['name' => 'Laravel']);
//        Other::create(['name' => 'Vuejs']);
//        Other::create(['name' => 'Ruby']);
    }

}
