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
                <h2 class="m-0">Year Graduated</h2>
                <a href="#">
                    <li class="bx bx-add-to-queue fs-xlarge text-primary" data-bs-toggle="modal"
                        data-bs-target="#addSchoolYearBackDropModal"></li>
                </a>
            </div>
        </div>
    </div>

    <!-- D I S P L A Y  M E M B E R S  -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap list-group-item-action">
                <?php if ($school_years): ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Year Graduated</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($school_years as $school_year): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $school_year['year_graduated'] ?></td>
                                    <td> <a
                                            href="/AlumniAssociationController/SchoolYearMembers/<?= $school_year['year_graduated_id'] ?>"><button
                                                class="btn btn-sm btn-primary">View Members</button></a></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="text-center fst-italic mt-5 mb-5">
                        <h3 class="mb-0">NO SCHOOL YEAR UPLOADED</h3>
                        <small>Unfortunately, no school year to display</small>
                    </div>
                <?php endif; ?>
            </div>
        </div>
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