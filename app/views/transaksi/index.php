<?php

$sub_path = "/transaksi";

$breadcrumbs = "
    <li class='breadcrumb-item'><a href='/transaksi'>Transaksi</a></li>
";

$title = "Data Transaksi";
$subtitle = "Berisi informasi lengkap tentang transaksi.";

require_once VIEW_PATH . "layouts/header.php";
?>

<?php alertMessage() ?>
<section class="section mb-4">
    <div class="card">
        <div class="card-header pb-2">
            <p class="mb-0 badge bg-primary">
                Peminjaman Anggota Sudah Kembali
            </p>
        </div>
        <hr class="mx-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-nowrap">
                            <th>ID</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Batas Pengembalian</th>
                            <th>Denda</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (amountWhere("peminjaman", "status", 1) == 0) : ?>
                            <tr class="text-nowrap">
                                <td colspan="100%" style="text-align: center;">Data tidak ada</td>
                            </tr>
                        <?php endif ?>
                        <?php foreach (allWhere("peminjaman", "status", 1) as $peminjaman) : ?>
                            <tr class="text-nowrap">
                                <td><?= codePeminjaman($peminjaman->id) ?></td>
                                <td><?= get("anggota", $peminjaman->anggota_id)->nama ?></td>
                                <td><?= $peminjaman->tanggal_peminjaman ?></td>
                                <td><?= $peminjaman->batas_pengembalian ?></td>
                                <td><?= denda($peminjaman->id) ?></td>
                                <td>
                                    <?php if(statusPeminjamanBayarDenda($peminjaman->id)) : ?>
                                        <div class="badge bg-warning text-black">Belum bayar denda</div>
                                    <?php else : ?>
                                        <div class="badge bg-success">Sudah kembali</div>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header pb-2">
            <p class="mb-0 badge bg-secondary">
                Peminjaman Anggota Belum Kembali
            </p>
        </div>
        <hr class="mx-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-nowrap">
                            <th>ID</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Batas Pengembalian</th>
                            <th>Denda</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (amountWhere("peminjaman", "status", 0) == 0) : ?>
                            <tr class="text-nowrap">
                                <td colspan="100%" style="text-align: center;">Data tidak ada</td>
                            </tr>
                        <?php endif ?>
                        <?php foreach (allWhere("peminjaman", "status", 0) as $peminjaman) : ?>
                            <tr class="text-nowrap">
                                <td><?= codePeminjaman($peminjaman->id) ?></td>
                                <td><?= get("anggota", $peminjaman->anggota_id)->nama ?></td>
                                <td><?= $peminjaman->tanggal_peminjaman ?></td>
                                <td><?= $peminjaman->batas_pengembalian ?></td>
                                <td><?= denda($peminjaman->id) ?></td>
                                <td><div class="badge bg-danger">Belum kembali</div></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header pb-2">
            <p class="mb-0 badge bg-primary">
                Peminjaman Rombongan Sudah Kembali
            </p>
        </div>
        <hr class="mx-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-nowrap">
                            <th>ID</th>
                            <th>Nama Peminjam</th>
                            <th>Kelas Peminjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Batas Pengembalian</th>
                            <th>Denda</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (amountWhere("rombongan", "status", 1) == 0) : ?>
                            <tr class="text-nowrap">
                                <td colspan="100%" style="text-align: center;">Data tidak ada</td>
                            </tr>
                        <?php endif ?>
                        <?php foreach (allWhere("rombongan", "status", 1) as $peminjaman) : ?>
                            <tr class="text-nowrap">
                                <td><?= codePeminjamanRombongan($peminjaman->id) ?></td>
                                <td><?= get("anggota", $peminjaman->anggota_id)->nama ?></td>
                                <td><?= get("kelas_anggota", $peminjaman->kelas_id)->nama_kelas ?></td>
                                <td><?= $peminjaman->tanggal_peminjaman ?></td>
                                <td><?= $peminjaman->batas_pengembalian ?></td>
                                <td><?= dendaRombongan($peminjaman->id) ?></td>
                                <td>
                                    <?php if(statusPeminjamanRombonganBayarDenda($peminjaman->id)) : ?>
                                        <div class="badge bg-warning text-black">Belum bayar denda</div>
                                    <?php else : ?>
                                        <div class="badge bg-success">Sudah kembali</div>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header pb-2">
            <p class="mb-0 badge bg-secondary">
                Peminjaman Rombongan Belum Kembali
            </p>
        </div>
        <hr class="mx-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-nowrap">
                            <th>ID</th>
                            <th>Nama Peminjam</th>
                            <th>Kelas Peminjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Batas Pengembalian</th>
                            <th>Denda</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (amountWhere("rombongan", "status", 0) == 0) : ?>
                            <tr class="text-nowrap">
                                <td colspan="100%" style="text-align: center;">Data tidak ada</td>
                            </tr>
                        <?php endif ?>
                        <?php foreach (allWhere("rombongan", "status", 0) as $peminjaman) : ?>
                            <tr class="text-nowrap">
                                <td><?= codePeminjamanRombongan($peminjaman->id) ?></td>
                                <td><?= get("anggota", $peminjaman->anggota_id)->nama ?></td>
                                <td><?= get("kelas_anggota", $peminjaman->kelas_id)->nama_kelas ?></td>
                                <td><?= $peminjaman->tanggal_peminjaman ?></td>
                                <td><?= $peminjaman->batas_pengembalian ?></td>
                                <td><?= dendaRombongan($peminjaman->id) ?></td>
                                <td><div class="badge bg-danger">Belum kembali</div></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header pb-2">
            <p class="mb-0 badge bg-primary">
                Peminjaman Guru Sudah Kembali
            </p>
        </div>
        <hr class="mx-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-nowrap">
                            <th>ID</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Batas Pengembalian</th>
                            <th>Denda</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (amountWhere("peminjaman_guru", "status", 1) == 0) : ?>
                            <tr class="text-nowrap">
                                <td colspan="100%" style="text-align: center;">Data tidak ada</td>
                            </tr>
                        <?php endif ?>
                        <?php foreach (allWhere("peminjaman_guru", "status", 1) as $peminjaman) : ?>
                            <tr class="text-nowrap">
                                <td><?= codePeminjamanGuru($peminjaman->id) ?></td>
                                <td><?= get("anggota", $peminjaman->anggota_id)->nama ?></td>
                                <td><?= $peminjaman->tanggal_peminjaman ?></td>
                                <td><?= $peminjaman->batas_pengembalian ?></td>
                                <td><?= dendaGuru($peminjaman->id) ?></td>
                                <td>
                                    <?php if(statusPeminjamanGuruBayarDenda($peminjaman->id)) : ?>
                                        <div class="badge bg-warning text-black">Belum bayar denda</div>
                                    <?php else : ?>
                                        <div class="badge bg-success">Sudah kembali</div>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header pb-2">
            <p class="mb-0 badge bg-secondary">
                Peminjaman Guru Belum Kembali
            </p>
        </div>
        <hr class="mx-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-nowrap">
                            <th>ID</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Batas Pengembalian</th>
                            <th>Denda</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (amountWhere("peminjaman_guru", "status", 0) == 0) : ?>
                            <tr class="text-nowrap">
                                <td colspan="100%" style="text-align: center;">Data tidak ada</td>
                            </tr>
                        <?php endif ?>
                        <?php foreach (allWhere("peminjaman_guru", "status", 0) as $peminjaman) : ?>
                            <tr class="text-nowrap">
                                <td><?= codePeminjamanGuru($peminjaman->id) ?></td>
                                <td><?= get("anggota", $peminjaman->anggota_id)->nama ?></td>
                                <td><?= $peminjaman->tanggal_peminjaman ?></td>
                                <td><?= $peminjaman->batas_pengembalian ?></td>
                                <td><?= dendaGuru($peminjaman->id) ?></td>
                                <td><div class="badge bg-danger">Belum kembali</div></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</section>

<?php require_once VIEW_PATH . "layouts/footer.php" ?>