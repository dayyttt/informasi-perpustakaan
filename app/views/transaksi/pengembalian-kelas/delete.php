<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$id = $_POST["id"];

	if(get("rombongan", $id)->status == 0) {
		foreach(allWhere("detail_peminjaman_rombongan", "rombongan_id", $id) as $detail_peminjaman) {
	        update("buku", $detail_peminjaman->buku_id, [
	            "jumlah_buku" => get("buku", $detail_peminjaman->buku_id)->jumlah_buku + $detail_peminjaman->jumlah_buku
	        ]);
	    }
	}
	
    deleteWhere("kas", "tabel_id", "rombongan#" . $id);
	deleteWhere("detail_peminjaman_rombongan", "rombongan_id", $id);
	delete("rombongan", $id);
	
	setAlertSession("Data berhasil dihapus!", "success");
	return header("Location: /transaksi/pengembalian-kelas");
}

return require_once VIEW_PATH .  "error/404.php";
