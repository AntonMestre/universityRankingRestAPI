<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				
				<!-- Left part of the page -->
				<div class="col-2">
					<ul class="list-group" style="margin-top:50px;">
						<li class="list-group-item" style="background-color:#0084E5;color:white;">Table of content</li>
					</ul>
					<ul class="list-group" style="margin-top:10px;">
						<li class="list-group-item"><a href="universityRankingRest.php" style="text-decoration: none;color:black;">API</a></li>
						<li class="list-group-item"><a href="documentation.php" style="text-decoration: none;color:black;">Documentation</a></li>
					</ul>
				</div>
				
				<!-- Right part of the page -->
				<div class="col" style="margin-left:25px;margin-top:20px;">
				
					<!-- Title of the API -->
					<h5 style="margin-top:25px;margin-bottom:35px;"><i class="bi bi-book" style="color:#0084E5"></i> University Ranking Rest <span style="color:#0084E5;"><b>API</b></span><span class="by"> - By Boscals de Reals & Maystre </span></h5>
					<hr>
					
					<!-- Title of the page -->
					<h1>Documentation</h1>
					
					<!-- What is UniversityRankingRestAPI ? -->
					<h3 class="title"><i class="bi bi-arrow-down-right-square-fill"></i> What is UniversityRankingRestAPI ?</h3>
					<p>UniversityRankingRestAPI is a webservice which allows you to obtain information on the ranking of countries according to their number of universities.</p>
					
					<!-- How it Works ? -->
					<h3 class="title"><i class="bi bi-arrow-down-right-square-fill"></i> How it Works ?</h3>
					<p>The UniversityRankingRestAPI uses two web services and crosses their data in order to provide you with detailed statistics.</br>The webservices used are :
						<ul>
							<li>University Hipolab (http://universities.hipolabs.com) : This webservice allows you to obtain the list of universities in a given country. </li>
							<li>Rest Countries (https://restcountries.eu) : This webservice allows you to obtain information about a given country, like the area, number of inhabitants, etc.. </li>
						</ul>
					</p>
					
					<!-- What information do you have access to? -->
					<h3 class="title"><i class="bi bi-arrow-down-right-square-fill"></i> What information do you have access to?</h3>
					<p>UniversityRankingRestAPI give you access to the following statistics :<br/><br/>
					   <b style="padding-left:40px">Number of universities by country</b><br/><br/>
					   <b style="padding-left:40px">Number of inhabitant by university</b><br/>
					   This statistic makes it possible to understand whether the population has broad access to education or not. A high value shows that there are too many people for a single university, while a lower value shows that people have a large access to universities.
					   The lower this number is, the higher the country will be in the list.<br/><br/>
					   <b style="padding-left:40px">Area (in km²) by university</b><br/>
					   This statistic reveals how a country covers his area with universities.
					   A high value indicates that people need to move over a high average distance to get access to education.
					   The lower this number is, the higher the country will be in the list.
					</p>
					
					<!-- How to use it ? -->
					<h3 class="title"><i class="bi bi-arrow-down-right-square-fill"></i> How to use it ?</h3>
					<p>The link below is the endpoint of our webservice. It allow you to use ou webservice and use data that we provide.</p>
					<p class="link">http://iparla.iutbayonne.univ-pau.fr/~amaystre/Webservice/projet/universityRankingRestCountry.php</p>
					<p>The API need 2 parameters to send data back. You have to give the <span class="surligner-bleu"> Country name </span> and indicate if you want <span class="surligner-rouge"> update </span> the data of the API.
					<p >You have to know that the update make the response time longueur.</p>
					<p>Exemple of simple use to get data about Portugal.</p>
					<p class="link">http://iparla.iutbayonne.univ-pau.fr/~amaystre/Webservice/projet/universityRankingRestCountry.php?<span class="surligner-bleu">country=Portugal</span>&<span class="surligner-rouge">update=false</span></p>
					
					<!-- Data Structur -->
					<h3 class="title"><i class="bi bi-arrow-down-right-square-fill"></i> Data Structure</h3>
					<p> The response of your query is given in JSON </p>
					<p class="link">
					{ </br>
						"Country":"Portugal",</br>
						"NumberOfUniversities":"124",</br>
						"RankNumberOfUniversities":"8",</br>
						"inhabitantsByUniversity":"83667.919354839",</br>
						"RankInhabitantsByUniversity":"4",</br>
						"areaByUniversity":"742.66129032258",</br>
						"RankAreaByUniversity":"7"</br>
						}
					</p>
				</div>
			</div>
		</div>
	</body>
</html>
