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
													<a class="nav-link active" href="#">
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
														<span class="nav-text font-weight-bold">Ubah Data</span>
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
                                                <?= form_open_multipart(''); ?>
												<input type="hidden" name="diubah" value="<?= $user['nama']; ?>"/>
                                                <input type="hidden" name="id" value="<?= $poktan['id']; ?>">
                                                    <div class="form-group row">
														<label class="col-form-label col-3 text-lg-right text-left">Nama Gapoktan</label>
														<div class="col-lg-9 col-xl-6">
															<select class="form-control form-control-lg form-control-solid" name="gapoktan">
																<?php foreach ($gapoktan as $gpt) : ?>
                                                                    <?php if ($gpt['id'] == $poktan['id_gapoktan']) : ?>
                                                                        <option value="<?= $gpt['id']; ?>" selected><?= $gpt['nama']; ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $gpt['id']; ?>"><?= $gpt['nama']; ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Nama Poktan</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" name="poktan" value="<?= $poktan['namaPoktan']; ?>" placeholder="Nama Kelompok Tani"/>
                                                            <?= form_error('poktan', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Nama Ketua Kelompok</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" name="ketua" value="<?= $poktan['nama_ketua']; ?>" placeholder="Nama Ketua Kelompok"/>
                                                            <?= form_error('ketua', ' <small class="text-danger">', '</small>'); ?>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-3 text-lg-right text-left">Status Kelompok</label>
														<div class="col-lg-9 col-xl-6">
															<select class="form-control form-control-lg form-control-solid" name="status">
																<?php foreach ($status as $sts) : ?>
                                            						<?php if ($sts == $poktan['status']) : ?>
                                                						<option value="<?= $sts; ?>" selected><?= $sts; ?></option>
                                            						<?php else : ?>
                                                						<option value="<?= $sts; ?>"><?= $sts; ?></option>
                                            						<?php endif; ?>
                                        						<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-3 text-lg-right text-left">Susunan Pengukuhan</label>
														<div class="col-lg-9 col-xl-6">
															<select class="form-control form-control-lg form-control-solid" name="pengukuhan">
																<?php foreach ($pengukuhan as $pnk) : ?>
                                            						<?php if ($pnk == $poktan['pengukuhan']) : ?>
                                                						<option value="<?= $pnk; ?>" selected><?= $pnk; ?></option>
                                            						<?php else : ?>
                                                						<option value="<?= $pnk; ?>"><?= $pnk; ?></option>
                                            						<?php endif; ?>
                                        						<?php endforeach; ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Kecamatan</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" name="kecamatan" value="<?= $poktan['kecamatan']; ?>" placeholder="Kecamatan"/>
                                                            <?= form_error('kecamatan', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Desa</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" name="desa" value="<?= $poktan['desa']; ?>" placeholder="Desa"/>
                                                            <?= form_error('desa', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Dusun</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" name="dusun" value="<?= $poktan['dusun']; ?>" placeholder="Dusun"/>
                                                            <?= form_error('dusun', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">RT</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" name="rt" value="<?= $poktan['rt']; ?>" placeholder="RT"/>
                                                            <?= form_error('rt', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">RW</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" name="rw" value="<?= $poktan['rw']; ?>" placeholder="RW"/>
                                                            <?= form_error('rw', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Luas Total Lahan Poktan</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" name="luas_lahan" value="<?= $poktan['luas_lahan']; ?>" placeholder="Luas Lahan (Ha)"/>
                                                            <?= form_error('luas_lahan', ' <small class="text-danger">', '</small>'); ?>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Komoditas Unggulan</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="text" name="komoditas_unggul" value="<?= $poktan['komoditas_unggul']; ?>" placeholder="Komoditas Unggulan"/>
                                                            <?= form_error('komoditas_unggul', ' <small class="text-danger">', '</small>'); ?>
														</div>
													</div>
                                                    <div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">GeoJSON</label>
														<div class="col-lg-9 col-xl-6">
															<div class="row">
																<div class="form-control">
                                                            		<a href="<?= site_url('assets/geojson/') . $poktan['geojson']; ?>" target="_BLANK"><?= $poktan['geojson']; ?></a>
                                                        		</div>
															</div>
															<div class="row">
															<div class="custom-file mt-3">
                                                                <input type="file" class="custom-file-input" id="geojson" name="geojson">
                                                                <label class="custom-file-label" for="geojson">Upload GeoJSON</label>
                                                            </div>
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-xl-3 col-lg-3 text-right col-form-label">Warna</label>
														<div class="col-lg-9 col-xl-6">
															<input class="form-control form-control-lg form-control-solid" type="color" name="warna" value="<?= $poktan['warna']; ?>"/>
                                                            <?= form_error('warna', ' <small class="text-danger">', '</small>'); ?>
                                                        </div>
													</div>
													<div class="d-flex justify-content-between border-top pt-10">
															<div class="mr-2">
																<a type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" href="<?= site_url('poktan/detail/').$poktan['id']?>">Kembali</a>
															</div>
															<div>
																<button type="submit" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4">Simpan Data</button>
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
					
							</div>
						</div>
					</div>
					<!--end::Content-->