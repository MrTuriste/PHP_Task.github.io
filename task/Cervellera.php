<head>
	<style>
/* Style the header */
header {
 background-color: #666;
 padding: 30px;
 text-align: center;
 font-size: 35px;
 color: white;
}
/* Style the footer */
footer {
 background-color: #777;
 padding: 10px;
 text-align: center;
 color: white;
}
</style>
</head>
<body>
<header>
 <h2>Friends book</h2>
</header>

<form action="Cervellera.php" method="post">
Name: <input type="text" name="name">
<input type="submit" value = "new friend">
</form>
<?php
	$filename = 'friends.txt';
	$filter = NULL;
	$name="";
	$file = fopen("friends.txt","r");
	$list_of_name  = array();
	while(!feof($file))	{
			array_push($list_of_name,fgets($file));
	}
	
	
	fclose($file);
	if(isset($_POST['name'])){
		$file = fopen("$filename", "a+");
		$name = $_POST['name'];
		array_push($list_of_name,$name);
		fwrite($file,  PHP_EOL."$name" );
		fclose($file);
		foreach ($list_of_name as $value) {
		echo "<li>".$value."</li>";
	}
	}
	echo "<h2>My friends</h2>";
	if (isset($_POST['filter'])) {
		$filter = $_POST['filter'];
		foreach ($list_of_name as $value) {
			if(strlen(strstr($value, $filter)) > 0){	
				echo "<li>".$value."<br>";

		}
	}

}
?>
<form action="Cervellera.php" method="post">
<input type="text" name="filter" value="<?=$filter?>">
<input type="submit" value='Filter list'>
</form>
<footer>
 <p>Footer</p>
</footer>
</html>
</body>