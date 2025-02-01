<?= $this->extend('/AlumniMembersComponents/alumni-main-layout') ?>
<?= $this->section('section') ?>


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniController/Dashboard" class="text-primary">WAEST</a>
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
        <form action="/AlumniController/SectionSevenCourseRelated" method="get">
            <div class="row d-flex justify-content-center align-items-center m-0">
                <div class="col-sm-7">
                    <div class="card-body pt-0">

                        <!-- if no in #35 -->

                        <div class="form-group mb-3">
                            <label class="form-label"><small>37.</small> How did you find your first job?</label>
                            <select class="form-select" name="question_37" id="question_37" required>
                                <option value="Response to an advertisement" <?= session()->get('question37') == 'Response to an advertisement' ? 'selected' : '' ?>>Response to an advertisement</option>
                                <option value="As walk-in applicant" <?= session()->get('question37') == 'As walk-in applicant' ? 'selected' : '' ?>>As
                                    walk-in applicant</option>
                                <option value="Recommended by someone" <?= session()->get('question37') == 'Recommended by someone' ? 'selected' : '' ?>>
                                    Recommended by someone</option>
                                <option value="Information from friends" <?= session()->get('question37') == 'Information from friends' ? 'selected' : '' ?>>Information from friends
                                </option>
                                <option value="Arranged by school's job placement officer"
                                    <?= session()->get('question37') == 'Arranged by schools job placement officer' ? 'selected' : '' ?>>Arranged by school's job
                                    placement officer</option>
                                <option value="Family Business" <?= session()->get('question37') == 'Family Business' ? 'selected' : '' ?>>Family Business
                                </option>
                                <option value="Job Fair or Public Employment Service Office (PESO)"
                                    <?= session()->get('question37') == 'Job Fair or Public Employment Service Office (PESO)' ? 'selected' : '' ?>>Job Fair or
                                    Public Employment Service Office (PESO)</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>38.</small> How long did it take you to land your first
                                job?</label>
                            <select class="form-select" name="question_38" id="question_38" required>
                                <option value="Less than a month" <?= session()->get('question38') == 'Less than a month' ? 'selected' : '' ?>>Less than a
                                    month</option>
                                <option value="1 to 6 months" <?= session()->get('question38') == '1 to 6 months' ? 'selected' : '' ?>>1 to 6 months
                                </option>
                                <option value="7 to 11 months" <?= session()->get('question38') == '7 to 11 months' ? 'selected' : '' ?>>7 to 11 months
                                </option>
                                <option value="1 year to less than 2 years" <?= session()->get('question38') == '1 year to less than 2 years' ? 'selected' : '' ?>>1 year to less than 2 years
                                </option>
                                <option value="2 years to less than 3 years" <?= session()->get('question38') == '2 years to less than 3 years' ? 'selected' : '' ?>>2 years to less than 3 years</option>
                                <option value="3 years to less than 4 years" <?= session()->get('question38') == '3 years to less than 4 years' ? 'selected' : '' ?>>3 years to less than 4 years</option>
                                <option value="5 years and above" <?= session()->get('question38') == '5 years and above' ? 'selected' : '' ?>>5 years and
                                    above</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>39.</small> What is your initial gross monthly earning in
                                your first job after college?</label>
                            <select class="form-select" name="question_39" id="question_39" required>
                                <option value="Below P5,000.00" <?= session()->get('question39') == 'Below P5,000.00' ? 'selected' : '' ?>>Below P5,000.00
                                </option>
                                <option value="P5,000.00 to less than P10,000.00"
                                    <?= session()->get('question39') == 'P5,000.00 to less than P10,000.00' ? 'selected' : '' ?>>P5,000.00 to less than
                                    P10,000.00
                                </option>
                                <option value="P10,000.00 to less than P15,000.00"
                                    <?= session()->get('question39') == 'P10,000.00 to less than P15,000.00' ? 'selected' : '' ?>>P10,000.00 to less than
                                    P15,000.00
                                </option>
                                <option value="P15,000.00 to less than P20,000.00"
                                    <?= session()->get('question39') == 'P15,000.00 to less than P20,000.00' ? 'selected' : '' ?>>P15,000.00 to less than
                                    P20,000.00
                                </option>
                                <option value="P15,000.00 to less than P20,000.00"
                                    <?= session()->get('question39') == 'P15,000.00 to less than P20,000.00' ? 'selected' : '' ?>>P15,000.00 to less than
                                    P20,000.00
                                </option>
                                <option value="P25,000.00 and above" <?= session()->get('question39') == 'P25,000.00 and above' ? 'selected' : '' ?>>
                                    P25,000.00 and above</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-0">

            <div class="card-footer pt-0">
                <div class="d-flex justify-content-center">
                    <a href="/AlumniController/SectionSixPage" class="btn btn-secondary ps-5 pe-5 me-3">Return</a>
                    <button type="submit" class="btn btn-primary ps-5 pe-5">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>