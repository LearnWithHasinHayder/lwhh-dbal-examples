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
        //$statement = $conn->prepare("SELECT * FROM students WHERE section=? AND class=?");
        /* $statement->bindValue(1,'A');
        $statement->bindValue(2,1); 
        $statement->execute();
        */
        
       /*  $class = 1;
        $section = 'A';
        $statement->bindParam(1,$section);
        $statement->bindParam(2,$class); 
        $statement->execute();
        */
        //print_r($statement->fetchAll());

        
        $result  = $conn->executeQuery("SELECT * FROM students WHERE section=? AND class=?",['A',1]);
        print_r($result->fetchAll());

    }
} catch ( Exception $e ) {
    echo "Failed";
}
