<?php
require "vendor/autoload.php";
$connectionParams = array(
    'dbname'   => 'lwhh_php_db07',
    'user'     => 'local',
    'password' => 'local',
    'host'     => '127.0.0.1',
    'driver'   => 'mysqli',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection( $connectionParams );
$qb = $conn->createQueryBuilder();
try {
    if ( $conn->connect() ) {
        $qb->select('*')->from('students')->setMaxResults(10);
        echo $qb->getSQL().PHP_EOL;
        $result = $qb->execute()->fetchAll();
        print_r($result);
    }
} catch ( Exception $e ) {
    echo $e->getMessage();
    echo "Failed";
}
