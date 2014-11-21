<?php
include_once MODEL_DIR.'modelo1.php';
$Contr_Recep = new Modelo ();

$id= isset ( $_GET ["id"] ) ? $_GET ["id"] : "error";



$Contr_Recep->Recepcion($id);