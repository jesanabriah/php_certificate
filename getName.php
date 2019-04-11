<?php

/**
 * @author Jorge Sanabria jesanabriah@correo.udistrital.edu.co
 * Grupo Linux de la universidad Distrital (GLUD)
 */

function getName($id){

  //Connect to your database using the worpress files
  $path = $_SERVER['DOCUMENT_ROOT'];
  include_once $path . '/wp-load.php';
  include_once $path . '/wp-config.php';

  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // Test the connection:
  if (mysqli_connect_errno()){
      // Connection Error
      exit("Couldn't connect to the database: " . mysqli_connect_error());
  }

  //Select the fields you want to show in your PDF file
  //Get first name
  $result = $mysqli->query("select meta_value from wp_usermeta where meta_key = 'first_name' and user_id = $id");
  $row = $result->fetch_array(MYSQLI_ASSOC);
  $name = $row['meta_value'];
  //get last name
  $result = $mysqli->query("select meta_value from wp_usermeta where meta_key = 'last_name' and user_id = $id");
  $row = $result->fetch_array(MYSQLI_ASSOC);
  $name = $name.' '.$row['meta_value'];

  //Close connection to database
  /* liberar la serie de resultados */
  $result->free();

  /* cerrar la conexión */
  $mysqli->close();

  //return $name
  return $name;
}
