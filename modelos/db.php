<?php
	class BaseDatos{
		const servidor = "localhost";
		const usuario = "root";
		const contra = "";
		const nombre = "dp";

		public static function Conectar(){
			try {
				$conexion = new PDO("mysql:host=".self::servidor."; dbname=".self::nombre.";charset=utf8",self::usuario,self::contra);
				$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conexion;

			}catch(PDOException $e){
				return "Error al conectar ".$e->getMessage();
			}
		}
	}

?>