<script>

    let idLihatMarker = "<?= $lokasiId['idLokasi']?>"
    let idLihatGeo = "<?= $poktanId['idPoktan']?>"

    <?php foreach ($lokasi as $lks) {
		$arraySaw[]='{
			"loc":['.$lks['latitude'].','.$lks['longitude'].'],
            "id_lokasi":"'.$lks['idLokasi'].'",
            "id_petani":"'.$lks['idPetani'].'",
            "nama_petani":"'.$lks['namaPetani'].'",
            "nama_gapoktan":"'.$lks['namaGapoktan'].'",
            "nama_poktan":"'.$lks['namaPoktan'].'",
            "luas_sendiri":"'.$lks['luas_lahan_sendiri'].'",
            "luas_sewa":"'.$lks['luas_lahan_sewa'].'",
            "jabatan_kelompok":"'.$lks['jabatan'].'"

			}';
		 } ?>

    <?php foreach ($poktan as $pkt) {
		$arraySel[]='{
			"geojson": "'.base_url().'assets/geojson/'.$pkt['geojson'].'",
            "nama_gapoktan":"'.$pkt['namaGapoktan'].'",
            "nama_poktan":"'.$pkt['namaPoktan'].'",
            "warna_poktan":"'.$pkt['warna'].'",

			}';
		 } ?>

    var datasawah = [<?= implode(',', $arraySaw);?>];
    var datapok = [<?= implode(',', $arraySel);?>];

    for(i in datapok) {
		var	geojson = datapok[i].geojson;
        var nama_gapoktan = datapok[i].nama_gapoktan;
		var	nama_poktan = datapok[i].nama_poktan;
        var warna = datapok[i].warna;
}

	// var mymap = L.map('mapsawahnya').setView([-0.043402, 109.241779], 13);
    var mymap = new L.Map('mapsawahnya', {zoom: 13, center: new L.latLng([-0.043402, 109.241779]) });

	var Layer = (L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}));

    mymap.addLayer(Layer);

    var markersLayer = new L.LayerGroup();

    mymap.addLayer(markersLayer);

    var featuresLayer = new L.GeoJSON.AJAX(geojson, {
			style: function(feature) {
				return {color: warna_poktan };
			},
			onEachFeature: function(feature, marker) {
				marker.bindPopup('<h4 style="color:'+warna_poktan+'">'+ nama_poktan +'</h4>');
			}
		});

	mymap.addLayer(featuresLayer);


	function iconByName(name) {
		return '<i class="icon" style="background-color:'+name+';border-radius:50%"></i>';
	}
	
	function featureToMarker(feature, latlng) {
	return L.marker(latlng, {
		icon: L.divIcon({
			className: 'marker-'+feature.properties.amenity,
			html: iconByName(feature.properties.amenity),
			iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
			iconSize: [25, 41],
			iconAnchor: [12, 41],
			popupAnchor: [1, -34],
			shadowSize: [41, 41]
		})
	});
}

<?php foreach ($poktan as $pkt) : ?>
		var myStyle<?= $pkt['id']?> = {
            "color": "<?= $pkt['warna']?>",
            "weight": 1,
            "opacity": 1
        };
<?php endforeach;?>

var baseLayers = [
	{
		group: "Map Layers",
		collapsed: true,
		layers: [
			{
				name: "Open Cycle Map",
				layer: Layer
			},{
				name: "Google Satelite",
				layer: L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    					maxZoom: 20,
    					subdomains:['mt0','mt1','mt2','mt3']
				})
			}
		]
	}
];

	<?php foreach ($poktan as $pkt) {
		$id = $pkt['idPoktan'];
		$site = site_url();
		$url = "<a href='".$site."poktan/detail/".$id."'>Lihat Detail</a>";

		$arrayPok[]='{
			name: "'. $pkt['namaPoktan'] .'",
			icon: iconByName("'.$pkt['warna'].'"),
			layer: new L.GeoJSON.AJAX(["'. base_url() . 'assets/geojson/' . $pkt['geojson'] . '"], 
			{style: myStyle' . $pkt['id'] . ',
			pointToLayer: featureToMarker }).addTo(mymap).bindPopup("<b>Nama Gapoktan : </b> '. $pkt['namaGapoktan'] .'</br><b>Nama Poktan : </b> '. $pkt['namaPoktan'] .' </br><b>Luas Lahan : </b> '. $pkt['luas_lahan'] .' Ha</br></br> '.$url.'")
			}';
		 } ?>

	var overLayers = [{
		group: "Layer Poktan",
		layers: [
		<?= implode(',', $arrayPok);?>
		]
	}];

var panelLayers = new L.Control.PanelLayers(baseLayers);

// mymap.addControl(panelLayers);

// var controlSearch = new L.Control.Search({
// 		position:'topright',		
// 		layer: markersLayer,
// 		initial: false,
// 		zoom: 16,
// 		marker: false
// 	});
var searchControl = new L.Control.Search({
		layer: featuresLayer,
		propertyName: nama_poktan,
		marker: false,
		moveToLocation: function(latlng, title, map) {
			//map.fitBounds( latlng.layer.getBounds() );
			var zoom = mymap.getBoundsZoom(latlng.layer.getBounds());
  			mymap.setView(latlng, zoom); // access the zoom
		}
	});

	searchControl.on('search:locationfound', function(e) {
		
		//console.log('search:locationfound', );

		//map.removeLayer(this._markerSearch)

		e.layer.setStyle({fillColor: '#3f0', color: '#0f0'});
		if(e.layer._popup)
			e.layer.openPopup();

	}).on('search:collapsed', function(e) {

		featuresLayer.eachLayer(function(layer) {	//restore feature color
			featuresLayer.resetStyle(layer);
		});	
	});
	
	mymap.addControl( searchControl );  //inizialize search control


</script>