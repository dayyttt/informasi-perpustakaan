<?php 
	if($_SERVER["REQUEST_METHOD"] === "POST") {
		$id = $_POST["id"];
	    	delete(all("notifikasi", $id));
		    setAlertSession("Data berhasil dihapus!", "success");
			return header("Location: /buku")
	}
return require_once VIEW_PATH .  "error/404.php";