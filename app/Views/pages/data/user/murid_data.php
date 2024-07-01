            <div class="main-panel">

                <div class="content">

                    <div class="page-inner py-3">

                        <div class="row d-flex justify-content-center">

                            <div class="col-md-12">

                                <div class="card">

                                    <div class="card-header">

										<div class="d-flex align-items-center">

											<h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>DATABASE</b></h4>
                                            <ul class="breadcrumbs">

                                                <li class="nav-home">

                                                    <a href="<?= base_url('/home/dashboard') ?>" class="fas fa-home"></a>

                                                </li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a>user</a>

													</li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a>muridData</a>

													</li>

                                            </ul>

                                            <!-- <a href="/user/view_print_pdf/" class="ml-auto">

                                                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-link btn-danger btn-sm" data-original-title="Print PDF"><i class="fas fa-file-pdf fa-xl"></i></button>

                                            </a>

                                            <a href="/user/view_print_excel/" class="ml-2">

                                                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-link btn-success btn-sm" data-original-title="Print Excel"><i class="fas fa-file-csv fa-xl"></i></button>

                                            </a> -->

										</div>

									</div>

                                    <div class="card-body">

                                        <div class="table-responsive">

                                            <table id="limit-data-10" class="table table-striped table-hover table-bordered-bg-light mt-4">

                                                <thead>

                                                    <tr style="text-align: center;">

                                                        <th>No.</th>
                                                        <th>NIS</th>
                                                        <th>Nama Depan</th>
                                                        <th>Nama Belakang</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Tempat Lahir</th>
                                                        <th>Nomor Handphone</th>
                                                        <th>Alamat</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php $no = 1;

                                                        foreach($muridData as $data) {

                                                    ?>

                                                        <tr style="text-align: center;">
                                                    
                                                            <td><?php echo $no++?></td>
                                                            <td><?php echo ($data -> nis ? $data -> nis : '-') ?></td>
                                                            <td><?php echo ($data -> nama_depan ? ucwords($data -> nama_depan) : '-') ?></td>
                                                            <td><?php echo ($data -> nama_belakang ? ucwords($data -> nama_belakang) : '-') ?></td>
                                                            <td><?php echo ucwords($data -> jenis_kelamin ? ucwords($data -> jenis_kelamin) : '-') ?></td>
                                                            <td><?php echo ucwords($data -> tanggal_lahir ? $data -> tanggal_lahir : '-') ?></td>
                                                            <td><?php echo ucwords($data -> tempat_lahir ? ucwords($data -> tempat_lahir) : '-') ?></td>
                                                            <td><?php echo ucwords($data -> nomor_handphone ? $data -> nomor_handphone : '-') ?></td>
                                                            <td><?php echo ucwords($data -> alamat ? ucwords($data -> alamat) : '-') ?></td>

                                                        </tr>

                                                    <?php } ?>
                                                    
                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>