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
		
            <!-- Title of the API -->
            <h5 style="margin-top:25px;"><i class="bi bi-book" style="color:#0084E5"></i> University Ranking Rest <span style="color:#0084E5;"><b>API</b></span> </h5>
            <div class="row">
			
				<!-- Left part of the page -->
                <div class="col-2">
					<ul class="list-group" style="margin-top:25px;">
					  <li class="list-group-item"><a href="universityRankingRest.php" style="text-decoration: none;color:black;">API</a></li>
					  <li class="list-group-item"><a href="documentation.php" style="text-decoration: none;color:black;">Documentation</a></li>
					</ul>
				</div>
				
				<!-- Right part of the page -->
				<div class="col" style="margin-left:25px;margin-top:20px;">
				
					<!-- Title of the page -->
					<h1>API</h1>
					
					<!-- Form for the country -->
					<label class="form-label">Country name</label>
					<input class="form-control" name="countryName" id="countryName" />
					<div class="form-check" style="margin:10px">
					  <input type="checkbox" id="update" name="update" class="form-check-input" checked>
					  <label class="form-check-label" for="update">Update informations</label>
					</div>
					<button style="margin-bottom:25px;" class="btn btn-primary" onclick="lookingForUniversityRanking()">Entry </button> <span id="spin"></span>
					
					<!-- Block for the displaying of the result -->
					<div id="display"></div>
					
					<!-- Title of the second part of the page (rankings) -->
					<h1 style="margin-top:25px;">Rankings</h1>
					<div class="container">
						<div class="row align-items-start">
							<div class="col">
							
								<!-- Title of the first table -->
								<h5>Ranking by number of Universities</h5>
								
								<!-- head of the first table -->
								<table class="table">
									<thead>
										<tr>
											<th scope="col">n°</th>
											<th scope="col">Country</th>
											<th scope="col">Number of universities</th>
										</tr>
									</thead>
									
									<!-- body of the first table -->
									<tbody id="rankingNumberOfUniversities">
									</tbody>
								</table>
							</div>
							<div class="col">
							
								<!-- Title of the second table -->
								<h5>Ranking by inhabitants by University </h5>
								
								<!-- head of the second table -->
								<table class="table" >
									<thead>
										<tr>
											<th scope="col">n°</th>
											<th scope="col">Country</th>
											<th scope="col">Inhbitants/Universities</th>
										</tr>
									</thead>
									
									<!-- body of the first table -->
									<tbody id="rankingInhabitantsByUniversities">
									</tbody>
								</table>
							</div>
							<div class="col">
							
							<!-- Title of the third table -->
							<h5>Ranking by area (kilometers²) by University </h5>

								<!-- head of the third table -->
								<table class="table" >
									<thead>
										<tr>
											<th scope="col">n°</th>
											<th scope="col">Country</th>
											<th scope="col">km²/University</th>
										</tr>
									</thead>
									
									<!-- body of the first table -->
									<tbody id="rankingAreaByUniversity">
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
	<!-- API JS -->
	<script>
	
	// Declarations of XMLHttpRequest
	var xhttp3 = new XMLHttpRequest();
	var xhttp4 = new XMLHttpRequest();
	var xhttp8 = new XMLHttpRequest();
	var xhttp = new XMLHttpRequest();
	var xhttp2 = new XMLHttpRequest();
	var xhttp5 = new XMLHttpRequest();
	
	// Function that get the ranking of the top 10 country rank by number of universities
    function getRankingNumberOfUniversities(){
        xhttp3.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				var rep=JSON.parse(this.responseText);
				var rankingCounter=1;
				for (var key in rep) {
					document.getElementById("rankingNumberOfUniversities").innerHTML += "<tr><th scope='row'>"+rankingCounter+"</th><td>"+key+"</td><td>"+rep[key]+"</td></tr>";
					rankingCounter++;
				}
			}
        };
        xhttp3.open("GET", "http://iparla.iutbayonne.univ-pau.fr/~amaystre/Webservice/projet/BDrequest/getRanking.php", true);xhttp3.send();   
    }

	// Function that get the ranking of the top 10 country rank by number of inhabitants by university
    function getRankingNumberOfInhabitantsByUniversity(){
		xhttp4.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var rep=JSON.parse(this.responseText);
				var rankingCounter=1;
				for (var key in rep) {
					document.getElementById("rankingInhabitantsByUniversities").innerHTML += "<tr><th scope='row'>"+rankingCounter+"</th><td>"+key+"</td><td>"+Math.round(rep[key])+"</td></tr>";
					rankingCounter++;
				}
			}
		};
		xhttp4.open("GET", "http://iparla.iutbayonne.univ-pau.fr/~amaystre/Webservice/projet/BDrequest/getRankingInhabitants.php", true);xhttp4.send();  
	}

	// Function that get the ranking of the top 10 country rank by area covered by university
	function getRankingArea(){
		xhttp8.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var rep=JSON.parse(this.responseText);
				var rankingCounter=1;
				for (var key in rep) {
					document.getElementById("rankingAreaByUniversity").innerHTML += "<tr><th scope='row'>"+rankingCounter+"</th><td>"+key+"</td><td>"+Math.round(rep[key])+"</td></tr>";
					rankingCounter++;
				}
			}
		};
		xhttp8.open("GET", "http://iparla.iutbayonne.univ-pau.fr/~amaystre/Webservice/projet/BDrequest/getRankingArea.php", true);xhttp8.send();
	}

	// Get all the rankings
    getRankingNumberOfUniversities();
    getRankingNumberOfInhabitantsByUniversity();
    getRankingArea();

	// Function that get all rankings for a specific country
    function lookingForUniversityRanking(){

		// Loading spin circle
        document.getElementById("spin").innerHTML='<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
		
		// Attributs needed to print informations
        var countryName = document.getElementById("countryName").value;
        var update = document.getElementById("update");
        var population;
        var imgLink;
        var area;
        var numberOfUniversities=0;

		// Function that get all informations about a country
        function getCountryInformations() {
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var rep=JSON.parse(this.responseText);
                population = rep[0].population;
                imgLink= rep[0].flag;
                area=rep[0].area;
                getUniversityInformations(population);
            }
          };
          xhttp.open("GET", "https://restcountries.eu/rest/v2/name/"+countryName, true);xhttp.send();
        }
		
		// Get all information about a specific country
        getCountryInformations();

		// Function that get number of universities for a specific country
        function getUniversityInformations(population) {
			xhttp2.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var rep=JSON.parse(this.responseText);
					for(var i = 0; i < rep.length; i++){
						numberOfUniversities++;
					}
					getRankingOfOne(population,numberOfUniversities,countryName,area);
				}

			};
          xhttp2.open("GET", "http://universities.hipolabs.com/search?country="+countryName, true);xhttp2.send();          
        }

		// Function that get all informations and ranking about a country and display it
        function getRankingOfOne(population,numberOfUniversities,countryName,area){
            xhttp5.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var rep=JSON.parse(this.responseText);
                    document.getElementById("display").innerHTML='	<div class="card" style="width: 400px;">\
																		<img src="'+imgLink+'"  class="card-img-top" alt="...">\
																		<div class="card-body">\
																			<p class="card-text">\
																			<div class="row">\
																				<div class="col">\
																					<b>Name</b><br/><span style="padding-left:15px;">'+countryName+'</span>\
																					<br/><b>Population</b><br/><span style="padding-left:15px;">'+population+'</span>\
																					<br/><b>Number of universities</b><br/><span style="padding-left:15px;">'+numberOfUniversities+'</span>\
																					<br/><b>Rank by number of Universities</b><br/><span style="padding-left:15px;">'+rep.RankNumberOfUniversities+'</span>\
																					<br/><b>inhabitants by University</b><br/><span style="padding-left:15px;">'+Math.round(rep.inhabitantsByUniversities)+'</span>\
																					<br/><b>Rank inhabitants by University</b><br/><span style="padding-left:15px;">'+rep.RankInhabitantsByUniversities+'</span>\
																					<br/><b>area (kilometers²) by University</b><br/><span style="padding-left:15px;">'+Math.round(rep.areaByUniversity)+'</span>\
																					<br/><b>Rank area (kilometers²) by University</b><br/><span style="padding-left:15px;">'+rep.RankAreaByUniversity+'</span>\
																				</div>\
																			</div>\
																		</div>\
																	</div>';
                    document.getElementById("spin").innerHTML='';
                }
              };
              if(update.checked == true){
                xhttp5.open("GET", "http://iparla.iutbayonne.univ-pau.fr/~amaystre/Webservice/projet/BDrequest/getRankingOfOne.php?countryName="+countryName+"&nbrUniversity="+numberOfUniversities+"&population="+population+"&area="+area, true);
                console.log("this");
              }else {
                xhttp5.open("GET", "http://iparla.iutbayonne.univ-pau.fr/~amaystre/Webservice/projet/BDrequest/getRankingOfOneWithoutUpdate.php?countryName="+countryName+"&nbrUniversity="+numberOfUniversities+"&population="+population+"&area="+area, true);
                console.log("taht");
              }
              xhttp5.send();
        }
    }

    </script>
    </body>
</html>