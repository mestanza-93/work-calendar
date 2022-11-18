<?php

namespace Database\Helpers;

use Exception;
use App\Providers\DatabaseServiceProvider;
use Google\Cloud\Firestore\QuerySnapshot;
use Google\Cloud\Firestore\FirestoreClient;


class QueryBuilder 
{
    /**
     * Database connection
     * 
     * @var FirestoreClient
     */
    private FirestoreClient $connection;

    /**
     * Database table
     * 
     * @var string
     */
    private string $table = '';


    /**
     * Initialize Database Connection
     * 
     * @return Firestore $db
     */
    public function __construct ()
    {
       $this->connection = DatabaseServiceProvider::initConnection();
    }

    /**
     * Set table name
     */
    public function setTable (string $table): void
    {
        if (!empty($table) && is_string($table)) {
            $this->table = $table;
        }
    }

    /**
     * Get a collection from table name
     * 
     * @return CollectionReference $collection 
     */
    private function getCollection ()
    {
        $collection = null;

        try {
            $collection = $this->connection->collection($this->table);
            
        } catch (Exception $e) {
            throw $e;
        }

        return $collection;
    }


    /**
     * Get all data from a table
     * 
     * @return array 
     */
    public function getAll (): QuerySnapshot
    {
        $data = [];
        $collection = $this->getCollection();
        $data = $collection->documents();

        return $data;
    }

}