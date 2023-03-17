var cities = {
	'Abra'  : [
		200
		],
	'Agusan del Norte' : [
		200
		],
	'Agusan del Sur' : [
		200
		],
	'Aklan' : [
		200
		],
	'Albay' : [
		200
		],
	'Antique' : [
		200
		],
	'Apayao' : [
		200
		],
	'Aurora' : [
		200
		],
	'Basilan' : [
		200
		],
	'Bataan' : [
		200
		],
	'Batanes' : [
		200
		],
	'Batangas' : [
        200
		],
	'Benguet' : [
		200
		],
	'Biliran' : [
		200
		],
	'Bohol' : [
		200
		],	
	'Bukidnon' : [
        200
		],
	'Bulacan' : [
        200
		],
	'Cagayan' : [
		200
		],	
	'Camarines Norte' : [
        200
		],
	'Camarines Sur' : [
		200
		],
	'Camiguin' : [
		200
		],
	'Capiz' : [
		200
		],
	'Catanduanes' : [
		200
		],
	'Cavite' : [
		200
		],
	'Cebu' : [
		200
		],
	'Compostela Valley' : [
		200
		],
	'Cotabato' : [
		200
		],
	'Davao del Norte' : [
		200
		],	
	'Davao del Sur' : [
		200
		],
	'Davao Oriental' : [
		200
		],	
	'Dinagat Islands' : [
		200
		],
	'Eastern Samar' : [
		200
		],	
	'Guimaras' : [
		200
		],
	'Ifugao' : [
		200
		],	
	'Ilocos Norte' : [
		200
		],
	'Ilocos Sur' : [
		200
		],
	'Iloilo' : [
		200
		],
	'Isabela' : [
        200
		],
	'Kalinga' : [
		200
		],
	'La Union' : [
		200
		],
	'Laguna' : [
		200
		],
	'Lanao del Norte' : [
		200
		],
	'Lanao del Sur' : [
        200
		],
	'Leyte' : [
        200
		],
	'Maguindanao' : [
		200
		
		],
	'Marinduque' : [
		200
		],	
	'Masbate' : [
		200
		],
	'Metro Manila' : [
		150
		],
	'Misamis Occidental' : [
        200
		],
	'Misamis Oriental' : [
        200
		],
	'Mountain Province' : [
        200
		],	
	'Negros Occidental' : [
        200
		],		
	'Negros Oriental' : [
        200
		],
	'Northern Samar' : [
        200
		],	
	'Nueva Ecija' : [
        200
		],
	'Nueva Vizcaya' : [
		200
		],
	'Occidental Mindoro' : [
        200
		],
	'Oriental Mindoro' : [
        200
		],
	'Palawan' : [
        200
		],	
	'Pampanga' : [
        200
		],
	'Pangasinan' : [
        200
		],
	'Quezon' : [
		200
		],		
	'Quirino' : [
        200
		],
	'Rizal' : [
        200	
		],
	'Romblon' : [
        200	
		],
	'Samar' : [
        200
		],
	'Sarangani' : [
        200	
		],
	'Shariff Kabunsuan' : [
        200	
		],		
	'Siquijor' : [
        200
		],
	'Sorsogon' : [
        200
		],	
	'South Cotabato' : [
        200
		],
	'Southern Leyte' : [
        200
		],
	'Sultan Kudarat' : [
		200
		],
	'Sulu' : [
        200
		],
	'Surigao del Norte' : [
        200
		],	
	'Surigao del Sur' : [
        200
		],		
	'Tarlac' : [
        200
		],
	'Tawi-Tawi' : [
        200
		],
	'Zambales' : [
        200		
		],
	'Zamboanga del Norte' : [
        200
		],
	'Zamboanga del Sur' : [
        200
		],
	'Zamboanga Sibugay' : [
		200
		],			
 }

 var City = function() {

	this.p = [],this.c = [],this.a = [],this.e = {};
	window.onerror = function() { return true; }
	
	this.getProvinces = function() {
		for(let province in cities) {
			this.p.push(province);
		}
		return this.p;
	}
	this.getCities = function(province) {
		if(province.length==0) {
			console.error('Please input province name');
			return;
		}
		for(let i=0;i<=cities[province].length-1;i++) {
			this.c.push(cities[province][i]);
		}
		return this.c;
	}
	this.getAllCities = function() {
		for(let i in cities) {
			for(let j=0;j<=cities[i].length-1;j++) {
				this.a.push(cities[i][j]);
			}
		}
		this.a.sort();
		return this.a;
	}
	this.showProvinces = function(element) {
		var str = '<option selected disabled>Select Province</option>';
		for(let i in this.getProvinces()) {
			str+='<option>'+this.p[i]+'</option>';
		}
		this.p = [];		
		document.querySelector(element).innerHTML = '';
		document.querySelector(element).innerHTML = str;
		this.e = element;
		return this;
	}
	this.showCities = function(province,element) {
		var str = '';
		var elem = '';
		if((province.indexOf(".")!==-1 || province.indexOf("#")!==-1)) {
			elem = province;
		}
		else {
			for(let i in this.getCities(province)) {
				str+='<option>'+this.c[i]+'</option>';
			}
			elem = element;
		}
		this.c = [];
		document.querySelector(elem).innerHTML = '';
		document.querySelector(elem).innerHTML = str;
		document.querySelector(this.e).onchange = function() {		
			var Obj = new City();
			Obj.showCities(this.value,elem);
		}
		return this;
	}
}
