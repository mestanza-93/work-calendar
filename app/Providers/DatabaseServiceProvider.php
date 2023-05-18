<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\ServiceProvider;
use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Firestore\FirestoreClient;

class DatabaseServiceProvider extends ServiceProvider
{
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
     * Initialize Firestore project
     * 
     * @return void 
     */
    public function initialize()
    {
        $storage = new StorageClient([
            'keyFilePath' => config('database.connections.firestore.credentials')
        ]);
    }

    /**
     * Get database connection
     * 
     * @return Firestore $db
     */
    public static function initConnection ()
    {
        $db = null;

        try {
            $db = new FirestoreClient([
                'projectId' => config('database.connections.firestore.project')
            ]);
        } catch (Exception $e) {
            throw $e;
        }

        return $db;
    }

}
