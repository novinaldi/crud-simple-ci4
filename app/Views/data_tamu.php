<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tamu</title>
</head>

<body>
    <div style="font-size: 14pt; font-style: italic; border-bottom:2px solid #000;width:60%; margin-bottom:20px;">
        Terima Kasih <strong><?= $namalengkap ?></strong> sudah mengisi form tamu, berikut data lengkap anda :
    </div>

    <table style="width:60%;">
        <tr>
            <td style="width: 20%;">Nama Lengkap</td>
            <td style="width: 2%;">:</td>
            <td> <?= $namalengkap ?> </td>
        </tr>
        <tr>
            <td style="width: 20%;">Gender</td>
            <td style="width: 2%;">:</td>
            <td>
                <?= ($gender == 'M') ? 'Laki-Laki' : 'Perempuan' ?>
            </td>
        </tr>
        <tr>
            <td style="width: 20%;">Alamat</td>
            <td style="width: 2%;">:</td>
            <td><?= $alamat ?></td>
        </tr>
        <tr>
            <td style="width: 20%;">Email</td>
            <td style="width: 2%;">:</td>
            <td><?= $email ?></td>
        </tr>
        <tr>
            <td style="width: 20%;">No.Telp</td>
            <td style="width: 2%;">:</td>
            <td><?= $telp ?></td>
        </tr>
        <tr>
            <td colspan="3">
                <button type="button" onclick="window.location='/tamu'">
                    &#128072; Kembali
                </button>
            </td>
        </tr>
    </table>
</body>

</html>