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
							<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
							<?php if ($this->session->flashdata('flash')) : ?>
							<?php endif; ?>
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header flex-wrap py-5">
										<div class="card-title">
											<h3 class="card-label">Data User</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Button-->
											<a href="<?= site_url('user/tambah_user')?>" class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-outline-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        											<rect x="0" y="0" width="24" height="24"/>
        											<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
        											<path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
    											</g>
											</svg><!--end::Svg Icon--></span>Tambah Data</a>
											<!--end::Button-->
										</div>
										
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$no = 1;
											foreach ($users as $usr) : ?>
												<tr>
													<td><?= $no++; ?></td>
													<td><?= $usr['nama']?></td>
                                                    <td><?= $usr['username']?></td>
                                                    <td><?= $usr['role']?></td>
                                                    <td>
                                                        <?php if ($usr['status'] == 'Aktif') : ?>
                                                                <span class="badge badge-success"><?= $usr['status']; ?></span>
                                                            <?php else : ?>
                                                                <span class="badge badge-danger"><?= $usr['status']; ?></span>
                                                            <?php endif; ?>
                                                    </td>
													<td>
														<a href="<?= site_url(); ?>user/ubah_user/<?= $usr['id'] ?>" class="btn btn-outline-success btn-sm"><small>Ubah</small></a> 
														<a href="<?= site_url(); ?>user/detail_user/<?= $usr['id'] ?>" class="btn btn-outline-info btn-sm"><small>Detail</small></a> 
														<a href="<?= site_url(); ?>user/hapus_user/<?= $usr['id'] ?>" class="btn btn-outline-danger btn-sm tombol-hapus"><small>Hapus</small></a> 
														<a href="<?= site_url(); ?>user/reset_password/<?= $usr['id'] ?>" class="btn btn-outline-danger btn-sm"><small>Reset Password</small></a>
													</td>
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