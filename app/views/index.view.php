<?php
View::begin();
View::beginHead();
	View::title('Index Page');
	View::meta("keywords" , "hehe");
	View::css("bootstrap");
View::endHead();
View::beginBody();
	echo 'Hello world';
	View::js('jquery');
	View::js('bootstrap');
View::endBody();
View::end();
?>