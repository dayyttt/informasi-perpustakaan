<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $columns = generateColumns($_POST);
    $columns["tanggal"] = date("Y-m-d");
    $buku_hilang = get("buku_rusak", $id);

    $buku = get("buku", $columns["buku_id"]);

     if (validation(bukuRusakRules(), $_POST)) {
        
        unset($columns["jumlah_buku_rak"]);
       if($buku->jumlah_buku < $columns["jumlah_buku"]) {
          setAlertSession("Data gagal ditambahkan! Jumlah buku tidak boleh lebih besar dari jumlah buku sekarang!", "danger");
          return header("Location: /transaksi/buku-rusak/create");
       } 
       
        update("buku", $columns["buku_id"], [
            "jumlah_buku" => $buku->jumlah_buku
        ]);

        insert("buku_rusak", $columns);

        if($columns["status"] == 1) {
            insert("kas", [
                "besaran_kas" => $_POST["jumlah_buku"],
                "tabel_id" => "buku_rusak#" . latter("buku_rusak"),
                "tanggal" => date("Y-m-d"),
                "tipe_kas" => "pemasukan",
                "keterangan" => "Biaya ganti rugi buku " . $buku->judul . " hilang sebanyak " . $columns["jumlah_buku"] . " buah sebesar " . rp($columns["harga"] * $columns["jumlah_buku"]),
            ]);
        }

        setAlertSession("Data berhasil ditambahkan!", "success");
        return header("Location: /transaksi/buku-rusak");
    }
    return header("Location: /transaksi/buku-rusak/create");
}

return require_once VIEW_PATH .  "error/404.php";
