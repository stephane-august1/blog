/*SELECT * FROM `blog`.`category` LIMIT 100;*/
/*
UPDATE title FROM `blog`.`category` Values (title:title1);*/
/*UPDATE `category` SET `title`="C++" WHERE id="3";*/

/*SELECT * FROM `blog`.`article` LIMIT 100;*/

/*
UPDATE `article` SET `title`="un 5em article de la categorie C++" WHERE id="14";*/

SELECT *,c.title from article inner join category as c on article.category_id = c.id ;
