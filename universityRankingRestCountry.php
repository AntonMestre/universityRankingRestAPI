<html>
	<body>
		<!-- Result of the ranking for a specific country -->
		<div id="result"></div>
		<script>
			
			// Getting URL parameters
			countryParameter = window.location.search;
			var country = new URLSearchParams(countryParameter).toString().split("&")[0].split("=")[1];
			var update = new URLSearchParams(countryParameter).toString().split("&")[1].split("=")[1];
			
			// Declarations of XMLHttpRequest
			var xhttp6 = new XMLHttpRequest();
			var xhttp = new XMLHttpRequest();
			var xhttp2 = new XMLHttpRequest();
			var xhttp5 = new XMLHttpRequest();
			
			// Function that get all informations and rankings for a specific country
			function lookingForUniversityRankingWithoutUpdate(){
				xhttp6.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("result").innerHTML=this.responseText;				
					}
				};
				xhttp6.open("GET", "http://iparla.iutbayonne.univ-pau.fr/~amaystre/Webservice/projet/BDrequest/getRankingOfOneWithoutUpdate.php?countryName="+country, true);xhttp6.send();
			}

			// Updating the data or not
			if(update=="true"){
				lookingForUniversityRanking(country);
			}else{
				lookingForUniversityRankingWithoutUpdate(country);
			}
    
			// Function that get all rankings for a specific country
			function lookingForUniversityRanking(country){

				// Attributs needed to print informations
				var countryName = country;
				var population;
				var imgLink;
				var area;
				var numberOfUniversities=0;
				
				// Get all information about a specific country
				getCountryInformations();

				// Function that get number of universities for a specific country
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
							document.getElementById("result").innerHTML=this.responseText;
						}
					};
					  xhttp5.open("GET", "http://iparla.iutbayonne.univ-pau.fr/~amaystre/Webservice/projet/BDrequest/getRankingOfOne.php?countryName="+countryName+"&nbrUniversity="+numberOfUniversities+"&population="+population+"&area="+area, true);xhttp5.send(); 
				}
			}

		</script>
	</body>
</html>