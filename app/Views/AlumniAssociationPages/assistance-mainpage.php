<?= $this->extend('/AlumniAssociationComponents/main-layout') ?>
<?= $this->section('section') ?>


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/Dashboard" class="text-primary">WAETS</a>
                </li>
                <li class="breadcrumb-item active"><span>Assistance</span></li>
            </ol>
        </nav>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0"><strong>Assistance</strong></h4>
                <a href="/AlumniAssociationController/AssistancePost">
                    <li class="bx bx-folder-plus fs-xlarge"></li>
                </a>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <?php if ($info): ?>
            <?php foreach ($info as $assistance): ?>
                <div class="col-sm-6 mb-3">
                    <div class="card" id="card-effect">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="m-0 fw-bold text-primary"><?= $assistance['title'] ?></h3>
                                <img src="/assets/logo_folder/logo-transparent.png" class="m-0"
                                    style="height: 30px; width: auto;" />
                            </div>
                        </div>
                        <hr class="m-0">

                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>What: <?= $assistance['what'] ?></li>
                                <li>When: <?= $assistance['when'] ?></li>
                                <li>Where: <?= $assistance['where'] ?></li>
                                <li>Qualification: <?= $assistance['qualification'] ?></li>
                            </ul>
                            <p class="card-text"> Details: <?= $assistance['details'] ?></p>
                        </div>
                        <div class="card-footer border-top">
                            <a href="/AlumniAssociationController/AssistanceEditPage/<?= $assistance['assistance_id'] ?>"
                                class="btn btn-sm btn-primary pe-4 ps-4">Update</a>
                            <a href="/AlumniAssociationController/DeleteAssistance/<?= $assistance['assistance_id'] ?>"
                                class="btn btn-sm btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center fst-italic mt-5 mb-5">
                <h3 class="mb-0">NO DATA</h3>
                <small>Unfortunately, it seems there are no posts available</small>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(); ?>