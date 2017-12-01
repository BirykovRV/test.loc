<?php

require_once 'dbconnection.php';

$db->Connect();

$articles = $db->FindAllBy('articles', '*');
arsort($articles);
?>

<?php foreach ($articles as $key => $value): ?>   
  <div class="col-md-2"></div>
	<div id="bg" class="col-md-8 article">
		<h2><?php echo $value['title']; ?></h2>
		<p><?php echo preg_replace("/\r/u", "<br>", $value['notation']); ?></p>
	<div class="col-sm-6"><h6><?php echo $value['created']?></h6></div>
	<div class="col-sm-6"><a href="http://test.loc:8080/news/<?php echo $value['article_id']; ?>-<?php echo translit($value['title']); ?>">Подробнее...</a></div>
	</div>
<div class="col-md-2"></div>
<?php endforeach; ?>

<?php $db->Close(); ?>