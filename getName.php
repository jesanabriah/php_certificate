<?php

/**
 *  Php_certificate
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *  Copyright (2019) Jorge Eliécer Sanabria Hernández
 *
 *  e-mail: jesanabriah@gmail.com
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

  //Problema con las tildes
  $name = utf8_decode($name);

  //return $name
  return $name;
}
