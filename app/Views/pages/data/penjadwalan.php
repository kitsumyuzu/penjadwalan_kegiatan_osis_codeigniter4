            <div class="main-panel">

                <div class="content">

                    <div class="page-inner py-3">

                        <div class="row d-flex justify-content-center">

                            <div class="col-md-12">

                                <div class="card">

                                    <div class="card-header">

										<div class="d-flex align-items-center">

											<h4 class="card-title"><i class="mr-2 far fa-calendar"></i><b>PENJADWALAN KEGIATAN</b></h4>
                                            <ul class="breadcrumbs">

                                                <li class="nav-home">

                                                    <a href="<?= base_url('/home/dashboard') ?>" class="fas fa-home"></a>

                                                </li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a>penjadwalan</a>

													</li>

                                            </ul>

                                            <?php if (in_array(session() -> get('level'), [1, 2, 3]) || session() -> get('id') == $kandidat -> ketua_osis || session() -> get('id') == $kandidat -> wakil_ketua_osis_smk || session() -> get('id') == $kandidat -> wakil_ketua_osis_smp) { ?>

                                                <a href="/penjadwalan/view_insert_penjadwalan/" class="ml-auto">

                                                    <button type="button" data-toggle="tooltip" class="btn btn-link btn-secondary btn-sm" data-original-title="Add new activity"><i class="fas fa-calendar-plus fa-xl"></i></button>

                                                </a>

                                            <?php } ?>

										</div>

									</div>

                                    <div class="card-body">

                                        <div class="table-responsive">

                                            <table id="limit-data-10" class="table table-striped table-hover table-bordered-bg-light mt-4">

                                                <thead>

                                                    <tr style="text-align: center;">

                                                        <th>No.</th>
                                                        <th>Judul Kegiatan</th>
                                                        <th>Tanggal Perencanaan Kegiatan</th>
                                                        <th>Mulai Kegiatan</th>
                                                        <th>Selesai Kegiatan</th>
                                                        <th>Deskripsi Kegiatan</th>
                                                        <th>Tempat Kegiatan</th>
                                                        <?php if (in_array(session() -> get('level'), [1, 2, 3]) || session() -> get('id') == $kandidat -> ketua_osis || session() -> get('id') == $kandidat -> wakil_ketua_osis_smk || session() -> get('id') == $kandidat -> wakil_ketua_osis_smp) { ?>
                                                        
                                                            <th>Action</th>

                                                        <?php } ?>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php $no = 1;

                                                        foreach($kegiatanData as $data) {

                                                    ?>

                                                        <tr style="text-align: center;">
                                                    
                                                            <td><?php echo $no++?></td>
                                                            <td><?php echo ($data -> judul_kegiatan ? $data -> judul_kegiatan : '-') ?></td>
                                                            <td><?php echo ($data -> tanggal_kegiatan ? $data -> tanggal_kegiatan : '-') ?></td>
                                                            <td><?php echo ucwords($data -> mulai_kegiatan ? $data -> mulai_kegiatan : '-') ?></td>
                                                            <td><?php echo ucwords($data -> selesai_kegiatan ? $data -> selesai_kegiatan : '-') ?></td>
                                                            <td><?php echo ucwords($data -> peraturan_kegiatan ? $data -> peraturan_kegiatan : '-') ?></td>
                                                            <td><?php echo ucwords($data -> tempat_kegiatan ? $data -> tempat_kegiatan : '-') ?></td>

                                                            <?php if (in_array(session() -> get('level'), [1, 2, 3]) || session() -> get('id') == $kandidat -> ketua_osis || session() -> get('id') == $kandidat -> wakil_ketua_osis_smk || session() -> get('id') == $kandidat -> wakil_ketua_osis_smp) { ?>

                                                                <td width="20%">
                                                                    
                                                                    <a href="<?= base_url('/penjadwalan/view_update_penjadwalan/'.$data -> id_penjadwalan) ?>">

                                                                        <button type="button" data-toggle="tooltip" class="btn btn-link btn-primary btn-sm" data-original-title="Edit Data"><i class="fas fa-user-pen fa-xl"></i></button>

                                                                    </a>

                                                                    <a href="<?= base_url('/penjadwalan/delete_penjadwalanData/'.$data -> id_penjadwalan) ?>">

                                                                        <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-sm" data-original-title="Delete Data"><i class="fas fa-trash fa-xl"></i></button>

                                                                    </a>
                                                                
                                                                </td>

                                                            <?php } ?>

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