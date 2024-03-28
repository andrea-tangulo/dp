<?php 

	class Catalogos extends Menu{

		private $modelo;

		public function __CONSTRUCT(){
			$this->modelo=new Menu();
		}

		public function Inicio(){
			require_once "vistas/header.php";
			require_once "vistas/catalogos/archivos/index.php";
			require_once "vistas/footer.php";
		}

	}

?>