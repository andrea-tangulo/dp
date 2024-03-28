<?php
	class Menu{
		private $pdo;

		private $idMenu;
		private $nombreMenu;
		private $descMenu;
		private $esPadre;

		public function __CONSTRUCT(){
			$this->pdo = BaseDatos::Conectar();
		}

		public function getIdMenu() : ?int{
			return $this->idMenu;
		}

		public function setIdMenu(int $id){
			$this->idMenu=$id;
		}

		public function getNombreMenu() : ?string{
			return $this->nombreMenu;
		}

		public function setNombreMenu(string $nombre){
			$this->nombreMenu=$nombre;
		}

		public function getDescMenu() : ?string{
			return $this->descMenu;
		}

		public function setDescMenu(string $desc_menu){
			$this->descMenu=$desc_menu;
		}

		public function getEsPadre() : ?string{
			return $this->esPadre;
		}

		public function setEsPadre(string $es_padre){
			$this->esPadre=$es_padre;
		}

		public function cantidadMenus(){
			try {
				$consulta=$this->pdo->prepare("select COUNT(*) as Cantidad from MENUS;");
				$consulta->execute();
				return $consulta->fetch();
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function consultarMenus(){
			try {
				$consulta = $this->pdo->prepare("SELECT
				M.ID_INFO AS ID,
				M.NOMBRE AS NOMBRE_MENU,
				(SELECT ID_PADRE FROM DEPENDENCIAS WHERE ID_HIJO = ID) AS ID_PADRE,
				(SELECT NOMBRE FROM MENUS WHERE ID_INFO = ID_PADRE) AS NOMBRE_PADRE,
				M.DESCRIPCION
			FROM MENUS M;");
				$consulta->execute();
				return $consulta->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function consultarHijos(int $id){
			try {
				$consulta = $this->pdo->prepare("CALL consultarHijos(".$id.");");
				$consulta->execute();
				return $consulta->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function consultarPadres(){
			try {
				
				$consulta = $this->pdo->prepare("CALL consultarPadres();");
				$consulta->execute();
				return $consulta->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function Insertar(Menu $m){
			try {
				if ($m->getEsPadre() == "Ninguno") {
					//var_dump($m->getDescMenu());
					$nombreMenu = $m->getNombreMenu();
					$descripMenu = $m->getDescMenu();
					$consulta = $this->pdo->prepare("INSERT INTO MENUS(NOMBRE, DESCRIPCION, ES_PADRE) VALUES('$nombreMenu', '$descripMenu', 1);");
					$consulta->execute();
				} else{
					$nombreMenu = $m->getNombreMenu();
					$descripMenu = $m->getDescMenu();
					$nombrePadre = $m->getEsPadre();
					$consulta = $this->pdo->prepare("call insertarHijo('$nombreMenu', '$descripMenu', '$nombrePadre')");
					$consulta->execute();
				}
				
			} catch (Exception $e) {
				die($e->getMessage());
			}
		} 

		public function MostrarMenu($id){
			try {
				$c=$this->pdo->prepare("select * FROM MENUS WHERE ID_INFO = ?;");
				$c->execute([$id]);
				$r = $c->fetch(PDO::FETCH_OBJ);				
				$menu = new Menu;
				$menu->setIdMenu($id);
				$menu->setNombreMenu($r->NOMBRE);
				$menu->setDescMenu($r->DESCRIPCION);
				$menu->setEsPadre($r->ES_PADRE);
				return $menu;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function Actualizar(Menu $m){
			try {
				$consulta = $this->pdo->prepare("UPDATE MENUS SET NOMBRE = ?, DESCRIPCION = ? WHERE ID_INFO = ?;");
				$consulta->execute(array($m->getNombreMenu(),$m->getDescMenu(), $m->getIdMenu()));				
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function Eliminar($id){
			try {
				$consulta = $this->pdo->prepare("DELETE FROM MENUS WHERE ID_INFO = ?;");
				$consulta->execute(array($id));
			} catch (Exception $e) {
				die($e->getMessage());	
			}
		} 




	}
?>