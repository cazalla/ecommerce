<?php

namespace Hcode;

use Rain\Tpl;

class Page{

	private $tpl;
	private $options = [];
	private $defaults = [
		"data"=>[]

	];
												//passando diretorio, se nao passar nada como padrao e a /views.	
	public function __construct($opts = array(), $tpl_dir = "/views/"){

		$this->optinos = array_merge ($this->defaults, $opts);//Mescla os array//

		$config = array(
					"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,//localiza dentro do projeto a pasta especificada.
					"cache_dir"     =>$_SERVER["DOCUMENT_ROOT"]."/views-cache/",
					"debug"         => false // set to false to improve the speed
				   );

	Tpl::configure( $config );

	$this->tpl= new tpl;//Para ter acesso aos outros metodos ideal ser um atributo da nossa classe
	$this->setData($this->optinos["data"]);
	//desenhar o Template na tela (cabeçalho)
	$this->tpl->draw("header");

	
	}



	private function setData($data = array()){


		foreach ($data as $key => $value) {
			$this->tpl->assing($key, $value);
		}
	}

	//corpo do html
	public function setTpl($name, $data =array(),$returnHTML=False){

		$this->setData($data);
		return $this->tpl->draw($name, $returnHTML);

	}

	public function __destruct(){

		$this->tpl->draw("footer");


	}




}
?>