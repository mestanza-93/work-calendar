<?php

use Database\Helpers\QueryBuilder;

$queryBuilder = new QueryBuilder();

$queryBuilder->setTable('companies');
$companies = $queryBuilder->getAll();

Dump($companies);