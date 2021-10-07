					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Page Title-->
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data <?= $judul ?></h5>
									<!--end::Page Title-->
								</div>
								<!--end::Info-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap py-5">
										<div class="card-title">
											<h3 class="card-label">Data Kapoktan</h3>
										</div>
										
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Gapoktan</th>
													<th>Nama Kelompok Tani</th>
													<th>Alamat</th>
													<th>Total Luas Lahan</th>
													<th>Komoditas Unggulan</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$no = 1;
											foreach ($poktan as $pkt) : ?>
												<tr>
													<td><?= $no++; ?></td>
													<td><?= $pkt['namaGapoktan']?></td>
													<td><?= $pkt['namaPoktan']?></td>
													<td><?= $pkt['dusun']?>, <?= $pkt['desa']?>, <?= $pkt['kecamatan']?></td>
													<td><?= $pkt['luas_lahan']?> Ha</td>
													<td><?= $pkt['komoditas_unggul']?></td>
													<td><a href="<?= site_url(); ?>FrontPoktan/detail/<?= $pkt['id'] ?>" class="btn btn-outline-info btn-sm">Detail</a></td>
												</tr>
											<?php endforeach; ?>
											</tbody>
										</table>
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->