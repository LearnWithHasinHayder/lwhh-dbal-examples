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
        echo $conn->delete('persons',['id'=>3]);
    }
} catch ( Exception $e ) {
    echo "Failed";
}
