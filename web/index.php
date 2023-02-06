<?php
require_once '..\src\App\Entity\Article.php';
use App\Entity\Article;

$article_1 = new Article();

$article_1->setPrice(100);
$article_1->increasePrice(5);

$article_1->setStradeName('Clavier ultraplat bleu');
$article_1->autoAssignmentReference();

//
Article::setRemise(20.3);
echo Article::getRemise();

var_dump($article_1);

$article_2 = new Article();
$article_2->setPrice(200);

$article_2->decreasePrice(10);

var_dump($article_2);