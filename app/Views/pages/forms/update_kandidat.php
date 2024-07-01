            <div class="main-panel">

                <div class="content d-flex justify-content-center align-items-center">

                    <div class="page-inner py-3">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card">

                                    <div class="card-header">

										<div class="d-flex align-items-center justify-content-center">

											<h4 class="card-title"><i class="mr-2 fas fa-gears"></i><b>UPDATE KANDIDAT</b></h4>
                                            
										</div>

									</div>

                                    <form action="/kandidat/update_kandidat/" method="post" enctype="multipart/form-data">

                                        <div class="card-body">

                                            <div class="row clearfix">
                                                
                                                <div class="form-group col-md-12">

                                                    <label for="ketua_osis">Ketua Osis</label>
                                                    
                                                    <div class="col-md-12 p-0">

                                                        <select class="form-control" name="ketua_osis" id="ketua_osis" required>

                                                            <option disabled selected>Select Ketua Osis</option>
                                                            <?php foreach ($muridData as $data) { ?>

                                                                <option value="<?php echo $data -> _user ?>" <?php echo $kandidatData -> ketua_osis == $data -> _user ? 'selected' : '' ?>><?php echo ucwords($data -> nama_depan . ' ' . $data -> nama_belakang) ?></option>

                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="form-group col-md-12">

                                                    <label for="wakil_ketua_osis_smk_input">Wakil Ketua Osis - SMK</label>
                                                    
                                                    <div class="col-md-12 p-0">

                                                        <select class="form-control" name="wakil_ketua_osis_smk" id="wakil_ketua_osis_smk" required>

                                                            <option disabled selected>Select Wakil Ketua Osis - SMK</option>
                                                            <?php foreach ($muridData as $data) { ?>

                                                                <option value="<?php echo $data -> _user ?>" <?php echo $kandidatData -> wakil_ketua_osis_smk == $data -> _user ? 'selected' : '' ?>><?php echo ucwords($data -> nama_depan . ' ' . $data -> nama_belakang) ?></option>

                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="form-group col-md-12">

                                                    <label for="wakil_ketua_osis_smp_input">Wakil Ketua Osis - SMP</label>
                                                    
                                                    <div class="col-md-12 p-0">

                                                        <select class="form-control" name="wakil_ketua_osis_smp" id="wakil_ketua_osis_smp" required>

                                                            <option disabled selected>Select Wakil Ketua Osis - SMP</option>
                                                            <?php foreach ($muridData as $data) { ?>

                                                                <option value="<?php echo $data -> _user ?>" <?php echo $kandidatData -> wakil_ketua_osis_smp == $data -> _user ? 'selected' : '' ?>><?php echo ucwords($data -> nama_depan . ' ' . $data -> nama_belakang) ?></option>

                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="card-footer d-flex justify-content-center">

                                            <button type="submit" class="btn btn-success btn-rounded btn-md"><i class="fas fa-check mr-2"></i>Submit</button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>