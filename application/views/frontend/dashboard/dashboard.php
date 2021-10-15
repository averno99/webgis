					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-2">
									<!--begin::Page Title-->
									<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Sistem Informasi Kegiatan Pertanian Kawasan...</h5>
									<!--end::Page Title-->
								</div>
								<!--end::Info-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="ml-auto mb-3">
                                            <form action="" method="GET">
                                                <div class="col-md-12">
                                                    <div class="input-group mt-2">
                                                        <select class="custom-select" name="cari" id="cari">
                                                            <option value="">Tampilkan Semua</option>
                                                            <?php foreach ($gapoktan as $gpt) : ?>
                                                                <?php if ($gpt['id'] == $this->input->get('cari')) : ?>
                                                                    <option value="<?= $gpt['id']; ?>" selected><?= $gpt['nama']; ?></option>
                                                                <?php else : ?>
                                                                    <option value="<?= $gpt['id']; ?>"><?= $gpt['nama']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-success" type="submit">Pilih</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                        </div>
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Dashboard-->
								<!--begin::Row-->
								<div class="row">

								<div id="mapid"></div>
                                    
								</div>
								<!--end::Row-->
								<!--end::Dashboard-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->