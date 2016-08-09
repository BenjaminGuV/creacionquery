<?php 

	/**
	* 
	*/
	class Conexion
	{
		public $cdb;
		
		function __construct()
		{
			$this->cdb = new mysqli("localhost", "root", "test00", "user");
		}

		public function query( $sql )
		{
			return $this->cdb->query( $sql );
		}


	}

?>