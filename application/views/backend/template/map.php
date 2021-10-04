<script>

	var mymap = L.map('mapid').setView([-0.043402, 109.241779], 15);

	var Layer=L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	});
	mymap.addLayer(Layer);

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

	<?php foreach ($poktan as $pkt) {
		$arrayPok[]='{
			name: "'. $pkt['namaPoktan'] .'",
			icon: iconByName("'.$pkt['warna'].'"),
			layer: new L.GeoJSON.AJAX(["'. base_url() . 'assets/geojson/' . $pkt['geojson'] . '"], 
			{style: myStyle' . $pkt['id'] . ' = {
				"color": "' . $pkt['warna'] . '",
				"weight": 1,
				"opcaity": 1
			},
			pointToLayer: featureToMarker }).addTo(mymap).bindPopup("<b>Nama Gapoktan :</b> '. $pkt['namaGapoktan'] .'</br><b>Nama Poktan :</b> '. $pkt['namaPoktan'] .'")
			}';
		 } ?>

	var overLayers = [{
		group: "Layer Poktan",
		layers: [
		<?= implode(',', $arrayPok);?>
		]
	}];

var baseLayers = [
	{
		group: "Map Layers",
		icon: iconByName('parking'),
		collapsed: true,
		layers: [
			{
				name: "Google Satelite",
				layer: L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    					maxZoom: 20,
    					subdomains:['mt0','mt1','mt2','mt3']
				})
			},
			{
				name: "Open Cycle Map",
				layer: L.tileLayer('https://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
			}			
		]
	}
];

var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
	collapsibleGroups: true
});

mymap.addControl(panelLayers);

</script>
