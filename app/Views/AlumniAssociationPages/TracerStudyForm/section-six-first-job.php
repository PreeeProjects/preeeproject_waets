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
            <small>Section: <b>6</b>/8</small>
            <h3 class="mb-0">Tracer Study</h3>
            <small><?= date('M d, Y') ?></small>
        </div>

        <hr class="mt-0">
        <form action="/AlumniAssociationController/SectionSixFirstJob" method="get">
            <div class="row d-flex justify-content-center align-items-center m-0">
                <div class="col-sm-7">
                    <div class="card-body pt-0">

                        <!-- is yes in #25 -->

                        <div class="form-group mb-3">
                            <label class="form-label"><small>26.</small> What are your reason(s) for staying on the
                                job?</label>
                            <select class="form-select" name="question_26" id="question_26" required>
                                <option value="Salaries and benefits" <?= session()->get('question26') == 'Salaries and benefits' ? 'selected' : '' ?>>Salaries and benefits</option>
                                <option value="Career challenge" <?= session()->get('question26') == 'Career challenge' ? 'selected' : '' ?>>Career challenge</option>
                                <option value="Related to special skill" <?= session()->get('question26') == 'Related to special skill' ? 'selected' : '' ?>>Related to special skill</option>
                                <option value="Related to course or program of study"
                                    <?= session()->get('question26') == 'Related to course or program of study' ? 'selected' : '' ?>>Related to course or
                                    program of study
                                </option>
                                <option value="Proximity to residence" <?= session()->get('question26') == 'Proximity to residence' ? 'selected' : '' ?>>Proximity to residence</option>
                                <option value="Peer influence" <?= session()->get('question26') == 'Peer influence' ? 'selected' : '' ?>>Peer influence</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">

                            <label class="form-label"><small>27.</small> Is your FIRST JOB related to the course you
                                took up in college?</label>
                            <select class="form-select" name="question_27" id="question_27"
                                value="<?= session()->get('question27') ?>" required>
                                <option value="Yes" <?= session()->get('question27') == 'Yes' ? 'selected' : '' ?>>Yes
                                </option>
                                <option value="No" <?= session()->get('question27') == 'No' ? 'selected' : '' ?>>No
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-0">

            <div class="card-footer pt-0">
                <div class="d-flex justify-content-center">
                    <a href="/AlumniAssociationController/SectionFiveEmployedPage" type="button"
                        class="btn btn-secondary ps-5 pe-5 me-3">Return</a>
                    <button type="submit" class="btn btn-primary ps-5 pe-5 me-3">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>