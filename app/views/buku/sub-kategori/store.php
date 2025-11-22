<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $columns = generateColumns($_POST);

    if (validation(subKategoriRules(), $_POST)) {
        // dump_die($_POST["sub_kategori",columns]);
       if(amountWhere("sub_kategori", "kode_sub_kategori", $columns["kode_sub_kategori"]) == 1) {
            setAlertSession("Data gagal ditambahkan! Kode Sub Kategori sudah ada di database!", "danger");
            return header("Location: /buku/sub-kategori/");
        }
        insert("sub_kategori", $columns);

        setAlertSession("Data berhasil ditambahkan!", "success");
        return header("Location: /buku/sub-kategori");
    }

    return header("Location: /buku/sub-kategori");
}

return require_once VIEW_PATH .  "error/404.php";
