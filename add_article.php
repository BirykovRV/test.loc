<?php
require_once 'dbconnection.php';
session_start();
$db->Connect();
$table = 'articles';
$data = $_POST;
$id = $_SESSION['id'];
if (isset($data['add'])) {  
  //если нажата кнопка и поля не пусты
  if (!empty($data['title']) && !empty($data['article']) && !empty($data['notation'])) {

    $title = htmlspecialchars($data['title']);
    $notation = htmlspecialchars($data['notation']);
    $article = htmlspecialchars($data['article']);
    $date = date("Y-m-d H:i:s");
    $query = 'title, notation, article, created';

    $data = array($title, $notation, $article, $date);

    $article = $db->Save($table, $query, $data);
    //var_dump($article);
    if ($article) {
      $_SESSION['message'] = 'Статья успешно добавлена!';
      header('Location: http://'.$host.':8080/create/');
    }
    else {
      header('Location: http://'.$host.':8080/create/');
      $_SESSION['err_message'] = 'Ошибка добавления статьи в БД!';
    }
  }
  else {
    $_SESSION['err_message'] = "Вы не заполнили все поля!";
    header('Location:http://'.$host.':8080/create/');
  }
}
else if (isset($data['update'])) 
{
  if (!empty($data['title']) && !empty($data['article']) && !empty($data['notation'])) {

    $title = htmlspecialchars($data['title']);
    $notation = htmlspecialchars($data['notation']);
    $article = htmlspecialchars($data['article']);
    $date = date("Y-m-d H:i:s");    

    $query = "UPDATE $table SET title = '$title', notation = '$notation', article = '$article', created = '$date' WHERE article_id = '$id'";
    
    $article = $db->Update($query);
    // var_dump($article);
    if ($article) {
      $_SESSION['message'] = 'Статья успешно изменена!';
      header('Location: http://'.$host.':8080/create/');
    }
    else {
      header('Location: http://'.$host.':8080/create/');
      $_SESSION['err_message'] = 'Ошибка изменения статьи в БД!';
    }
  }
  else {
    $_SESSION['err_message'] = "Вы не заполнили все поля!";
    header('Location:http://'.$host.':8080/create/');
  }
}
else if (isset($data['del'])) 
{
  $article = $db->Del($table, $id);

  if ($article) {
    $_SESSION['message'] = 'Статья успешно удалена!';
    header('Location: http://'.$host.':8080/create/');
  }
  else {
    header('Location: http://'.$host.':8080/create/');
    $_SESSION['err_message'] = 'Ошибка удаления статьи!';
  }
}
else
{
  header('Location: http://test.loc:8080/news/');
}
