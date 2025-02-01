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
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="m-0">Tracer Study</h2>
                <a href="#">
                    <li class="bx bx-add-to-queue fs-xlarge text-primary" data-bs-toggle="modal"
                        data-bs-target="#backDropModal"></li>
                </a>
            </div>
        </div>
    </div>


    <div class="card mb-4">

        <div class="card-header text-center d-flex justify-content-between">
            <small>Section: <b>1</b>/8</small>
            <h3 class="mb-0">Tracer Study</h3>
            <small><?= date('M d, Y') ?></small>
        </div>

        <hr class="mt-0">
        <div class="row d-flex justify-content-center align-items-justify mt-3" style="text-align: justify;">
            <div class="col-sm-7">
                <div class="card-body pt-0">
                    <p> Good day! <br><br>
                        TUP Taguig is conducting a tracer study to keep track of the graduates and their development,
                        check on the employability, and create linkage between TUPT and the alumni. We request to please
                        find time to complete this Graduate Tracer Study (GTS) questionnaire as accurately & frankly as
                        possible. </p>
                    All data obtained in this survey will be processed by the BTVTEd Program Faculty of Technological
                    University of the Philippines Taguig. By answering this form, you hereby allow TUP-Taguig to access
                    and record your personal data. The processing of all personal data shall be governed by the
                    University’s applicable privacy policy and all relevant data protection laws, including Republic Act
                    No. 10173, also known as the Data Privacy Act of 2012. Rest assured that all the answers will be
                    treated with strictest confidentiality. </p>
                    Thank you for your kind cooperation and support.
                    </p>
                </div>
            </div>
        </div>


        <hr class="mt-0">

        <div class="card-footer pt-0">
            <div class="d-flex justify-content-center">
                <a href="/AlumniAssociationController/SectionTwo" class="btn btn-primary ps-5 pe-5">Accept</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="post" action="/AlumniAssociationController/PostTracerStudy">
            <div class="modal-header">
                <h3 class="modal-title">Post Tracer Study</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr class="mb-0">
            <div class="modal-body mb-10">
                <div class="row">
                    <div class="col mb-3">
                        <label for="membersSelect" class="form-label">COURSE</label>
                        <select id="membersSelect" class="form-select" name="school_year"
                            aria-label="Default select example">
                            <?php foreach ($school_year as $sy): ?>
                                <option value="<?= $sy['school_year_id'] ?>:<?= $sy['school_year'] ?>">
                                    <?= $sy['school_year'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <label for="tuptIdBackdrop" class="form-label">DESCRIPTION / CAPTION</label>
                        <textarea type="text" name="caption" id="tuptIdBackdrop" row="2" class="form-control"
                            name="tupt_id"> </textarea>
                    </div>
                </div>
            </div>


            <div class="modal-footer border-top">
                <div class="mt-3">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary pe-5 ps-5">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>