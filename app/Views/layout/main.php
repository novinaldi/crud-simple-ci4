<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="<?= base_url() . '/assets/css/bootstrap.min.css' ?>" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="#">Novinaldi Apps</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="<?= site_url('tamu/data') ?>">Tamu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end header -->

    <!-- Content -->
    <div class="p-2 mb-4 bg-light rounded-3">
        <div class="container py-2">
            <h1 class="display-7 fw-bold">
                <?= $this->renderSection('title') ?>
            </h1>
            <?= $this->renderSection('isi') ?>
        </div>
    </div>
    <!-- End Content -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#dc3545" fill-opacity="1"
            d="M0,96L18.5,101.3C36.9,107,74,117,111,133.3C147.7,149,185,171,222,165.3C258.5,160,295,128,332,138.7C369.2,149,406,203,443,208C480,213,517,171,554,154.7C590.8,139,628,149,665,165.3C701.5,181,738,203,775,202.7C812.3,203,849,181,886,181.3C923.1,181,960,203,997,224C1033.8,245,1071,267,1108,282.7C1144.6,299,1182,309,1218,282.7C1255.4,256,1292,192,1329,181.3C1366.2,171,1403,213,1422,234.7L1440,256L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z">
        </path>
    </svg>

    <!-- Footer -->
    <footer class="bg-danger text-white text-center pb-2">
        <p>
            Disain by <span class="fw-bold">&copy; Novinaldi</span>
        </p>
    </footer>
    <!-- End Footer -->

    <script src="<?= base_url() . '/assets/js/bootstrap.bundle.min.js' ?>"></script>
</body>

</html>