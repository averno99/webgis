<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="<?= base_url()?>assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?= base_url()?>assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="<?= base_url()?>assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="<?= base_url()?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="<?= base_url()?>assets/js/pages/crud/datatables/extensions/responsive.js"></script>
		<!--end::Page Scripts-->
		<!-- Make sure you put this AFTER Leaflet's CSS -->
 		<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
		<script src="<?= base_url()?>assets/js/leaflet.ajax.js"></script>
    <script src="<?= base_url()?>assets/js/leaflet-search.min.js"></script>
		<script src="<?= base_url()?>assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
		<script src="<?= base_url()?>assets/js/Leaflet.GoogleMutant.js"></script>
		<!--begin::Page Scripts(used by this page)-->
		<script src="<?= base_url()?>assets/js/pages/widgets.js"></script>
		<!--end::Page Scripts-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/custom/user/edit-user.js"></script>
		<!--end::Page Scripts-->

		<!-- File Input -->
		<script>
    		$('.custom-file-input').on('change', function() {
        		let fileName = $(this).val().split('\\').pop();
        		$(this).next('.custom-file-label').addClass("selected").html(fileName);
    		});

			
		</script>
<!-- End File Input -->
		
<?php if ($this->uri->segment(1) == 'dashboard') : ?>
    <?php include 'map.php'; ?>
<?php endif; ?>

<?php if ($this->uri->segment(1) == 'sawah') : ?>
    <?php include 'mapsawah.php'; ?>
<?php endif; ?>

<?php if ($this->uri->segment(1) == 'sawahnya') : ?>
    <?php include 'mapsawahnya.php'; ?>
<?php endif; ?>
		
