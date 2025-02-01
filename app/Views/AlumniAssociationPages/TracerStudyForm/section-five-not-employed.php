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
            <small>Section: <b>5</b>/8</small>
            <h3 class="mb-0">Tracer Study</h3>
            <small><?= date('M d, Y') ?></small>
        </div>

        <hr class="mt-0">
        <form action="/AlumniAssociationController/SectionFiveNotEmployed" method="get">
            <div class="row d-flex justify-content-center align-items-center m-0">
                <div class="col-sm-7">
                    <div class="card-body pt-0">

                        <!-- if no -->
                        <div class="form-group mb-3">
                            <label class="form-label"><small>19.</small> Please state reason(s) why you are not yet
                                employed.</label>
                            <select class="form-select" name="question_19" id="question_19" required>
                                <option value="Advance or further study" <?= session()->get('question19') == 'Advance or further study' ? 'selected' : '' ?>>Advance or further study</option>
                                <option value="Family concern and decided not to find a job"
                                    <?= session()->get('question19') == 'Family concern and decided not to find a job' ? 'selected' : '' ?>>Family concern and decided
                                    not to find a job</option>
                                <option value="Health-related reason(s)"
                                    <?= session()->get('question19') == 'Health-related reason(s)' ? 'selected' : '' ?>>
                                    Health-related reason(s)</option>
                                <option value="Lack of work experience" <?= session()->get('question19') == 'Lack of work experience' ? 'selected' : '' ?>>Lack of work experience</option>
                                <option value="No job opportunity" <?= session()->get('question19') == 'No job opportunity' ? 'selected' : '' ?>>No job opportunity</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-0">

            <div class="card-footer pt-0">
                <div class="d-flex justify-content-center">
                    <a href="/AlumniAssociationController/SectionFourPage" type="button"
                        class="btn btn-secondary ps-5 pe-5 me-3">Return</a>
                    <button type="submit" class="btn btn-primary ps-5 pe-5 me-3">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>