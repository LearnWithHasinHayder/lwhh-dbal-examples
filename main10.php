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
        /* $qb->insert('persons')
        ->values(['name'=>'?','email'=>'?'])
        ->setParameter(1,'Jimmy Doe')
        ->setParameter(2,'jimmy@doe.com')
        ->execute(); */

        /* $qb->update('persons')
        ->set('email','?')
        ->where('id = ?')
        ->setParameter(1,'jimmy@jimmy.com')
        ->setParameter(2,5)
        ->execute(); */

        $qb->delete('persons')
        ->where('id = ?')
        ->setParameter(1,5)
        ->execute();
        

    }
} catch ( Exception $e ) {
    echo $e->getMessage();
    echo "Failed";
}
