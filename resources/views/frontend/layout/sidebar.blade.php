<div class="col-lg-4">
					  <div class="site_nav_list" id="mySidenav">
						  <a href="{{ url('dashboard') }}" class="site_navbtn btn_close"><i class="fas fa-times"></i></a>
						  <div class="nav_top">
							  <a href="{{ url('dashboard') }}" class="site_logo"><img src="frontend/images/logo.png" alt="site_logo"/></a>
							  <p>Balance &nbsp;&nbsp; {{auth()->user()->wallet->amount??0}} INR</p>
						  </div>
						  <div class="nav_list">
							  <ul>
								  <li>
									  <a href="#"><img src="frontend/images/icon/Feather.png" alt="icon_set"/>My Portfolio</a>
									  <a href="#"><img src="frontend/images/icon/Feather2.png" alt="icon_set"/>Inbox</a>
									  <a href="#"><img src="frontend/images/icon/Feather3.png" alt="icon_set"/>Notifications</a>
								  </li>
							  </ul>
						  </div>

						  <div class="nav_list nav_list2">
							  <p>General</p>
							  <ul>
								  <li>
									  <a href="#"><img src="frontend/images/icon/Feather4.png" alt="icon_set"/>Market</a>
									  <a href="#"><img src="frontend/images/icon/Feather5.png" alt="icon_set"/>Deposit</a>
									  <a href="#"><img src="frontend/images/icon/Feather6.png" alt="icon_set"/>Withdrawal</a>
									  <a href="#"><img src="frontend/images/icon/Feather7.png" alt="icon_set"/>Trading Station</a>
									  <a href="#"><img src="frontend/images/icon/Feather8.png" alt="icon_set"/>My Portfolio</a>
									  <a href="{{ url('history') }}"><img src="frontend/images/icon/Feather9.png" alt="icon_set"/>History</a>
									  <a href="#"><img src="frontend/images/icon/Feather10.png" alt="icon_set"/>Support</a>
								  </li>
							  </ul>
						  </div>

						  <div class="nav_list nav_list3">
							  <ul>
								  <li>
                                  <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><img src="frontend/images/man.png" alt="profile_images" class="profile_img"/> {{auth()->user()->name}} <img src="frontend/images/icon/Feather11.png" alt="icon_set"/></a>
								  </li>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                  </form>
							  </ul>
						  </div>
					  </div>
					<a href="#" class="site_navbtn btn_open"><i class="fas fa-bars"></i></a>
				  </div>
