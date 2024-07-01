<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;

class Home extends BaseController {

	/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # Index 

		public function index() {

			if (session() -> get('id') == NULL || session() -> get('id') < 0) {

				return view('pages/login');

			} else if (session() -> get('id') > 0) {

				return redirect() -> to('/home/dashboard');

			}

		}

	/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # Login & Logout

		public function authentication_login() {

			$Schema = new Schema();

				$username = $this -> request -> getPost('username');
				$password = $this -> request -> getPost('password');

				/**
                 * Filter a input username with email, if the input was an email then login with session of email
                 * else if the input was username then login with session of username

                 * Convert inputted data into an array, and find the data from database of " authentication_account " table
                */

					if (filter_var($username, FILTER_VALIDATE_EMAIL)) {

						$_data = array('email' => $username, 'password' => md5($password));

					} else {

						$_data = array('username' => $username, 'password' => md5($password));

					}

			$session = $Schema -> getWhere2('user', $_data);

			if ($session > 0) {

				session() -> set('id', $session['id_user']);
				session() -> set('username', $session['username']);
				session() -> set('level', $session['_level']);
				
				return redirect() -> to('/home/dashboard');

			} else {

				return redirect() -> to('/home/');

			}

		}

		public function authentication_logout() {

			session() -> destroy();

			return redirect() -> to('/home/');

		}

	/* -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */ # Pages

		public function dashboard() {

			if (session() -> get('id') == NULL || session() -> get('id') < 0) {

				return redirect() -> to('/home/');

			} else if (session() -> get('id') > 0) {

				$Schema = new Schema();

					$setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
					$profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));
					$penjadwalan['penjadwalanData'] = $Schema -> visual_table('penjadwalan');

				echo view('pages/layout/_header', $setting);
				echo view('pages/layout/_navbar', $profile);
				echo view('pages/layout/_menu');
				echo view('pages/dashboard', $penjadwalan);
				echo view('pages/layout/_footer');

			}

		}

		public function settings() {

			if (session() -> get('id') == NULL || session() -> get('id') < 0) {

				return redirect() -> to('/home/');

			} else if (in_array(session() -> get('level'), [1, 2]) && session() -> get('id') > 0) {

				$Schema = new Schema();

					$setting['setting'] = $Schema -> getWhere('setting', array('id_setting' => '1'));
					$profile['profile'] = $Schema -> getWhere('user', array('id_user' => session() -> get('id')));

				echo view('pages/layout/_header', $setting);
				echo view('pages/layout/_navbar', $profile);
				echo view('pages/layout/_menu');
				echo view('pages/forms/settings');
				echo view('pages/layout/_footer');

			}

		}

		public function update_settings() {

			if (session() -> get('id') == NULL || session() -> get('id') < 0) {

				return redirect() -> to('/home/');

			} else if (in_array(session() -> get('level'), [1, 2]) && session() -> get('id') > 0) {

				$Schema = new Schema();

					$page_title = $this -> request -> getPost('page-title');
					$page_icon = $this -> request -> getFile('page-icon');

				if ($page_icon && $page_icon -> isValid() && ! $page_icon -> hasMoved()) {

					if ($page_icon -> getName() != 'favicon.ico') {

						$images = 'favicon.ico';
						$existFilePath = 'assets/' . $images;

						if (file_exists($existFilePath)) {

							unlink($existFilePath);

						}

						$page_icon -> move('assets/', $images);

					} else {

						$images = $page_icon -> getName();
						
						$existFilePath = 'assets/' . $images;

						if (file_exists($existFilePath)) {

							unlink($existFilePath);
							
						}
						
						$page_icon -> move('assets/', $images);

					}

				} else {

					$images = 'favicon.ico';

				}

					$settingData = array(
						'webpage_title' => $page_title,
						'webpage_icon' => $images,
						'setting_UpdatedAt' => date('Y-m-d H:i:s', strtotime('now')),
						'setting_UpdatedBy' => session() -> get('id')
					);

					$data = $Schema -> getWhere2('setting', array('id_setting' => '1'));

					if ($data) {

						$Schema -> update_data('setting', $settingData, array('id_setting' => '1'));

					} else {

						$Schema -> insert_data('setting', $settingData);
						
					}

				return redirect() -> to('/home/');
				
			}

		}

}