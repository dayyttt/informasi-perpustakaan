<?php 
use Illuminate\Database\Capsule\Manager as Capsule;
 

$data = Capsule::table("kelas_anggota")->get();
header('Content-type: application/json');
echo json_encode($data);