<?php
require_once 'dbconnection.php';
session_start();
$db->Connect();

if (isset($_GET['id']) && !empty($_GET['id'])) 
{
	$id = htmlspecialchars($_GET['id']);
	$_SESSION['id'] = $id;
	$article = $db->Find('articles', 'article_id = ?', array($id));

	if ($article['article_id'] != $id) 
	{
		header('Location: http://test.loc:8080/news/');
	}
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

				<form action="http://test.loc:8080/add_article.php" method="post">
					<div class="form-group">
						<label>Название статьи:</label>
						<input required type="text" class="form-control" id="email" name="title" value="<?php echo $article['title']; ?>">
					</div>
					<div class="form-group">
						<label for="pwd">Краткое описание:</label>
						<textarea required style="resize: none;" name="notation" rows="7" class="form-control"><?php echo $article['notation']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="pwd">Статья:</label>
						<textarea required style="resize: none;" name="article" rows="20" class="form-control"><?php echo $article['article']; ?></textarea>
					</div>
					<?php if (isset($_GET['id']) && !empty($_GET['id'])): ?>
						<button name="update" type="submit" class="btn btn-primary">Изменить</button>
						<button name="del" type="submit" class="btn btn-primary">Удалить</button>
					<?php elseif(!isset($_GET['id'])): ?>
						<button name="add" type="submit" class="btn btn-primary">Создать</button>
					<?php endif; ?>
					<p></p>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</div>

<?php require 'footer.php'; ?>