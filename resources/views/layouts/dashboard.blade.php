<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Mouldifi - A fully responsive, HTML5 based admin theme">
<meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, Mouldifi, web design, CSS3">
<title>
    	@yield('title')
</title>
<!-- Site favicon -->
<link rel='shortcut icon' type='image/x-icon' href='../resources/image/logo.ico' />
<!-- /site favicon -->

<!-- Entypo font stylesheet -->
<link href="../resources/assets/css/entypo.css" rel="stylesheet">
<!-- /entypo font stylesheet -->

<!-- Font awesome stylesheet -->
<link href="../resources/assets/css/font-awesome.min.css" rel="stylesheet">
<!-- /font awesome stylesheet -->

<!-- Bootstrap stylesheet min version -->
<link href="../resources/assets/css/bootstrap.min.css" rel="stylesheet">
<!-- /bootstrap stylesheet min version -->

<!-- Mouldifi core stylesheet -->
<link href="../resources/assets/css/mouldifi-core.css" rel="stylesheet">
<!-- /mouldifi core stylesheet -->

<link href="../resources/assets/css/mouldifi-forms.css" rel="stylesheet">

@yield('css')

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
<![endif]-->

<!--[if lte IE 8]>
	<script src="js/plugins/flot/excanvas.min.js"></script>
<![endif]-->
</head>
<body>

