<?php  
	if ($_POST['choix'] == "Next") {
		header('Location: index.php');
	}
	$fileJson = "cat.json";
	$strJsonFileContents = file_get_contents($fileJson);
	$arrayCat = json_decode($strJsonFileContents, true);
	$arrayCat["images"][$_POST['choix']]["vote"] += 1;
	$currentArrayCat = json_encode($arrayCat);
	file_put_contents($fileJson, $currentArrayCat);
	header('Location: index.php');
?>
