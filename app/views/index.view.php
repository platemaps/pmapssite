<?php
View::begin();
View::beginHead();
	View::title('Index Page');
	View::meta("viewport" , "width=device-width, initial-scale=1");
	View::css("bootstrap");
	View::css("frontend-standard.css");
	View::css("frontend-standard-responsive.css");
View::endHead();
View::beginBody();
?>

<div id="Wrapper">
	<div id="Wrapper-header" role="navigation" class="navbar navbar-inverse">
		<div class="container">

			<div id="navbar-header">
				<button type="button" 
						class="navbar-toggle collapsed" 
						data-toggle="collapse"
						data-target="#navbar"
						aria-expanded="false"
						aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">PlateMaps</a>
			</div>
			
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="navbar-right nav navbar-nav">
					<li><a href="#">Diggest</a></li>
					<li><a href="#">Featured</a></li>
					<li><a href="#">Login</a></li>
				</ul>
			</div>

		</div>		
	</div>
	<div id="Wrapper-body">
		<div class="container" id="front-home">
			<div class="row" id="logo">
				<h2 class="text-center" >Plate Maps</h2>
			</div>
			<div class="row" id="search-form">
				<div class="col-md-6 col-md-offset-3">
					<form role="form">
						<div class="row">
							<div class="col-md-10" >
								<input type="text" name="squery" placeholder="Makan apa? Dimana? Ketik disini"  class="form-control" />
							</div>
							<div class="col-md-2">
								<button type="button" class="btn btn-danger btn-block">Cari</button>
							</div>
						</div>
						<a href="#" class="label label-warning">Advance Search</a>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="Wrapper-footer" class="stay-bottom">
		<div id="Wrapper-topfooter">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<h3 class="text-center" id="logo-footer">Plate Maps</h3>
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