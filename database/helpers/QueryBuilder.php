<?php

namespace Database\Helpers;

use App\Providers\DatabaseServiceProvider;

class QueryBuilder 
{
    /**
     * Database connection
     * 
     * @var Firestore
     */
    private $connection;

    /**
     * Database table
     * 
     * @var string
     */
    private string $table;


    /**
     * Initialize Database Connection
     * 
     * @return Firestore $db
     */
    public function __construct ()
    {
       self::$connection = DatabaseServiceProvider::initConnection();
    }


    public function setTable (string $table): void
    {
        if (!empty($table) && is_string($table)) {
            self::$table = $table;
        }
    }

    /**
     * Get all data from a table
     * 
     * @return array 
     */
    function getAll (): array
    {
        $data = [];

        $collection = self::$connection->collection(self::$table);
        $query = $collection->where();

        $data = $query->documents();

        return $data;
    }

}