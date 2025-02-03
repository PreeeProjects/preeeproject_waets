<?= $this->extend('/AlumniAssociationComponents/main-layout') ?>
<?= $this->section('section') ?>

<style>
    #imagePreview {
        max-width: 100%;
        max-height: 200px;
    }

    #imageOnlyPreview {
        max-width: 100%;
        max-height: 200px;
    }

    .fixed-column {
        position: sticky;
        top: 20px;
        height: 100vh;
        overflow-y: auto;
    }

    @media screen and (max-width: 767px) {
        .fixed-column {
            display: none;
        }
    }
</style>

<div class="card-body">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/Dashboard" class="text-primary">WAETS</a>
                </li>
                <li class="breadcrumb-item active"><span>Job Offer</span></li>
            </ol>
        </nav>
    </div>


    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0"><strong>Job Offer</strong></h4>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="nav-align-top mb-3">
                        <!-- P I L L S -->
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-caption" aria-controls="navs-pills-top-home"
                                    aria-selected="true">
                                    Caption
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-image" aria-controls="navs-pills-top-profile"
                                    aria-selected="false">
                                    Image
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-imageCaption"
                                    aria-controls="navs-pills-top-messages" aria-selected="false">
                                    Caption with Image
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content col-sm-12">
                            <!-- C A P T I O N  P O S T -->
                            <div class="tab-pane fade show active" id="navs-pills-top-caption" role="tabpanel">
                                <form method="post" action="/AlumniAssociationController/JobOfferUpload"
                                    enctype="multipart/form-data">
                                    <input type="hidden" value="1" name="post_type">
                                    <textarea id="postContent" name="caption" class="form-control mt-0"
                                        placeholder="Write something..."></textarea>
                                    <div class="text-end">
                                        <button type="submit"
                                            class="btn btn-sm ps-5 pe-5 btn-outline-primary mt-3">Post</button>
                                    </div>
                                </form>
                            </div>

                            <!-- I M A G E  P O S T -->
                            <div class="tab-pane fade" id="navs-pills-top-image" role="tabpanel">
                                <form method="post" action="/AlumniAssociationController/JobOfferUpload"
                                    enctype="multipart/form-data">
                                    <input type="hidden" value="2" name="post_type">
                                    <input type="file" id="image_only_upload" name="image_only_upload"
                                        style="display: none;">

                                    <div class="text-center mb-2">
                                        <button type="button" id="add_image_only"
                                            class="btn btn-outline-primary btn-sm ps-5 pe-5">Choose Image</button>
                                        <button type="submit"
                                            class="btn btn-outline-primary btn-sm ps-5 pe-5">Post</button>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <img id="imageOnlyPreview">
                                    </div>
                                </form>
                            </div>

                            <!-- I M A G E  A N D  C A P T I O N -->
                            <div class="tab-pane fade" id="navs-pills-top-imageCaption" role="tabpanel">
                                <form method="post" action="/AlumniAssociationController/JobOfferUpload"
                                    enctype="multipart/form-data">
                                    <input type="hidden" value="3" name="post_type">
                                    <input type="file" id="image_upload" name="image_upload" style="display: none;">

                                    <div class="input-group mb-3">
                                        <textarea id="postContent" name="caption" class="form-control mt-0"
                                            placeholder="Write something..."></textarea>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <img id="imagePreview">
                                    </div>

                                    <div class="text-center mt-3">
                                        <button type="button" id="add_image"
                                            class="btn btn-outline-primary btn-sm ps-5 pe-5">Choose Image</button>
                                        <button type="submit"
                                            class="btn btn-outline-primary btn-sm ps-5 pe-5">Post</button>
                                    </div>`
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>


    <div class="row d-flex justify-content-center">
        <!-- M E N T O R S H I P -->
        <div class="col-sm-4 fixed-column mb-0">
            <div class="card">
                <div class="card-body m-0">
                    <div class="text-center">
                        <div class="mt-2">
                            <h4 class="fw-bold text-primary m-0">Assistance</h4>
                            <small>Come and Join with us!</small>
                            <br><br>
                            <?php if (!empty($assistance)): ?>
                                <?php foreach ($assistance as $assistances): ?>
                                    <a href="/AlumniAssociationController/AssistanceMainpage"
                                        class="list-group-item list-group-item-action p-2"><?= $assistances['title'] ?></a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No assistance information available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- J O B  O F F E R S -->
        <div class="col-sm-8">
            <?php if ($job_offers): ?>
                <?php foreach ($job_offers as $job_offer): ?>
                    <?php if ($job_offer['post_type'] == '1'): ?>
                        <div class="row d-flex justify-content-end">
                            <div class="col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-11">
                                                <h5 class="card-title fw-bold m-0"><span style="font-size: 20px;">&#128187;</span>
                                                    JOB OFFER</h5>
                                                <small class="text-muted fst-italic">Caption: <?= $job_offer['date'] ?></small>
                                                <p class="card-text">
                                                    <?= $job_offer['caption'] ?>
                                                </p>
                                            </div>

                                            <!-- D E L E T E -->
                                            <div class="col-sm-1">
                                                <a class="text-black"
                                                    href="/AlumniAssociationController/DeletePost/<?= $job_offer['job_offer_id'] ?>"><i
                                                        class="menu-icon tf-icons bx bx-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php elseif ($job_offer['post_type'] == '2'): ?>
                        <div class="row d-flex justify-content-end">
                            <div class="col-sm-12">
                                <div class="card mb-3">
                                    <img class="card-img-top" src="<?= $job_offer['image'] ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-11">
                                                <small class="text-muted"><?= $job_offer['date'] ?></small>
                                            </div>

                                            <!-- D E L E T E -->
                                            <div class="col-sm-1">
                                                <a class="text-black"
                                                    href="/AlumniAssociationController/DeletePost/<?= $job_offer['job_offer_id'] ?>"><i
                                                        class="menu-icon tf-icons bx bx-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php elseif ($job_offer['post_type'] == '3'): ?>
                        <div class="row d-flex justify-content-end">
                            <div class="col-sm-12">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img class="card-img card-img-left" src="<?= $job_offer['image'] ?>" alt=" Card image">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-11">
                                                        <h5 class="card-title fw-bold m-0"><span
                                                                style="font-size: 20px;">&#128187;</span> JOB OFFER</h5>
                                                        <small class="text-muted fst-italic"><?= $job_offer['date'] ?></small>

                                                        <p class="card-text mt-3">
                                                            Caption: <?= $job_offer['caption'] ?>
                                                        </p>
                                                    </div>

                                                    <!-- D E L E T E -->
                                                    <div class="col-sm-1">
                                                        <a class="text-black"
                                                            href="/AlumniAssociationController/DeletePost/<?= $job_offer['job_offer_id'] ?>"><i
                                                                class="menu-icon tf-icons bx bx-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center fst-italic mt-5 mb-5">
                    <h3 class="mb-0">NO DATA</h3>
                    <small>Unfortunately, it seems there are no job offers available</small>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    // JavaScript to handle image upload and preview
    document.getElementById("image_only_upload").addEventListener("change", function (event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function (e) {
            const imagePreview = document.getElementById("imageOnlyPreview");
            imagePreview.src = e.target.result;
            imagePreview.style.display = "block";
        }
        reader.readAsDataURL(file);
    });

    document.getElementById('add_image_only').addEventListener('click', function () {
        document.getElementById('image_only_upload').click();
    });

    document.getElementById("image_upload").addEventListener("change", function (event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function (e) {
            const imagePreview = document.getElementById("imagePreview");
            imagePreview.src = e.target.result;
            imagePreview.style.display = "block";
        }
        reader.readAsDataURL(file);
    });

    document.getElementById('add_image').addEventListener('click', function () {
        document.getElementById('image_upload').click();
    });
</script>



<?= $this->endSection(); ?>