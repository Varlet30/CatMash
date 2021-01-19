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
					<li><a href="index.php">Home</a></li>
					<li><a class="active" href="ranking.php">Ranking</a></li>
				</ul>
			</nav>	
			<section>
				<h2>Ranking</h2>
				<?php
					$fileJson = "cat.json";
					$strJsonFileContents = file_get_contents($fileJson);
					$arrayCat = json_decode($strJsonFileContents, true);
					$sortArray = $arrayCat["images"];
					$passageArray = array();
					for ($j = 1; $j <= count($sortArray)-3; $j++){
						for ($i = 1; $i <= count($sortArray)-3; $i++){
							if(intval($sortArray[$i]["vote"]) > intval($sortArray[$i-1]["vote"])){
								$passageArray[0] = $sortArray[$i];
								$sortArray[$i] = $sortArray[$i-1];
								$sortArray[$i-1] = $passageArray[0];
							}
						}
					}
					for ($k = 0; $k <= count($sortArray)-3; $k++) {
					?>
						<div class="ranking">
							<p># <?php echo $k+1?></p>  
							<p class="vote"><?php echo $sortArray[$k]["vote"] ?> votes</p>
							<img src="<?php echo $sortArray[$k]["url"] ?>">
						</div>
						<hr>
					<?php
					}
				?>
			</section>
		</div>
	</body>
</html>
