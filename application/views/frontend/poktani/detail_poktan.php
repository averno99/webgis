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
								<!--begin::Card-->
							<?php if(empty ($poktan)): ?>	
								<div>maaf data belum di post silahkan hubungi admin</div>
								<?php else : ?>
							<div class="card card-custom">
									<!--Begin::Header-->
									<div class="card-header card-header-tabs-line">
										<div class="card-toolbar">
											<ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
												<li class="nav-item mr-3">
													<a class="nav-link active" href="<?= site_url(); ?>FrontPoktan/detail/<?= $poktan['id'] ?>">
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
														<span class="nav-text font-weight-bold">Informasi Poktan</span>
													</a>
												</li>
												<li class="nav-item mr-3">
													<a class="nav-link" href="<?= site_url(); ?>FrontPoktan/pengurus/<?= $poktan['id'] ?>">
														<span class="nav-icon mr-2">
															<span class="svg-icon mr-3">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3" />
																		<path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
														<span class="nav-text font-weight-bold">Susunan Kepengurusan</span>
													</a>
												</li>
												<li class="nav-item mr-3">
													<a class="nav-link" href="<?= site_url(); ?>FrontPoktan/adminis/<?= $poktan['id'] ?>">
														<span class="nav-icon mr-2">
															<span class="svg-icon mr-3">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
																		<circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
														<span class="nav-text font-weight-bold">Administrasi Kelompok</span>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="<?= site_url(); ?>FrontPoktan/infras/<?= $poktan['id'] ?>">
														<span class="nav-icon mr-2">
															<span class="svg-icon mr-3">
																<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
																		<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
														<span class="nav-text font-weight-bold">Infrastruktur dan Sarpras</span>
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
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Nama Gapoktan</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $poktan['namaGapoktan']?>" disabled/>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Nama Kelompok Tani</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $poktan['namaPoktan']?>" disabled/>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Nama Ketua Kelompok</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $poktan['nama_ketua']?>" disabled/>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Status Kelompok</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $poktan['status']?>" disabled/>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Susunan Pengukuhan</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $poktan['pengukuhan']?>" disabled/>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Lokasi Pertanian</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" 
															value="Desan <?= $poktan['desa']?>, Dusun <?= $poktan['dusun']?>, RT.<?= $poktan['rt']?>/RW.<?= $poktan['rw']?>, Kecamatan <?= $poktan['kecamatan']?>" disabled/>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Luas Total Lahan Poktan</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $poktan['luas_lahan']?> Ha" disabled/>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Komoditas Unggulan</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $poktan['komoditas_unggul']?>" disabled/>
														</div>
													</div>
													<div class="d-flex justify-content-between border-top pt-10">
														<div class="mr-2">
															<a type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" href="<?= site_url('FrontPoktan')?>">Kembali</a>
														</div>
														<!-- <div>
															<a type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" href="<?= site_url(); ?>poktan/ubah_poktan/<?= $poktan['id'] ?>">Ubah Data</a>
														</div> -->
													</div>
												</form>
											</div>
											<!--end::Tab Content-->
										</div>
									</div>
									<!--end::Body-->
								</div>
								<!--end::Card-->
					
							</div>
							<?php endif; ?>
						</div>
					</div>
					<!--end::Content-->