<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Data Tamu Yang Terhapus</title>
</head>

<body>
    <center>
        <h2 style="border-bottom: 2px solid #000; width: 80%;">Data Tamu Yang Ter-Hapus</h2>
        <p>
            <button type="button" onclick="window.location='/'">
                &#129136; Kembali
            </button>
        </p>
        <?php
        $session = \Config\Services::session();
        if ($session->has('pesan')) {
            echo $session->getFlashdata('pesan');
        }
        ?>
        <table style="border-collapse: collapse; width: 80%;" border="1" cellpadding="2">
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
                <?php $nomor = 1;
                foreach ($data_terhapus as $row) : ?>
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
                        <?= form_open('/tamu/restore/' . $row['idtamu1234'], [
                                'onsubmit' => "return restoredata();",
                                'style' => "display:inline"
                            ]) ?>
                        <input type="hidden" name="_method" value="PUT" />
                        <button type="submit">Restore</button>
                        <?= form_close() ?>

                        <?= form_open('/tamu/delete-permanent/' . $row['idtamu1234'], [
                                'onsubmit' => "return hapusdata();",
                                'style' => "display:inline"
                            ]) ?>
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit">Delete Permanent</button>
                        <?= form_close() ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
    <script>
    function restoredata() {
        pesan = confirm('Yakin mengembalikan data ini ?');
        if (pesan) return true;
        else return false;
    }

    function hapusdata() {
        pesan = confirm('Yakin menghapus secara permanen data ini ?');
        if (pesan) return true;
        else return false;
    }
    </script>
</body>

</html>