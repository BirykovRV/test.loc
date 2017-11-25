# test.loc
Тестовое задание

ЧПУ для nginx: 

    rewrite ^/news/(.*)$ /index.php break;
    rewrite ^/create/(.*)$ /create_article.php break;     
    rewrite ^/create/([0-9]+)-([a-z0-9\-]+)?$ /create_article.php?id=$1 break;
    #этот редирект не работает, пока не разобрался в причине
    rewrite ^/([0-9]+)-([a-z0-9\-]+)/?$ /full_article.php?id=$1 break;

SQL для таблицы: 

		CREATE TABLE `test`. ( 
			`article_id` INT NOT NULL AUTO_INCREMENT , 
			`title` VARCHAR(500) NOT NULL , 
			`notation` TEXT NOT NULL , 
			`article` TEXT NOT NULL , 
			`created` DATETIME NOT NULL , 
			PRIMARY KEY (`article_id`)) ENGINE = InnoDB;
