<?php

// phpinfo();


/**
 * @todo Corregir dump-autoload para que coja QueryBuilder
 */

use Database\Helpers\QueryBuilder;

$queryBuilder = new QueryBuilder();

$queryBuilder->setTable('companies');
$companies = $queryBuilder->getAll();

Dump($companies);