<?php
View::begin();
View::beginHead();
	View::title('Index Page');
	View::meta("keywords" , "hehe");
	View::css("bootstrap");
	View::css("frontend-standard.css");
View::endHead();
View::beginBody();
?>

<div id="Wrapper">
	<div id="Wrapper-header">
		<div class="container">
			<div id="navbar-header">
				<a class="navbar-brand">PlateMaps</a>
			</div>
			<div id="navbar">
				<ul class="navbar-right nav navbar-nav ">
					<li><a href="#">Diggest</a></li>
					<li><a href="#">Featured</a></li>
					<li><a href="#">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="Wrapper-body">
		<div class="container">

		</div>
	</div>

	<div id="Wrapper-footer" class="stay-bottom">
		<div id="Wrapper-topfooter">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<h3 class="text-center">Plate maps</h3>
					</div>
					<div class="col-md-2">
						<ul>
							<li><a href="#">Faq</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Term of Service</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
					<div class="col-md-6 text-justify">
						"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
					</div>
					<div class="col-md-2">
						<p class="text-center"><button type="button" class="btn btn-success">let's Add Some</button></p>
					</div>
				</div>
			</div>
		</div>
		<div id="Wrapper-botfooter">
			<div class="container">
				<div class="pull-right">
					Platemaps &copy; 2014. All Rights Reserved
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

</div>

<?php 
	View::js('jquery');
	View::js('bootstrap');
View::endBody();
View::end();
?>