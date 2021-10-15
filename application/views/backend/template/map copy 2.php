<script>

<?php foreach ($poktan as $pkt) {
	$arrayPoktan[]='{
            "nama_gapoktan":"'.$pkt['namaGapoktan'].'",
            "nama_poktan":"'.$pkt['namaPoktan'].'",
            "geojson":"'.$pkt['geojson'].'",
            "warna":"'.$pkt['warna'].'",
            "id_poktan":"'.$pkt['idPoktan'].'"
		
	}';
} ?>
var dataPoktan = [<?= implode(',', $arrayPoktan);?>];

	var mymap = L.map('mapid').setView([-0.043402, 109.241779], 16);
	var layerPoktan=[];
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

function getColorPoktan(Poktan){
		for(i in dataPoktan){
			if(dataPoktan[i].nama_poktan==Poktan){
				return dataPoktan[i].warna;
			}
		}
	}

function style(feature) {
    return {
        fillColor: getColorPoktan(feature.properties.Poktan),
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '1',
        fillOpacity: 0.7
    };
}

function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 5,
        color: '#666',
        dashArray: '',
        fillOpacity: 0.7
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }
}

function resetHighlight(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '1'
    });
}

function zoomToFeature(e) {
    mymap.fitBounds(e.target.getBounds());
}

function onEachFeature(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature
    });
}
	


for(i in dataPoktan) {
	var layer={
		name: dataPoktan[i].nama_poktan,
		icon: iconByName(dataPoktan[i].warna),
		layer: new L.GeoJSON.AJAX(["<?=base_url('assets/geojson/')?>"+dataPoktan[i].geojson],
		{style:style,
		onEachFeature: onEachFeature}).addTo(mymap)
	}
	layerPoktan.push(layer);	
}
	
	var overLayers = [{
		group: "Layer Poktan",
		layers: layerPoktan
	}];

var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
	collapsibleGroups: true
});

mymap.addControl(panelLayers);

</script>
