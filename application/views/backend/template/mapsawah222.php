<script>

	var mymap = L.map('mapsawah').setView([-0.043402, 109.241779], 13);

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

<?php foreach ($lokasi as $lks) : ?>
	L.marker([<?= $lks['latitude']?>,<?= $lks['longitude']?>]).addTo(mymap).bindPopup("<div class='text-left'><b>Nama Pemilik : </b><?= $lks['namaPetani']?></br><b>Nama Gapoktan : </b><?= $lks['namaGapoktan']?></br><b>Nama Kelompok Tani : </b><?= $lks['namaPoktan']?></br><b>Jabatan : </b><?= $lks['jabatan']?></br><b>Luas Lahan Sendiri : </b><?= $lks['luas_lahan_sendiri']?></br><b>Luas Lahan Sewa : </b><?= $lks['luas_lahan_sewa']?></br></br><a href='<?=site_url()?>petani/detail/<?= $lks['idPetani']?>'>Lihat Detail</a></div>");
<?php endforeach; ?>

</script>