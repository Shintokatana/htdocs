<?php
$conn = pg_pconnect("dbname=postgres port=5432 user=postgres password=123456789");
if (!$conn) {
echo "Произошла ошибка.\n";
exit;
}
if (!pg_ping($conn))
  die("Соединение нарушено\n");
else{
	$query = "CREATE TABLE author (
	authorsid		int PRIMARY KEY,
    firstname       varchar(80),      
	secname			varchar(80),
    dateofb            date
	);";
	$query .= "CREATE TABLE category (
	categorysid	int PRIMARY KEY,
    name       varchar(80)
	);
	";
	$query .= "CREATE TABLE book (
	bookcat			int REFERENCES category (categorysid),
	booksid			int REFERENCES author (authorsid),
    bookname       varchar(80),
	dateofprint		date
	);
	";
	$query .= "INSERT INTO author VALUES(1, 'TestName', 'TestSecName', '1994-11-27');";
	$query .= "INSERT INTO category VALUES(1, 'TestName');";
	$query .= "INSERT INTO book VALUES (1, 1, 'TesBookName', '1994-11-27');";


	pg_query($conn, $query);
pg_close($conn);
}
?>