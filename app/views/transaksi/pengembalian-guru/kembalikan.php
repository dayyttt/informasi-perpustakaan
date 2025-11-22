<?php

use Illuminate\Database\Capsule\Manager as Capsule;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $detail_peminjaman = get("detail_peminjaman_guru", $id);

    update("detail_peminjaman_guru", $id, [
        "tanggal_dikembalikan" => date("Y-m-d"),
        "status" => 1
    ]);

    if(!Capsule::table("detail_peminjaman_guru")->where("guru_id", $detail_peminjaman->id)->where("status", 0)->count() > 0) {
        update("peminjaman_guru", $detail_peminjaman->guru_id, [
            "tanggal_dikembalikan" => date("Y-m-d"),
            "status" => 1
        ]);
    }

    update("buku", $detail_peminjaman->buku_id, [
        "jumlah_buku" => get("buku", $detail_peminjaman->buku_id)->jumlah_buku + $detail_peminjaman->jumlah_buku
    ]);

    setAlertSession("Data berhasil dikembalikan!", "success");
    return header("Location: /transaksi/pengembalian-guru");
}

return require_once VIEW_PATH .  "error/404.php";









