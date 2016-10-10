<?php
 require_once __DIR__.'/vendor/autoload.php';
 use Symfony\Component\HttpFoundation\Request;
  $conn = pg_pconnect("dbname=postgres port=5432 user=postgres password=123456789");
if (!$conn) {
    echo "Произошла ошибка.\n";
    exit;
}
 else{
	 $app = new Silex\Application();
	 $app['debug'] = true;
	 $result = pg_query($conn, "SELECT authorsid, firstname	,secname, dateofb FROM author");
	 
		if(!$result){
			echo "Error. \n";
			exit;
		}
		while ($row = pg_fetch_row($result)){
				$authors = array(
					'author' => array(
						'id' => $row[0],
						'Name'=> $row[1],
						'SecName' => $row[2],
						'Date' => $row[3],
					),
				);
			}
	require(__DIR__ . '/post.php');
	require(__DIR__ . '/get.php');
	require(__DIR__ . '/put.php');
   // require(__DIR__ . '');



$app->run();
  }?>