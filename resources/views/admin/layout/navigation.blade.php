<!-- Sidebar -->
<style>
    .sub_icon {
        font-size: 14px !important;
        margin: 0 2px 0 10px !important;
    }
</style>
@php $sm="balkPurchasesdf"; @endphp
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
                            <li class="{{$sm=='adminIndex'?'activeSub':''}}">
                                <a href="{{ route('farmer.index')}}">
                                    <span class="sub-item">Farmer</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item {{$p=='invoice'?'active':''}}">
                    <a data-toggle="collapse" href="#invoice">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <p>Tools</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="invoice">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('farm.index') }}">
                                    <span class="sub-item">Farm</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('community-cat.index') }}">
                                    <span class="sub-item">Community Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('animal-cat.index') }}">
                                    <span class="sub-item">Animal Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('community.index') }}">
                                    <span class="sub-item">Community</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{$p=='invoice'?'active':''}}">
                    <a data-toggle="collapse" href="#animal">
                        <i class="fas fa-info-circle"></i>
                        <p>Animal </p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="animal">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('animalInfo.user') }}">
                                    <span class="sub-item">Animal Information</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('community.index') }}">
                                    <span class="sub-item">Community</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>






                {{-- <li class="nav-item {{$p=='account'?'active':''}}">
                    <a data-toggle="collapse" href="#account">
                        <i class="fas fa-calculator"></i>
                        <p>Account</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="account">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('account-main.selectDate')}}">
                                    <span class="sub-item">Main Accounts</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('account-received.index')}}">
                                    <span class="sub-item">Received</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('account-payment.index')}}">
                                    <span class="sub-item">Payment</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('authorLedgerBook.index')}}">
                                    <span class="sub-item">Author Ledger Book</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('salesStatement.selectDate')}}">
                                    <span class="sub-item">Sales Statement</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('purchaseStatement.selectDate')}}">
                                    <span class="sub-item">Purchase Statement</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- <li class="nav-item {{$p=='productStock'?'active':''}}">
                    <a href="{{ route('ProductStock.index')}}">
                        <i class="fas fa-layer-group"></i>
                        <p>Stock</p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item {{$p=='purchaseInvoice'?'active':''}}">
                    <a data-toggle="collapse" href="#purchaseInvoice">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Purchase</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="purchaseInvoice">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('purchase-invoice.index')}}">
                                    <i class="far fa-check-circle sub_icon"></i>
                                    <span>Invoice</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('return-purchase-invoice.index')}}">
                                    <i class="far fa-times-circle sub_icon"></i>
                                    <span>Return Invoice</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('purchaseLedgerBook.index')}}">
                                    <i class="fas fa-book-open sub_icon"></i>
                                    <span>Ledger Book</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('purchaseTrush.trush')}}">
                                    <i class="fas fa-trash sub_icon"></i>
                                    <span>Trash</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}



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


                {{-- <li class="nav-item {{$p=='customer'?'active':''}}">
                    <a data-toggle="collapse" href="#customer">
                        <i class="fas fa-users"></i>
                        <p>Customer</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="customer">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('customer.index')}}">
                                    <span class="sub-item">Show Customer</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customer.create')}}">
                                    <span class="sub-item">Add Customer</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}


                {{-- <li class="nav-item {{$p=='invoice'?'active':''}}">
                    <a href="{{ route('invoice.index')}}">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <p>Invoice</p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item {{$p=='ledgerBook'?'active':''}}">
                    <a href="{{ route('ledgerBook.index')}}">
                        <i class="fas fa-book-open"></i>
                        <p>Sales Ledger Book</p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item {{$p=='purchaseLedgerBook'?'active':''}}">
                    <a href="{{ route('purchaseLedgerBook.index')}}">
                        <i class="fas fa-book-open"></i>
                        <p>Purchase Ledger Book</p>
                    </a>
                </li> --}}


                                {{-- <li class="nav-item {{$p=='slider'?'active':''}}">
                                <a data-toggle="collapse" href="#slider">
                                    <i class="far fa-images"></i>
                                    <p>Slider</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="slider">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="{{ route('slider.index')}}">
                                                <span class="sub-item">Show Sliders</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('slider.create')}}">
                                                <span class="sub-item">Add Slider</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}









                {{-- <li class="nav-item {{$p=='invoice'?'active':''}}">
                    <a data-toggle="collapse" href="#invoice">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <p>Invoice</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="invoice">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('invoice.index')}}">
                                    <span class="sub-item">Show Invoice</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('invoice.create')}}">
                                    <span class="sub-item">Add Invoice</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}














                {{-- <li class="nav-item {{$p=='user'?'active':''}}">
					<a data-toggle="collapse" href="#user">
						<i class="fas fa-users-cog"></i>
						<p>User Management</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="user">
						<ul class="nav nav-collapse">
							<li>
                                <a href="{{ route('users.index') }}">
									<span class="sub-item">Show User</span>
								</a>
							</li>
							<li>
								<a href="{{ route('users.create') }}">
									<span class="sub-item">Add User</span>
								</a>
							</li>
						</ul>
					</div>
                </li> --}}



                {{-- <li class="nav-item {{$p=='tools'?'active':''}}">
					<a data-toggle="collapse" href="#tools">
						<i class="fas fa-tools"></i>
						<p>Tools</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="tools">
						<ul class="nav nav-collapse">
							<li>
                                <a href="{{route('pack-size.index')}}">
                                    <i class="fas fa-weight sub_icon"></i>
                                    <p>Pack Size</p>
                                </a>
							</li>
						</ul>
					</div>
                </li> --}}







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






