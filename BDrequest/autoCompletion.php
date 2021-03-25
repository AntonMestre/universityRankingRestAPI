<?php

	header('Content-Type: application/json');

	$PARAM_hote = "lakartxela.iutbayonne.univ-pau.fr";
	$PARAM_bdd="amaystre_pro";
	$PARAM_user="amaystre_pro";
	$PARAM_pw="amaystre_pro";

	$link = mysqli_connect($PARAM_hote,$PARAM_user,$PARAM_pw,$PARAM_bdd);

	$query = "SELECT name FROM rankingCountry";

	$arr = array();
	$r_query = $link->query($query);
	$i=0;
	
	while($row = $r_query->fetch_assoc()) {
		$i++;
		array_push($arr,array("name"=>$row['name']));
	}

	echo json_encode($arr);


?>