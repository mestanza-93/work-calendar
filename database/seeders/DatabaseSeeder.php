<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Google\Cloud\Storage\StorageClient;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $storage = new StorageClient([
            'keyFilePath' => config('database.connections.firestore.credentials')
        ]);
    }
}
