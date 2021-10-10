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
								<div class="card card-custom">
									<!--Begin::Header-->
									<div class="card-header card-header-tabs-line">
										<div class="card-toolbar">
											<ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
												<li class="nav-item mr-3">
													<a class="nav-link" href="<?= site_url(); ?>FrontPetani/detail/<?= $petani['id'] ?>">
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
													<a class="nav-link active" href="<?= site_url(); ?>FrontPetani/prasarana/<?= $petani['id'] ?>">
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
													<a class="nav-link" href="<?= site_url(); ?>FrontPetani/produksi/<?= $petani['id'] ?>">
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
										<?php if (empty($prasarana)) : ?>
										    <div class="alert alert-custom alert-light-danger" role="alert">
                                                Data Tidak Ditemukan!
                                            </div>
                                        <?php else :?>
										<form class="form">
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Status Pemilik</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" value="<?= $prasarana['status_pemilik']?>" disabled/>
														</div>
													</div>
												</form>
										<!--end: Datatable-->
										<?php endif; ?>
												
											</div>
											<!--end::Tab Content-->
										</div>
									</div>
									<!--end::Body-->
								</div>
								<!--end::Card-->
                                <div class="card card-custom mt-5">
									<div class="card-header">
										<div class="card-title">
											<h3 class="card-label">Lokasi Pertanian</h3>
										</div>
									</div>
									<div class="card-body">
                                        <?php if (empty($lokasi)) : ?>
										    <div class="alert alert-custom alert-light-danger" role="alert">
                                                Data Tidak Ditemukan!
                                            </div>
                                        <?php else :?>
										<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
											<thead>
												<tr>
													<th>No</th>
													<th>Luas Lahan Milik Sendiri + Digarap (Ha)</th>
													<th>Luas Lahan Sewa + Digarap (Ha)</th>
													<th>Keterangan</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$no = 1;
											foreach ($lokasi as $lks) : ?>
												<tr>
													<td><?= $no++; ?></td>
													<td><?= $lks['luas_lahan_sendiri']?> Ha</td>
													<td><?= $lks['luas_lahan_sewa']?> Ha</td>
													<td><?= $lks['keterangan']?></td>
                                                    <td><?= $lks['latitude']?></td>
                                                    <td><?= $lks['longitude']?></td>
												</tr>
											<?php endforeach; ?>
											</tbody>
										</table>
										<!--end: Datatable-->
										<?php endif; ?>
                                    </div>
								</div>

                                <div class="card card-custom mt-5">
									<div class="card-header">
										<div class="card-title">
											<h3 class="card-label">Sarana Pertanian (Milik Perorangan)</h3>
										</div>
									</div>
									<div class="card-body">
                                        <?php if (empty($sarana)) : ?>
											<div class="alert alert-custom alert-light-danger" role="alert">
                                                Data Tidak Ditemukan!
                                            </div>
										<?php else :?>
										<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
											<thead>
												<tr>
													<th>No</th>
													<th>Sarana Pertanian</th>
													<th>Jumalh</th>
													<th>Satuan</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$no = 1;
											foreach ($sarana as $srn) : ?>
												<tr>
													<td><?= $no++; ?></td>
													<td><?= $srn['sarana']?></td>
													<td><?= $srn['jumlah']?></td>
													<td><?= $srn['satuan']?></td>
												</tr>
											<?php endforeach; ?>
											</tbody>
										</table>
										<!--end: Datatable-->
										
										<?php endif; ?>
                                    </div>
								</div>
					
							</div>
						</div>
					</div>
					<!--end::Content-->