<?= $this->extend('/AlumniAssociationComponents/main-layout') ?>
<?= $this->section('section') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/Dashboard" class="text-primary">WAETS</a>
                </li>
                <li class="breadcrumb-item active"><span>Year Graduated</span></li>
            </ol>
        </nav>
    </div>


    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0"><strong>Year Graduated</strong></h4>
                <a href="#">
                    <li class="bx bx-add-to-queue fs-xlarge text-primary" data-bs-toggle="modal"
                        data-bs-target="#addSchoolYearBackDropModal"></li>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <?php foreach ($school_years as $school_year): ?>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Batch <strong><?= $school_year['year_graduated'] ?></strong></h5>

                        <div class="">
                            <a
                                href="/AlumniAssociationController/SchoolYearMembers/<?= $school_year['year_graduated_id'] ?>">
                                <button class="btn btn-sm btn-success">View Members</button>
                            </a>

                            <a href="/AlumniAssociationController/GeneratePDF/<?= $school_year['year_graduated_id'] ?>"
                                target="_blank">
                                <button class="btn btn-sm btn-primary">Print</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- A D D  S C H O O L  Y E A R -->
<div class="modal fade" id="addSchoolYearBackDropModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="post" action="/AlumniAssociationController/AddSchoolYear">
            <div class="modal-header">
                <h3 class="modal-title">Add School Year</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr class="mb-0">
            <div class="modal-body mb-10">
                <div class="row">
                    <div class="col mb-3">
                        <label for="tuptIdBackdrop" class="form-label">School Year</label>
                        <input type="text" id="tuptIdBackdrop" class="form-control" name="school_year"
                            placeholder="XXXX-XXXX" />
                    </div>
                </div>
            </div>

            <div class="modal-footer border-top">
                <div class="mt-3">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary pe-5 ps-5">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>