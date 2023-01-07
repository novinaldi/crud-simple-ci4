<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>
Form Edit Tamu

<?= $this->endSection() ?>


<?= $this->section('isi') ?>

<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-warning" onclick="window.history.back()">
            Kembali
        </button>
    </div>
    <div class="card-body">
        <?= form_open('/tamu/update') ?>
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="idtamu" value="<?= $idtamu ?>" />

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Nama Lengkap</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="namalengkap" id="namalengkap" size="50"
                    value="<?= $namalengkap ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Gender</label>
            <div class="col-sm-8">
                <select name="gender" id="gender" class="form-control">
                    <option value="M" <?= $gender == 'M' ? 'selected' : ''; ?>>Male</option>
                    <option value="F" <?= $gender == 'F' ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-8">
                <textarea name="alamat" cols="40" rows="4" class="form-control"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Alamat Email</label>
            <div class="col-sm-4">
                <input class="form-control
                <?= ($session->getFlashdata('errorEmail')) ? 'is-invalid' : 'is-valid' ?>
                " value="<?= old('alamatemail') ?>" name="alamatemail" id="alamatemail" type="text"
                    placeholder="Isi E-Mail Valid" size="40">
                <?= ($session->getFlashdata('errorEmail')) ? "<div class='invalid-feedback'>" . $session->getFlashData('errorEmail') . "</div>" : ''; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Telp</label>
            <div class="col-sm-8">
                <input class="form-control 
                <?= ($session->getFlashdata('errorTelp')) ? 'is-invalid' : 'is-valid' ?>
                " value="<?= old('telp') ?>" name="telp" id="telp" type="text" size="20">
                <?= ($session->getFlashdata('errorTelp')) ? "<div class='invalid-feedback'>" . $session->getFlashData('errorTelp') . "</div>" : ''; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
                <input class="form-control 
                <?= ($session->getFlashdata('errorPass')) ? 'is-invalid' : 'is-valid' ?>
                " type="password" name="pass" id="pass" size="20" value="<?= old('pass') ?>">
                <?= ($session->getFlashdata('errorPass')) ? "<div class='invalid-feedback'>" . $session->getFlashData('errorPass') . "</div>" : ''; ?>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Confirm Password</label>
            <div class="col-sm-8">
                <input class="form-control 
                <?= ($session->getFlashdata('errorPassConfirm')) ? 'is-invalid' : 'is-valid' ?>
                " type="password" name="pass_confirm" id="pass_confirm" size="20">
                <?= ($session->getFlashdata('errorPassConfirm')) ? "<div class='invalid-feedback'>" . $session->getFlashData('errorPassConfirm') . "</div>" : ''; ?>
            </div>
            <?= form_close(); ?>
        </div>
    </div>


    <?= $this->endSection() ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Data Tamu</title>
    </head>

    <body>


        <table border="0" style="width: 70% ;">
            <caption>
                <h2 style="border-bottom: 2px solid #000 ;">EDIT DATA TAMU</h2>
                <button type="button" onclick="window.location='/'">
                    &#9754; Kembali
                </button>
            </caption>
            <tr>
                <td>Nama Lengkap :</td>
                <td>
                    <input type="text" name="namalengkap" id="namalengkap" size="50" value="<?= $namalengkap ?>">
                </td>
            </tr>
            <tr>
                <td>Gender :</td>
                <td>

                </td>
            </tr>
            <tr>
                <td>Alamat :</td>
                <td>
                    <textarea name="alamat" cols="40" rows="4"><?= $alamat ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Alamat Email :</td>
                <td>
                    <input value="<?= $email ?>" name="alamatemail" id="alamatemail" type="text" size="40">
                </td>
            </tr>
            <tr>
                <td>No.Telp/HP :</td>
                <td>
                    <input value="<?= $telp ?>" name="telp" id="telp" type="text" size="20">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Update &#128393;</button>
                </td>
            </tr>
        </table>
        <?= form_close() ?>
    </body>

    </html>