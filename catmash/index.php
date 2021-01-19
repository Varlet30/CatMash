<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="fr">
	<head>
		<title>CatMash</title>
		<link rel="stylesheet" href="style.css" type="text/css">
		<meta name="author" content="Cédric Varlet - 18/01/2020" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<div id="container">
			<h1>CatMash</h1>
			<nav class="topnav">
				<ul>
					<li><a class="active"  href="index.php">Home</a></li>
					<li><a href="ranking.php">Ranking</a></li>
				</ul>
			</nav>	
			<section>
				<h2>Which is the more beautiful of the two ?</h2>
				<?php
					$fileJson = "cat.json";
					$strJsonFileContents = file_get_contents($fileJson);
					$arrayCat = json_decode($strJsonFileContents, true);
					$idImg1 = rand(0, count($arrayCat["images"])-3);
					$idImg2 = rand(0, count($arrayCat["images"])-3);
					if ($idImg1 == $idImg2){
						$idImg2 = $idImg1-1;
					}
					$img1Url = $arrayCat["images"][$idImg1]["url"];
					$img2Url = $arrayCat["images"][$idImg2]["url"];
				?>		
				<div class="form">
					<form action="increment.php" method="post">
						<div class="id_img">
							<img src="<?php echo $img1Url ?>"><br>
							<p id="vote">I vote</p>
							<input type="submit" name="choix" value="<?php echo $idImg1 ?>">
						</div>

						<div class="id_img">
							<img src="<?php echo $img2Url ?>"><br>
							<p id="vote">I vote</p>
							<input type="submit" name="choix" value="<?php echo $idImg2 ?>">		
						</div>
						<br>
						<input id="next" type="submit" name="choix" value="Next">	
						<div class="clear"> </div>
					</form>
				</div>
			</section>
		</div>
	</body>
</html>
