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

                                            </ul>

                                            <?php if (in_array(session() -> get('level'), [1, 2])) { ?>

                                                <a href="/user/view_insert_user/" class="ml-auto">

                                                    <button type="button" data-toggle="tooltip" class="btn btn-link btn-secondary btn-sm" data-original-title="Add new account"><i class="fas fa-user-plus fa-xl"></i></button>

                                                </a>

                                            <?php } ?>

                                            <!-- <a href="/user/view_print_pdf/" class="ml-2">

                                                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-link btn-danger btn-sm" data-original-title="Print PDF"><i class="fas fa-file-pdf fa-xl"></i></button>

                                            </a>

                                            <a href="/user/view_print_excel/" class="ml-2">

                                                <button type="button" data-toggle="tooltip" data-placement="bottom" class="btn btn-link btn-success btn-sm" data-original-title="Print Excel"><i class="fas fa-file-csv fa-xl"></i></button> -->

                                            </a>

										</div>

									</div>

                                    <div class="card-body">

                                        <div class="table-responsive">

                                            <table id="limit-data-10" class="table table-striped table-hover table-bordered-bg-light mt-4">

                                                <thead>

                                                    <tr style="text-align: center;">

                                                        <th>No.</th>
                                                        <th>Profile</th>
                                                        <th>Username</th>
                                                        <th>E-mail</th>
                                                        <th>Level</th>
                                                        <th>Action</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php $no = 1;

                                                        foreach($userData as $data) {

                                                    ?>

                                                        <tr style="text-align: center;">
                                                    
                                                            <td><?php echo $no++?></td>
                                                            <td><img src="<?= base_url('assets/images/'.($data -> profile ? $data -> profile : 'default-profile.png')) ?>" style="border-radius: 15%; width: 50px; height: 50px; object-fit: cover;"></td>
                                                            <td><?php echo ($data -> username ? $data -> username : '-') ?></td>
                                                            <td><?php echo ($data -> email ? $data -> email : '-') ?></td>
                                                            <td><?php echo ucwords($data -> nama_level ? $data -> nama_level : '-') ?></td>

                                                            <td width="20%">

                                                                <?php if (in_array($data -> _level, [1, 2, 3, 4])) { ?>

                                                                    <a href="<?= base_url('/user/view_update_guru/'.$data -> id_user) ?>">

                                                                        <button type="button" data-toggle="tooltip" class="btn btn-link btn-primary btn-sm" data-original-title="Edit Data"><i class="fas fa-user-pen fa-xl"></i></button>

                                                                    </a>

                                                                    <a href="<?= base_url('/user/delete_guruData/'.$data -> id_user) ?>">

                                                                        <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-sm" data-original-title="Delete Data"><i class="fas fa-trash fa-xl"></i></button>

                                                                    </a>

                                                                <?php } else if (in_array($data -> _level, [5])) { ?>

                                                                    <a href="<?= base_url('/user/view_update_murid/'.$data -> id_user) ?>">

                                                                        <button type="button" data-toggle="tooltip" class="btn btn-link btn-primary btn-sm" data-original-title="Edit Data"><i class="fas fa-user-pen fa-xl"></i></button>

                                                                    </a>

                                                                    <a href="<?= base_url('/user/delete_muridData/'.$data -> id_user) ?>">

                                                                        <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-sm" data-original-title="Delete Data"><i class="fas fa-trash fa-xl"></i></button>

                                                                    </a>

                                                                <?php } ?>

                                                            </td>

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