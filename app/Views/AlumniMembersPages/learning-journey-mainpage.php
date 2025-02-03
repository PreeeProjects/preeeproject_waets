<?= $this->extend('/AlumniMembersComponents/alumni-main-layout') ?>
<?= $this->section('section') ?>

<style>
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

<!-- B R E A D C R U M B -->
<div class="card-body">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniController/Dashboard" class="text-danger">WAETS</a>
                </li>
                <li class="breadcrumb-item active"><span>Learning Journey</span></li>
            </ol>
        </nav>
    </div>


    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0"><strong>Learning Journey</strong></h4>
                <a href="/AlumniController/UploadPhoto">
                    <li class="bx bx-book-add fs-xlarge text-danger"></li>
                </a>
            </div>
        </div>
    </div>

    <hr>

    <!-- C A R O U S E L  -->
    <div class="card mb-4">
        <div class="row">
            <div class="col-lg">
                <h6 class="card-header text-center text-danger fst-italic">Feel free to share your achievements with
                    others here!</h6>
                <hr class="m-0">
                <div class="card-body">
                    <?php if ($folders): ?>
                        <div class="row">
                            <?php foreach ($folders as $folder): ?>
                                <div class="col-sm-4 mb-4">
                                    <div class="card">
                                        <div class="card-body p-0">
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
                                                                <img class="d-block w-100" src="<?= $folder['image_' . ($i + 1)] ?>"
                                                                    alt="Slide <?= $i + 1 ?>" style="object-fit: cover; height: 250px;">
                                                            </div>
                                                            <?php
                                                            $imageCount++;
                                                        endif;
                                                    endfor;
                                                    ?>
                                                </div>
                                                <a class="carousel-control-prev" href="#carousel<?= $folder['folder_id'] ?>"
                                                    role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel<?= $folder['folder_id'] ?>"
                                                    role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5><?= $folder['folder_name'] ?></h5>
                                                </div>

                                                <div class="text-end">
                                                    <!-- View -->
                                                    <a type="button" data-bs-toggle="modal"
                                                        data-bs-target="#modalToggle<?= $folder['folder_id'] ?>">
                                                        <i class="bx bx-show-alt fs-medium me-1" data-bs-toggle="tooltip"
                                                            data-bs-offset="0,5" data-bs-placement="bottom" data-bs-html="true"
                                                            title="View"></i>
                                                    </a>

                                                    <!-- Delete -->
                                                    <a onclick="return confirm('Are you sure you want to delete <?= $folder['folder_name'] ?> folder?')"
                                                        href="/AlumniController/DeleteFolder/<?= $folder['folder_id'] ?>">
                                                        <i class="bx bx-trash text-secondary fs-medium me-1"
                                                            data-bs-toggle="tooltip" data-bs-offset="0,5"
                                                            data-bs-placement="bottom" data-bs-html="true" title="Delete"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center fst-italic mt-5 mb-5">
                            <h3 class="mb-0">NO FOLDERS</h3>
                            <small>Unfortunately, it seems there are no images/folders available</small>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- C R E A T E  F O L D E R  M O D A L-->
<!-- <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Create a folder to upload images</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/AlumniAssociationController/createFolder" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameSmall" class="form-label">Folder Name</label>
                            <input type="text" id="nameSmall" name="folder_name" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer m-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-danger">Create</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- V I E W  P H O T O S  -->
<div class="col-lg-4 col-md-6">
    <?php foreach ($folders as $folder): ?>
        <div class="modal fade" id="modalToggle<?= $folder['folder_id'] ?>"
            aria-labelledby="modalToggleLabel<?= $folder['folder_id'] ?>" tabindex="-1" style="display: none"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content-view ms-4">
                    <div class="modal-header mb-3">
                        <h5 class="modal-title" id="modalFullTitle<?= $folder['folder_id'] ?>"><?= $folder['folder_name'] ?>
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





<?= $this->endSection(); ?>