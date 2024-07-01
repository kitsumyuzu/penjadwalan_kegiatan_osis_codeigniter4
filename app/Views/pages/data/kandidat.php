            <div class="main-panel">

                <div class="content">

                    <div class="page-inner py-3">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">

                                    <div class="card-header">

										<div class="d-flex align-items-center">

                                            <h4 class="card-title"><i class="mr-2 fas fa-user-tag"></i><b>KANDIDAT OSIS</b></h4>
                                            <ul class="breadcrumbs">

                                                <li class="nav-home">

                                                    <a href="<?= base_url('/home/dashboard') ?>" class="fas fa-home"></a>

                                                </li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a>kandidat</a>

													</li>

                                            </ul>

                                            <?php if (in_array(session() -> get('level'), [1, 2, 3])) { ?>

                                                <a href="<?= base_url('/kandidat/view_update_kandidat/'. $ketua -> id_kandidat) ?>" class="ml-auto">

                                                    <button type="button" data-toggle="tooltip" data-placement="left" class="btn btn-link btn-danger btn-sm" data-original-title="Edit Kandidat"><i class="fas fa-pen fa-xl"></i></button>

                                                </a>

                                            <?php } ?>

										</div>

									</div>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="card">

                                    <div class="card-header">

										<div class="d-flex justify-content-center">

                                            <h4><i class="mr-2 fas fa-user-tag"></i><b>KETUA OSIS</b></h4>
                                            
										</div>

									</div>

                                    <img src="<?= base_url('assets/images/'.($ketua -> profile ? $ketua -> profile : 'default-profile.png')) ?>" alt="Bendahara" class="card-img top">
                                    <h2 style="color: #fff" class="d-flex justify-content-center"><b><?php echo ucwords($ketua -> nama_depan ? $ketua -> nama_depan . ' ' . $ketua -> nama_belakang : 'Anonymous') ?></b></h2>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="card">

                                    <div class="card-header">

										<div class="d-flex justify-content-center">

                                            <h4><i class="mr-2 fas fa-user-tag"></i><b>WAKIL KETUA OSIS - SMK</b></h4>
                                            
										</div>

									</div>

                                    <img src="<?= base_url('assets/images/'.($wakil -> profile ? $wakil -> profile : 'default-profile.png')) ?>" alt="Bendahara" class="card-img top">
                                    <h2 style="color: #fff" class="d-flex justify-content-center"><b><?php echo ucwords($wakil -> nama_depan ? $wakil -> nama_depan . ' ' . $wakil -> nama_belakang : 'Anonymous') ?></b></h2>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="card">

                                    <div class="card-header">

										<div class="d-flex justify-content-center">

                                            <h4><i class="mr-2 fas fa-user-tag"></i><b>WAKIL KETUA OSIS - SMP</b></h4>
                                            
										</div>

									</div>

                                    <img src="<?= base_url('assets/images/'.($wakil2 -> profile ? $wakil2 -> profile : 'default-profile.png')) ?>" alt="Bendahara" class="card-img top">
                                    <h2 style="color: #fff" class="d-flex justify-content-center"><b><?php echo ucwords($wakil2 -> nama_depan ? $wakil2 -> nama_depan . ' ' . $wakil2 -> nama_belakang : 'Anonymous') ?></b></h2>

                                </div>

                            </div>
                            
                        </div>

                    </div>

                </div>