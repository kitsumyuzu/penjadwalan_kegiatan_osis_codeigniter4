<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;

class Penjadwalan extends BaseController {

    /* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # Index

        public function index() {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('home/');

            } else if (session() -> get('id') > 0) {

                $Schema = new Schema();

                    $setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
                    $profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));

                    $fetch['kegiatanData'] = $Schema -> visual_table('penjadwalan');
                    $fetch['kandidat'] = $Schema -> getWhere('anggota_osis', array('id_kandidat' => '1'));

                echo view('pages/layout/_header', $setting);
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/data/penjadwalan', $fetch);
                echo view('pages/layout/_footer');

            } else {

                return redirect() -> to('/home/');
                
            }

        }
    
    /* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # Forms

        public function view_insert_penjadwalan() {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (session() -> get('id') > 0) {

                $Schema = new Schema();

					$setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
                    $profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));

                echo view('pages/layout/_header', $setting);
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/forms/penjadwalan/insert_penjadwalan');
				echo view('pages/layout/_footer');

            }

        }

        public function view_update_penjadwalan($_id) {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (session() -> get('id') > 0) {

                $Schema = new Schema();

					$setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
                    $profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));
                    $fetch['penjadwalanData'] = $Schema -> getWhere('penjadwalan', array('id_penjadwalan' => $_id));

                echo view('pages/layout/_header', $setting);
                echo view('pages/layout/_navbar', $profile);
                echo view('pages/layout/_menu');
                echo view('pages/forms/penjadwalan/update_penjadwalan', $fetch);
				echo view('pages/layout/_footer');

            }

        }

    /* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # System

        public function insert_penjadwalanData() {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (session() -> get('id') > 0) {

                $Schema = new Schema();

                    $topic = $this -> request -> getPost('topic');
                    $activity_date = $this -> request -> getPost('activity_date');
                    $time_start = $this -> request -> getPost('time_start');
                    $time_ends = $this -> request -> getPost('time_ends');
                    $description_activity = $this -> request -> getPost('deskripsi_kegiatan');
                    $place_activity = $this -> request -> getPost('tempat_kegiatan');

                $_data = array(
                    'judul_kegiatan' => $topic,
                    'tanggal_kegiatan' => $activity_date,
                    'mulai_kegiatan' => $time_start,
                    'selesai_kegiatan' => $time_ends,
                    'peraturan_kegiatan' => $description_activity,
                    'tempat_kegiatan' => $place_activity,
                    '_CreatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                    '_CreatedBy' => session() -> get('id')
                );

                $Schema -> insert_data('penjadwalan', $_data);

                return redirect() -> to('/penjadwalan/');

            }

        }

        public function update_penjadwalanData() {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (session() -> get('id') > 0) {

                $Schema = new Schema();

                    $topic = $this -> request -> getPost('topic');
                    $activity_date = $this -> request -> getPost('activity_date');
                    $time_start = $this -> request -> getPost('time_start');
                    $time_ends = $this -> request -> getPost('time_ends');
                    $description_activity = $this -> request -> getPost('deskripsi_kegiatan');
                    $place_activity = $this -> request -> getPost('tempat_kegiatan');

                    $ids = $this -> request -> getPost('penjadwalan_id');

                $_data = array(
                    'judul_kegiatan' => $topic,
                    'tanggal_kegiatan' => $activity_date,
                    'mulai_kegiatan' => $time_start,
                    'selesai_kegiatan' => $time_ends,
                    'peraturan_kegiatan' => $description_activity,
                    'tempat_kegiatan' => $place_activity,
                    '_UpdatedAt' => date('Y-m-d H:i:s', strtotime('now')),
                    '_UpdatedBy' => session() -> get('id')
                );

                $Schema -> update_data('penjadwalan', $_data, array('id_penjadwalan' => $ids));

                return redirect() -> to('/penjadwalan/');

            }

        }

        public function delete_penjadwalanData($_id) {

            if (session() -> get('id') == NULL || session() -> get('id') < 0) {

                return redirect() -> to('/home/');

            } else if (session() -> get('id') > 0) {

                $Schema = new Schema();

                    $Schema -> delete_data('penjadwalan', array('id_penjadwalan' => $_id));

                return redirect() -> to('/penjadwalan/');

            }

        }

}