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

	var info = L.control();

info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info');
    this.update();
    return this._div;
};

info.update = function (props) {
    this._div.innerHTML = '<h4>Informasi Pemilik Lahan</h4>' +  (props ?
        '<b> Nama Pemilik : </b>' + props.Nama + '<br/><b> Luas Lahan : </b>' + props.Luas + ' Ha</br> <b> Nama Poktan : </b>' + props.Poktan + '</br> <b> Nama Desa : </b>' + props.Desa
        : 'Informasi Poktan');
};

info.addTo(mymap);

<?php foreach ($poktan as $pkt) : ?>
		var myStyle<?= $pkt['id']?> = {
            "color": "<?= $pkt['warna']?>",
            "weight": 1,
            "opacity": 1
        };
<?php endforeach;?>

function style(feature) {
    return {
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7,
        fillColor: getColor(feature.properties.Poktan)
    };
}

function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 3,
        color: '#666',
        dashArray: '',
        fillOpacity: 0.7
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }

    info.update(layer.feature.properties);
}

function resetHighlight(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 2,
        opacity: 1,
        color: 'red',
        dashArray: '3'
    });
	info.update();
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

<?php foreach ($poktan as $pkt) : ?>
    
        var jsonTest = new L.GeoJSON.AJAX(["<?= base_url() ?>assets/geojson/<?= $pkt['geojson'] ?>"],
            {
                style: myStyle<?= $pkt['id']?> = {
				"color": "<?= $pkt['warna']?>",
				"weight": 1,
				"opcaity": 1
			},
                onEachFeature: onEachFeature
                // onEachFeature: popUp,
            }).addTo(mymap).bindPopup('<a href="<?= site_url('petani/tambah_petani')?>">Lihat Data</a>');
<?php endforeach; ?>

</script>
