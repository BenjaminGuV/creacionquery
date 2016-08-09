<?php 

	require 'lib/conexion.php';
	require 'lib/insert.class.php';

	$con = new Conexion();

	$input = [];
	$table = "user";

	$sql = sprintf("DESCRIBE %s;", $table);

	$datos = $con->query( $sql );

	if ( !empty( $datos ) ) {
		while($row = mysqli_fetch_array($datos)) {
		    $input[] = array(
				"nombre" => $row['Field'],
				"tipo"   => $row['Type']
		    );
		}
	}

	//insert

	echo "<pre>";
	echo var_dump( $input );
	echo "</pre>";

	$nuevo = new Insert( $table );
	$nuevo->setData( $input );
	$sql_ins = $nuevo->getInsert();

	echo "<pre>";
	echo var_dump( $sql_ins );
	echo "</pre>";

?>