<!-- Page container -->
<!--<div class="page-container sidebar-collapsed">-->
<div class="page-container">
	<!-- Page Sidebar -->
	<div class="page-sidebar">
	
		<!-- Site header  -->
		<header class="site-header">
		  <div class="site-logo"><a href="./home"><img src="../resources/image/simple_edited.png" alt="Mouldifi" title="Mouldifi"></a></div>
		  <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a></div>
		  <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#"><i class="icon-menu"></i></a></div>
		</header>
		<!-- /site header -->
		
		<!-- Main navigation -->
		<ul id="side-nav" class="main-menu navbar-collapse collapse">
			<li class="has-sub @yield('dash') "><a href="./home"><i class="icon-gauge"></i><span class="title">Dashboard</span></a>
				<ul class="nav @yield('dash_sub')">
					<li class="@yield('misc')"><a href="./home"><span class="title">Misc.</span></a></li>
					<li class="@yield('ecomm')"><a href="#"><span class="title">E-Commerce</span></a></li>
				</ul>
			</li>
			<li class="@yield('vendor')">
				<a href="./vendor"><i class="icon-user"></i><span class="title">Vendor</span></a>
			</li>
			<li class="@yield('type')">
				<a href="./type"><i class="icon-doc-text-inv"></i><span class="title">Type</span></a>
			</li>
			<li class="@yield('material')">
				<a href="./material"><i class="icon-feather"></i><span class="title">Material</span></a>
			</li>
			<li class="has-sub @yield('item')"><a href="#"><i class="icon-tag"></i><span class="title">Item</span></a>
				<ul class="nav @yield('item_sub')"><!-- Pay Attention -->
					<li class="@yield('item_data')"><a href="./item_data"><span class="title">Data view</span></a></li>
					<li class="@yield('item_input')"><a href="./item_input"><span class="title">Input form</span></a></li>
				</ul>
			</li>
			<li class="@yield('stock')">
				<a href="./stock"><i class="icon-archive"></i><span class="title">Stock</span></a>
			</li>
			<li class="has-sub @yield('trans')"><a href="#"><i class=" icon-basket"></i><span class="title">Transaction</span></a>
				<ul class="nav @yield('trans_sub')"><!-- Pay Attention -->
					<li class="@yield('trans_data')"><a href="./trans_data"><span class="title">Data view</span></a></li>
					<li class="@yield('trans_input')"><a href="./trans_input"><span class="title">Input form</span></a></li>
					<li class="@yield('trans_reject')"><a href="./trans_reject"><span class="title">Reject form</span></a></li>
				</ul>
			</li>
		</ul>
		<!-- /main navigation -->		
  </div>
  <!-- /page sidebar -->
  
  <!-- Main container -->
  <div class="main-container gray-bg">
  
		<!-- Main header -->
		<div class="main-header row">
		  <div class="col-sm-6 col-xs-7">
		  
			<!-- User info -->
			<ul class="user-info pull-left">          
			  <li class="profile-info dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> <img width="44" class="img-circle avatar" alt="" src="http://www.gravatar.com/avatar/{{ hash ('md5',Auth::user()->email) }}">{{ Auth::user()->name }}<span class="caret"></span></a>
			  
				<!-- User action menu -->
				<ul class="dropdown-menu">
				  
				  <li><a href="#/"><i class="icon-user"></i>My profile</a></li>
				  <li><a href="#/"><i class="icon-mail"></i>Messages</a></li>
				  <li><a href="#"><i class="icon-clipboard"></i>Tasks</a></li>
				  <li class="divider"></li>
				  <li><a href="#"><i class="icon-cog"></i>Account settings</a></li>
				  <li><a href="{{ url('/logout') }}"><i class="icon-logout"></i>Logout</a></li>
				</ul>
				<!-- /user action menu -->
				
			  </li>
			</ul>
			<!-- /user info -->
			
		  </div>
		  
		  <div class="col-sm-6 col-xs-5">
			<div class="pull-right">
				<!-- User alerts -->
				<ul class="user-info pull-left">
				
				  <!-- Notifications -->
				  <li class="notifications dropdown">
					<a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-attention"></i><span class="badge badge-info">6</span></a>
					<ul class="dropdown-menu pull-right">
						<li class="first">
							<div class="small"><a class="pull-right danger" href="#">Mark all Read</a> You have <strong>3</strong> new notifications.</div>
						</li>
						<li>
							<ul class="dropdown-list">
								<li class="unread notification-success"><a href="#"><i class="icon-user-add pull-right"></i><span class="block-line strong">New user registered</span><span class="block-line small">30 seconds ago</span></a></li>
								<li class="unread notification-secondary"><a href="#"><i class="icon-heart pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
								<li class="unread notification-primary"><a href="#"><i class="icon-user pull-right"></i><span class="block-line strong">Privacy settings have been changed</span><span class="block-line small">2 hours ago</span></a></li>
								<li class="notification-danger"><a href="#"><i class="icon-cancel-circled pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
								<li class="notification-info"><a href="#"><i class="icon-info pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
								<li class="notification-warning"><a href="#"><i class="icon-rss pull-right"></i><span class="block-line strong">Someone special liked this</span><span class="block-line small">60 seconds ago</span></a></li>
							</ul>
						</li>
						<li class="external-last"> <a href="#" class="danger">View all notifications</a> </li>
					</ul>
				  </li>
				  <!-- /notifications -->
				  
				  <!-- Messages -->
				  <li class="notifications dropdown">
					<a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-mail"></i><span class="badge badge-secondary">12</span></a>
					<ul class="dropdown-menu pull-right">
						<li class="first">
							<div class="dropdown-content-header"><i class="fa fa-pencil-square-o pull-right"></i> Messages</div>
						</li>
						<li>
							<ul class="media-list">
								<li class="media">
									<div class="media-left"><img alt="" class="img-circle img-sm" src="../resources/image/domnic-brown.png"></div>
									<div class="media-body">
										<a class="media-heading" href="#">
											<span class="text-semibold">Domnic Brown</span>
											<span class="media-annotation pull-right">Tue</span>
										</a>
										<span class="text-muted">Your product sounds interesting I would love to check this ne...</span>
									</div>
								</li>
								<li class="media">
									<div class="media-left"><img alt="" class="img-circle img-sm" src="../resources/image/john-smith.png"></div>
									<div class="media-body">
										<a class="media-heading" href="#">
											<span class="text-semibold">John Smith</span>
											<span class="media-annotation pull-right">12:30</span>
										</a>
										<span class="text-muted">Thank you for posting such a wonderful content. The writing was outstanding...</span>
									</div>
								</li>
								<li class="media">
									<div class="media-left"><img alt="" class="img-circle img-sm" src="../resources/image/stella-johnson.png"></div>
									<div class="media-body">
										<a class="media-heading" href="#">
											<span class="text-semibold">Stella Johnson</span>
											<span class="media-annotation pull-right">2 days ago</span>
										</a>
										<span class="text-muted">Thank you for trusting us to be your source for top quality sporting goods...</span>
									</div>
								</li>
								<li class="media">
									<div class="media-left"><img alt="" class="img-circle img-sm" src="../resources/image/alex-dolgove.png"></div>
									<div class="media-body">
										<a class="media-heading" href="#">
											<span class="text-semibold">Alex Dolgove</span>
											<span class="media-annotation pull-right">10:45</span>
										</a>
										<span class="text-muted">After our Friday meeting I was thinking about our business relationship and how fortunate...</span>
									</div>
								</li>
								<li class="media">
									<div class="media-left"><img alt="" class="img-circle img-sm" src="../resources/image/domnic-brown.png"></div>
									<div class="media-body">
										<a class="media-heading" href="#">
											<span class="text-semibold">Domnic Brown</span>
											<span class="media-annotation pull-right">4:00</span>
										</a>
										<span class="text-muted">I would like to take this opportunity to thank you for your cooperation in recently completing...</span>
									</div>
								</li>
							</ul>
						</li>
						<li class="external-last"> <a class="danger" href="#">All Messages</a> </li>
					</ul>
				  </li>
				  <!-- /messages -->
				  
				</ul>
				<!-- /user alerts -->
				
			</div>
		  </div>
		</div>
		<!-- /main header -->
		
		<!-- Main content -->
		<div class="main-content">
			@yield('content')
			
			<!-- Footer -->
			<footer class="footer-main"> 
				&copy; 2016 <strong>Gas Batik</strong> Developed by <strong>Whilda Chaq</strong> Theme by <strong>G-axon</strong> 
			</footer>	
			<!-- /footer -->
		
	  </div>
	  <!-- /main content -->
	  
  </div>
  <!-- /main container -->
  
</div>
<!-- /page container -->

<!--Load JQuery-->
<script src="../resources/assets/js/jquery.min.js"></script>
<script src="../resources/assets/js/bootstrap.min.js"></script>
<script src="../resources/assets/js/plugins/metismenu/jquery.metisMenu.js"></script>
<script src="../resources/assets/js/plugins/blockui-master/jquery-ui.js"></script>
<script src="../resources/assets/js/plugins/blockui-master/jquery.blockUI.js"></script>
<script src="../resources/assets/js/functions.js"></script>

<!--ChartJs-->
<script src="../resources/assets/js/plugins/chartjs/Chart.min.js"></script>
@yield('script')
</body>
</html>
