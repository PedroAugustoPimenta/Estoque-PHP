<?php

	Class Leite extends Produto implements Perecivel {

		private $marca;
		private $volume;
		private $dataValidade;

		public function setMarca($marca) {
			$this->marca = $marca;	
		}

		public function setVolume($volume) {
			$this->volume = $volume;
		}
		public function setDataValidade($dataValidade) {
			$this->dataValidade = $dataValidade;
		}

		public function getMarca() {
			return $this->marca;
		}

		public function getVolume() {
			return $this->volume;
		}

		public function getDataValidade() {
			return $this->dataValidade;
		}


		function __construct($array) {
			parent::__construct($array['codigo'], $array['preco']);
			$this->marca = $array['marca'];
			$this->volume = $array['volume'];
			$this->dataValidade = $array['dataValidade'];			
		}


		function Vencido($Leite) {            
            date_default_timezone_set('America/Sao_Paulo');
            $date = new DateTime(date("Y/m/d"));
            $date2 = $Leite->getDataValidade();
            
            if ($date2 < $date) {
                return true;
            } else {
				return false;
            }
		}

		protected function retornarValor($estoque) {
            return $estoque;
		}	
	}
?>