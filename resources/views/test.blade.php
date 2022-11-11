<?php

phpinfo();

use Google\Cloud\Storage\StorageClient;

$storage = new StorageClient([
    'projectId' => config('app.gcloudProject')
]);

Dump($storage);

use Google\Cloud\Firestore\FirestoreClient;
// $firestore = new FirestoreClient();

// Dump($firestore);

?>