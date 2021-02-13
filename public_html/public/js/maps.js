function inicio(){
	
    // Carga el mapa en el div con id='mapid1'
	var mymap1 = L.map('mapid1').setView([41.398472, 2.167204], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}',{
        foo: 'bar',
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors,'+
        			' <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
    }).addTo(mymap1);   

        // recorre el array de where.js y crea las marcas en el mapa
    for (var i = 0; i < queryData.length; i++) {
        var lat = queryData[i].lat;
        var lon = queryData[i].lon;
        var city = queryData[i].city;
        var zip = queryData[i].zip;

        L.marker([lat, lon],{
            title: 'lat: '+lat+' lon: '+lon+'\n'+zip+' '+city,       
        }).addTo(mymap1);
    }

//==============================================================================
// imprime el contenido que recoje de la cordenadas  de where.js

    var coordinates = document.getElementById('cordenadas');
    var total = document.getElementById('num');
    
    for (var i = 0; i < queryData.length; i++) {
    	var lat = queryData[i].lat;
        var lon = queryData[i].lon;
        var city = queryData[i].city;
        var zip = queryData[i].zip;

        coordinates.innerHTML += '<a href="#contBotons" class="ubicacion" lat="'+lat+'" '+'lon='+lon+'>'+
	                                'city: '+city+'<br>'+
	                                'Zip: '+zip+'<br>'+
	                                'Lat: '+lat+'<br>'+
	                                'Lon: '+lon+
	                            '</a>';
    }

    total.innerHTML = queryData.length;

//================================================================================
// EVENTOS

    //toma los atributos lat y lon del envento de la clase ubicacion y lo posiciona
    // en el mapa
	var point = document.getElementsByClassName('ubicacion');

	for (var i = 0; i < point.length; i++) {
		
		point[i].addEventListener('click', function(){
			var lat = this.getAttribute('lat');
			var lon = this.getAttribute('lon')	

	   		mymap1.setView([lat, lon], 11);

	});
	}
	
}

// var queryData = [
// 	{'lat': 41.398472,'lon': 2.167204,'city': 'Barcelona', 'zip': '08041'},
// 	{'lat': 41.418234,'lon': 2.1717345,'city': 'Barcelona', 'zip': '08041'},
// ]