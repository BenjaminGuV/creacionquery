<?php 

	/**
	* 
	*/
	class Insert
	{
		public $insert     = "";
		public $table      = "";
		public $content    = "";
		public $value_sql  = "";
		public $params_sql = "";
		
		function __construct( $tabla )
		{
			$this->insert = "INSERT INTO";
			$this->table  = $tabla;
		}

		public function getInsert()
		{
			return $this->insert . " " . $this->table .
					" " . $this->content . " " . $this->value_sql . "; " .
					$this->params_sql;
		}

		public function setData( $params = [] )
		{
			$this->content   = "(";
			$this->value_sql = "VALUES (";

			foreach ($params as $key => $value) {
				$this->content   .= $params[$key]["nombre"] . ", ";
				$this->value_sql .= $this->tipo( $params[$key]["tipo"] ) . ", ";
				$this->params_sql .= '$params["' . $params[$key]["nombre"] . '"]' . ', ';
			}

			$this->content   = substr( $this->content, 0, -2 );
			$this->value_sql = substr( $this->value_sql, 0, -2 );

			$this->content   = $this->content . ")";
			$this->value_sql = $this->value_sql . ")";

		}

		public function tipo( $valor )
		{
			$nuevo = "s";

			$valores = explode( "(", $valor );

			if ( $valores[0] == "int" ) {
				$nuevo = "%d";
			}

			if ( $valores[0] == "varchar" ) {
				$nuevo = "'%s'";
			}

			return $nuevo;
		}

	}

?>