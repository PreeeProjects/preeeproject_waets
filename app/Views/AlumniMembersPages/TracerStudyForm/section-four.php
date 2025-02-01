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
            <small>Section: <b>4</b>/8</small>
            <h3 class="mb-0">Tracer Study</h3>
            <small><?= date('M d, Y') ?></small>
        </div>

        <hr class="mt-0">
        <form action="/AlumniController/SectionFive" method="get">
            <div class="row d-flex justify-content-center align-items-center m-0">
                <div class="col-sm-7">
                    <div class="card-body pt-0">

                        <div class="form-group mb-3 text-center">
                            <p>16. RECENT PROFESSIONAL EXAMINATION PASSED</p>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Name of Exam</label>
                            <input class="form-control" type="text" id="question_16_1" name="question_16_1"
                                placeholder="" value="<?= session()->get('question16_1') ?>" required />
                            <div id="defaultFormControlHelp" class="form-text">
                                Write N/A if none
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"> Date Taken</label>

                            <input class="form-control" type="date" id="question_16_2" name="question_16_2"
                                placeholder="Date taken" value="<?= session()->get('question16_2') ?>" />
                            <div id="defaultFormControlHelp" class="form-text">
                                Write N/A if none
                            </div>
                        </div>

                        <div class="form-group mb-3">

                            <label class="form-label"> Rating </label>
                            <input class="form-control" type="text" id="question_16_3" name="question_16_3"
                                placeholder="" value="<?= session()->get('question16_3') ?>" required />
                            <div id="defaultFormControlHelp" class="form-text">
                                Write N/A if none
                            </div>
                        </div>

                        <div class="form-group mb-3 text-center">
                            <p>17. WRITE YOUR RECENT TRAINING AND ADVANCE STUDY</p>
                        </div>


                        <div class="form-group mb-3">
                            <label class="form-label">Title of Training or Advance Study</label>
                            <input class="form-control" type="text" id="question_17_1" name="question_17_1"
                                placeholder="" value="<?= session()->get('question17_1') ?>" required />
                            <div id="defaultFormControlHelp" class="form-text">
                                Write N/A if none
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label class="form-label"> Duration</label>
                            <input class="form-control" type="date" id="question_17_2" name="question_17_2"
                                placeholder="Date taken" value="<?= session()->get('question17_2') ?>" />
                            <div id="defaultFormControlHelp" class="form-text">
                                Write N/A if none
                            </div>

                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"> Credits Earned </label>
                            <input class="form-control" type="text" id="question_17_3" name="question_17_3"
                                placeholder="" value="<?= session()->get('question17_3') ?>" required />
                            <div id="defaultFormControlHelp" class="form-text">
                                Write N/A if none

                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"> Name of Training Institution/College/University </label>
                            <input class="form-control" type="text" id="question_17_4" name="question_17_4"
                                placeholder="" value="<?= session()->get('question17_4') ?>" required />
                            <div id="defaultFormControlHelp" class="form-text">
                                Write N/A if none
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <lable class="form-label"> <small>18.</small> Are you presently employed? </lable>
                            <select class="form-select" name="question_18" id="question_18" required>
                                <option value="No" <?= session()->get('question18') == 'No' ? 'selected' : '' ?>>No
                                </option>
                                <option value="Yes" <?= session()->get('question18') == 'Yes' ? 'selected' : '' ?>>Yes
                                </option>
                                <option value="Never Been Employed" <?= session()->get('question18') == 'Never Been Employed' ? 'selected' : '' ?>>Never Been Employed</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-0">

            <div class="card-footer pt-0">
                <div class="d-flex justify-content-center">
                    <a href="/AlumniController/SectionThreePage" type="button"
                        class="btn btn-secondary ps-5 pe-5 me-3">Return</a>
                    <button type="submit" class="btn btn-primary ps-5 pe-5 me-3">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>



<?= $this->endSection(); ?>