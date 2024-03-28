<?php 
	require_once "modelos/menu.php";

	class MenuControlador{
		private $modelo;

		public function __CONSTRUCT(){
			$this->modelo=new Menu;
		}

		public function Inicio(){
			require_once "vistas/header.php";
			require_once "vistas/menus/index.php";
			require_once "vistas/footer.php";
		}

		public function Crear(){
			$titulo = "Registrar";
			$m = new Menu();
			if (isset($_GET['id'])) {
				$m=$this->modelo->MostrarMenu($_GET['id']);
				$titulo="Modificar";
			}

			require_once "vistas/header.php";
			require_once "vistas/menus/formulario.php";
			require_once "vistas/footer.php";
		}

		public function Guardar(){
			$form = new Menu;
			$form->setIdMenu(intval($_POST['ID']));
			var_dump($form);
			$form->setNombreMenu($_POST['nombreMenu']);
			$form->setDescMenu($_POST['descMenu']);

			if ($form->getIdMenu() > 0) {
				$this->modelo->Actualizar($form);
			}else{
				$form->setEsPadre($_POST['esPadre']);
				$this->modelo->Insertar($form);
			}

			header("location:?c=menu");

		}

		public function Mostrar(){
			if(isset($_GET['id'])){
				$menu=$this->modelo->MostrarMenu($_GET['id']);
			}

			require_once "vistas/header.php";
			require_once "vistas/menus/mostrar.php";
			require_once "vistas/footer.php";
		}

		public function Eliminar(){
			$this->modelo->Eliminar($_GET['id']);
			header("location:?c=menu");
		}


	}
?>