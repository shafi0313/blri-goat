<!-- Sidebar -->
<style>
    .sub_icon {
        font-size: 14px !important;
        margin: 0 2px 0 10px !important;
    }
</style>
{{-- @php $sm="balkPurchasesdf"; @endphp --}}
<div class="sidebar">
	<div class="sidebar-background"></div>
	<div class="sidebar-wrapper scrollbar-inner">
		<div class="sidebar-content">
			{{-- <div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="{{asset('backend/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							Hizrian
							<span class="user-level">Administrator</span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="#profile">
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
							<li>
								<a href="#edit">
									<span class="link-collapse">Edit Profile</span>
								</a>
							</li>
							<li>
								<a href="#settings">
									<span class="link-collapse">Settings</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
            </div> --}}

			<ul class="nav">
				<li class="nav-item {{$p=='da'?'active':''}}">
                    <a href="{{ route('admin.dashboard') }}">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
						{{-- <span class="badge badge-count">5</span> --}}
					</a>
                </li>

				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item {{$p=='admin'?'active':''}}">
                    <a data-toggle="collapse" href="#admin">
                        <i class="fas fa-users-cog"></i>
                        <p>Admin</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="admin">
                        <ul class="nav nav-collapse">
                            <li class="{{$sm=='adminIndex'?'activeSub':''}}">
                                <a href="{{ route('admin-user.index')}}">
                                    <span class="sub-item">User Management</span>
                                </a>
                            </li>
                            {{-- <li class="{{$sm=='adminIndex'?'activeSub':''}}">
                                <a href="{{ route('farmer.index')}}">
                                    <span class="sub-item">Farmer</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>


                <li class="nav-item {{$p=='farmSett'?'active submenu':''}}">
                    <a data-toggle="collapse" href="#invoice">
                        <i class="fas fa-tools"></i>
                        <p>Farm Settings</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{$p=='farmSett'?'show':''}}" id="invoice">
                        <ul class="nav nav-collapse">
                            <li class="{{$sm=='farm'?'active':''}} ">
                                <a href="{{ route('farm.index') }}">
                                    <span class="sub-item">Research Farm</span>
                                </a>
                            </li>
                            <li class="{{$sm=='commCat'?'active':''}}">
                                <a href="{{ route('community-cat.index') }}">
                                    <span class="sub-item">Community Farm</span>
                                </a>
                            </li>

                            <li class="{{$sm=='comm'?'active':''}}">
                                <a href="{{ route('community.index') }}">
                                    <span class="sub-item">Individual Farm</span>
                                </a>
                            </li>
                            <li class="{{$sm=='animalCat'?'active':''}}">
                                <a href="{{ route('animal-cat.index') }}">
                                    <span class="sub-item">Animal Category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{$p=='animalRecord'?'active':''}}">
                    <a data-toggle="collapse" href="#animal">
                        <i class="fas fa-info-circle"></i>
                        <p>Animal Record</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{$p=='animalRecord'?'show':''}}" id="animal">
                        <ul class="nav nav-collapse">
                            <li class="{{$sm=='animalInfo'?'active':''}}">
                                <a href="{{ route('animal-info.index') }}">
                                    <span class="sub-item">Animal Info.</span>
                                </a>
                            </li>
                            <li class="{{$sm=='morphometric'?'active':''}}">
                                <a href="{{ route('morphometric.index') }}">
                                    <span class="sub-item">Morphometric</span>
                                </a>
                            </li>
                            <li class="{{$sm=='production'?'active':''}}">
                                <a href="{{ route('body-weight.index') }}">
                                    <span class="sub-item">Body Weight</span>
                                </a>
                            </li>
                            <li class="{{$sm=='reProRecord'?'active':''}}">
                                <a href="{{ route('reproduction-record.index') }}">
                                    <span class="sub-item">Reproduction</span>
                                </a>
                            </li>

                            <li class="{{$sm=='milkProduction'?'active':''}}">
                                <a href="{{ route('milk-production.index') }}">
                                    <span class="sub-item">Milk Production</span>
                                </a>
                            </li>
                            <li class="{{$sm=='semenAnalysis'?'active':''}}">
                                <a href="{{ route('semen-analysis.index') }}">
                                    <span class="sub-item">Semen Analysis</span>
                                </a>
                            </li>
                            <li class="{{$sm=='service'?'active':''}}">
                                <a href="{{ route('service-record.index') }}">
                                    <span class="sub-item">Service</span>
                                </a>
                            </li>
                            <li class="{{$sm=='distribution'?'active':''}}">
                                <a href="{{ route('distribution.index') }}">
                                    <span class="sub-item">Distribution</span>
                                </a>
                            </li>
                            {{-- <li class="{{$sm=='serviceRec'?'active':''}}">
                                <a href="">
                                    <span class="sub-item">Dead/Culled</span>
                                </a>
                            </li>
                            <li class="{{$sm=='DHRec'?'active':''}}">
                                <a href="{{ route('disease-and-health.index') }}">
                                    <span class="sub-item">Omit from Animal record</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>


                <li class="nav-item {{$p=='healthM'?'active submenu':''}}">
                    <a data-toggle="collapse" href="#hm">
                        <i class="fas fa-heartbeat"></i>
                        <p>Health Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{$p=='healthM'?'show':''}}" id="hm">
                        <ul class="nav nav-collapse">
                            {{-- <li class="{{$sm=='farm'?'active':''}}">
                                <a href="">
                                    <span class="sub-item">Health Management</span>
                                </a>
                            </li> --}}
                            <li class="{{$sm=='diseaseTreatment'?'active':''}}">
                                <a href="{{ route('disease-and-treatment.index') }}">
                                    <span class="sub-item">Disease and Treatment</span>
                                </a>
                            </li>
                            <li class="{{$sm=='vaccination'?'active':''}}">
                                <a href="{{ route('vaccination.index') }}">
                                    <span class="sub-item">Vaccination</span>
                                </a>
                            </li>
                            <li class="{{$sm=='deworming'?'active':''}}">
                                <a href="{{ route('deworming.index') }}">
                                    <span class="sub-item">Deworming</span>
                                </a>
                            </li>
                            <li class="{{$sm=='dipping'?'active':''}}">
                                <a href="{{ route('dipping.index') }}">
                                    <span class="sub-item">Dipping</span>
                                </a>
                            </li>
                            <li class="{{$sm=='parasite'?'active':''}}">
                                <a href="{{ route('parasite.index') }}">
                                    <span class="sub-item">Parasite</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Report  --}}
                <li class="nav-item {{$p=='report'?'active submenu':''}}">
                    <a data-toggle="collapse" href="#report">
                        <i class="fas fa-file"></i>
                        <p>Report</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{$p=='report'?'show':''}}" id="report">
                        <ul class="nav nav-collapse">
                            <li class="{{$sm=='farm'?'active':''}}">
                                <a href="{{ route('researchStock.selectDate') }}">
                                    <span class="sub-item">BLRI Stock Report</span>
                                </a>
                            </li>
                            <li class="{{$sm=='farm'?'active':''}}">
                                <a href="{{ route('communityStock.selectDate') }}">
                                    <span class="sub-item">Community Farm Stock Report</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="nav-item">
					<a data-toggle="collapse" href="#submenu">
						<i class="fas fa-bars"></i>
						<p>Report</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="submenu">
						<ul class="nav nav-collapse">
							<li>
								<a data-toggle="collapse" href="#subnav1">
									<span class="sub-item">BLRI</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav1">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>

									</ul>
								</div>
							</li>
							<li>
								<a data-toggle="collapse" href="#subnav2">
									<span class="sub-item">Community</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav2">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="#">
												<span class="sub-item">Stock Report</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="sub-item">Disease Incidence Report</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="sub-item">Death Report</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="sub-item">Lcid Mortality Report</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="sub-item">Birth Report</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</li>















                <li class="nav-item {{$p=='visitor'?'active':''}}">
                    <a class="dropdown-item" href="{{ route('VisitorInfo') }}" >
                        <i class="fas fa-user-secret"></i>
                        <p>Visitor Info</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>















				{{-- <li class="nav-item">
					<a data-toggle="collapse" href="#submenu">
						<i class="fas fa-bars"></i>
						<p>Menu Levels</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="submenu">
						<ul class="nav nav-collapse">
							<li>
								<a data-toggle="collapse" href="#subnav1">
									<span class="sub-item">Level 1</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav1">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a data-toggle="collapse" href="#subnav2">
									<span class="sub-item">Level 1</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav2">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="#">
									<span class="sub-item">Level 1</span>
								</a>
							</li>
						</ul>
					</div>
				</li> --}}
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->






