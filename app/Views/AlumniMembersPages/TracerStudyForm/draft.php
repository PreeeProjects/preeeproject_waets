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
            <small>Section: <b>7</b>/7</small>
            <h3 class="mb-0">Tracer Study</h3>
            <small><?= date('M d, Y') ?></small>
        </div>

        <hr class="mt-0">
        <div class="row d-flex justify-content-center align-items-center m-0">
            <div class="col-sm-7">
                <div class="card-body pt-0">

                    <!-- is yes in #36 -->

                    <div class="form-group mb-3">
                        <label class="form-label"><small>37.</small> What competencies learned in college did you find
                            very useful in your first job?</label>
                        <select class="form-select" name="question_37" id="inputGroupSelect01">
                            <option selected>Select your answer</option>
                            <option value="Communication Skills">Communication Skills</option>
                            <option value="Human Relations Skills">Human Relations Skills</option>
                            <option value="Entrepreneurial Skills">Entrepreneurial Skills</option>
                            <option value="Information Technology Skills">Information Technology Skills
                            </option>
                            <option value="Problem-solving Skills">Problem-solving Skills</option>
                            <option value="Critical Thinking Skills">Critical Thinking Skills</option>
                        </select>
                    </div>

                    <!-- if no in #36 -->

                    <div class="form-group mb-3">
                        <label class="form-label"><small>38.</small> How did you find your first job?</label>
                        <select class="form-select" name="question_38" id="inputGroupSelect01">
                            <option selected>Select your answer</option>
                            <option value="Response to an advertisement">Response to an advertisement</option>
                            <option value="As walk-in applicant">As walk-in applicant</option>
                            <option value="Recommended by someone">Recommended by someone</option>
                            <option value="Information from friends">Information from friends
                            </option>
                            <option value="Arranged by school's job placement officer">Arranged by school's job
                                placement officer</option>
                            <option value="Family Business">Family Business</option>
                            <option value="Job Fair or Public Employment Service Office (PESO)">Job Fair or Public
                                Employment Service Office (PESO)</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label"><small>39.</small> How long did it take you to land your first
                            job?</label>
                        <select class="form-select" name="question_39" id="inputGroupSelect01">
                            <option selected>Select your answer</option>
                            <option value="Less than a month">Less than a month</option>
                            <option value="1 to 6 months">1 to 6 months</option>
                            <option value="7 to 11 months">7 to 11 months</option>
                            <option value="1 year to less than 2 years">1 year to less than 2 years
                            </option>
                            <option value="2 years to less than 3 years">2 years to less than 3 years</option>
                            <option value="3 years to less than 4 years">3 years to less than 4 years</option>
                            <option value="5 years and above">5 years and above</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label"><small>40.</small> What is your initial gross monthly earning in your
                            first job after college?</label>
                        <select class="form-select" name="question_40" id="inputGroupSelect01">
                            <option selected>Select your answer</option>
                            <option value="Less than a month">Less than a month</option>
                            <option value="1 to 6 months">1 to 6 months</option>
                            <option value="7 to 11 months">7 to 11 months</option>
                            <option value="1 year to less than 2 years">1 year to less than 2 years
                            </option>
                            <option value="2 years to less than 3 years">2 years to less than 3 years</option>
                            <option value="3 years to less than 4 years">3 years to less than 4 years</option>
                            <option value="5 years and above">5 years and above</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-0">

        <div class="card-footer pt-0">
            <div class="d-flex justify-content-center">
                <div class="btn btn-secondary ps-5 pe-5 me-3">Return</div>
                <div class="btn btn-primary ps-5 pe-5">Submit</div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>