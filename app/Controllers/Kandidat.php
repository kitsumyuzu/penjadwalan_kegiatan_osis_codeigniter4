<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;

class Kandidat extends BaseController {

    /* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # Index 

        public function index() {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {


            } else if (session() -> get('id') > 0) {

                $Schema = new Schema();

                    $k_on = 'anggota_osis.ketua_osis = murid._user';
                    $k_on2 = 'murid._user = user.id_user';

                    $w_on = 'anggota_osis.wakil_ketua_osis_smk = murid._user';
                    $w_on2 = 'murid._user = user.id_user';

                    $w2_on = 'anggota_osis.wakil_ketua_osis_smp = murid._user';
                    $w2_on2 = 'murid._user = user.id_user';

                        $setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
                        $profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));

                    $fetch['ketua'] = $Schema -> getWhere_table_join3('anggota_osis', 'murid', 'user', $k_on, $k_on2, array('id_kandidat' => '1'));
                    $fetch['wakil'] = $Schema -> getWhere_table_join3('anggota_osis', 'murid', 'user', $w_on, $w_on2, array('id_kandidat' => '1'));
                    $fetch['wakil2'] = $Schema -> getWhere_table_join3('anggota_osis', 'murid', 'user', $w2_on, $w2_on2, array('id_kandidat' => '1'));

                echo view('pages/layout/_header', $setting);
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/data/kandidat', $fetch);
                echo view('pages/layout/_footer');

            }

        }

    /* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # Forms

        public function view_update_kandidat($_id) {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (in_array(session() -> get('level'), [1, 2, 3]) && session() -> get('id') > 0) {

                $Schema = new Schema();

                    $setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
                    $profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));
                    $fetch['muridData'] = $Schema -> visual_table('murid');
                    $fetch['kandidatData'] = $Schema -> getWhere('anggota_osis', array('id_kandidat' => $_id));

                echo view('pages/layout/_header', $setting);
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/forms/update_kandidat', $fetch);
                echo view('pages/layout/_footer');

            }

        }

    /* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # System


        public function update_kandidat() {

			if (session() -> get('id') == NULL || session() -> get('id') < 0) {

				return redirect() -> to('/home/');

			} else if (in_array(session() -> get('level'), [1, 2, 3]) && session() -> get('id') > 0) {

				$Schema = new Schema();

					$ketua_osis = $this -> request -> getPost('ketua_osis');
					$wakil_ketua_osis_smk = $this -> request -> getPost('wakil_ketua_osis_smk');
					$wakil_ketua_osis_smp = $this -> request -> getPost('wakil_ketua_osis_smp');

					$kandidatData = array(
						'ketua_osis' => $ketua_osis,
						'wakil_ketua_osis_smk' => $wakil_ketua_osis_smk,
						'wakil_ketua_osis_smp' => $wakil_ketua_osis_smp,
						'_UpdatedAt' => date('Y-m-d H:i:s', strtotime('now')),
						'_UpdatedBy' => session() -> get('id')
					);

					$data = $Schema -> getWhere2('anggota_osis', array('id_kandidat' => '1'));

					if ($data) {

						$Schema -> update_data('anggota_osis', $kandidatData, array('id_kandidat' => '1'));

					} else {

						$Schema -> insert_data('anggota_osis', $kandidatData);
						
					}

				return redirect() -> to('/kandidat/');
				
			}

		}

}