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
            <small>Section: <b>7</b>/8</small>
            <h3 class="mb-0">Tracer Study</h3>
            <small><?= date('M d, Y') ?></small>
        </div>

        <hr class="mt-0">
        <form action="/AlumniAssociationController/SectionSevenCurriculumRelevant" method="get">
            <div class="row d-flex justify-content-center align-items-center m-0">
                <div class="col-sm-7">
                    <div class="card-body pt-0">

                        <!-- is yes in #35 -->

                        <div class="form-group mb-3">
                            <label class="form-label"><small>36.</small> What competencies learned in college did you
                                find very useful in your first job?</label>
                            <select class="form-select" name="question_36" id="question_36" required>
                                <option value="Communication Skills" <?= session()->get('question36') == 'Communication Skills' ? 'selected' : '' ?>>Communication Skills</option>
                                <option value="Human Relations Skills" <?= session()->get('question36') == 'Human Relations Skills' ? 'selected' : '' ?>>Human Relations Skills</option>
                                <option value="Entrepreneurial Skills" <?= session()->get('question36') == 'Entrepreneurial Skills' ? 'selected' : '' ?>>Entrepreneurial Skills</option>
                                <option value="Information Technology Skills"
                                    <?= session()->get('question36') == 'Information Technology Skills' ? 'selected' : '' ?>>Information Technology Skills
                                </option>
                                <option value="Problem-solving Skills" <?= session()->get('question36') == 'Problem-solving Skills' ? 'selected' : '' ?>>Problem-solving Skills</option>
                                <option value="Critical Thinking Skills" <?= session()->get('question36') == 'Critical Thinking Skills' ? 'selected' : '' ?>>Critical Thinking Skills</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-0">

            <div class="card-footer pt-0">
                <div class="d-flex justify-content-center">
                    <a href="/AlumniAssociationController/SectionSixPage"
                        class="btn btn-secondary ps-5 pe-5 me-3">Return</a>
                    <button type="submit" class="btn btn-primary ps-5 pe-5">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>