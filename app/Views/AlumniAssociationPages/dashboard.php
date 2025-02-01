<?= $this->extend('/AlumniAssociationComponents/main-layout') ?>
<?= $this->section('section') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mt-10">
        <h6 class="mb-4">WAETS / Dashboard </h6>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-9">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Welcome Back 🎉</h3>
                            <p class="mb-4">
                                Today is <strong><?= date('F d, Y') ?></strong>. Have a great day a head of you!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>