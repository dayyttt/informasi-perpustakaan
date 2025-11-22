<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$id = $_POST["id"];
	$oldImage = get("guru", $id)->gambar;
	if ($oldImage != DEFAULT_IMAGE) {
		unlink("images/" . $oldImage);
	}
	if(!anggotaRelational($id)) {
		delete("guru", $id);
		setAlertSession("Data berhasil dihapus!", "success");
		return header("Location: /guru");
	}
	setAlertSession("Data gagal dihapus! Mungkin ada data yang berelasi!", "danger");
	return header("Location: /guru");
}

return require_once VIEW_PATH .  "error/404.php";
