<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require('dbboardconnect.php');

$stmt = $mysqli->query("SELECT * FROM publishing_news ORDER BY id DESC");

if($stmt->num_rows == 0){
	
	echo 'Nenhuma postagem no banco de dados';
	
}else{
	
	while($row = $stmt->fetch_array(MYSQLI_ASSOC)){
		$id = $row['id'];
		$title = $row['title'];
		$desc_code = $row['desc_code'];
		$img = $row['img'];
		$autor = $row['autor'];
		$data_dia = $row['data_dia'];
		$data_mes = $row['data_mes'];
		$data_ano = $row['data_ano'];
		
		if($img == '' || $img == null){
			echo '<script>
				
				document.querySelector("#hf-pbi-<?php echo $id; ?>").remove();
				
			</script>';
		}else{
			
		}
		
	}
}

echo '<script>window.location.href("https://forbiddenseries.net/");</script>';