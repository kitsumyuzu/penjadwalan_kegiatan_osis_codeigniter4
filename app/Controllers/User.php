<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;

use TCPDF;

class User extends BaseController {

    /* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # Index

		public function index() {

			if (session() -> get('id') == NULL || session() -> get('id') < 0) {

				return redirect() -> to('home/');

			} else if (in_array(session() -> get('level'), [1, 2]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    $on = 'user._level = level.id_level';

					$setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
                    $fetch['userData'] = $Schema -> visual_table_join2('user', 'level', $on);
                    $profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));

                echo view('pages/layout/_header', $setting);
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/data/user/user_data', $fetch);
				echo view('pages/layout/_footer');

			} else {

                return redirect() -> to('/home/');
                
            }

		}

        public function view_guruData() {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (in_array(session() -> get('level'), [1, 2]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    $setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
                    $fetch['guruData'] = $Schema -> visual_table('guru');
                    $profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));

                echo view('pages/layout/_header', $setting);
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/data/user/guru_data', $fetch);
                echo view('pages/layout/_footer');

            }

        }

        public function view_muridData() {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (in_array(session() -> get('level'), [1, 2]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    $setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
                    $fetch['muridData'] = $Schema -> visual_table('murid');
                    $profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));

                echo view('pages/layout/_header', $setting);
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/data/user/murid_data', $fetch);
                echo view('pages/layout/_footer');

            }

        }

    /* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # Forms

        public function view_insert_user() {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (in_array(session() -> get('level'), [1, 2]) && session() -> get('id') > 0) {

                $Schema = new Schema();

					$setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
                    $fetch['levelData'] = $Schema -> visual_table('level');
                    $profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));

                echo view('pages/layout/_header', $setting);
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/forms/user/insert_user', $fetch);
				echo view('pages/layout/_footer');

            }

        }

        public function view_update_guru($_id) {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (in_array(session() -> get('level'), [1, 2, 3, 4]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    $on = 'user.id_user = guru._user';

					$setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
                    $fetch['status'] = true;
                    $fetch['detailsData'] = $Schema -> getWhere_table_join2('user', 'guru', $on, array('id_user' => $_id));
                    $fetch['levelData'] = $Schema -> visual_table('level');
                    $profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));

                echo view('pages/layout/_header', $setting);
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/forms/user/update_user', $fetch);
				echo view('pages/layout/_footer');

            }

        }

        public function view_update_murid($_id) {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (in_array(session() -> get('level'), [1, 2, 5]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    $on = 'user.id_user = murid._user';

					$setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
                    $fetch['status'] = false;
                    $fetch['detailsData'] = $Schema -> getWhere_table_join2('user', 'murid', $on, array('id_user' => $_id));
                    $fetch['levelData'] = $Schema -> visual_table('level');
                    $profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));

                echo view('pages/layout/_header', $setting);
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/forms/user/update_user', $fetch);
				echo view('pages/layout/_footer');

            }

        }

    /* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # System
    
        public function insert_userData() {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (in_array(session() -> get('level'), [1, 2]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    $username = $this -> request -> getPost('username');
                    $email = $this -> request -> getPost('email');
                    $password = $this -> request -> getPost('password');
                    $level = $this -> request -> getPost('level');

                    $personalId = $this -> request -> getPost('personalId');
                    $first_name = $this -> request -> getPost('nama_depan');
                    $last_name = $this -> request -> getPost('nama_belakang');
                    $gender = $this -> request -> getPost('jenis_kelamin');
                    $birthdate = $this -> request -> getPost('tanggal_lahir');
                    $birthplace = $this -> request -> getPost('tempat_lahir');
                    $phonenumber = $this -> request -> getPost('nomor_handphone');
                    $address = $this -> request -> getPost('alamat');

                    $profile = $this -> request -> getFile('profile');
                    
                if ($profile && $profile -> isValid() && ! $profile -> hasMoved()) {
                    
                    if ($profile == 'default-profile.png' || NULL) {

                        $images = $profile -> getRandomName();
                        $profile -> move('assets/images/', $images);

                    } else {

                        $images = $profile -> getRandomName();
                        $profile -> move('assets/images/', $images);

                    }

                } else {

                    $images = 'default-profile.png';

                }

                
                // Filter by level

                    switch ($level) {

                        case 1:

                            $_data = array(
                                'profile' => $images,
                                'username' => $username,
                                'email' => $email,
                                'password' => md5($password),
                                '_level' => '1'
                            );

                            $Schema -> insert_data('user', $_data);

                            $where = $Schema -> getWhere2('user', array('username' => $username));
                            $id = $where['id_user'];

                                $_data2 = array(
                                    'nik' => $personalId,
                                    'nama_depan' => $first_name,
                                    'nama_belakang' => $last_name,
                                    'jenis_kelamin' => $gender,
                                    'tanggal_lahir' => $birthdate,
                                    'tempat_lahir' => $birthplace,
                                    'nomor_handphone' => '+62 ' . $phonenumber,
                                    'alamat' => $address,
                                    '_user' => $id,
                                    '_CreatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                                    '_CreatedBy' => session() -> get('id')
                                );

                            $Schema -> insert_data('guru', $_data2);

                            return redirect() -> to('/user/');

                        break;

                        case 2:
                        
                            $_data = array(
                                'profile' => $images,
                                'username' => $username,
                                'email' => $email,
                                'password' => md5($password),
                                '_level' => '2'
                            );

                            $Schema -> insert_data('user', $_data);

                            $where = $Schema -> getWhere2('user', array('username' => $username));
                            $id = $where['id_user'];

                                $_data2 = array(
                                    'nik' => $personalId,
                                    'nama_depan' => $first_name,
                                    'nama_belakang' => $last_name,
                                    'jenis_kelamin' => $gender,
                                    'tanggal_lahir' => $birthdate,
                                    'tempat_lahir' => $birthplace,
                                    'nomor_handphone' => '+62 ' . $phonenumber,
                                    'alamat' => $address,
                                    '_user' => $id,
                                    '_CreatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                                    '_CreatedBy' => session() -> get('id')
                                );

                            $Schema -> insert_data('guru', $_data2);

                            return redirect() -> to('/user/');

                        break;

                        case 3:
                        
                            $_data = array(
                                'profile' => $images,
                                'username' => $username,
                                'email' => $email,
                                'password' => md5($password),
                                '_level' => '3'
                            );

                            $Schema -> insert_data('user', $_data);

                            $where = $Schema -> getWhere2('user', array('username' => $username));
                            $id = $where['id_user'];

                                $_data2 = array(
                                    'nik' => $personalId,
                                    'nama_depan' => $first_name,
                                    'nama_belakang' => $last_name,
                                    'jenis_kelamin' => $gender,
                                    'tanggal_lahir' => $birthdate,
                                    'tempat_lahir' => $birthplace,
                                    'nomor_handphone' => '+62 ' . $phonenumber,
                                    'alamat' => $address,
                                    '_user' => $id,
                                    '_CreatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                                    '_CreatedBy' => session() -> get('id')
                                );

                            $Schema -> insert_data('guru', $_data2);

                            return redirect() -> to('/user/');

                        break;

                        case 4:
                        
                            $_data = array(
                                'profile' => $images,
                                'username' => $username,
                                'email' => $email,
                                'password' => md5($password),
                                '_level' => '4'
                            );

                            $Schema -> insert_data('user', $_data);

                            $where = $Schema -> getWhere2('user', array('username' => $username));
                            $id = $where['id_user'];

                                $_data2 = array(
                                    'nik' => $personalId,
                                    'nama_depan' => $first_name,
                                    'nama_belakang' => $last_name,
                                    'jenis_kelamin' => $gender,
                                    'tanggal_lahir' => $birthdate,
                                    'tempat_lahir' => $birthplace,
                                    'nomor_handphone' => '+62 ' . $phonenumber,
                                    'alamat' => $address,
                                    '_user' => $id,
                                    '_CreatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                                    '_CreatedBy' => session() -> get('id')
                                );

                            $Schema -> insert_data('guru', $_data2);

                            return redirect() -> to('/user/');

                        break;

                        case 5:
                        
                            $_data = array(
                                'profile' => $images,
                                'username' => $username,
                                'email' => $email,
                                'password' => md5($password),
                                '_level' => '5'
                            );

                            $Schema -> insert_data('user', $_data);

                            $where = $Schema -> getWhere2('user', array('username' => $username));
                            $id = $where['id_user'];

                                $_data2 = array(
                                    'nis' => $personalId,
                                    'nama_depan' => $first_name,
                                    'nama_belakang' => $last_name,
                                    'jenis_kelamin' => $gender,
                                    'tanggal_lahir' => $birthdate,
                                    'tempat_lahir' => $birthplace,
                                    'nomor_handphone' => '+62 ' . $phonenumber,
                                    'alamat' => $address,
                                    '_user' => $id,
                                    '_CreatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                                    '_CreatedBy' => session() -> get('id')
                                );

                            $Schema -> insert_data('murid', $_data2);

                            return redirect() -> to('/user/');

                        break;
                        
                        default:

                            $_data = array(
                                'profile' => $images,
                                'username' => $username,
                                'email' => $email,
                                'password' => md5($password),
                                '_level' => '5'
                            );

                            $Schema -> insert_data('user', $_data);

                            $where = $Schema -> getWhere2('user', array('username' => $username));
                            $id = $where['id_user'];

                                $_data2 = array(
                                    'nis' => $personalId,
                                    'nama_depan' => $first_name,
                                    'nama_belakang' => $last_name,
                                    'jenis_kelamin' => $gender,
                                    'tanggal_lahir' => $birthdate,
                                    'tempat_lahir' => $birthplace,
                                    'nomor_handphone' => '+62 ' . $phonenumber,
                                    'alamat' => $address,
                                    '_user' => $id,
                                    '_CreatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                                    '_CreatedBy' => session() -> get('id')
                                );

                            $Schema -> insert_data('murid', $_data2);

                            return redirect() -> to('/user/');

                        break;

                    }

            }

        }

        public function update_userData() {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (session() -> get('id') > 0) {

                $Schema = new Schema();

                    $username = $this -> request -> getPost('username');
                    $email = $this -> request -> getPost('email');
                    $level = $this -> request -> getPost('level');
                    $userId = $this -> request -> getPost('userId');

                    $personalId = $this -> request -> getPost('personalId');
                    $personalIds = $this -> request -> getPost('personalIds');
                    $first_name = $this -> request -> getPost('nama_depan');
                    $last_name = $this -> request -> getPost('nama_belakang');
                    $gender = $this -> request -> getPost('jenis_kelamin');
                    $birthdate = $this -> request -> getPost('tanggal_lahir');
                    $birthplace = $this -> request -> getPost('tempat_lahir');
                    $phonenumber = $this -> request -> getPost('nomor_handphone');
                    $address = $this -> request -> getPost('alamat');

                    $profile = $this -> request -> getFile('profile');
                    $userProfile = $this -> request -> getPost('userProfile');
                    
                if ($profile && $profile -> isValid() && ! $profile -> hasMoved()) {
                    
                    if ($profile == 'default-profile.png' || NULL) {

                        $images = $profile -> getRandomName();
                        $profile -> move('assets/images/', $images);

                    } else {

                        if (file_exists('assets/images/'. $profile)) {

                            unlink('assets/images/'.$userProfile);

                        } else {

                            $images = $profile -> getRandomName();
                            $profile -> move('assets/images/', $images);

                        }

                    }

                } else {

                    if ($userProfile == 'default-profile.png' || NULL) {
                        
                        $images = 'default-profile.png';

                    } else {

                        $images = $userProfile;

                    }

                }

                
                // Filter by level

                    switch ($level) {

                        case 1:

                            $_data = array(
                                'profile' => $images,
                                'username' => $username,
                                'email' => $email,
                                '_level' => '1'
                            );

                            $Schema -> update_data('user', $_data, array('id_user' => $userId));

                                $_data2 = array(
                                    'nik' => $personalId,
                                    'nama_depan' => $first_name,
                                    'nama_belakang' => $last_name,
                                    'jenis_kelamin' => $gender,
                                    'tanggal_lahir' => $birthdate,
                                    'tempat_lahir' => $birthplace,
                                    'nomor_handphone' => '+62 ' . $phonenumber,
                                    'alamat' => $address,
                                    '_UpdatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                                    '_UpdatedBy' => session() -> get('id')
                                );

                            $Schema -> update_data('guru', $_data2, array('_user' => $personalIds));

                            return redirect() -> to('/user/');

                        break;

                        case 2:
                        
                            $_data = array(
                                'profile' => $images,
                                'username' => $username,
                                'email' => $email,
                                '_level' => '2'
                            );

                            $Schema -> update_data('user', $_data, array('id_user' => $userId));

                                $_data2 = array(
                                    'nik' => $personalId,
                                    'nama_depan' => $first_name,
                                    'nama_belakang' => $last_name,
                                    'jenis_kelamin' => $gender,
                                    'tanggal_lahir' => $birthdate,
                                    'tempat_lahir' => $birthplace,
                                    'nomor_handphone' => '+62 ' . $phonenumber,
                                    'alamat' => $address,
                                    '_UpdatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                                    '_UpdatedBy' => session() -> get('id')
                                );

                            $Schema -> update_data('guru', $_data2, array('_user' => $personalIds));

                            return redirect() -> to('/user/');

                        break;

                        case 3:
                        
                            $_data = array(
                                'profile' => $images,
                                'username' => $username,
                                'email' => $email,
                                '_level' => '3'
                            );

                            $Schema -> update_data('user', $_data, array('id_user' => $userId));

                                $_data2 = array(
                                    'nik' => $personalId,
                                    'nama_depan' => $first_name,
                                    'nama_belakang' => $last_name,
                                    'jenis_kelamin' => $gender,
                                    'tanggal_lahir' => $birthdate,
                                    'tempat_lahir' => $birthplace,
                                    'nomor_handphone' => '+62 ' . $phonenumber,
                                    'alamat' => $address,
                                    '_UpdatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                                    '_UpdatedBy' => session() -> get('id')
                                );

                            $Schema -> update_data('guru', $_data2, array('_user' => $personalIds));

                            return redirect() -> to('/user/');

                        break;

                        case 4:
                        
                            $_data = array(
                                'profile' => $images,
                                'username' => $username,
                                'email' => $email,
                                '_level' => '4'
                            );

                            $Schema -> update_data('user', $_data, array('id_user' => $userId));

                                $_data2 = array(
                                    'nik' => $personalId,
                                    'nama_depan' => $first_name,
                                    'nama_belakang' => $last_name,
                                    'jenis_kelamin' => $gender,
                                    'tanggal_lahir' => $birthdate,
                                    'tempat_lahir' => $birthplace,
                                    'nomor_handphone' => '+62 ' . $phonenumber,
                                    'alamat' => $address,
                                    '_UpdatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                                    '_UpdatedBy' => session() -> get('id')
                                );

                            $Schema -> update_data('guru', $_data2, array('_user' => $personalIds));

                            return redirect() -> to('/user/');

                        break;

                        case 5:
                        
                            $_data = array(
                                'profile' => $images,
                                'username' => $username,
                                'email' => $email,
                                '_level' => '5'
                            );

                            $Schema -> update_data('user', $_data, array('id_user' => $userId));

                                $_data2 = array(
                                    'nis' => $personalId,
                                    'nama_depan' => $first_name,
                                    'nama_belakang' => $last_name,
                                    'jenis_kelamin' => $gender,
                                    'tanggal_lahir' => $birthdate,
                                    'tempat_lahir' => $birthplace,
                                    'nomor_handphone' => '+62 ' . $phonenumber,
                                    'alamat' => $address,
                                    '_UpdatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                                    '_UpdatedBy' => session() -> get('id')
                                );

                            $Schema -> update_data('murid', $_data2, array('_user' => $personalIds));

                            return redirect() -> to('/user/');

                        break;
                        
                        default:

                            $_data = array(
                                'profile' => $images,
                                'username' => $username,
                                'email' => $email,
                                '_level' => '5'
                            );

                            $Schema -> update_data('user', $_data, array('id_user' => $userId));

                                $_data2 = array(
                                    'nis' => $personalId,
                                    'nama_depan' => $first_name,
                                    'nama_belakang' => $last_name,
                                    'jenis_kelamin' => $gender,
                                    'tanggal_lahir' => $birthdate,
                                    'tempat_lahir' => $birthplace,
                                    'nomor_handphone' => '+62 ' . $phonenumber,
                                    'alamat' => $address,
                                    '_UpdatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                                    '_UpdatedBy' => session() -> get('id')
                                );

                            $Schema -> update_data('murid', $_data2, array('_user' => $personalIds));

                            return redirect() -> to('/user/');

                        break;

                    }

            }

        }

        public function delete_guruData($_id) {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (in_array(session() -> get('level'), [1, 2]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    $Schema -> delete_data('user', array('id_user' => $_id));
                    $Schema -> delete_data('guru', array('_user' => $_id));

                return redirect() -> to('/user/');

            }

        }

        public function delete_muridData($_id) {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (in_array(session() -> get('level'), [1, 2, 5]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    $Schema -> delete_data('user', array('id_user' => $_id));
                    $Schema -> delete_data('murid', array('_user' => $_id));

                return redirect() -> to('/user/');

            }

        }
    
    /* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # Print

        // public function view_print_pdf() {

        //     if (in_array(session() -> get('level'), [1])) {

        //         $Schema = new Schema();

        //             $fetch = $Schema -> print_user();

        //         $pdf = new TCPDF('p', 'MM', 'A4');
        //         $pdf -> setPrintHeader(false);
        //         $pdf -> setPrintFooter(false);
        //         $pdf -> AddPage();

        //         $pdf -> Cell(70);
        //         $pdf -> setFont('DejaVuSans', 'B', 18);
		//         $pdf -> Cell(50, 6, 'Laporan Data User', 0, 1, 'C');
		//         $pdf -> Cell(60);
        //         $pdf -> setFont('DejaVuSans', '', 8);

		//         $pdf -> Ln(15);

        //         $pdf -> setFillColor(60, 60, 60);
        //         $pdf -> setTextColor(255, 255, 255);

        //         $pdf -> Cell(10, 6, 'No.', 1, 0, 'C', 1);
		//         $pdf -> Cell(35, 6, 'Username', 1, 0, 'C', 1);
		//         $pdf -> Cell(45, 6, 'Level', 1, 0, 'C', 1);
		//         $pdf -> Cell(50, 6, 'Created', 1, 0, 'C', 1);
		//         $pdf -> Cell(50, 6, 'Updated', 1, 1, 'C', 1);

        //         $no = 1;

        //         foreach($fetch as $dataRow) {

        //             $pdf -> setTextColor(0, 0, 0);

        //             $pdf -> Cell(10, 6, $no, 1, 0, 'C');
		// 	        $pdf -> Cell(35, 6, $dataRow['username'] ? $dataRow['username'] : '', 1, 0, 'C');
		// 	        $pdf -> Cell(45, 6, $dataRow['nama_level'] ? $dataRow['nama_level'] : '', 1, 0, 'C');
		// 	        $pdf -> Cell(50, 6, $dataRow['_CreatedAt'] ? $dataRow['_CreatedAt'] : '', 1, 0, 'C');
		// 	        $pdf -> Cell(50, 6, $dataRow['_UpdatedAt'] ? $dataRow['_UpdatedAt'] : '', 1, 1, 'C');

        //             $no++;

        //         }

        //         $this -> response -> setContentType('application/pdf');

        //         $pdf -> Output();
                    
        //     } else {

        //         return redirect() -> to('/user/');

        //     }

        // }

}