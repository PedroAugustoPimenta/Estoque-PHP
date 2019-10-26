<?php
	
	Class DVD extends Produto {       

		private $titulo;
		private $ano;

		public function setTitulo($titulo) {
			$this->titulo = $titulo;
		}

		public function setAno($ano) {
			$this->ano = $ano;
		}

		public function getTitulo() {
			return $this->titulo;
		}

		public function getAno() {
			return $this->ano;
		}

		function __construct($array) {
			parent::__construct($array['codigo'], $array['preco']);
			$this->titulo = $array['titulo'];
			$this->ano = $array['ano'];
		}

		public function BuscarDVD($dvd){
			if ($dvd->getAno() == 1998) {
				return true;
			} else {
				return false;
			}
		}		
	}
?>