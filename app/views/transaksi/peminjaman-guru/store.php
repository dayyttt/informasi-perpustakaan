<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $peminjaman_id = latter("peminjaman_guru") + 1;
    $detail_peminjaman = [];
    

    if (validation(peminjamanGuruRules(), $_POST)) {
        if($_POST["batas_pengembalian"] < date("Y-m-d")) {
            setAlertSession("Data gagal ditambahkan! Batas pengembalian tidak boleh lebih kecil dari hari ini!", "danger");
            return header("Location: /transaksi/peminjaman-guru");
        }

        foreach($_POST["buku_id"] as $key => $value) {
            if($_POST["jumlah_buku"][$key] <= 0) {
                setAlertSession("Data gagal ditambahkan! Jumlah buku kosong atau lebih kecil dari 0!", "danger");
                return header("Location: /transaksi/peminjaman-guru");
            } elseif($_POST["jumlah_buku"][$key] >= 4) {
                setAlertSession("Data gagal ditambahkan! Jumlah buku yang dipinjam tidak boleh lebih dari 3!", "danger");
                return header("Location: /transaksi/peminjaman-guru");
            }
            
            $detail_peminjaman[$key] = [
                "guru_id" => $peminjaman_id,
                "buku_id" => $_POST["buku_id"][$key],
                "jumlah_buku" => $_POST["jumlah_buku"][$key],
                "tanggal_peminjaman" => date("Y-m-d"),
                "tanggal_dikembalikan" => null,
                "status" => 0
            ];

            update("buku", $_POST["buku_id"][$key], [
                "jumlah_buku" => get("buku", $_POST["buku_id"][$key])->jumlah_buku - $_POST["jumlah_buku"][$key]
            ]);
        }
        
        if(!isset($_POST["buku_id"])) {
            setAlertSession("Data gagal ditambahkan! Daftar buku kosong!", "danger");
            return header("Location: /transaksi/peminjaman-guru");
        }
        
        insert("peminjaman_guru", [
            "id" => $peminjaman_id,
            "guru_id" => $_POST["guru_id"],
            "pengguna_id" => auth()->id,
            "tanggal_peminjaman" => date("Y-m-d"),
            "batas_pengembalian" => $_POST["batas_pengembalian"],
            "tanggal_dikembalikan" => null,
            "denda" => first("denda")->besaran_denda,
            "denda_dibayarkan" => 0,
            "status" => 0,
        ]);

        insert("detail_peminjaman_guru", $detail_peminjaman);

        insert("notifikasi", [
            "isi_notifikasi" => get("anggota", $_POST["guru_id"])->username . " meminjam buku sebanyak " . sumWhere("detail_peminjaman_guru", "guru_id", $peminjaman_id, "jumlah_buku") . " buah",
            "dibuat_pada" => time() 
        ]);

        setAlertSession("Data berhasil ditambahkan!", "success");
        return header("Location: /transaksi/pengembalian-guru");
    }
    return header("Location: /transaksi/peminjaman-guru");
}

return require_once VIEW_PATH .  "error/404.php";