<?php if ($this->uri->segment(2) == 'tambah_lokasi') : ?>
<script>
  $(document).ready(function(){ // Ketika halaman sudah diload dan siap
    $("#btn-tambah-lokasi").click(function(){ // Ketika tombol Tambah Data Form di klik
      
      // Kita akan menambahkan form dengan menggunakan append
      // pada sebuah tag div yg kita beri id insert-form
      $('#insert-form').append('<table>' +
        '<tr>' +
        '<td>Luas Lahan Milik Sendiri + Digarap (Ha)</td>' +
		'<td> : </td>' +
        '<td><input type="hidden" name="id[]" value="<?= $petani['id']; ?>">' + 
		'<input class="form-control" type="text" name="luas_lahan_sendiri[]" value="<?= set_value('luas_lahan_sendiri[]'); ?>" placeholder="Luas Lahan Sendiri"/>' +
		'</td>' +
		'</tr>' +

		'<tr>' +
		'<td>Luas Lahan Sewa + Digarap (Ha)</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="luas_lahan_sewa[]" value="<?= set_value('luas_lahan_sewa[]'); ?>" placeholder="Luas Lahan Sewa"/>' +
		'</td>' +
        '</tr>' +

		'<tr>' +
		'<td>Keterangan</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="keterangan[]" value="<?= set_value('keterangan[]'); ?>" placeholder="Keterangan"/>' +
		'</td>' +
        '</tr>' +

		'<tr>' +
		'<td>Latitude</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="latitude[]" value="<?= set_value('latitude[]'); ?>" placeholder="Latitude"/>' +
		'</td>' +
        '</tr>' +

		'<tr>' +
		'<td>Longitude</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="longitude[]" value="<?= set_value('longitude[]'); ?>" placeholder="Longitude"/>' +
		'</td>' +
        '</tr>' +
        
        '</table>' +
        '<br><br>');
      
      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });
    
    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-lokasi").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
  </script>
  <?php endif; ?>

  <?php if ($this->uri->segment(2) == 'tambah_sarana') : ?>
<script>
  $(document).ready(function(){ // Ketika halaman sudah diload dan siap
    $("#btn-tambah-sarana").click(function(){ // Ketika tombol Tambah Data Form di klik
      
      // Kita akan menambahkan form dengan menggunakan append
      // pada sebuah tag div yg kita beri id insert-form
      $('#insert-form').append('<table>' +
        '<tr>' +
        '<td>Sarana Pertanian</td>' +
		'<td> : </td>' +
        '<td><input type="hidden" name="id[]" value="<?= $petani['id']; ?>">' + 
		'<input class="form-control" type="text" name="sarana[]" value="<?= set_value('sarana[]'); ?>" placeholder="Sarana"/>' +
		'</td>' +
		'</tr>' +

		'<tr>' +
		'<td>Jumlah</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="jumlah[]" value="<?= set_value('jumlah[]'); ?>" placeholder="Jumlah"/>' +
		'</td>' +
        '</tr>' +

		'<tr>' +
		'<td>Satuan</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="satuan[]" value="<?= set_value('satuan[]'); ?>" placeholder="Satuan"/>' +
		'</td>' +
        '</tr>' +
        
        '</table>' +
        '<br><br>');
      
      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });
    
    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-sarana").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
  </script>
  <?php endif; ?>

  <?php if ($this->uri->segment(2) == 'tambah_data_produksi') : ?>
<script>
  $(document).ready(function(){ // Ketika halaman sudah diload dan siap
    $("#btn-tambah-data-produksi").click(function(){ // Ketika tombol Tambah Data Form di klik
      
      // Kita akan menambahkan form dengan menggunakan append
      // pada sebuah tag div yg kita beri id insert-form
      $('#insert-form').append('<table>' +
        '<tr>' +
        '<td>Komoditas</td>' +
		'<td> : </td>' +
        '<td><input type="hidden" name="id[]" value="<?= $petani['id']; ?>">' + 
		'<input class="form-control" type="text" name="komoditas[]" value="<?= set_value('komoditas[]'); ?>" placeholder="Komoditas"/>' +
		'</td>' +
		'</tr>' +

		'<tr>' +
		'<td>Luas (Ha)</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="luas[]" value="<?= set_value('luas[]'); ?>" placeholder="Luas"/>' +
		'</td>' +
        '</tr>' +

		'<tr>' +
		'<td>Panen(Kg)</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="panen_kg[]" value="<?= set_value('panen_kg[]'); ?>" placeholder="Panen Per Kg"/>' +
		'</td>' +
        '</tr>' +

		'<tr>' +
		'<td>Harga Per Kg</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="harga[]" value="<?= set_value('harga[]'); ?>" placeholder="Harga"/>' +
		'</td>' +
        '</tr>' +
        
        '</table>' +
        '<br><br>');
      
      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });
    
    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-data-produksi").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
  </script>
  <?php endif; ?>

  <?php if ($this->uri->segment(2) == 'tambah_adminis') : ?>
<script>
  $(document).ready(function(){ // Ketika halaman sudah diload dan siap
    $("#btn-tambah-adminis").click(function(){ // Ketika tombol Tambah Data Form di klik
      
      // Kita akan menambahkan form dengan menggunakan append
      // pada sebuah tag div yg kita beri id insert-form
      $('#insert-form').append('<table>' +
        '<tr>' +
        '<td>Sarana Pertanian</td>' +
		'<td> : </td>' +
        '<td><input type="hidden" name="id[]" value="<?= $poktan['id']; ?>">' + 
		'<input class="form-control" type="text" name="adminis_kelompok[]" value="<?= set_value('adminis_kelompok[]'); ?>" placeholder="Administrasi Kelompok"/>' +
		'</td>' +
		'</tr>' +

		'<tr>' +
		'<td>Jumlah</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="jumlah[]" value="<?= set_value('jumlah[]'); ?>" placeholder="Jumlah"/>' +
		'</td>' +
        '</tr>' +

		'<tr>' +
		'<td>Satuan</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="satuan[]" value="<?= set_value('satuan[]'); ?>" placeholder="Satuan"/>' +
		'</td>' +
        '</tr>' +
        
        '</table>' +
        '<br><br>');
      
      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });
    
    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-adminis").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
  </script>
  <?php endif; ?>

  <?php if ($this->uri->segment(2) == 'tambah_infras') : ?>
<script>
  $(document).ready(function(){ // Ketika halaman sudah diload dan siap
    $("#btn-tambah-infras").click(function(){ // Ketika tombol Tambah Data Form di klik
      
      // Kita akan menambahkan form dengan menggunakan append
      // pada sebuah tag div yg kita beri id insert-form
      $('#insert-form').append('<table>' +
        '<tr>' +
        '<td>Sarana Pertanian</td>' +
		'<td> : </td>' +
        '<td><input type="hidden" name="id[]" value="<?= $poktan['id']; ?>">' + 
		'<input class="form-control" type="text" name="infra_pertanian[]" value="<?= set_value('infra_pertanian[]'); ?>" placeholder="Infrastruktur Pertanian"/>' +
		'</td>' +
		'</tr>' +

		'<tr>' +
		'<td>Jumlah</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="jumlah[]" value="<?= set_value('jumlah[]'); ?>" placeholder="Jumlah"/>' +
		'</td>' +
        '</tr>' +

		'<tr>' +
		'<td>Satuan</td>' +
		'<td> : </td>' +
        '<td>' + 
		'<input class="form-control" type="text" name="satuan[]" value="<?= set_value('satuan[]'); ?>" placeholder="Satuan"/>' +
		'</td>' +
        '</tr>' +
        
        '</table>' +
        '<br><br>');
      
      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });
    
    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-infras").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
  </script>
  <?php endif; ?>

  <!-- Sweetalert -->
<script>
    
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
            title: 'Data',
            text: 'Berhasil ' + flashData,
            icon: 'success'
        });
    }

    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })

    $(".tombol-keluar").click(function(e) {
    Swal.fire({
        title: "Anda yakin ingin keluar dari sistem ?",
        text: "",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: "Batal",
        confirmButtonText: "Keluar !"
    }).then(function(result) {
        if (result.value) {
            document.location.href = "<?= base_url('auth/logout/'); ?>";
        }
    });
});
</script>
<!-- End Sweetalert -->
	</body>
	<!--end::Body-->
</html>