            <div class="main-panel">

                <div class="content">

                    <div class="page-inner py-3">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card d-flex align-items-center justify-content-center">

                                    <div class="card-header">

										<div class="d-flex align-items-center">

											<h4 class="card-title"><i class="mr-2 fas fa-archive"></i><b>INSERT</b></h4>
                                            <ul class="breadcrumbs">

                                                <li class="nav-home">

                                                    <a href="/home/dashboard/" class="fas fa-home"></a>

                                                </li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a href="/penjadwalan/">penjadwalan</a>

													</li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a>insert_penjadwalan</a>

													</li>

                                            </ul>

										</div>

									</div>

                                    <form action="/penjadwalan/insert_penjadwalanData/" method="post" enctype="multipart/form-data">

                                        <div class="card-body">

                                            <div class="row">

                                                <!-- Username input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="topic_input">Judul Kegiatan <span style="color: #ff0000"> *</span></label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control" type="text" name="topic" id="topic_input" placeholder="Judul Kegiatan" required maxlength="200">

                                                        </div>

                                                    </div>

                                                <!-- End Username input -->

                                                <!-- Birthdate input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="activity_date_input">Tanggal Kegiatan <span style="color: #ff0000"> *</span></label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="date" name="activity_date" id="activity_date_input" required>

                                                        </div>

                                                    </div>

                                                <!-- End Birthdate input -->

                                                <!-- Birthdate input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="time_start_input">Jam Mulai <span style="color: #ff0000"> *</span></label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="time" name="time_start" id="time_start_input" required>

                                                        </div>

                                                    </div>

                                                <!-- End Birthdate input -->

                                                <!-- Birthdate input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="time_ends_input">Jam Selesai <span style="color: #ff0000"> *</span></label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="time" name="time_ends" id="time_ends_input" required>

                                                        </div>

                                                    </div>

                                                <!-- End Birthdate input -->

                                                <!-- Last Name input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="deskripsi_input">Deskripsi Kegiatan</label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="text" name="deskripsi_kegiatan" id="deskripsi_kegiatan_input" placeholder="Deskripsi Kegiatan" maxlength="80">

                                                        </div>

                                                    </div>

                                                <!-- End Last Name input -->
                                                
                                                <!-- Address input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="tempat_kegiatan_input">Tempat Kegiatan</label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="text" name="tempat_kegiatan" id="tempat_kegiatan_input" placeholder="Tempat Kegiatan" maxlength="225">

                                                        </div>

                                                    </div>

                                                <!-- End Address input -->

                                            </div>

                                        </div>

                                        <div class="card-footer d-flex justify-content-center">

                                            <button type="submit" class="btn btn-success btn-rounded mr-2"><i class="fas fa-check mr-2"></i> Submit</button>
                                            <button type="reset" class="btn btn-danger btn-rounded" id="reset"><i class="fas fa-rotate mr-2"></i>Reset</button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>