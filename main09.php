<?php
require "vendor/autoload.php";
$connectionParams = array(
    'dbname'   => 'shoutbox',
    'user'     => 'local',
    'password' => 'local',
    'host'     => '127.0.0.1',
    'driver'   => 'mysqli',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection( $connectionParams );
$qb = $conn->createQueryBuilder();
try {
    if ( $conn->connect() ) {
        
        $qb->select('s.*')
        ->from('status','s')
        ->join('s','friends','f','s.user_id = f.friend_id AND f.user_id = ?')
        ->orderBy('s.user_id','ASC')
        // ->join('s','friends','f','s.user_id = f.friend_id')
        // ->where('f.user_id = ?')
        ->setParameter(1,1);

        echo $qb->getSQL().PHP_EOL;
        print_r($qb->execute()->fetchAll());
    }
} catch ( Exception $e ) {
    echo $e->getMessage();
    echo "Failed";
}
