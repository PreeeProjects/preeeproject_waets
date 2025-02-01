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
            <small>Section: <b>3</b>/8</small>
            <h3 class="mb-0">Tracer Study</h3>
            <small><?= date('M d, Y') ?></small>
        </div>

        <hr class="mt-0">
        <form action="/AlumniController/SectionFour" method="get">
            <div class="row d-flex justify-content-center align-items-center m-0">
                <div class="col-sm-7">
                    <div class="card-body pt-0">

                        <div class="form-group mb-3">
                            <label class="form-label"><small>11.</small> Year Graduated</label>
                            <select class="form-select" name="question_11" id="question_11" required>
                                <option value="2016" <?= session()->get('question11') == '2016' ? 'selected' : '' ?>>2016
                                </option>
                                <option value="2017" <?= session()->get('question11') == '2017' ? 'selected' : '' ?>>2017
                                </option>
                                <option value="2018" <?= session()->get('question11') == '2018' ? 'selected' : '' ?>>2018
                                </option>
                                <option value="2019" <?= session()->get('question11') == '2019' ? 'selected' : '' ?>>2019
                                </option>
                                <option value="2020" <?= session()->get('question11') == '2020' ? 'selected' : '' ?>>2020
                                </option>
                                <option value="2021" <?= session()->get('question11') == '2021' ? 'selected' : '' ?>>2021
                                </option>
                                <option value="2022" <?= session()->get('question11') == '2022' ? 'selected' : '' ?>>2022
                                </option>
                                <option value="2023" <?= session()->get('question11') == '2023' ? 'selected' : '' ?>>2023
                                </option>
                                <option value="2024" <?= session()->get('question11') == '2024' ? 'selected' : '' ?>>2024
                                </option>
                                <option value="2025" <?= session()->get('question11') == '2025' ? 'selected' : '' ?>>2025
                                </option>
                                <option value="2026" <?= session()->get('question11') == '2026' ? 'selected' : '' ?>>2026
                                </option>
                                <option value="2027" <?= session()->get('question11') == '2027' ? 'selected' : '' ?>>2027
                                </option>
                                <option value="2028" <?= session()->get('question11') == '2028' ? 'selected' : '' ?>>2028
                                </option>
                                <option value="2029" <?= session()->get('question11') == '2029' ? 'selected' : '' ?>>2029
                                </option>
                                <option value="2030" <?= session()->get('question11') == '2030' ? 'selected' : '' ?>>2030
                                </option>
                                <option value="2031" <?= session()->get('question11') == '2031' ? 'selected' : '' ?>>2031
                                </option>
                                <option value="2032" <?= session()->get('question11') == '2032' ? 'selected' : '' ?>>2032
                                </option>
                                <option value="2033" <?= session()->get('question11') == '2033' ? 'selected' : '' ?>>2033
                                </option>
                                <option value="2034" <?= session()->get('question11') == '2034' ? 'selected' : '' ?>>2034
                                </option>
                                <option value="2035" <?= session()->get('question11') == '2035' ? 'selected' : '' ?>>2035
                                </option>
                                <option value="2036" <?= session()->get('question11') == '2036' ? 'selected' : '' ?>>2036
                                </option>
                                <option value="2037" <?= session()->get('question11') == '2037' ? 'selected' : '' ?>>2037
                                </option>
                                <option value="2038" <?= session()->get('question11') == '2038' ? 'selected' : '' ?>>2038
                                </option>
                                <option value="2039" <?= session()->get('question11') == '2039' ? 'selected' : '' ?>>2039
                                </option>
                                <option value="2040" <?= session()->get('question11') == '2040' ? 'selected' : '' ?>>2040
                                </option>
                                <option value="2041" <?= session()->get('question11') == '2041' ? 'selected' : '' ?>>2041
                                </option>
                                <option value="2042" <?= session()->get('question11') == '2042' ? 'selected' : '' ?>>2042
                                </option>
                                <option value="2043" <?= session()->get('question11') == '2043' ? 'selected' : '' ?>>2043
                                </option>
                                <option value="2044" <?= session()->get('question11') == '2044' ? 'selected' : '' ?>>2044
                                </option>
                                <option value="2045" <?= session()->get('question11') == '2045' ? 'selected' : '' ?>>2045
                                </option>
                                <option value="2046" <?= session()->get('question11') == '2046' ? 'selected' : '' ?>>2046
                                </option>
                                <option value="2047" <?= session()->get('question11') == '2047' ? 'selected' : '' ?>>2047
                                </option>
                                <option value="2048" <?= session()->get('question11') == '2048' ? 'selected' : '' ?>>2048
                                </option>
                                <option value="2049" <?= session()->get('question11') == '2049' ? 'selected' : '' ?>>2049
                                </option>
                                <option value="2050" <?= session()->get('question11') == '2050' ? 'selected' : '' ?>>2050
                                </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>12.</small> Degree and Specialization</label>
                            <select class="form-select" name="question_12" id="question_12" required>
                                <option value="BTTE / BTVTE" <?= session()->get('question12') == 'BTTE / BTVTE' ? 'selected' : '' ?>>BTTE / BTVTE</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>13.</small> College or University</label>
                            <select class="form-select" name="question_13" id="question_13" required>
                                <option value="Technological University of the Philippines - Taguig"
                                    <?= session()->get('question13') == 'Technological University of the Philippines - Taguig' ? 'selected' : '' ?>>Technological
                                    University of the Philippines - Taguig</option>
                                <option value="Others" <?= session()->get('question13') == 'Others' ? 'selected' : '' ?>>
                                    Others</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>14.</small> HONOR(3) OR AWARD(S) RECEIVED <small>(WRITE N/A
                                    IF NONE)</small></label>
                            <input class="form-control" type="text" id="question_14" name="question_14"
                                placeholder="Honors" value="<?= session()->get('question14') ?>" required />
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label"><small>15.</small> Reason(s) for taking the course(s) or pursuing
                                degree(s)</label>
                            <select class="form-select" name="question_15" id="question_15" required>
                                <option value="High grades in the course or subject area(s) related to the course"
                                    <?= session()->get('question15') == 'High grades in the course or subject area(s) related to the course' ? 'selected' : '' ?>>High
                                    grades in the course or subject area(s) related to the course</option>
                                <option value="Good grades in high school" <?= session()->get('question15') == 'Good grades in high school' ? 'selected' : '' ?>>Good grades in high school</option>
                                <option value="Influence of parents or relatives"
                                    <?= session()->get('question15') == 'Influence of parents or relatives' ? 'selected' : '' ?>>Influence of parents or relatives
                                </option>
                                <option value="Peer influence" <?= session()->get('question15') == 'Peer influence' ? 'selected' : '' ?>>
                                    Peer influence</option>
                                <option value="Inspired by a role model" <?= session()->get('question15') == 'Inspired by a role model' ? 'selected' : '' ?>>Inspired by a role model</option>
                                <option value="Strong passion for the profession"
                                    <?= session()->get('question15') == 'Strong passion for the profession' ? 'selected' : '' ?>>Strong passion for the profession
                                </option>
                                <option value="Prospect for immediate employment"
                                    <?= session()->get('question15') == 'Prospect for immediate employment' ? 'selected' : '' ?>>Prospect for immediate employment
                                </option>
                                <option value="Status or prestige of the profession"
                                    <?= session()->get('question15') == 'Status or prestige of the profession' ? 'selected' : '' ?>>Status or prestige of the
                                    profession
                                </option>
                                <option value="Availability of course offering in chosen institution"
                                    <?= session()->get('question15') == 'Availability of course offering in chosen institution' ? 'selected' : '' ?>>Availability of
                                    course offering in chosen institution</option>
                                <option value="Prospect of career advancement"
                                    <?= session()->get('question15') == 'Prospect of career advancement' ? 'selected' : '' ?>>Prospect of career advancement</option>
                                <option value="Affordable for the family" <?= session()->get('question15') == 'Affordable for the family' ? 'selected' : '' ?>>Affordable for the family</option>
                                <option value="Prospect of attractive compensation"
                                    <?= session()->get('question15') == 'Prospect of attractive compensation' ? 'selected' : '' ?>>Prospect of attractive compensation
                                </option>
                                <option value="Opportunity for employment abroad"
                                    <?= session()->get('question15') == 'Opportunity for employment abroad' ? 'selected' : '' ?>>Opportunity for employment abroad
                                </option>
                                <option value="No particular choice or no better idea"
                                    <?= session()->get('question15') == 'No particular choice or no better idea' ? 'selected' : '' ?>>No particular choice or no
                                    better
                                    idea</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-0">

            <div class="card-footer pt-0">
                <div class="d-flex justify-content-center">
                    <a href="/AlumniController/SectionTwo" type="button"
                        class="btn btn-secondary ps-5 pe-5 me-3">Return</a>
                    <button type="submit" class="btn btn-primary ps-5 pe-5 me-3">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>