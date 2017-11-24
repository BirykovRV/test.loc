<?php
require_once 'dbconnection.php';

$db->Connect();

if (isset($_GET['id']) && !empty($_GET['id'])) 
{
	$id = htmlspecialchars($_GET['id']);
	$article = $db->Find('articles', 'article_id = ?', array($id));

	if ($article['article_id'] != $id) 
	{
		header('Location: /');
	}
}
else
{
	header('Location: /');
}
require 'header.php'; 
?>

<div class="container">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div id="bg" class="col-md-8 article">		

				<?php if (!empty($_SESSION['err_message'])): ?>
					<p style="color: red;"><?php echo $_SESSION['err_message']; unset($_SESSION['err_message']); ?></p>
				<?php elseif(!empty($_SESSION['message'])): ?>
					<p style="color: green;"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
				<?php endif ?>

				<form action="add_article.php" method="post">
					<div class="form-group">
						<label>Название статьи:</label>
						<input type="text" class="form-control" id="email" name="title" value="asdasdasdasdasas">
					</div>
					<div class="form-group">
						<label for="pwd">Статья:</label>
						<textarea style="resize: none;" name="article" rows="20" cols="50" class="form-control"></textarea>
					</div>
					<button name="add" type="submit" class="btn btn-primary">Создать</button>
					<p></p>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>