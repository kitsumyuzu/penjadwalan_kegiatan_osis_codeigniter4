            <div class="main-panel">

                <div class="content">

                    <div class="page-inner py-3">

                        <div class="row">

                            <div class="col-md-4">

                                <div class="card">

                                    <div class="card-header" style="background-position: center; background-image: url('<?= base_url('assets') ?>/images/default-background.png')">
                                
                                        <div class="row">

                                            <div class="col-md-4">

                                                <div class="profile-picture">

                                                    <div class="avatar avatar-xl">

                                                        <img id="image_preview" src="<?= base_url('assets') ?>/images/default-profile.png" alt="..." class="avatar-img rounded-circle">
                                                        
                                                    </div>


                                                </div>

                                            </div>

                                            <div class="col-md-8 d-flex align-items-center justify-content-center">

                                                <h3 class="col-md-12 name">Anonymous</h3>

                                                <script>

                                                    document.addEventListener('DOMContentLoaded', function() {

                                                        function ucwords(str) {

                                                            return str.toLowerCase().replace(/\b[a-z]/g, function(letter) {

                                                                return letter.toUpperCase();

                                                            });

                                                        }

                                                        function updateName() {

                                                            const firstNameInput = document.getElementById('nama_depan_input').value;
                                                            const lastNameInput = document.getElementById('nama_belakang_input').value;
                                                            const nameElement = document.querySelector('.name');

                                                            const fullName = `${ucwords(firstNameInput)} ${ucwords(lastNameInput)}`;

                                                            nameElement.textContent = fullName.trim() !== '' ? fullName : 'Anonymous';

                                                        }

                                                        const firstNameInput = document.getElementById('nama_depan_input');
                                                        const lastNameInput = document.getElementById('nama_belakang_input');

                                                        firstNameInput.addEventListener('input', updateName);
                                                        lastNameInput.addEventListener('input', updateName);

                                                    });

                                                </script>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <a href="/user/">
                                    <button class="btn btn-lg btn-rounded btn-secondary col-12"><i class="fas fa-circle-left mr-2"></i>Back</button>
                                </a>

                            </div>

                            <div class="col-md-8">

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

														<a href="/user/">user</a>

													</li>

                                                <li class="separator">

                                                    <i class="fas fa-caret-right"></i>

                                                </li>

													<li class="nav-item">

														<a>insert_user</a>

													</li>

                                            </ul>

										</div>

									</div>

                                    <form action="/user/insert_userData/" method="post" enctype="multipart/form-data">

                                        <div class="card-body">

                                            <div class="row">

                                                <!-- Username input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="username_input">Username <span style="color: #ff0000"> *</span></label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control" type="text" name="username" id="username_input" placeholder="Username" required maxlength="32">

                                                        </div>

                                                    </div>

                                                <!-- End Username input -->

                                                <!-- Email input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="email_input">Email <span style="color: #ff0000"> *</span></label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control" type="text" name="email" id="email_input" placeholder="example@root.com" required maxlength="42">

                                                        </div>

                                                    </div>

                                                <!-- End Email input -->

                                                <!-- Password input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="password_input">Password <span style="color: #ff0000"> *</span></label>

                                                        <div class="input-group">
                                                            
                                                            <input type="password" name="password" id="password_input" placeholder="password" class="form-control" maxlength="26" required>
                                                            

                                                            <div class="input-group-append">

                                                                <span class="input-group-text" id="show-password"><i class="fas fa-eye-slash" aria-hidden="true"></i></span>

                                                            </div>

                                                        </div>

                                                    </div>

                                                <!-- End Password input -->

                                                <!-- Level input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="level_input">Level<span style="color: #ff0000"> *</span></label>

                                                        <div class="col-md-10 p-0">

                                                            <select class="form-control" name="level" id="level_input" required>

                                                                <option disabled selected>Select Level</option>
                                                                <?php foreach ($levelData as $data) { ?>

                                                                    <option value="<?php echo $data -> id_level ?>"><?php echo ucwords($data -> nama_level) ?></option>

                                                                <?php } ?>

                                                            </select>

                                                        </div>

                                                    </div>

                                                <!-- End Level input -->

                                                <!-- First Name input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="nis_input" id="nis_label">NIS <span id="asterisk" style="color: #ff0000"> *</span></label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="text" name="personalId" id="nis_input" placeholder="NIS" required maxlength="18">

                                                        </div>

                                                    </div>

                                                    <script>

                                                        document.getElementById("level_input").addEventListener("change", function() {

                                                            var levelInput = document.getElementById("level_input");
                                                            var nisInput = document.getElementById("nis_input");
                                                            var nisLabel = document.getElementById("nis_label");
                                                            var asterisk = document.getElementById("asterisk");

                                                            if ([1, 2, 3, 4].includes(parseInt(levelInput.value))) {

                                                                nisInput.placeholder = "NIK";
                                                                nisLabel.innerHTML = "NIK <span id='asterisk' style='color: #ff0000'> *</span>";
                                                                nisInput.setAttribute("maxlength", "20");

                                                            } else {

                                                                nisInput.placeholder = "NIS";
                                                                nisLabel.innerHTML = "NIS <span id='asterisk' style='color: #ff0000'> *</span>";
                                                                nisInput.setAttribute("maxlength", "18");

                                                            }

                                                        });

                                                    </script>

                                                <!-- End First Name input -->

                                                <!-- First Name input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="nama_depan_input">Nama Depan<span style="color: #ff0000"> *</span></label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="text" name="nama_depan" id="nama_depan_input" placeholder="Nama Depan" required maxlength="20">

                                                        </div>

                                                    </div>

                                                <!-- End First Name input -->

                                                <!-- Last Name input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="nama_belakang_input">Nama Belakang</label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="text" name="nama_belakang" id="nama_belakang_input" placeholder="Nama Belakang" maxlength="80">

                                                        </div>

                                                    </div>

                                                <!-- End Last Name input -->

                                                <!-- Gender input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="jenis_kelamin_input">Jenis Kelamin</label>

                                                        <div class="col-md-10 p-0">

                                                            <select class="form-control input-full" name="jenis_kelamin" id="jenis_kelamin_input">

                                                                <option disabled selected>Select Gender</option>
                                                                <option value="perempuan">Perempuan</option>
                                                                <option value="laki-laki">Laki-Laki</option>

                                                            </select>

                                                        </div>

                                                    </div>

                                                <!-- End Gender input -->

                                                <!-- Birthdate input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="birth_date_input">Tanggal Lahir</label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="date" name="tanggal_lahir" id="birth_date_input">

                                                        </div>

                                                    </div>

                                                <!-- End Birthdate input -->

                                                <!-- Birthpalce input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="birth_place_input">Tempat Lahir</label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="text" name="tempat_lahir" id="birth_place_input" placeholder="Birthplace" maxlength="225">

                                                        </div>

                                                    </div>

                                                <!-- End Birthpalce input -->

                                                <!-- Phone Number input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="phone_number_input">Nomor Handphone</label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="text" name="nomor_handphone" id="phone_number_input" placeholder="8XX-XXXX-XXXX" pattern="8[0-9]{2}-[0-9]{4}-[0-9]{4,5}" maxlength="16">

                                                        </div>

                                                    </div>

                                                <!-- End Phone Number input -->
                                                
                                                <!-- Address input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="alamat_input">Alamat</label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="text" name="alamat" id="alamat_input" placeholder="Alamat" maxlength="225">

                                                        </div>

                                                    </div>

                                                <!-- End Address input -->

                                                <!-- Profile input -->

                                                    <div class="form-group col-md-4">

                                                        <label for="profile_input">Profile</label>

                                                        <div class="col-md-10 p-0">

                                                            <input class="form-control input-full" type="file" name="profile" id="profile_input" accept=".png, .jpeg, .svg, .jpg, .webp">

                                                        </div>

                                                    </div>

                                                <!-- End Profile input -->

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

                <script>

                    document.getElementById("profile_input").onchange = function() {

                        document.getElementById("image_preview").src = URL.createObjectURL(profile_input.files[0]);

                    }

                    document.getElementById("reset").onclick = function() {

                        document.getElementById("image_preview").src = "<?= base_url('assets') ?>/images/default-profile.png";

                    }

                </script>