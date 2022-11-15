<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Firestore\FirestoreClient;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * The database project for the application.
     * 
     * @var string|null
     */
    // private $projectId = config('database.connections.firestore.project');

    /**
     * The database credentials for the application.
     * 
     * @var string|null
     */
    // private $credentials = config('database.connections.firestore.credentials');

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */

    public function boot()
    {
        $this->initialize();
    }


    /**
     * Initializate project connection
     * 
     * @return void 
     */
    public function initialize()
    {
        Dump('Hola');
        $storage = new StorageClient([
            'keyFilePath' => env('GOOGLE_APPLICATION_CREDENTIALS')
            // 'keyFilePath' => config('database.connections.firestore.credentials')
        ]);
        Dump($storage);
    }

}
