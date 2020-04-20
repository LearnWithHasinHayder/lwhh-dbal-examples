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
        $qb->select("*")
        ->from('students')
        ->where('class=? and section=?')
        ->orWhere('class=? and section=?')
        ->setParameter(1,1)
        ->setParameter(2,'A')
        ->setParameter(3,2)
        ->setParameter(4,'B');

        echo $qb->getSQL().PHP_EOL;
        print_r($qb->execute()->fetchAll());
    }
} catch ( Exception $e ) {
    echo $e->getMessage();
    echo "Failed";
}
