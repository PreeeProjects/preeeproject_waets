<?= $this->extend('/AlumniAssociationComponents/main-layout') ?>
<?= $this->section('section') ?>


<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/Dashboard" class="text-primary">WAEST</a>
                </li>
                <li class="breadcrumb-item active"><span>Tracer Study</span></li>
            </ol>
        </nav>
    </div>

    <div class="card mb-4">

        <div class="card-header text-center d-flex justify-content-between">
            <small>Section: <b>8</b>/8</small>
            <h3 class="mb-0">Tracer Study</h3>
            <small><?= date('M d, Y') ?></small>
        </div>

        <hr class="mt-0">
        <form action="/AlumniAssociationController/SubmitPapge" method="post">
            <div class="row d-flex justify-content-center align-items-justify mt-3" style="text-align: justify;">
                <div class="col-sm-7">
                    <div class="card-body pt-0 text-center">
                        <p>
                            Thank you for your kind cooperation and support.
                        </p>
                    </div>
                </div>
            </div>


            <hr class="mt-0">

            <div class="card-footer pt-0">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary ps-5 pe-5">Submit Form</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>