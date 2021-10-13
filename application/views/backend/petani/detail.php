					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Page Title-->
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?= $judul; ?></h5>
									<!--end::Page Title-->
								</div>
								<!--end::Info-->
							</div>
						</div>
						<!--end::Subheader-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
							<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
							<?php if ($this->session->flashdata('flash')) : ?>
							<?php endif; ?>
								<!--begin::Card-->
								<div class="card card-custom">
									<!--Begin::Header-->
									<div class="card-header card-header-tabs-line">
										<div class="card-toolbar">
											<ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
												<li class="nav-item mr-3">
													<a class="nav-link active" href="<?= site_url(); ?>petani/detail/<?= $petani['id'] ?>">
														<span class="nav-icon mr-2">
															<span class="svg-icon mr-3">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
														<span class="nav-text font-weight-bold">Informasi Petani</span>
													</a>
												</li>
                                                <li class="nav-item mr-3">
													<a class="nav-link" href="<?= site_url(); ?>petani/prasarana/<?= $petani['id'] ?>">
														<span class="nav-icon mr-2">
															<span class="svg-icon mr-3">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
														<span class="nav-text font-weight-bold">Prasarana & Sarana Pertanian</span>
													</a>
												</li>
                                                <li class="nav-item mr-3">
													<a class="nav-link" href="<?= site_url(); ?>petani/produksi/<?= $petani['id'] ?>">
														<span class="nav-icon mr-2">
															<span class="svg-icon mr-3">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
														<span class="nav-text font-weight-bold">Produksi Pertanian</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<!--end::Header-->
									<!--Begin::Body-->
									<div class="card-body">
										<div class="tab-content pt-5">
											<!--begin::Tab Content-->
											<div class="tab-pane active" role="tabpanel">
												<form class="form">
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Status Anggota</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['status_anggota']?>" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Nama Gapoktan</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['namaGapoktan']?>" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Nama Poktan</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['namaPoktan']?>" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Jabatan Dalam Kelompok Tani</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['jabatan']?>" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Pekerjaan Utama</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['pekerjaan_utama']?>" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label"><b>Jumlah Buruh Tani :</b></label>
														<div class="col-lg-9 col-xl-6"></div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Pengolahan Lahan</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['pengolah_lahan']?> Orang" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Tanam</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['tanam']?> Orang" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Pemeliharaan</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['pemeliharaan']?> Orang" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Panen/Pasca Panen</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['panen']?> Orang" disabled/>
														</div>
													</div>
												</form>
											</div>
											<!--end::Tab Content-->
										</div>
									</div>
									<!--end::Body-->
								</div>
								<!--end::Card-->

                                <!--begin::Card-->
								<div class="card card-custom mt-5">
									<div class="card-header">
										<div class="card-title">
											<h3 class="card-label">Biodata Personal</h3>
										</div>
									</div>
									<div class="card-body">
                                        <form class="form">
															<!-- <div class="form-group row">
																<label class="col-form-label col-3 text-lg-right text-left">Foto</label>
																<div class="col-9">
																	<div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url(assets/media/users/blank.png)">
																		<div class="image-input-wrapper"></div>
																		<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
																			<i class="fa fa-pen icon-sm text-muted"></i>
																			<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
																			<input type="hidden" name="profile_avatar_remove" />
																		</label>
																		<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
																		<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
																	</div>
																</div>
															</div> -->
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Nama</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['nama']?>" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Jenis Kelamin</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['jenis_kelamin']?>" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Status Dalam Keluarga</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['status_keluarga']?>" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Jumlah Anggota Keluarga (di KK)</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['jml_anggota_keluarga']?> Orang" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Jumlah Tanggungan (Situasi Saat Ini)</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['jml_tanggungan']?> Orang" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Pendidikan Terakhir</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['pendidikan']?>" disabled/>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Riwayat Pelatihan</label>
														<div class="col-lg-9 col-xl-6">
                                                            <?php if ($petani['riwayat_pelatihan'] < 1) : ?>
                                                                <input class="form-control form-control-lg form-control-solid" type="text" value="Tidak Pernah Ikut Pelatihan" disabled/>
                                                            <?php else : ?>
                                                                <input class="form-control form-control-lg form-control-solid" type="text" value="Pernah Ikut Pelatihan <?= $petani['riwayat_pelatihan']?> Kali" disabled/>
                                                            <?php endif; ?>
															
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Kontak Person (Nomor HP/Telp)</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $petani['no_hp']?>" disabled/>
														</div>
													</div>
													<div class="form-group row">
                                  						<label class="col-xl-3 col-lg-3 text-right col-form-label">Foto</label>
                                    					<div class="col-lg-9 col-xl-6">
                                        					<img src="<?= base_url('assets/gambar/petani/') . $petani['foto']; ?>" class="img-thumbnail" width="200">
                                    					</div>
                              						</div>
												
												<?php if ($user['role'] == 'Admin') : ?>
													<div class="d-flex justify-content-between border-top pt-10">
														<div class="mr-2">
															<a type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" href="<?= site_url('petani')?>">Kembali</a>
														</div>
														<div>
															<a type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" href="<?= site_url(); ?>petani/ubah_petani/<?= $petani['id'] ?>">Ubah Data</a>
														</div>
													</div>
												<?php endif; ?>
													
												</form>
                                    </div>
								</div>
										<!--end::Card-->
					
							</div>
						</div>
					</div>
					<!--end::Content-->