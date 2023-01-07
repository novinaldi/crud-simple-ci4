<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>
Form Tamu

<?= $this->endSection() ?>


<?= $this->section('isi') ?>


<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-warning" onclick="window.history.back()">
            Kembali
        </button>
    </div>
    <div class="card-body">
        <?php
        $session = \Config\Services::session();
        // if ($session->has('error')) {
        //     echo "<tr>
        //             <td colspan='2'>" . $session->getFlashData('error') . "</td>
        //         </tr>";
        // }


        ?>
        <?= form_open_multipart('/tamu/send') ?>

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Nama Lengkap</label>
            <div class="col-sm-8">
                <input class="form-control 
                    <?= ($session->getFlashdata('errorNamaLengkap')) ? 'is-invalid' : 'is-valid' ?>
                " type="text" name="namalengkap" id="namalengkap" size="50" value="<?= old('namalengkap') ?>" placeholder="Isi Nama Lengkap Anda...">
                <?= ($session->getFlashdata('errorNamaLengkap')) ? "<div class='invalid-feedback'>" . $session->getFlashData('errorNamaLengkap') . "</div>" : ''; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Gender</label>
            <div class="col-sm-8">
                <select class="form-control 
                <?= ($session->getFlashdata('errorGender')) ? 'is-invalid' : 'is-valid' ?>
                " name="gender" id="gender">
                    <option value="" selected>==Pilih==</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
                <?= ($session->getFlashdata('errorGender')) ? "<div class='invalid-feedback'>" . $session->getFlashData('errorGender') . "</div>" : ''; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-8">
                <textarea name="alamat" cols="40" rows="4" class="form-control
                <?= ($session->getFlashdata('errorAlamat')) ? 'is-invalid' : 'is-valid' ?>
                "></textarea>
                <?= ($session->getFlashdata('errorAlamat')) ? "<div class='invalid-feedback'>" . $session->getFlashData('errorAlamat') . "</div>" : ''; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Alamat Email</label>
            <div class="col-sm-4">
                <input class="form-control
                <?= ($session->getFlashdata('errorEmail')) ? 'is-invalid' : 'is-valid' ?>
                " value="<?= old('alamatemail') ?>" name="alamatemail" id="alamatemail" type="text" placeholder="Isi E-Mail Valid" size="40">
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
        </div>

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Upload Foto</label>
            <div class="col-sm-4">
                <input class="form-control 
                <?= ($session->getFlashdata('errorUpload')) ? 'is-invalid' : ''; ?>
                " type="file" name="upload" id="upload" accept=".jpg,.png,.jpeg">
                <?= ($session->getFlashdata('errorUpload')) ? "<div class='invalid-feedback'>" . $session->getFlashData('errorUpload') . "</div>" : ''; ?>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-4 col-form-label"></label>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-success">Kirim &#9755;</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.reload()">Batal
                    &#9940;</button>
            </div>
        </div>

        <?= form_close(); ?>


    </div>
</div>


<?= $this->endSection() ?>