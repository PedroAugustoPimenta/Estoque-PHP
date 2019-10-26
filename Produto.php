<?php
	
	abstract Class Produto {

		private $codigo;
		private $preco;

		public function setCodigo($codigo) {
			$this->codigo = $codigo;	
		}

		public function setPreco($preco) {
			$this->preco = $preco;
		}

		public function getCodigo() {
			return $this->codigo;
		}

		public function getpreco() {
			return $this->preco;
		}
				
		function __construct($codigo, $preco) {
			$this->codigo = $codigo;
			$this->preco = $preco;
		}
	}
?>