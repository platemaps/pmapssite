<?php
View::begin();
View::beginHead();
View::title("title");
View::endHead();
View::beginBody();
?>

<h1><?php echo $greet; ?></h1>

<?php
View::endBody();
View::end();
?>