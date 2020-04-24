<?php 
 session_start();

	$db = new PDO('mysql:host=localhost;dbname=pfe','root','root');
	
	

	$req = $db->query('SELECT id FROM livre');

	$nbre_total_articles = $req->rowCount();

	$nbre_articles_par_page = 1;

	$nbre_pages_max_gauche_et_droite = 3;

	$last_page = ceil($nbre_total_articles / $nbre_articles_par_page);

	if(isset($_GET['page']) && is_numeric($_GET['page'])){
		$page_num = $_GET['page'];
	} else {
		$page_num = 1;
	}

	if($page_num < 1){
		$page_num = 1;
	} else if($page_num > $last_page) {
		$page_num = $last_page;
	}

	$offset = ($page_num - 1) * $nbre_articles_par_page ;
	
   
	//Cette requête sera utilisée plus tard
	$sql = 'SELECT * FROM livre ORDER BY id LIMIT '.$offset.' , '.$nbre_articles_par_page.' ';

	$pagination = " ";

	if($last_page != 1){
		if($page_num > 1){
			$previous .= $page_num-1;
			$pagination .= '<a href="page.php?page='.$previous.'">Précédent</a>';

			for($i=$page_num-$nbre_pages_max_gauche_et_droite; $i<$page_num; $i++){
				if($i > 0){
					$pagination .= '<a href="page.php?page='.$i.'">'.$i.'</a>';
				}
			}
		}

		$pagination .= '<span class="active">'.$page_num.'</span>';

		for($i=$page_num+1; $i <= $last_page; $i++){
			$pagination .= '<a href="page.php?page='.$i.'">'.$i.'</a> ';
			
			if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
				break;
			}
		}

		if($page_num != $last_page){
			$next .= $page_num + 1;
			$pagination .= '<a href="page.php?page='.$next.'">Suivant</a> ';
		}
	}

	?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pagination PHP</title>
		<meta charset="UTF-8" />
		<style>
			
		body{
			width: 900px;
			margin: 15px auto;
			font-family: "Trebuchet MS", Arial, sans-serif;
		}

		h1{
			background-color: #000080;
			text-align: center;
			border-radius: 5px;
			color: #FFF;
			box-shadow: 5px 2px 3px #000;
			font-style: italic;
			
			padding: 10px;
		}

		a, a:visited{
			color: blue;
		}

		#pagination{
			background-color: #eaeaea;
			padding: 10px;
		}

		#pagination .active{
			background-color: #012;
			color: #FFF;
			padding: 0px 5px 0px 5px;
			border-radius: 20%;
		}

		.post{
			background-color: #FFEFD5;
			margin-bottom: 30px;
			padding-left: 10px;
			padding-right: 10px;
			border-radius: 4px;
			padding-bottom: 40px;
			padding-top: 20px;
			text-align: center;
		}

		

		.h2 {
    font-size: 2.5em;
    color: #000080;
    line-height: 2em;
    
   
    background-color: #D3D3D3;
}

.h3{
	color: #4682B4;
}





		</style>
	</head>
	<body>
		<h1>Courses details</h1>
		 <?php 
		 	echo "<p><strong>($nbre_total_articles)</strong> articles au total !<br/>";
			echo "Page <b>$page_num</b> sur <b>$last_page</a>";

			$req = $db->query($sql);

			while($data = $req->fetch()){
				echo '<div class="post">'.$data['titre'].'<br>'.$data['content'].'</div>';
			}

			echo '<div id="pagination">'.$pagination.'</div>';


			$req->closeCursor();
		?>
		
	</body>
</html>
		 	

		


