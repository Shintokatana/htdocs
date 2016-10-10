 <?php

 $app->post('/create', function (Silex\Application $app, Symfony\Component\HttpFoundation\Request $request){
  $conn = pg_pconnect("dbname=postgres port=5432 user=postgres password=123456789");
     $row[0] = $request->get('id');
     $row[1] = $request->get('name');
     $row[2] = $request->get('secname');
     $row[3] = $request->get('date');
     
	$query = "INSERT INTO author VALUES('$row[0]','$row[1]','$row[2]','$row[3]')";
	pg_query($conn, $query);
     $created = array(
         'author2' => array(
				'id' => $row[0],
				'Name'=> $row[1],
				'SecName' => $row[2],
				'Date' => $row[3],
         )
     );
     return new Symfony\Component\HttpFoundation\Response(json_encode($created));
 });