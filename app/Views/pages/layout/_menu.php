            <div class="sidebar sidebar-style-2" data-background-color="dark2">

				<div class="sidebar-wrapper scrollbar scrollbar-inner">

					<div class="sidebar-content">

						<ul class="nav nav-primary">

							<li class="nav-item active">

								<a href="/home/dashboard/">

									<i class="fas fa-home"></i>
									<p>Dashboard</p>
									
								</a>

							</li>

							<?php if (in_array(session() -> get('level'), [1])) { ?>

								<li class="nav-item">

									<a data-toggle="collapse" href="#user-section">

										<i class="fa fa-user-gear"></i>
										<p>Account Data</p>
										<span class="caret"></span>

									</a>

									<div class="collapse" id="user-section">

										<ul class="nav nav-collapse subnav">

											<li>

												<a href="/user/">
											
													<p>User</p>

												</a>

												<a href="/user/view_guruData">
											
													<p>Guru</p>
													
												</a>

												<a href="/user/view_muridData">
											
													<p>Murid</p>
													
												</a>

											</li>

										</ul>

									</div>
									
								</li>

								<li class="nav-item">

									<a href="/kandidat/">

										<i class="fas fa-id-badge"></i>
										<p>Kandidat</p>
										
									</a>

								</li>

								<li class="nav-item">

									<a href="/penjadwalan/">

										<i class="fas fa-calendar-days"></i>
										<p>Penjadwalan Kegiatan</p>
										
									</a>

								</li>

									<li class="nav-section">

										<span class="sidebar-mini-icon">

											<i class="fa fa-ellipsis-h"></i>

										</span>

										<h4 class="text-section">Other</h4>

									</li>
								
								<li class="nav-item">

									<a href="/home/settings/">

										<i class="fas fa-gear"></i>
										<p>Settings</p>
										
									</a>

								</li>
								
							<?php } else if (in_array(session() -> get('level'), [2])) { ?>

								<li class="nav-item">

									<a data-toggle="collapse" href="#user-section">

										<i class="fa fa-user-gear"></i>
										<p>Account Data</p>
										<span class="caret"></span>

									</a>

									<div class="collapse" id="user-section">

										<ul class="nav nav-collapse subnav">

											<li>

												<a href="/user/">
											
													<p>User</p>

												</a>

												<a href="/user/view_guruData">
											
													<p>Guru</p>
													
												</a>

												<a href="/user/view_muridData">
											
													<p>Murid</p>
													
												</a>

											</li>

										</ul>

									</div>
									
								</li>

								<li class="nav-item">

									<a href="/kandidat/">

										<i class="fas fa-id-badge"></i>
										<p>Kandidat</p>
										
									</a>

								</li>

								<li class="nav-item">

									<a href="/penjadwalan/">

										<i class="fas fa-calendar-days"></i>
										<p>Penjadwalan Kegiatan</p>
										
									</a>

								</li>

									<li class="nav-section">

										<span class="sidebar-mini-icon">

											<i class="fa fa-ellipsis-h"></i>

										</span>

										<h4 class="text-section">Other</h4>

									</li>
								
								<li class="nav-item">

									<a href="/home/settings/">

										<i class="fas fa-gear"></i>
										<p>Settings</p>
										
									</a>

								</li>

							<?php } else if (in_array(session() -> get('level'), [3])) { ?>

								<li class="nav-item">

									<a href="/kandidat/">

										<i class="fas fa-id-badge"></i>
										<p>Kandidat</p>
										
									</a>

								</li>

								<li class="nav-item">

									<a href="/penjadwalan/">

										<i class="fas fa-calendar-days"></i>
										<p>Penjadwalan Kegiatan</p>
										
									</a>

								</li>
								
							<?php } else if (in_array(session() -> get('level'), [4])) { ?>

								<li class="nav-item">

									<a href="/kandidat/">

										<i class="fas fa-id-badge"></i>
										<p>Kandidat</p>
										
									</a>

								</li>

								<li class="nav-item">

									<a href="/penjadwalan/">

										<i class="fas fa-calendar-days"></i>
										<p>Penjadwalan Kegiatan</p>
										
									</a>

								</li>

							<?php } else if (in_array(session() -> get('level'), [5])) { ?>

								<li class="nav-item">

									<a href="/kandidat/">

										<i class="fas fa-id-badge"></i>
										<p>Kandidat</p>
										
									</a>

								</li>

								<li class="nav-item">

									<a href="/penjadwalan/">

										<i class="fas fa-calendar-days"></i>
										<p>Penjadwalan Kegiatan</p>
										
									</a>

								</li>

							<?php } ?>
								
						</ul>

					</div>

				</div>

			</div>