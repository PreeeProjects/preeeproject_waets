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
        <div class="card-header d-flex justify-content-between">
            <small>Section: <b>5</b>/8</small>
            <h3 class="mb-0">Tracer Study</h3>
            <small><?= date('M d, Y') ?></small>
        </div>

        <hr class="mt-0">
        <form action="/AlumniController/SectionFiveEmployed" method="get">
            <div class="row d-flex justify-content-center align-items-center m-0">
                <div class="col-sm-7">
                    <div class="card-body pt-0">

                        <!-- if yes -->
                        <div class="form-group mb-3">
                            <label class="form-label"><small>20.</small> Present Employment Status</label>
                            <select class="form-select" name="question_20" id="question_20" required>
                                <option value="Regular or Permanent" <?= session()->get('question20') == 'Regular or Permanent' ? 'selected' : '' ?>>Regular or Permanent</option>
                                <option value="Contractual" <?= session()->get('question20') == 'Contractual' ? 'selected' : '' ?>>
                                    Contractual</option>
                                <option value="Temporary" <?= session()->get('question20') == 'Temporary' ? 'selected' : '' ?>>
                                    Temporary</option>
                                <option value="Self-employed" <?= session()->get('question20') == 'Self-employed' ? 'selected' : '' ?>>Self-employed</option>
                                <option value="Casual" <?= session()->get('question20') == 'Casual' ? 'selected' : '' ?>>
                                    Casual
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><small>21.</small> What skills acquired in college were you able
                                to apply in your work</label>
                            <textarea id="question_21" name="question_21" class="form-control" id="question_21" rows="3"
                                placeholder="Enter your answer" required> <?= session()->get('question21') ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label"><small>22.</small> Present Occupation</label>
                            <input class="form-control" type="text" id="question_22" name="question_22"
                                placeholder="Enter your answer" value="<?= session()->get('question22') ?>" required />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text mb-3">
                            e.g., Junior High School Teacher, Electrical Engineer, Self-employed
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>23.</small> Major line of business of the company you are
                                presently employed in</label>
                            <select class="form-select" name="question_23" id="question_23" required>
                                <option value="Agriculture, Hunting and Forestly"
                                    <?= session()->get('question23') == 'Agriculture, Hunting and Forestly' ? 'selected' : '' ?>>Agriculture, Hunting and Forestly
                                </option>
                                <option value="Fishing" <?= session()->get('question23') == 'Fishing' ? 'selected' : '' ?>>
                                    Fishing</option>
                                <option value="Mining and Quarrying" <?= session()->get('question23') == 'Mining and Quarrying' ? 'selected' : '' ?>>Mining and Quarrying</option>
                                <option value="Manufacturing" <?= session()->get('question23') == 'Manufacturing' ? 'selected' : '' ?>>Manufacturing</option>
                                <option value="Electricity, Gas and Water Supply"
                                    <?= session()->get('question23') == 'Electricity, Gas and Water Supply' ? 'selected' : '' ?>>Electricity, Gas and Water Supply
                                </option>
                                <option value="Construction" <?= session()->get('question23') == 'Construction' ? 'selected' : '' ?>>
                                    Construction</option>
                                <option
                                    value="Wholesale and Retail Trade, repair of motor vehicles, motorcycles and personal and household goods"
                                    <?= session()->get('question23') == 'Wholesale and Retail Trade, repair of motor vehicles, motorcycles and personal and household goods' ? 'selected' : '' ?>>
                                    Wholesale and Retail Trade, repair of motor vehicles, motorcycles and personal and
                                    household goods</option>
                                <option value="Hotel and Restaurants" <?= session()->get('question23') == 'Hotel and Restaurants' ? 'selected' : '' ?>>Hotel and Restaurants</option>
                                <option value="Transport Storage and Communication"
                                    <?= session()->get('question23') == 'Transport Storage and Communication' ? 'selected' : '' ?>>Transport Storage and
                                    Communication
                                </option>
                                <option value="Financial Intermediation" <?= session()->get('question23') == 'Financial Intermediation' ? 'selected' : '' ?>>Financial Intermediation</option>
                                <option value="Real Estate, Renting and Business Activities"
                                    <?= session()->get('question23') == 'Real Estate, Renting and Business Activities' ? 'selected' : '' ?>>Real Estate, Renting and
                                    Business Activities</option>
                                <option value="Public Administration and Defense, Compulsory Social Security"
                                    <?= session()->get('question23') == 'Public Administration and Defense, Compulsory Social Security' ? 'selected' : '' ?>>Public
                                    Administration and Defense, Compulsory Social Security</option>
                                <option value="Education" <?= session()->get('question23') == 'Education' ? 'selected' : '' ?>>
                                    Education</option>
                                <option value="Health and Social Work" <?= session()->get('question23') == 'Health and Social Work' ? 'selected' : '' ?>>Health and Social Work</option>
                                <option value="Other Community, Social and Personal Service Activities"
                                    <?= session()->get('question23') == 'Other Community, Social and Personal Service Activities' ? 'selected' : '' ?>>Other Community,
                                    Social and Personal Service Activities</option>
                                <option value="Private Households with Employed Persons"
                                    <?= session()->get('question23') == 'Private Households with Employed Persons' ? 'selected' : '' ?>>Private Households with
                                    Employed Persons</option>
                                <option value="Extra-territorial Organizations and Bodies"
                                    <?= session()->get('question23') == 'Extra-territorial Organizations and Bodies' ? 'selected' : '' ?>>Extra-territorial
                                    Organizations and Bodies</option>
                                <option value="Information and Technology Related"
                                    <?= session()->get('question23') == 'Information and Technology Related' ? 'selected' : '' ?>>Information and Technology Related
                                </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>24.</small> Place of Work</label>
                            <select class="form-select" name="question_24" id="question_24" required>
                                <option value="Local" <?= session()->get('question24') == 'Local' ? 'selected' : '' ?>>
                                    Local</option>
                                <option value="Abroad" <?= session()->get('question24') == 'Aborad' ? 'selected' : '' ?>>
                                    Abroad</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>25.</small> Is this your first job after college?</label>
                            <select class="form-select" name="question_25" id="question_25"
                                value="<?= session()->get('question25') ?>" required>
                                <option value="Yes" <?= session()->get('question25') == 'Yes' ? 'selected' : '' ?>>Yes
                                </option>
                                <option value="No" <?= session()->get('question25') == 'No' ? 'selected' : '' ?>>No
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-0">

            <div class="card-footer pt-0">
                <div class="d-flex justify-content-center">
                    <a href="/AlumniController/SectionFourPage" type="button"
                        class="btn btn-secondary ps-5 pe-5 me-3">Return</a>
                    <button type="submit" class="btn btn-primary ps-5 pe-5 me-3">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>