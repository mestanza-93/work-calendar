<?php

namespace App\Utils;

use Exception;
use App\Providers\DatabaseServiceProvider;
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\QuerySnapshot;

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
    public function __construct (string $table)
    {
       $this->connection = DatabaseServiceProvider::initConnection();
       $this->setTable($table);
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
     * Get all rows from a table
     * 
     * @return array 
     */
    public function getAll (): array
    {
        $data = [];
        $collection = $this->getCollection();
        $documents = $collection->documents();

        foreach ($documents as $doc) {
            $data[] = $doc->data();
        }

        return $data;
    }

    /**
     * Get documents filtered by field
     * 
     * @return array 
     */
    public function getByField (string $field, string $operator, mixed $value): array
    {
        $data = [];
        $collection = $this->getCollection();
        $query = $collection->where($field,  $operator, $value);
        $documents = $query->documents();

        foreach ($documents as $doc) {
            $data[] = $doc->data();
        }

        return $data;
    }

    /**
     * Get documents by document ID
     * 
     * @return array 
     */
    public function getById (array $ids): array
    {
        $data = [];
        $collection = $this->getCollection();
        $documents = $collection->documents($ids);

        Dump($documents);

        foreach ($documents as $doc) {
            $data[] = $doc->data();
        }

        return $data;
    }

}