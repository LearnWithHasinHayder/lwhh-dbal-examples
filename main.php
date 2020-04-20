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
try {
    if ( $conn->connect() ) {
        echo "Connected";
        //$result  = $conn->query("SELECT * FROM students WHERE section='A' AND class=1");
        $result = $conn->executeQuery( "SELECT * FROM students WHERE section=? AND class=?", array('A', 1) );
        /* while($data = $result->fetch()){
        print_r($data);
        } */
        print_r( $result->fetchAll() );
    }
} catch ( Exception $e ) {
    echo "Failed";
}
