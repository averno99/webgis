<script>

    let idLihatMarker = "<?= $lokasiId['idLokasi'] ?? NULL ?>"

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

    var datasawah = [<?= implode(',', $arraySaw);?>];

	// var mymap = L.map('mapsawahnya').setView([-0.043402, 109.241779], 13);
    var mymap = new L.Map('mapsawah', {zoom: 13, center: new L.latLng(datasawah[0].loc) });

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

var controlSearch = new L.Control.Search({
		position:'topright',		
		layer: markersLayer,
		initial: false,
		zoom: 16,
		marker: false
	});

	mymap.addControl( controlSearch );

let clickMarker = null;
for(i in datasawah) {
		var nama_petani = datasawah[i].nama_petani;
		var	loc = datasawah[i].loc;
        var id_lokasi = datasawah[i].id_lokasi;
        var id_petani = datasawah[i].id_petani;
        var nama_gapoktan = datasawah[i].nama_gapoktan;
		var	nama_poktan = datasawah[i].nama_poktan;
        var luas_sendiri = datasawah[i].luas_sendiri;
        var luas_sewa = datasawah[i].luas_sewa;
        var jabatan_kelompok = datasawah[i].jabatan_kelompok;

        var marker = new L.Marker(new L.latLng(loc), {title: nama_petani}); //se property searched
        marker.bindPopup('<b>Nama Pemilik : '+ nama_petani +'</b><br>Nama Gapoktan : '+ nama_gapoktan + '<br>Nama Kelompok Tani : ' + nama_poktan + '<br> Jabatan : '+ jabatan_kelompok  + '<br> Luas Lahan Sendiri : ' +luas_sendiri + '<br> Luas Lahan Sewa : ' +luas_sewa  + "<br><br>" + '<a href="<?=site_url()?>petani/detail/' + id_petani +'">Lihat Detail</a>' );

        
        if(id_lokasi == idLihatMarker){
            clickMarker = marker;
            marker.openPopup();
        } 

        markersLayer.addLayer(marker);
         }

    mymap.addLayer(markersLayer);

    if(clickMarker != null){
        mymap.setZoom(17);
        mymap.panTo(clickMarker.getLatLng());
        clickMarker.openPopup();
    }


</script>