<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'mysql:host=127.0.0.1:3306;dbname=yii2project_test';
$db['username'] = 'root'; // for travis-ci use: 'root' or 'travis' for less privileges.

return $db;
