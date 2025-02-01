<?= $this->extend('/AlumniAssociationComponents/main-layout') ?>
<?= $this->section('section') ?>

<style>
    .modal-content {
        border: none;
        border-radius: 0;
    }

    #imageModal .modal-body {
        padding: 0;
    }

    #imageModal .modal-body img {
        width: 400px;
        height: 400px;
        border-radius: 50%;
    }

    .card-img-top {
        max-width: 200px;
        max-height: 200px;
        width: auto;
        height: auto;
    }

    .image-row {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        align-items: center;
        justify-content: center;
    }

    .modal-dialog {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-content-view {
        background-color: transparent;
        border: none;
        box-shadow: none;
    }
</style>

<div class="container-xxl flex-grow-2 container-p-y">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/Dashboard" class="text-primary">WAETS</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/Members" class="text-primary">School Year</a>
                </li>
                <li class="breadcrumb-item active"><span>Profile View</span></li>
            </ol>
        </nav>
    </div>

    <div class="divider text-start">
        <div class="divider-text"> Profile</div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?= $profile['profile_pic'] ?>" alt="user-avatar"
                            class="rounded-circle  me-0 profile-pic expandable-image" height="120" width="120"
                            id="uploadedAvatar" height="75" width="75" data-bs-toggle="modal"
                            data-bs-target="#profileModal<?= $profile['profile_pic'] ?>" /><br>
                        <div class="mt-2">
                            <h3 class="fw-bold m-0"><?= $profile['full_name'] ?></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="fw-bold">Bio:</h5>
                        <p class="m-0"><?= $profile['bio'] ?: 'This user has not set their bio' ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="fw-bold m-0">Profile Information</h3>
                </div>
                <hr class="m-0">

                <div class="card-body">

                    <!-- School background -->
                    <h5 class="fw-bold">School Background:</h5>
                    <div class="row">
                        <div class="col-sm-5">
                            <p>Full Name: <?= $profile['full_name'] ?></p>
                        </div>

                        <div class="col-sm-7">
                            <p>TUPT-ID: <?= $profile['tupt_id'] ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <p>Program & Major: <?= $profile['major'] ?></p>
                        </div>

                        <div class="col-sm-7">
                            <p>Year Graduated: <?= $profile['year_graduated'] ?></p>
                        </div>
                    </div>

                    <br>

                    <!-- Contact Information -->
                    <h5 class="fw-bold">Contact Information:</h5>
                    <div class="row">
                        <div class="col-sm-5">
                            <p>Phone Number: <?= $profile['phone_number'] ?></p>
                        </div>

                        <div class="col-sm-7">
                            <p>E-mail: <?= $profile['email'] ?></p>
                        </div>
                    </div>
                    <p>Address: <?= $profile['address'] ?></p>

                    <br>

                    <!-- Occupation -->
                    <h5 class="fw-bold">Occupation:</h5>
                    <p>Work: <?= $profile['work'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- L E A R N I N G  J O U R N E Y -->
    <div class="divider text-start">
        <div class="divider-text"> Learning Journey</div>
    </div>

    <!-- C A R O U S E L  -->
    <div class="mb-4">
        <div class="row">
            <div class="col-lg">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div>
                            <?php if (empty($folders)): ?>
                                <div class="text-center fst-italic mt-5 mb-5">
                                    <h3 class="mb-0">NO PHOTOS UPLOADED</h3>
                                    <!-- <small>Unfortunately, no one commented in this post</small> -->
                                </div>
                            <?php else: ?>
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach ($folders as $folder): ?>
                                            <div class="col-md-6 col-lg-4 mb-4">
                                                <div class="card">
                                                    <div id="carousel<?= $folder['folder_id'] ?>" class="carousel slide"
                                                        data-bs-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <?php
                                                            $imageCount = 0;
                                                            for ($i = 0; $i < 5; $i++):
                                                                if (!empty($folder['image_' . ($i + 1)])):
                                                                    ?>
                                                                    <li data-bs-target="#carousel<?= $folder['folder_id'] ?>"
                                                                        data-bs-slide-to="<?= $imageCount ?>" <?= $imageCount === 0 ? 'class="active"' : '' ?>></li>
                                                                    <?php
                                                                    $imageCount++;
                                                                endif;
                                                            endfor;
                                                            ?>
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <?php
                                                            $imageCount = 0;
                                                            for ($i = 0; $i < 5; $i++):
                                                                if (!empty($folder['image_' . ($i + 1)])):
                                                                    ?>
                                                                    <div class="carousel-item <?= $imageCount === 0 ? 'active' : '' ?>">
                                                                        <img class="d-block w-100"
                                                                            src="<?= $folder['image_' . ($i + 1)] ?>"
                                                                            alt="Slide <?= $i + 1 ?>"
                                                                            style="object-fit: cover; height: 250px;">
                                                                    </div>
                                                                    <?php
                                                                    $imageCount++;
                                                                endif;
                                                            endfor;
                                                            ?>
                                                        </div>
                                                        <a class="carousel-control-prev"
                                                            href="#carousel<?= $folder['folder_id'] ?>" role="button"
                                                            data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next"
                                                            href="#carousel<?= $folder['folder_id'] ?>" role="button"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <h5 class="my-4 text-center"><?= $folder['folder_name'] ?></h5>
                                                    </div>
                                                    <hr class="m-0">
                                                    <div class="card-footer">
                                                        <div>
                                                            <a type="button" data-bs-toggle="modal"
                                                                data-bs-target="#modalToggle<?= $folder['folder_id'] ?>">
                                                                <i class="bx bx-show-alt fs-xlarge me-1"
                                                                    data-bs-toggle="tooltip" data-bs-offset="0,5"
                                                                    data-bs-placement="bottom" data-bs-html="true"
                                                                    title="View"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- I M A G E  M O D A L -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-body text-center">
                <img src="" id="modalImage" class="img-fluid rounded-circle" alt="Modal Image">
            </div>
        </div>
    </div>

    <!-- V I E W  P H O T O S  -->
    <div class="col-lg-4 col-md-6">
        <?php foreach ($folders as $folder): ?>
            <div class="modal fade" id="modalToggle<?= $folder['folder_id'] ?>"
                aria-labelledby="modalToggleLabel<?= $folder['folder_id'] ?>" tabindex="-1" style="display: none"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content-view ms-4">
                        <div class="modal-header mb-3">
                            <h5 class="modal-title" id="modalFullTitle<?= $folder['folder_id'] ?>">
                                <?= $folder['folder_name'] ?>
                            </h5>
                        </div>
                        <div class="modal-body-view mt-10">
                            <div class="image-row justify-content-center">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <?php if (!empty($folder['image_' . $i])): ?>
                                        <div class="image-col mb-10" style="width: 220px; height: 220px;">
                                            <img src="<?= $folder['image_' . $i] ?>" class="card-img-top expandable-image"
                                                style="object-fit: cover; width: 100%; height: 100%;">
                                        </div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        $(document).ready(function () {
            // I M A G E  J S
            $('.expandable-image').on('click', function () {
                var imageUrl = $(this).attr('src');
                $('#modalImage').attr('src', imageUrl);
                $('#imageModal').modal('show');
            });
        });
    </script>

    <?= $this->endSection() ?>