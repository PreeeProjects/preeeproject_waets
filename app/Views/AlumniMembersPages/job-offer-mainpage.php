<?= $this->extend('/AlumniMembersComponents/alumni-main-layout') ?>
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
                    <a href="/AlumniController/Dashboard" class="text-danger">WAETS</a>
                </li>
                <li class="breadcrumb-item active"><span>Job Offer</span></li>
            </ol>
        </nav>
    </div>


    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="m-0">Job Offer</h2>
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
                            <h4 class="fw-bold text-danger m-0">Assistance</h4>
                            <small>Come and Join with us!</small>
                            <br><br>
                            <?php if (!empty($assistance)) : ?>
                                <?php foreach ($assistance as $assistances) : ?>
                                    <a href="/AlumniController/AssistanceMainpage" class="list-group-item list-group-item-action p-2"><?= $assistances['title'] ?></a>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>No assistance information available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- J O B  O F F E R S -->
        <div class="col-sm-8">
            <?php if ($job_offers) : ?>
                <?php foreach ($job_offers as $job_offer) : ?>
                    <?php if ($job_offer['post_type'] == '1') : ?>
                        <div class="row d-flex justify-content-end">
                            <div class="col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-11">
                                                <h5 class="card-title fw-bold m-0"><span style="font-size: 20px;">&#128187;</span> JOB OFFER</h5>
                                                <small class="text-muted fst-italic">Caption: <?= $job_offer['date'] ?></small>
                                                <p class="card-text">
                                                    <?= $job_offer['caption'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php elseif ($job_offer['post_type'] == '2') : ?>
                        <div class="row d-flex justify-content-end">
                            <div class="col-sm-12">
                                <div class="card mb-3">
                                    <img class="card-img-top" src="<?= $job_offer['image'] ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-11">
                                                <small class="text-muted"><?= $job_offer['date'] ?></small>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php elseif ($job_offer['post_type'] == '3') : ?>
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
                                                        <h5 class="card-title fw-bold m-0"><span style="font-size: 20px;">&#128187;</span> JOB OFFER</h5>
                                                        <small class="text-muted fst-italic"><?= $job_offer['date'] ?></small>

                                                        <p class="card-text mt-3">
                                                            Caption: <?= $job_offer['caption'] ?>
                                                        </p>
                                                    </div>

                                                    <!-- D E L E T E -->
                                                    <div class="col-sm-1">
                                                        <a class="text-black" href="/AlumniAssociationController/DeletePost/<?= $job_offer['job_offer_id'] ?>"><i class="menu-icon tf-icons bx bx-trash"></i>
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
            <?php else : ?>
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
    document.getElementById("image_only_upload").addEventListener("change", function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const imagePreview = document.getElementById("imageOnlyPreview");
            imagePreview.src = e.target.result;
            imagePreview.style.display = "block";
        }
        reader.readAsDataURL(file);
    });

    document.getElementById('add_image_only').addEventListener('click', function() {
        document.getElementById('image_only_upload').click();
    });

    document.getElementById("image_upload").addEventListener("change", function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const imagePreview = document.getElementById("imagePreview");
            imagePreview.src = e.target.result;
            imagePreview.style.display = "block";
        }
        reader.readAsDataURL(file);
    });

    document.getElementById('add_image').addEventListener('click', function() {
        document.getElementById('image_upload').click();
    });
</script>



<?= $this->endSection(); ?>