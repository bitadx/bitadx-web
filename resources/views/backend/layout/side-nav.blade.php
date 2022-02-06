
		<!--Loader-->
		<div id="global-loader">
			<img src={{asset("common/assets/images/loader.svg")}} class="loader-img" alt="">
		</div>
		<!--/Loader-->

		<!--Page-->


				<!--Header-->
                @include('backend.layout.header')


				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar doc-sidebar">
					 <div class="app-sidebar__user clearfix">
						<div class="dropdown user-pro-body">
						<li class="slide">
						<a class="side-menu__item" href="{{url('admin/enquiries')}}"><i class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Orders</span></a>
						</li>
                        <li class="slide">
						<a class="side-menu__item" href="{{url('admin/users')}}"><i class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Users</span></a>
						</li>
					</ul>
				</aside>
				<!-- /Sidebar menu-->
