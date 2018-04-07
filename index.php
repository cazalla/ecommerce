<?php 

require_once("vendor/autoload.php");//Sempre padrao do projeto
//
use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {

	$page = new Page();//Chama o Contrustor e adiciona o header na tela

	$page->setTpl("index");//chama o .html que esta com o conteudo corpo email.

});


$app->get('/admin', function() {

	$page = new PageAdmin();//Chama o Contrustor e adiciona o header na tela

	$page->setTpl("index");//chama o .html que esta com o conteudo corpo email.

});




$app->run();//função que realiza a execução de tudo o que foi solicitado acima 

 ?>