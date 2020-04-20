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
        $query = "SELECT * FROM students WHERE section='A' AND class=1";
        // $data = $conn->fetchArray($query);
        // $data = $conn->fetchAssoc($query);

        $query= "SELECT count(*) FROM students WHERE section='A' AND class=1";
        $data= $conn->fetchColumn($query);
        print_r($data);
    }
} catch ( Exception $e ) {
    echo "Failed";
}
