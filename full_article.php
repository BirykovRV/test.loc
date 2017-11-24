<?php
require_once 'dbconnection.php';
require_once 'translit.php';

$db->Connect();

if (isset($_GET['id']) && !empty($_GET['id'])) 
{
	$id = htmlspecialchars($_GET['id']);
	$article = $db->Find('articles', 'article_id = ?', array($id));

	if ($article['article_id'] != $id) 
	{
		// header('Location:http://test.loc:8080/news/');
	}
}
else
{
	// header('Location: http://test.loc:8080/news/');
}
require 'header.php'; 
?>

<div class="container">
	<div class="container">
		<div class="row">

			<div class="col-md-2"></div>
			<div id="bg" class="col-md-8 article">
				<h2><?php echo $article['title']; ?></h2>
				<div class="notation">
					<?php echo $article['notation']; ?>
				</div>
				<p><?php echo $article['article']; ?></p>
				<div class="col-sm-6"><h6><?php echo $article['created']; ?></h6></div>
				<div class="col-sm-6"><a href="http://test.loc:8080/create_article.php?id=<?php echo translit($article['article_id']); ?>">Редактировать</a></div>
			</div>
			<div class="col-md-2"></div>

		</div>
	</div>
</div>
-<?php echo translit($value['title']); ?>/
<?php require 'footer.php'; ?>