<?= $this->extend('/AlumniAssociationComponents/main-layout') ?>
<?= $this->section('section') ?>

<style>
    .carousel-item img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mt-10">
        <h6 class="mb-4">WAETS / Dashboard / </h6>
    </div>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../assets/img/elements/tup_cover.jpg" alt="First slide" />
                <div class="carousel-caption d-none d-md-block">
                    <!-- <p>a premier state university with recognized excellence in engineering and technology education
                            at par with leading university in the ASEAN region</p> -->

                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../assets/img/elements/tup_cover1.jpg" alt="Third slide" />
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../assets/img/elements/open_court.jpg" alt="Second slide" />
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

    <div class="row mt-3">
        <div class="col-lg">
            <div class="card mb-2">
                <div class="d-flex align-items-end row">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="card-title text-primary ms-3">Welcome Back 🎉</h3>
                                <p class="mb-4 ms-3">
                                    Today is <strong><?= date('F d, Y') ?></strong>. Have a great day ahead of you!
                                </p>
                            </div>
                            <a href="/AlumniAssociationController/DashboardUploadPage">
                                <i class="bx bx-add-to-queue fs-xlarge text-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#addSchoolYearBackDropModal"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- Bootstrap carousel -->
    <div class="row d-flex justify-content-center">
        <div class="col-9">
            <div class="col-md">
                <?php $count = 0; ?>
                <?php foreach ($info as $infos): ?>
                    <div class="mb-4">
                        <div id="carouselExample<?= $count ?>" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <?php if (!empty($infos['image_' . ($i + 1)])): ?>
                                        <li data-bs-target="#carouselExample<?= $count ?>" data-bs-slide-to="<?= $i ?>"
                                            class="<?= $i === 0 ? 'active' : '' ?>"></li>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </ol>

                            <div class="carousel-inner">
                                <?php $imageCount = 0; ?>
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <?php if (!empty($infos['image_' . ($i + 1)])): ?>
                                        <div class="carousel-item <?= $imageCount === 0 ? 'active' : '' ?>">
                                            <img class="d-block w-100" src="<?= $infos['image_' . ($i + 1)] ?>" alt="Slide"
                                                style="object-fit: cover; height: auto;">
                                        </div>
                                        <?php $imageCount++; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>

                            <a class="carousel-control-prev" href="#carouselExample<?= $count ?>" role="button"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample<?= $count ?>" role="button"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                        <div class="card">
                            <div class="d-flex justify-content-between align-items-center">

                                <h4 class="my-4 ms-3 text-primary"> <?= $infos['title'] ?> </h4>
                                <!-- Delete -->
                                <a onclick="return confirm('Are you sure you want to delete <?= $infos['title'] ?> post?')"
                                    href="/AlumniAssociationController/DeleteDashboard/<?= $infos['dashboard_id'] ?>">
                                    <i class="bx bx-trash text-secondary fs-medium me-3 text-primary"
                                        data-bs-toggle="tooltip" data-bs-offset="0,5" data-bs-placement="bottom"
                                        data-bs-html="true" title="Delete"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                    <?php $count++; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- M E N T O R S H I P -->
        <div class="col-sm-3 fixed-column mb-0">

            <!-- Assistance Card -->
            <div class="card mb-3">
                <div class="card-body m-0">
                    <div class="text-center">
                        <div class="mt-2">
                            <h4 class="fw-bold text-primary m-0">Assistance</h4>
                            <small>Come and Join with us!</small>
                            <br><br>
                            <?php if (!empty($assistance)): ?>
                                <?php foreach ($assistance as $assistances): ?>
                                    <a href="/AlumniController/AssistanceMainpage"
                                        class="list-group-item list-group-item-action p-2"><?= $assistances['title'] ?></a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No assistance information available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Forum Card -->
            <div class="card">
                <div class="card-body m-0">
                    <div class="text-center">
                        <div class="mt-2">
                            <h4 class="fw-bold text-primary m-0">Forum</h4>
                            <small>Come and Join with us!</small>
                            <br><br>
                            <?php if (!empty($forum)): ?>
                                <?php foreach ($forum as $forums): ?>
                                    <a href="/AlumniController/ForumMainpage"
                                        class="list-group-item list-group-item-action p-2"><?= $forums['forum_name'] ?></a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No forum topics available.</p> <!-- Corrected message -->
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?= $this->endSection() ?>