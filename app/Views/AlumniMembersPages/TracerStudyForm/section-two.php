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
            <small>Section: <b>2</b>/8</small>
            <h3 class="mb-0">Tracer Study</h3>
            <small><?= date('M d, Y') ?></small>
        </div>

        <hr class="mt-0">
        <form action="/AlumniController/SectionThree" method="get">
            <div class="row d-flex justify-content-center align-items-center m-0">
                <div class="col-sm-7">
                    <div class="card-body pt-0">
                        <div class="form-group mb-3">
                            <label class="form-label"><small>1.</small> Email</label>
                            <input class="form-control" type="text" id="question_1" name="question_1"
                                placeholder="Email Address" value="<?= session()->get('question1') ?>" required />
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>2.</small> Full Name</label>
                            <input class="form-control" type="text" id="question_2" name="question_2"
                                placeholder="Surname, First Name, MI" value="<?= session()->get('question2') ?>"
                                required />
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>3.</small> Permanent Address</label>
                            <input class="form-control" type="text" id="question_3" name="question_3"
                                placeholder="Permanent Address" value="<?= session()->get('question3') ?>" required />
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="question_4"><small>4.</small> Mobile Number</label>
                            <input class="form-control" type="number" id="question_4" name="question_4"
                                placeholder="09XXXXXXXXX" value="<?= session()->get('question4') ?>" required />
                            <small id="phoneNumberValidationMessage" class="text-danger"></small>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>5.</small> Civil Status</label>
                            <select class="form-select" name="question_5" id="question_5" required>
                                <option value="Single" <?= session()->get('question5') == 'Single' ? 'selected' : '' ?>>
                                    Single</option>
                                <option value="Married" <?= session()->get('question5') == 'Married' ? 'selected' : '' ?>>
                                    Married</option>
                                <option value="Separate" <?= session()->get('question5') == 'Separate' ? 'selected' : '' ?>>Separate</option>
                                <option value="Single Parent" <?= session()->get('question5') == 'Single Parent' ? 'selected' : '' ?>>Single Parent</option>
                                <option value="Widow or Widower" <?= session()->get('question5') == 'Widow or Widower' ? 'selected' : '' ?>>Widow or Widower</option>
                            </select>
                        </div>


                        <div class="form-group mb-3">
                            <label class="form-label"><small>6.</small> Sex</label>
                            <select class="form-select" name="question_6" id="question_6">
                                <option value="Male" <?= session()->get('question6') == 'Male' ? 'selected' : '' ?>>Male
                                </option>
                                <option value="Female" <?= session()->get('question6') == 'Female' ? 'selected' : '' ?>>
                                    Female</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>7.</small> Birthdate</label>
                            <input class="form-control" type="date" id="question_7" name="question_7" required
                                value="<?= session()->get('question7') ?>" />
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>8.</small> Region</label>
                            <select class="form-select" name="question_8" id="question_8" required>
                                <option value="Region 1" <?= session()->get('question8') == 'Region 1' ? 'selected' : '' ?>>Region 1</option>
                                <option value="Region 2" <?= session()->get('question8') == 'Region 2' ? 'selected' : '' ?>>
                                    Region 2</option>
                                <option value="Region 3" <?= session()->get('question8') == 'Region 3' ? 'selected' : '' ?>>Region 3</option>
                                <option value="Region 4" <?= session()->get('question8') == 'Region 4' ? 'selected' : '' ?>>Region 4</option>
                                <option value="Region 5" <?= session()->get('question8') == 'Region 5' ? 'selected' : '' ?>>Region 5</option>
                                <option value="Region 6" <?= session()->get('question8') == 'Region 6' ? 'selected' : '' ?>>Region 6</option>
                                <option value="Region 7" <?= session()->get('question8') == 'Region 7' ? 'selected' : '' ?>>Region 7</option>
                                <option value="Region 8" <?= session()->get('question8') == 'Region 8' ? 'selected' : '' ?>>Region 8</option>
                                <option value="Region 9" <?= session()->get('question8') == 'Region 9' ? 'selected' : '' ?>>Region 9</option>
                                <option value="Region 10" <?= session()->get('question8') == 'Region 10' ? 'selected' : '' ?>>Region 10</option>
                                <option value="Region 11" <?= session()->get('question8') == 'Region 11' ? 'selected' : '' ?>>Region 11</option>
                                <option value="Region 12" <?= session()->get('question8') == 'Region 12' ? 'selected' : '' ?>>Region 12</option>
                                <option value="NCR" <?= session()->get('question8') == 'NCR' ? 'selected' : '' ?>>NCR
                                </option>
                                <option value="CAR" <?= session()->get('question8') == 'CAR' ? 'selected' : '' ?>>CAR
                                </option>
                                <option value="ARMM" <?= session()->get('question8') == 'ARMM' ? 'selected' : '' ?>>Region
                                    1</option>
                                <option value="CARAGA" <?= session()->get('question8') == 'CARAGA' ? 'selected' : '' ?>>
                                    CARAGA</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>9.</small> Province</label>
                            <input class="form-control" type="text" id="question_9" name="question_9"
                                placeholder="Province" value="<?= session()->get('question9') ?>" required />
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>10.</small> Location of Residence</label>
                            <select class="form-select" name="question_10" id="question_10" required>
                                <option disabled selected value="<?= session()->get('question10') ?>">Residence</option>
                                <option value="City">City</option>
                                <option value="Municipality">Municipality</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>


            <hr class="mt-0">

            <div class="card-footer pt-0">
                <div class="d-flex justify-content-center">
                    <a href="/AlumniController/SectionOne" type="button"
                        class="btn btn-secondary ps-5 pe-5 me-3">Return</a>
                    <button type="submit" class="btn btn-primary ps-5 pe-5 me-3">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>