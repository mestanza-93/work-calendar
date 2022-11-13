<?php

namespace App\Providers;

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

    public function initialize()
    {
        
    }

    public function connect()
    {
        $storage = new StorageClient([
            'keyFilePath' => config('database.connections.firestore.credentials')
        ]);

        $db = new FirestoreClient();

        return $db;
    }



}
