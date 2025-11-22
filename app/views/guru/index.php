<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$sub_path = "/guru";

$breadcrumbs = "
    <li class='breadcrumb-item'><a href='/guru'>Guru</a></li>";

$title = "Data Guru";
$subtitle = "Kelola data guru di halaman ini sesuai keperluan.";

require_once VIEW_PATH . "layouts/header.php";

?>

<link rel="stylesheet" href="/mazer/css/pages/simple-datatables.css">
<?php alertMessage() ?>
<section class="section mb-4">
    <div class="card">
        <div class="card-header pb-2 d-flex justify-content-between align-items-center">
            <p class="mb-0">
                Tabel Data
            </p>
            <?php if(isAdmin()) : ?>
                <a href="/guru/create" class="btn btn-primary px-4">Tambah Data</a>
            <?php endif ?>
        </div>
        <hr class="mx-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr class="text-nowrap">
                            <th>ID</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Dibuat Pada</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (all("guru") as $guru) : ?>
                            <tr class="text-nowrap">
                                <td><?= codeGuru($guru->id) ?></td>
                                <td><?= $guru->nip ?></td>
                                <td><?= $guru->nama ?></td>
                                <td><?= $guru->jenis_kelamin ?></td>
                                <td><?= $guru->alamat ?></td>
                                <td><?= timeago("@" . $guru->dibuat_pada) ?></td>
                                <td>
                                    <a href="#" class="badge bg-info text-black me-1" data-bs-toggle="modal" data-bs-target="#detail<?= $guru->id ?>">Detail</a>
                                    <?php if(isAdmin()) : ?>
                                        <a href="/guru/edit?id=<?= $guru->id ?>" class="badge bg-warning text-black me-1">Edit</a>
                                        <a href="#" class="badge bg-<?= $guru->id ? "secondary" : "danger" ?> text-white me-1" data-bs-toggle="modal" data-bs-target="#hapus<?= $guru->id ?>">Hapus</a>
                                    <?php endif ?>
                                </td>
                                <?php if(isAdmin()) : ?>
                                    <div class="modal fade text-left" id="hapus<?= $guru->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger py-2">
                                                    <h5 class="modal-title white" id="myModalLabel120">Hapus anggota
                                                    </h5>
                                                     <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus <b><?= $guru->nama ?></b>? Data yang sudah dihapus tidak dapat dikembalikan!
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="/guru/delete" method="POST">
                                                        <input hidden name="id" value="<?= $guru->id ?>">
                                                        <button type="submit" class="btn btn-danger px-4" data-bs-dismiss="modal">
                                                            <span class="d-block">Hapus</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <div class="modal fade text-left" id="detail<?= $guru->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary py-2">
                                                <h5 class="modal-title white" id="myModalLabel120">Detail guru
                                                </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body p-4">
                                                <div class="row">
                                                    <div class="col-lg-3 -me-2">
                                                        <img src="/images/<?= $guru->gambar ?>" class="image-detail" alt="">
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <ul class="list-group">
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">ID</div>
                                                                <div class="badge bg-success"><?= codeGuru($guru->id) ?></div>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">NIS</div>
                                                                <div><b><?= $guru->nip ?></b></div>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">Username</div>
                                                                <div><b><?= $guru->username ?></b></div>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">Nama</div>
                                                                <div><b><?= $guru->nama ?></b></div>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">Pendidikan Terakhir</div>
                                                                <div><b><?= $guru->pend_terakhir ?></b></div>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">Alamat</div>
                                                                <div><b><?= $guru->alamat ?></b></div>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">Telepon</div>
                                                                <div><b><?= $guru->telepon ?></b></div>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">Tanggal Lahir</div>
                                                                <div><b><?= $guru->tanggal_lahir ?></b></div>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">Jenis Kelamin</div>
                                                                <div><b><?= $guru->jenis_kelamin ?></b></div>
                                                            </li>
                                                           
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">Dibuat Pada</div>
                                                                <div><b><?= timeago("@" . $guru->dibuat_pada) ?></b></div>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">Terakhir Diedit</div>
                                                                <div><b><?= timeago("@" . $guru->diedit_pada) ?></b></div>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">Buku Dipinjam</div>
                                                                <div><b><?= Capsule::table("detail_peminjaman_guru")->whereIn("guru_id", pluck("peminjaman", "anggota_id", $anggota->id, "id"))->sum("jumlah_buku") ?> buah</b></div>
                                                            </li>
                                                            <li class="list-group-item d-flex">
                                                                <div class="col-lg-4">Peminjaman</div>
                                                                <div><b><?= amountWhere("peminjaman", "anggota_id", $anggota->id) ?> kali</b></div>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script src="/mazer/js/extensions/simple-datatables.js"></script>

<?php require_once VIEW_PATH . "layouts/footer.php" ?>
