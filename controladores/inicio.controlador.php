<?php
	require_once "modelos/menu.php";

	class InicioControlador{
		private $modelo;
		
		public function __CONSTRUCT(){
			$this->modelo=new Menu();
		}

		public function Inicio(){
			//$bbdd = BaseDatos::Conectar();
			require_once "vistas/header.php";
			require_once"vistas/inicio/principal.php";
			require_once "vistas/footer.php";

		}		
	}
?>