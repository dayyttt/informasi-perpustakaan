<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$id = $_POST["id"];

	if(get("peminjaman_guru", $id)->status == 0) {
		foreach(allWhere("detail_peminjaman_guru", "guru_id", $id) as $detail_peminjaman) {
	        update("buku", $detail_peminjaman->buku_id, [
	            "jumlah_buku" => get("buku", $detail_peminjaman->buku_id)->jumlah_buku + $detail_peminjaman->jumlah_buku
	        ]);
	    }
	}
	
    deleteWhere("kas", "tabel_id", "peminjaman_guru#" . $id);
	deleteWhere("detail_peminjaman_guru", "guru_id", $id);
	delete("peminjaman_guru", $id);
	
	setAlertSession("Data berhasil dihapus!", "success");
	return header("Location: /transaksi/pengembalian-guru");
}

return require_once VIEW_PATH .  "error/404.php";
