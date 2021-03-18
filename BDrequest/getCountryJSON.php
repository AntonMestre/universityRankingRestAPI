<?php

	header('Content-Type: application/json');

	$PARAM_hote = "lakartxela.iutbayonne.univ-pau.fr";
	$PARAM_bdd="amaystre_pro";
	$PARAM_user="amaystre_pro";
	$PARAM_pw="amaystre_pro";

	$link = mysqli_connect($PARAM_hote,$PARAM_user,$PARAM_pw,$PARAM_bdd);

	$country = $_GET['countryName'];

	$query = "SELECT name,numberOfUniversities,inhabitantsByUniversities,AreaByUniversity,
	FIND_IN_SET( numberOfUniversities, (SELECT GROUP_CONCAT( numberOfUniversities ORDER BY numberOfUniversities DESC )FROM rankingCountry )) AS rank,
	FIND_IN_SET( inhabitantsByUniversities, (SELECT GROUP_CONCAT( inhabitantsByUniversities ORDER BY inhabitantsByUniversities ASC ) FROM rankingCountry )) AS rank2,
	FIND_IN_SET( AreaByUniversity, (SELECT GROUP_CONCAT( AreaByUniversity ORDER BY AreaByUniversity ASC ) FROM rankingCountry )) AS rank3  
	FROM rankingCountry WHERE name = '".$_GET["countryName"]."'";

	$arr = array();
	$r_query = $link->query($query);

	while($row = $r_query->fetch_assoc()) {
		$arr["Country"]=$row["name"];
		$arr["NumberOfUniversities"]=$row["numberOfUniversities"];
		$arr["RankNumberOfUniversities"]=$row["rank"];
		$arr["inhabitantsByUniversities"]=$row["inhabitantsByUniversities"];
		$arr["RankInhabitantsByUniversities"]=$row["rank2"];
		$arr["areaByUniversity"]=$row["AreaByUniversity"];
		$arr["RankAreaByUniversity"]=$row["rank3"];
	}

	echo json_encode($arr);


?>