# test.loc
Тестовое задание

ЧПУ для nginx: 

    rewrite ^/news/(.*)$ /index.php break;
    rewrite ^/create/(.*)$ /create_article.php break;     
    rewrite ^/create/([0-9]+)-([a-z0-9\-]+)?$ /create_article.php?id=$1 break;
    rewrite ^/([0-9]+)-([a-z0-9\-]+)/?$ /full_article.php?id=$1 break;
