<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>
Data Tamu
<?= $this->endSection() ?>


<?= $this->section('isi') ?>

<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary" onclick="window.location='/tamu/form'">
            &#10010; Tambah
        </button>

        <button type="button" class="btn btn-danger" onclick="window.location='/tamu/data-trash'">
            &#128687; Data Yang Terhapus
        </button>
    </div>
    <div class="card-body">
        <?= form_open('tamu/data') ?>
        <div class="form-group">

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Berdasakan Nama Tamu / Email" autofocus="true"
                    name="cari" value="<?= $cari ?>">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </div>

        </div>
        <?= form_close(); ?>
        <?php
        $session = \Config\Services::session();
        if ($session->has('pesan')) {

            // echo $session->getFlashdata('pesan');
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            ' . $session->getFlashdata('pesan') . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
        <div class="float-start">

            <h4><span class="badge bg-primary"><?= $totaldata ?></span></h4>

        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1 + (($nohalaman - 1) * 5);
                foreach ($datatamu as $row) : ?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td><?= $row['namatamu1234']; ?></td>
                    <td>
                        <?= ($row['gender1234'] == 'M') ? 'Laki-Laki' : 'Perempuan'; ?>
                    </td>
                    <td><?= $row['alamat1234']; ?></td>
                    <td><?= $row['email1234']; ?></td>
                    <td><?= $row['telp1234']; ?></td>
                    <td style="text-align: center ;">
                        <button class="btn btn-info" type="button" title="Edit Data"
                            onclick="window.location='/tamu/edit/<?= $row['idtamu1234'] ?>'">
                            &#9998;
                        </button>

                        <?= form_open('/tamu/hapus/' . $row['idtamu1234'], [
                                'onsubmit' => "return hapusdata();",
                                'style' => "display:inline"
                            ]) ?>
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger">&#9940;</button>
                        <?= form_close() ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="float-end">
            <?= $pager->links('tamu', 'paging') ?>
        </div>
    </div>
</div>
<script>
function hapusdata() {
    pesan = confirm('Yakin data ini dihapus ?');
    if (pesan) return true;
    else return false;
}
</script>
<?= $this->endSection() ?>