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
            <small>Section: <b>6</b>/8</small>
            <h3 class="mb-0">Tracer Study</h3>
            <small><?= date('M d, Y') ?></small>
        </div>

        <hr class="mt-0">
        <form action="/AlumniController/SectionSixNotFirstJob" method="get">
            <div class="row d-flex justify-content-center align-items-center m-0">
                <div class="col-sm-7">
                    <div class="card-body pt-0">

                        <!-- if no in #25 -->

                        <div class="form-group mb-3">
                            <label class="form-label"><small>28.</small> What were your reasons for changing
                                job?</label>
                            <select class="form-select" name="question_28" id="question_28" required>
                                <option value="Salaries and benefits" <?= session()->get('question28') == 'Salaries and benefits' ? 'selected' : '' ?>>Salaries and benefits</option>

                                <option value="Career challenge" <?= session()->get('question28') == 'Career challenge' ? 'selected' : '' ?>>Career challenge</option>
                                <option value="Related to special skill" <?= session()->get('question28') == 'Related to special skill' ? 'selected' : '' ?>>Related to special skill</option>
                                <option value="Related to course or program of study"
                                    <?= session()->get('question28') == 'Related to course or program of study' ? 'selected' : '' ?>>Related to course or program of
                                    study
                                </option>
                                <option value="Proximity to residence" <?= session()->get('question28') == 'Proximity to residence' ? 'selected' : '' ?>>Proximity to residence</option>
                                <option value="Peer influence" <?= session()->get('question28') == 'Peer influence' ? 'selected' : '' ?>>Peer influence</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>29.</small> How long did you stay in your first
                                job?</label>
                            <select class="form-select" name="question_29" id="question_29" required>
                                <option value="Less than a month" <?= session()->get('question29') == 'Less than a month' ? 'selected' : '' ?>>Less than a month</option>
                                <option value="1 to 6 months" <?= session()->get('question29') == '1 to 6 months' ? 'selected' : '' ?>>1 to 6 months</option>
                                <option value="7 to 11 months" <?= session()->get('question29') == '7 to 11 months' ? 'selected' : '' ?>>7 to 11 months</option>
                                <option value="1 year to less than 2 years" <?= session()->get('question29') == '1 year to less than 2 years' ? 'selected' : '' ?>>1 year to less than 2 years
                                </option>
                                <option value="2 years to less than 3 years" <?= session()->get('question29') == '2 years to less than 3 years' ? 'selected' : '' ?>>2 years to less than 3 years</option>
                                <option value="3 years to less than 4 years" <?= session()->get('question29') == '3 years to less than 4 years' ? 'selected' : '' ?>>3 years to less than 4 years</option>
                                <option value="5 years and above" <?= session()->get('question29') == '5 years and above' ? 'selected' : '' ?>>5 years and above</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>30.</small> How did you find your first job?</label>
                            <select class="form-select" name="question_30" id="question_30" required>
                                <option selected>Select your answer</option>
                                <option value="Response to an advertisement" <?= session()->get('question30') == 'Response to an advertisement' ? 'selected' : '' ?>>Response to an advertisement</option>
                                <option value="As walk-in applicant" <?= session()->get('question30') == 'As walk-in applicant' ? 'selected' : '' ?>>As walk-in applicant</option>
                                <option value="Recommended by someone" <?= session()->get('question30') == 'Recommended by someone' ? 'selected' : '' ?>>Recommended by someone</option>
                                <option value="Information from friends" <?= session()->get('question30') == 'Information from friends' ? 'selected' : '' ?>>Information from friends
                                </option>
                                <option value="Arranged by school's job placement officer"
                                    <?= session()->get('question30') == 'Arranged by schools job placement officer' ? 'selected' : '' ?>>Arranged by school's job
                                    placement officer</option>
                                <option value="Family Business" <?= session()->get('question30') == 'Family Business' ? 'selected' : '' ?>>Family Business</option>
                                <option value="Job Fair or Public Employment Service Office (PESO)"
                                    <?= session()->get('question30') == 'Job Fair or Public Employment Service Office (PESO)' ? 'selected' : '' ?>>Job Fair or
                                    Public Employment Service Office (PESO)</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>31.</small> How long did it take you to land your first
                                job?</label>
                            <select class="form-select" name="question_31" id="question_31" required>
                                <option value="Less than a month" <?= session()->get('question31') == 'Less than a month' ? 'selected' : '' ?>>Less than a
                                    month</option>
                                <option value="1 to 6 months" <?= session()->get('question31') == '1 to 6 months' ? 'selected' : '' ?>>1 to 6 months
                                </option>
                                <option value="7 to 11 months" <?= session()->get('question31') == '7 to 11 months' ? 'selected' : '' ?>>7 to 11 months
                                </option>
                                <option value="1 year to less than 2 years" <?= session()->get('question31') == '1 year to less than 2 years' ? 'selected' : '' ?>>1 year to less than 2 years
                                </option>
                                <option value="2 years to less than 3 years" <?= session()->get('question31') == '2 years to less than 3 years' ? 'selected' : '' ?>>2 years to less than 3 years</option>
                                <option value="3 years to less than 4 years" <?= session()->get('question31') == '3 years to less than 4 years' ? 'selected' : '' ?>>3 years to less than 4 years</option>
                                <option value="5 years and above" <?= session()->get('question31') == '5 years and above' ? 'selected' : '' ?>>5 years and
                                    above</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>32.</small> Job Level Position (FIRST JOB)</label>
                            <select class="form-select" name="question_32" id="question_32" required>
                                <option value="Rank or Clerical" <?= session()->get('question32') == 'Rank or Clerical' ? 'selected' : '' ?>>Rank or Clerical</option>
                                <option value="Professional, Technical" <?= session()->get('question32') == 'Professional, Technical' ? 'selected' : '' ?>>Professional, Technical</option>
                                <option value="Supervisory" <?= session()->get('question32') == 'Supervisory' ? 'selected' : '' ?>>
                                    Supervisory</option>
                                <option value="Managerial or Executive" <?= session()->get('question32') == 'Managerial or Executive' ? 'selected' : '' ?>>Managerial or Executive
                                </option>
                                <option value="Self-employed" <?= session()->get('question32') == 'Self-employed' ? 'selected' : '' ?>>Self-employed</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>33.</small> Job Level Position (CURRENT OR PRESENT
                                JOB)</label>
                            <select class="form-select" name="question_33" id="question_33" required>
                                <option value="Rank or Clerical" <?= session()->get('question33') == 'Rank or Clerical' ? 'selected' : '' ?>>Rank or
                                    Clerical</option>
                                <option value="Professional, Technical" <?= session()->get('question33') == 'Professional, Technical' ? 'selected' : '' ?>>
                                    Professional, Technical</option>
                                <option value="Supervisory" <?= session()->get('question33') == 'Supervisory' ? 'selected' : '' ?>>
                                    Supervisory</option>
                                <option value="Managerial or Executive" <?= session()->get('question33') == 'Managerial or Executive' ? 'selected' : '' ?>>
                                    Managerial or Executive
                                </option>
                                <option value="Self-employed" <?= session()->get('question33') == 'Self-employed' ? 'selected' : '' ?>>Self-employed
                                </option>

                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>34.</small> What is your initial gross monthly earning in
                                your first job after college?</label>
                            <select class="form-select" name="question_34" id="question_34" required>
                                <option value="Below P5,000.00" <?= session()->get('question34') == 'Below P5,000.00' ? 'selected' : '' ?>>Below P5,000.00</option>
                                <option value="P5,000.00 to less than P10,000.00"
                                    <?= session()->get('question34') == 'P5,000.00 to less than P10,000.00' ? 'selected' : '' ?>>P5,000.00 to less than
                                    P10,000.00
                                </option>
                                <option value="P10,000.00 to less than P15,000.00"
                                    <?= session()->get('question34') == 'P10,000.00 to less than P15,000.00' ? 'selected' : '' ?>>P10,000.00 to less than
                                    P15,000.00
                                </option>
                                <option value="P15,000.00 to less than P20,000.00"
                                    <?= session()->get('question34') == 'P15,000.00 to less than P20,000.00' ? 'selected' : '' ?>>P15,000.00 to less than
                                    P20,000.00
                                </option>
                                <option value="P15,000.00 to less than P20,000.00"
                                    <?= session()->get('question34') == 'P15,000.00 to less than P20,000.00' ? 'selected' : '' ?>>P15,000.00 to less than
                                    P20,000.00
                                </option>
                                <option value="P25,000.00 and above" <?= session()->get('question34') == 'P25,000.00 and above' ? 'selected' : '' ?>>P25,000.00 and above</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>35.</small> Was the curriculum you had in
                                college relevant to your first job?</label>
                            <select class="form-select" name="question_35" id="question_35" required>
                                <option value="Yes" <?= session()->get('question35') == 'Yes' ? 'selected' : '' ?>>Yes
                                </option>
                                <option value="No" <?= session()->get('question35') == 'No' ? 'selected' : '' ?>>No
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-0">

            <div class="card-footer pt-0">
                <div class="d-flex justify-content-center">
                    <a href="/AlumniController/SectionFiveEmployedPage" type="button"
                        class="btn btn-secondary ps-5 pe-5 me-3">Return</a>
                    <button type="submit" class="btn btn-primary ps-5 pe-5 me-3">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>


<?= $this->endSection(); ?>