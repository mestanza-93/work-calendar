<?php

// phpinfo();

use Google\Cloud\Storage\StorageClient;

$storage = new StorageClient([
    'keyFilePath' => config('database.connections.firestore.credentials')
]);
// $storage = new StorageClient([
//     'projectId' => config('database.connections.firestore.project')
// ]);

Dump($storage);

use Google\Cloud\Firestore\FirestoreClient;
$db = new FirestoreClient();

Dump($db);

$users = $db->collection('users');
$query = $users->where('name',  '=', 'Pablo');
$response = $query->documents();

Dump($response);


?>