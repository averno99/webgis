<script>

<?php foreach ($poktan as $pkt) {
	$arrayPoktan[]='{
            "nama_gapoktan":"'.$pkt['namaGapoktan'].'",
            "nama_poktan":"'.$pkt['namaPoktan'].'",
			"desa_poktan":"'.$pkt['desa'].'",
            "geojson":"'.$pkt['geojson'].'",
            "warna":"'.$pkt['warna'].'",
			"lat":"'.$pkt['lat'].'",
            "lng":"'.$pkt['lng'].'",
            "id_poktan":"'.$pkt['idPoktan'].'"
		
	}';
} ?>
var dataPoktan = [<?= implode(',', $arrayPoktan);?>];

<?php foreach ($gapoktanTani as $gpt) {
	$arrayGapoktan[]='{
            "nama_gapoktan":"'.$gpt['nama'].'",
            "geojson":"'.$gpt['geojson'].'",
            "id_gapoktan":"'.$gpt['id'].'"
		
	}';
} ?>
var dataGapoktan = [<?= implode(',', $arrayGapoktan);?>];

<?php foreach ($petani as $ptn) {
	$arrayPetani[]='{
            "nama_petani":"'.$ptn['namaPetani'].'",
			"kode_petani":"'.$ptn['kode'].'",
            "id_petani":"'.$ptn['idPetani'].'"
		
	}';
} ?>
var dataPetani = [<?= implode(',', $arrayPetani);?>];

	var mymap = L.map('mapid').setView([-0.043402, 109.241779], 14);
	var layerPoktan=[];
	var layerGapoktan=[];
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

	function iconByImage(image) {
		return '<img src="<?= base_url('assets/images/')?>'+image+'" style="width:16px">';
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
function popUp(f,l){
	    var html='';
	    if (f.properties){
	    	html+='<table>';
			html+='<tr>';
		    	html+='<td>Nama Desa</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['Desa']+'</td>';
	    	html+='</tr>';
	    	html+='<tr>';
		    	html+='<td>Nama Gapoktan</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['Gapoktan']+'</td>';
	    	html+='</tr>';
	    	html+='<tr>';
		    	html+='<td>Nama Poktan</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['Poktan']+'</td>';
	    	html+='</tr>';
			html+='<tr>';
		    	html+='<td>Nama Pemilik</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['Nama']+'</td>';
	    	html+='</tr>';
			html+='<tr>';
		    	html+='<td>Luas Lahan</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['Luas']+' Ha</td>';
	    	html+='</tr>';
	    	html+='</table>';

			
		for (i in dataPetani) {
			var nama_apa = 'Tidak';
			var nama_petani = dataPetani[i].nama_petani;
			var kode_petani = dataPetani[i].kode_petani;
			var id_petani = dataPetani[i].id_petani;

			var cobaNama = nama_petani==f.properties['Nama'];
			var cobaKode = kode_petani==f.properties['Kode'];
			if (cobaNama && cobaKode) {
	    	html+='<a href="<?=site_url('petani/detail/')?>'+id_petani+'" target="_BLANK">'
	    			+'<button  class="btn btn-primary btn-sm mr-2" >Lihat Data</button></a>';
			}		
		}
		
		if(!cobaNama && !cobaKode){
				html+='<a href="<?=site_url('petani/tambah_petani/')?>'+f.properties['Poktan']+'/'+f.properties['Kode']+'/'+f.properties['Nama']+'" target="_BLANK">'
	    			+'<button  class="btn btn-info btn-sm" >Tambah Data</button></a>';
			}
	        l.bindPopup(html);
			l.bindTooltip('Nama Petani : '+f.properties['Nama']+ '<br> Luas Lahan : '+ f.properties['Luas']+' Ha',{
	        	direction:"center",
	        	className:"no-background"
	        });
	    }
	}

function popUpPoint(f,l){
	    var html='';
	    if (f.properties){
	    	html+='<table>';
	    	html+='<tr>';
		    	html+='<td>Nama Gapoktan</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['Gapoktan']+'</td>';
	    	html+='</tr>';
	    	html+='<tr>';
		    	html+='<td>Nama Poktan</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['Poktan']+'</td>';
	    	html+='</tr>';
			html+='<tr>';
		    	html+='<td>Nama Desa</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['Desa']+'</td>';
	    	html+='</tr>';
			html+='<tr>';
		    	html+='<td>Luas Lahan</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['Luas']+' Ha</td>';
	    	html+='</tr>';
	    	html+='</table>';

			for (i in dataPoktan) {
			var nama_apa = 'Tidak';
			var nama_poktan = dataPoktan[i].nama_poktan;
			var desa_poktan = dataPoktan[i].desa_poktan;
			var id_poktan = dataPoktan[i].id_poktan;

			var cobaNama = nama_poktan==f.properties['Poktan'];
			var cobaDesa = desa_poktan==f.properties['Desa'];
			if (cobaNama) {
	    	html+='<a href="<?=site_url('poktan/detail/')?>'+id_poktan+'" target="_BLANK">'
	    			+'<button  class="btn btn-primary btn-sm mr-2" >Lihat Data</button></a>';
			}		
		}
		
		if(!cobaNama){
				html+='<a href="<?=site_url('poktan/tambah_poktan/')?>'+f.properties['Poktan']+'/'+f.properties['Desa']+'/'+f.properties['Gapoktan']+'" target="_BLANK">'
	    			+'<button  class="btn btn-info btn-sm" >Tambah Data</button></a>';
			}
	        l.bindPopup(html);
			// l.bindTooltip('Nama Petani : '+f.properties['Nama']+ '<br> Luas Lahan : '+ f.properties['Luas']+' Ha',{
	        // 	direction:"center",
	        // 	className:"no-background"
	        // });
	    }
	}
	


for(i in dataPoktan) {
	var layer={
		name: dataPoktan[i].nama_poktan,
		icon: iconByName(dataPoktan[i].warna),
		layer: new L.GeoJSON.AJAX(["<?=base_url('assets/geojson/')?>"+dataPoktan[i].geojson],
		{
			onEachFeature:popUp,
			style: function(feature){
						var Poktan=feature.properties.Poktan;
						return {
							"color": getColorPoktan(Poktan),
						    "weight": 1,
						    "opacity": 1
						}

					},
		}).addTo(mymap)
	}
	layerPoktan.push(layer);	
}

for(i in dataGapoktan) {
	var layer={
			name: dataGapoktan[i].nama_gapoktan,
			icon: iconByImage("xmark.png"),
			layer: new L.GeoJSON.AJAX(["<?=base_url('assets/geojson/')?>"+dataGapoktan[i].geojson],
				{
					 pointToLayer: function (feature, latlng) {
				    	// console.log(feature)
				        return L.marker(latlng, {
				        	icon : new L.icon({
				        			iconUrl: "<?= base_url('assets/images/xmark.png')?>",
									iconSize: [38, 45]})
				        });
				    },
					onEachFeature:popUpPoint
			    	// onEachFeature: function(feature,layer){
			    	// 	 if (feature.properties && feature.properties.Poktan) {
					//         layer.bindPopup(popUpPoint);
					//     }
			    	// }
				}).addTo(mymap)
			}
		layerGapoktan.push(layer);
}
	
	var overLayers = [{
		group: "Layer Poktan",
		layers: layerPoktan
	},
	{
		group: "Layer Point",
		layers: layerGapoktan
	}];

var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
	collapsibleGroups: true
});

mymap.addControl(panelLayers);

</script>
