<?php

	header('Content-Type: application/json');

	$PARAM_hote = "lakartxela.iutbayonne.univ-pau.fr";
	$PARAM_bdd="amaystre_pro";
	$PARAM_user="amaystre_pro";
	$PARAM_pw="amaystre_pro";

	$link = mysqli_connect($PARAM_hote,$PARAM_user,$PARAM_pw,$PARAM_bdd);

	$query = "SELECT name,AreaByUniversity FROM rankingCountry ORDER BY AreaByUniversity ASC LIMIT 10";

	$arr = array();
	$r_query = $link->query($query);

	while($row = $r_query->fetch_assoc()) {
		$arr[$row["name"]]=$row["AreaByUniversity"];
	}

	echo json_encode($arr);


?>