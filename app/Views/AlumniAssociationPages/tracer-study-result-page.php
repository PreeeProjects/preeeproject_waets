<?= $this->extend('/AlumniAssociationComponents/main-layout') ?>
<?= $this->section('section') ?>

<style>
    .badge {
        font-size: 40px;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Breadcrumb -->
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/Dashboard" class="text-primary">WAETS</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/TracerStudyMainPage" class="text-primary">Tracer Study</a>
                </li>
                <li class="breadcrumb-item active"><span> Tracer Study Results</span></li>
            </ol>
        </nav>
    </div>

    <!-- Tracer Study Result Card -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="m-0"><?= $year_graduated['year_graduated'] ?> Tracer Study Result</h2>
                <div>
                    <span class="badge badge-center bg-label-primary ms-2 mb-1"><?= $countResult ?></span></br>
                    <span class="text-center">Response</span>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <?php if ($countResult != 0): ?>

        <!-- A G R E E -->
        <div id="pieChart" class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 1</small>
                        <h5 class="m-0 me-2 mt-2">1. Agree</h5>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="agreement"></div>
                </div>
            </div>
        </div>

        <!-- E M A I L -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 2</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>1.</small> Email</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_1">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary"><?= $countEmail ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['email'] ?></i></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- F U L L  N A M E -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 2</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>2.</small> Full Name</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_2">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary"><?= $countFullName ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['full_name'] ?></i></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- A D D R E S S  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 2</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>3.</small> Permanent Address</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_3">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary"><?= $countAddress ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['address'] ?></i></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- M O B I L E   N U M B E R  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 2</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>4.</small> Mobile Number</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_4">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary"><?= $countMobileNumber ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['mobile_number'] ?></i></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- C I V I L  S T A T U S  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 2</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>5.</small> Civil Status</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_5">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="civilStatus"></div>
                </div>
            </div>
        </div>

        <!-- G E N D E R  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 2</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>6.</small> Gender</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_6">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="gender"></div>
                </div>
            </div>
        </div>

        <!-- B I R T H  D A T E  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 2</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>7.</small> Birthdate</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_7">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary"><?= $countBirthdate ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['birthdate'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- R E G I O N  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 2</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>8.</small> Region</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_8">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary"><?= $countRegion ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['region'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- P R O V I N C E  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 2</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>9.</small> Province</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_9">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary"><?= $countProvince ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['province'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- R E S I D E N C E  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 2</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>10.</small> Residence</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_10">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="residence"></div>
                </div>
            </div>
        </div>

        <!-- S E C T I O N 3  -->
        <!-- Y E A R   G R A D U A T E D  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 3</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>11.</small> Year Graduated</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_11">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary"><?= $countYrGraduated ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['year_graduated'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- D E G R E E   -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 3</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>12.</small> Degree and Specialization</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_12">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="degree"></div>
                </div>
            </div>
        </div>

        <!--U N I V E R S I T Y -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 3</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>13.</small> College or University</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_13">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="university"></div>
                </div>
            </div>
        </div>

        <!-- A W A R D  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 3</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>14.</small> Honor(s) or Award(s) Received</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_14">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary"><?= $countAward ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['award'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- R E A S O N   F O R  T A K I N G  T H E   C O U R S E  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 3</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>15.</small> Reason for taking a course or pusuing degree</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_15">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary"><?= $countCourseReason ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['course_reason'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- S E C T I O N  4  -->
        <!-- E X A M I N A T  I O N  P A S S E D  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 4</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>16.</small> Recent Professional Examination Passed</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_16">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary mt-4"><?= $counNameEP ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i>Name of Exam: <?= $dataResult['exam_passed_name'] ?></i> </h6>
                                <h6><i>Date Taken: <?= $dataResult['exam_passed_date'] ?></i> </h6>
                                <h6><i>Rating: <?= $dataResult['exam_passed_rating'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- R E C E N T  T R A N I N G  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 4</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>17.</small> Recent Traning and Advance Study</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_17">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary mt-5"><?= $countTrainingTitle ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i>Title of Traning: <?= $dataResult['training_title'] ?></i> </h6>
                                <h6><i>Duration: <?= $dataResult['training_duration'] ?></i> </h6>
                                <h6><i>Credits Earned: <?= $dataResult['training_credits_earned'] ?></i> </h6>
                                <h6><i>Name of Training Institution: <?= $dataResult['training_institution'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--I S  E M P L O Y E D -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 4</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>18.</small> Are you presently Employed?</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_18">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="employed"></div>
                </div>
            </div>
        </div>

        <!-- R E A S O N   W H Y  N O  T  Y E T  E M P L O Y E D  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 4</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>19.</small> Reason why you are not yet employed</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_19">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary mt-4"><?= $countNotEmployedReason ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['not_employed_reason'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- S E C T I O N  5  -->
        <!--E M P L O Y E M E N T  S T A T U S -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 5</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>20.</small> Present or Employment Status</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_20">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="employment_status"></div>
                </div>
            </div>
        </div>

        <!-- S K I L L S   A C Q U I R E D  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 5</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>21.</small> What skills acquired in college were you able to
                            apply in work</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_21">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary mt-4"><?= $countSkill ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['employed_skill_acquired'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- O C C U P A T I O N -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 5</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>22.</small> Present Occupation</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_22">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary mt-4"><?= $countOccupation ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['employed_occupation'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- B U S I N E S S  L I N E  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 5</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>23.</small> Major business line of the companyyou are
                            presently employed</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_23">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary mt-4"><?= $countBusinessLine ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['employed_business_line'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- P L A C E   O F   W O R K   -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 5</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>24.</small> Place of work</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_24">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary mt-4"><?= $countWorkPlace ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['employed_work_place'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- I S  F I R S T  J O B  ?  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 5</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>25.</small> Is this you first job after college?</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_25">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary mt-4"><?= $countIsFirstJob ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['is_first_job'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- S E C T I O  N  6 -->
        <!-- R E A S  O N   F O R  S T A Y I N  G  O N  T H  E  J O B ?  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 6</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>26.</small> What are the reason for staying on the job?</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_26">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary mt-4"><?= $countIsFirstJob ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['first_job_reson_for_staying'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- C O U R S E  R E L A T E D  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 6</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>27.</small> Is your first job related to the course you took
                            up in college?</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_27">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary mt-4"><?= $countCourseRelated ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['is_first_job_course_related'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- R E A S O N  F O R  C H A N G I N G  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 6</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>28.</small> What were your reason for changing job?</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_28">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="reason_changing_job"></div>
                </div>
            </div>
        </div>

        <!-- #29  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 6</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>29.</small> How long did you stay in your first job?</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_29">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="first_job_duration" style="height: 200px;"></div>
                </div>
            </div>
        </div>

        <!-- #30  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 6</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>30.</small> How long did you find your first job?</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_30">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary mt-4"><?= $countFirstJobReferral ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['first_job_referral'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- #31  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 6</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>31.</small> How long did it take you to land your first job?
                        </h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_31">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="first_job_land_duration" style="height: 200px;"></div>
                </div>
            </div>
        </div>

        <!-- #32  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 6</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>32.</small> Job level position (First Job)?
                        </h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_32">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="first_job_position"></div>
                </div>
            </div>
        </div>

        <!-- #33  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 6</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>33.</small> Job level position (Current or Present Job)?
                        </h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_33">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="current_job_position"></div>
                </div>
            </div>
        </div>

        <!-- #34  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 6</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>34.</small> What is your initial gross monthly earning in your
                            first job after college?
                        </h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_34">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="initial_gross"></div>
                </div>
            </div>
        </div>

        <!-- #35  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 6</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>35.</small> Was the curriculum you had in college relevent to
                            your first job?
                        </h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_35">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="curriculum_related"></div>
                </div>
            </div>
        </div>

        <!-- S E C T I O  N  7 -->
        <!-- #36  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 7</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>36.</small> What are the competency learned in college did
                            you
                            find very useful in your first job?
                        </h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_36">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="competency"></div>
                </div>
            </div>
        </div>

        <!-- #37 -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 7</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>37.</small> How did you find your first job?</h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_37">More
                        Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="text-center">
                                <h2 class="mb-2 text-primary mt-4"><?= $countCourseRelatedFirstJob ?></h2>
                                <span>Responses</span>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="text-center">
                                <h5 class="m-0">Latest Response:</h5><br>
                                <h6><i><?= $dataResult['course_related_first_job'] ?></i> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- #38  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 7</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>38.</small> How long did it take you to land your first job?
                        </h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_38">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="course_related_first_job_duration"></div>
                </div>
            </div>
        </div>

        <!-- #39  -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <small class="text-muted">Section 7</small>
                        <h5 class="m-0 me-2 mt-2 mb-3"><small>39.</small> What is your initial gross monthly earning in your
                            first job after college?
                        </h5>
                    </div>
                    <a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#question_39">More
                        Details</a>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-0 mb-4">
                    <div id="course_related_initial_gross"></div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>

    <div class="text-center fst-italic mt-5 mb-5">
        <h3 class="mb-0">NO RESULTS</h3>
        <small>Unfortunately, no results to display</small>
    </div>

<?php endif; ?>
</div>

<!-- M O R E  D E T A I L S  M O D A L -->

<div class="modal fade" id="question_1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>1. </small> Email</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['email'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>2. </small> Full Name</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['full_name'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>3. </small> Address</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['address'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_4" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>4. </small> Mobile Number</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['mobile_number'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_5" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>5. </small> Civil Status</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['civil_status'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_6" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>6. </small> Gender</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['sex'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_7" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>7. </small> Birthdate</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['birthdate'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_8" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>8. </small> Region</h5>
            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['region'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_9" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>9. </small> Province</h5>
            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['province'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_10" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>10. </small> Residence</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['residence'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_11" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>11. </small> Year Graduated</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['year_graduated'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_12" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>12. </small> Degree and Specialization</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['degree'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_13" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>13. </small> College or University</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['university'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_14" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>14. </small> Honor or Award Received</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['award'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_15" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>15. </small> Reason for taking a course or pursuing degree</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['course_reason'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_16" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>16. </small> Recent Professional Examination Passed</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Professional Examination Passed</th>
                                <th>Date Taken</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['exam_passed_name'] ?></td>
                                    <td><?= $resultViews['exam_passed_date'] ?></td>
                                    <td><?= $resultViews['exam_passed_rating'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_17" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>17. </small> Recent Training and Advance Study</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Training</th>
                                <th>Duration</th>
                                <th>Credits Earned</th>
                                <th>Institution</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['training_title'] ?></td>
                                    <td><?= $resultViews['training_duration'] ?></td>
                                    <td><?= $resultViews['training_credits_earned'] ?></td>
                                    <td><?= $resultViews['training_institution'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_18" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>18. </small> Are you presently employed?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['is_employed'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_19" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>19. </small> Reason why you are not yet employed</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['not_employed_reason'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_20" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>20. </small> Present or Employment Status</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['employed_employment_status'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_21" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>21. </small> What skills acquired in college were you able to apply in work</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['employed_skill_acquired'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_22" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>22. </small> Present Occupation</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['employed_occupation'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_23" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>23. </small> Major business line of the companyyou are presently employed</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['employed_business_line'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_24" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>24. </small> Place of work</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['employed_work_place'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_25" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>25. </small> Is this you first job after college?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['is_first_job'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_26" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>26. </small> What are the reason for staying on the job?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>What are the reason for staying on the job?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['first_job_reson_for_staying'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_27" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>27. </small> Is your first job related to the course you took up in college?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Is your first job related to the course you took up in college?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['is_first_job_course_related'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_28" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>28. </small> What were your reason for changing job?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['reason_for_changing'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_29" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>29. </small> How long did you stay in your first job?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['first_job_duration'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_30" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>30. </small> How long did you find your first job?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['first_job_referral'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_31" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>31. </small> How long did it take you to land your first job?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['first_job_land_duration'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_32" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>32. </small> Job level position (First Job)?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['first_job_level_position'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_33" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>33. </small> Job level position (Current or Present Job)?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['current_job_level_position'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_34" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>34. </small> What is your initial gross monthly earning in your first job after college?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['first_job_income'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_35" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>35. </small> Was the curriculum you had in college relevent to your first job?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['is_job_curriculum_related'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_36" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>36. </small> What are the competency learned in college did you find very useful in your
                    first job?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['useful_competencies'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_37" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>37. </small> How did you find your first job?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['course_related_first_job'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_38" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>38. </small> How long did it take you to land your first job?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['course_related_land_job_duration'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="question_39" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5><small>39. </small> What is your initial gross monthly earning in your first job after college?</h5>

            </div>
            <div class="modal-body pt-0">
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultView as $resultViews): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $resultViews['full_name'] ?></td>
                                    <td><?= $resultViews['course_related_income'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<script>
    // A G R E E
    var optionsAgree = {
        series: [100],
        chart: {
            width: 300,
            type: 'pie',
        },
        labels: ['Accept'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartAgree = new ApexCharts(document.querySelector("#agreement"), optionsAgree);
    chartAgree.render();

    // C I V I L  S T A T U S
    var optionsCivilStatus = {
        series: [<?= $countSingle ?>, <?= $countMarried ?>, <?= $countSingleParent ?>, <?= $countSeparate ?>, <?= $countWidow ?>],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['Single', 'Married', 'Single Parent', 'Separate', 'Widow or Widower'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartCivilStatus = new ApexCharts(document.querySelector("#civilStatus"), optionsCivilStatus);
    chartCivilStatus.render();

    // G E N D E R
    var optionsGender = {
        series: [<?= $countFemale ?>, <?= $countMale ?>],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['Female', 'Male'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartGender = new ApexCharts(document.querySelector("#gender"), optionsGender);
    chartGender.render();

    // R E S I D E N C E
    var optionsResidence = {
        series: [<?= $countCity ?>, <?= $countMunicipality ?>],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['City', 'Municipality'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartResidence = new ApexCharts(document.querySelector("#residence"), optionsResidence);
    chartResidence.render();

    // D E G R E E
    var optionsDegree = {
        series: [<?= $degreeCount ?>],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['BTTE / BTVTE'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartDegree = new ApexCharts(document.querySelector("#degree"), optionsDegree);
    chartDegree.render();

    // U N I V E R S I  T Y
    var optionsUnivesity = {
        series: [<?= $countUniTupt ?>, <?= $countUniOthers ?>],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['TUP - T', 'Others'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartUniversity = new ApexCharts(document.querySelector("#university"), optionsUnivesity);
    chartUniversity.render();


    // I S  E M P L O Y E D
    var optionsIsEmployed = {
        series: [<?= $countEmployed ?>, <?= $countNotEmployed ?>, <?= $countNeverBeenEmployed ?>],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['Yes', 'No', 'Never Been Employed'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartIsEmployed = new ApexCharts(document.querySelector("#employed"), optionsIsEmployed);
    chartIsEmployed.render();

    // E M P L O Y E M E N T  S T A T U S
    var optionsEmployementStatus = {
        series: [<?= $countRegular ?>, <?= $countTemporary ?>, <?= $countContractual ?>, <?= $countSelfEmployed ?>, <?= $countCasual ?>],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['Regular or Permanent', 'Temporary', 'Contractual', 'Self-Employed', 'Casual'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartEmployementStatus = new ApexCharts(document.querySelector("#employment_status"), optionsEmployementStatus);
    chartEmployementStatus.render();

    // R E A S O N  F O R  C H A N G I N G

    var optionsReasonChangingJob = {
        series: [<?= $countSalaries ?>, <?= $countCareer ?>, <?= $countSpeacialSkill ?>, <?= $countRelatedToCourse ?>, <?= $residenceCount ?>, <?= $countPeerInfluence ?>],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['Salaries & Benefits', 'Career Challege', 'Related to special skill', 'Related to course', 'Proximity to residence', 'Peer Influence'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartReasonChangingJobs = new ApexCharts(document.querySelector("#reason_changing_job"), optionsReasonChangingJob);
    chartReasonChangingJobs.render();

    // F I R S T J O B  D U R A T I O N

    var optionsReasonChangingJob = {
        series: [<?= $countMonth ?>, <?= $countOneToSixMonths ?>, <?= $countSevenToSixMonths ?>, <?= $countOneToTwoYears ?>, <?= $countTwoToThreeYears ?>, <?= $countThreeToFourYears ?>, <?= $countFiveYearsAbove ?>],
        chart: {
            width: 450,
            type: 'pie',
        },
        labels: ['Less than a month', '1 to 6 months', '7 to 11 months', '1 year to less than 2 years', '2 years to less than 3 years', '3 years to less than 4 years', '5 years and above'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 250
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartReasonChangingJobs = new ApexCharts(document.querySelector("#first_job_duration"), optionsReasonChangingJob);
    chartReasonChangingJobs.render();

    // F I R S T  J O B  L A N D  D U R A T I O N

    var optionsReasonChangingJob = {
        series: [<?= $countLandMonth ?>, <?= $countLandOneToSixMonths ?>, <?= $countLandSevenToSixMonths ?>, <?= $countLandOneToTwoYears ?>, <?= $countLandTwoToThreeYears ?>, <?= $countLandThreeToFourYears ?>, <?= $countLandFiveYearsAbove ?>],
        chart: {
            width: 450,
            type: 'pie',
        },
        labels: ['Less than a month', '1 to 6 months', '7 to 11 months', '1 year to less than 2 years', '2 years to less than 3 years', '3 years to less than 4 years', '5 years and above'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 250
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartReasonChangingJobs = new ApexCharts(document.querySelector("#first_job_land_duration"), optionsReasonChangingJob);
    chartReasonChangingJobs.render();

    // F I R S T  J O B  P O S I T I O N

    var optionsReasonChangingJob = {
        series: [<?= $countFirstJobRank ?>, <?= $countFirstJobTechnical ?>, <?= $countFirstJobSupervisors ?>, <?= $countFirstJobManager ?>, <?= $countFirstJobSelfEmployed ?>],
        chart: {
            width: 450,
            type: 'pie',
        },
        labels: ['Rank or Clerical', 'Professional, Technical', 'Supervisory', 'Managerial or Executive', 'Self-employed'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 250
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartReasonChangingJobs = new ApexCharts(document.querySelector("#first_job_position"), optionsReasonChangingJob);
    chartReasonChangingJobs.render();

    // C U R R E N T  J O B  P O S I T I O N

    var optionsReasonChangingJob = {
        series: [<?= $countCurrentJobRank ?>, <?= $countCurrentJobTechnical ?>, <?= $countCurrentJobSupervisors ?>, <?= $countCurrentJobManager ?>, <?= $countCurrentJobSelfEmployed ?>],
        chart: {
            width: 450,
            type: 'pie',
        },
        labels: ['Rank or Clerical', 'Professional, Technical', 'Supervisory', 'Managerial or Executive', 'Self-employed'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 250
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartReasonChangingJobs = new ApexCharts(document.querySelector("#current_job_position"), optionsReasonChangingJob);
    chartReasonChangingJobs.render();

    // I N I T I A L  G R O S S 

    var optionsReasonChangingJob = {
        series: [<?= $countbBelowFiveK ?>, <?= $countFiveK ?>, <?= $countTenK ?>, <?= $countFiftenK ?>, <?= $countTwentyK ?>, <?= $countTwentyKAbove ?>],
        chart: {
            width: 450,
            type: 'pie',
        },
        labels: ['Below P5,000.00', 'P5,000.00 to P10,000.00,', 'P10,000.00 to P15,000.00', 'P15,000.00 to P20,000.00', 'P15,000.00 to P20,000.00', 'P25,000.00 and above'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 250
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartReasonChangingJobs = new ApexCharts(document.querySelector("#initial_gross"), optionsReasonChangingJob);
    chartReasonChangingJobs.render();

    // C U R R I C U L U  M   R E L E V  E N T

    var optionsReasonChangingJob = {
        series: [<?= $countCurriculumRelatedYes ?>, <?= $countCurriculumRelatedNo ?>],
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: ['Yes', 'No'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 250
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartReasonChangingJobs = new ApexCharts(document.querySelector("#curriculum_related"), optionsReasonChangingJob);
    chartReasonChangingJobs.render();

    // L E A R N E D   C O M P E T E N C I E S

    var optionsReasonChangingJob = {
        series: [<?= $countCS ?>, <?= $countHRS ?>, <?= $countES ?>, <?= $countITS ?>, <?= $countPSS ?>, <?= $countCTS ?>],
        chart: {
            width: 450,
            type: 'pie',
        },
        labels: ['Communication Skills', 'Human Relations Skills', 'Entrepreneurial Skills', 'Information Technology Skills', 'Problem-solving Skills', 'Critical Thinking Skills'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 250
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };
    var chartReasonChangingJobs = new ApexCharts(document.querySelector("#competency"), optionsReasonChangingJob);
    chartReasonChangingJobs.render();

    // C O U R S E  R E L A T E D  F I R S T  J O B  D U R A T I O N

    var optionsReasonChangingJob = {
        series: [<?= $countCRLandMonth ?>, <?= $countCRLandOneToSixMonths ?>, <?= $countCRLandSevenToSixMonths ?>, <?= $countCRLandOneToTwoYears ?>, <?= $countCRLandTwoToThreeYears ?>, <?= $countCRLandThreeToFourYears ?>, <?= $countCRLandFiveYearsAbove ?>],
        chart: {
            width: 450,
            type: 'pie',
        },
        labels: ['Less than a month', '1 to 6 months', '7 to 11 months', '1 year to less than 2 years', '2 years to less than 3 years', '3 years to less than 4 years', '5 years and above'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 250
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartReasonChangingJobs = new ApexCharts(document.querySelector("#course_related_first_job_duration"), optionsReasonChangingJob);
    chartReasonChangingJobs.render();

    // C O U R S E  R E L A T E D  I N I T I A L  G R O S S 

    var optionsReasonChangingJob = {
        series: [<?= $countCRbBelowFiveK ?>, <?= $countCRFiveK ?>, <?= $countCRTenK ?>, <?= $countCRFiftenK ?>, <?= $countCRTwentyK ?>, <?= $countCRTwentyKAbove ?>],
        chart: {
            width: 450,
            type: 'pie',
        },
        labels: ['Below P5,000.00', 'P5,000.00 to P10,000.00,', 'P10,000.00 to P15,000.00', 'P15,000.00 to P20,000.00', 'P15,000.00 to P20,000.00', 'P25,000.00 and above'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 250
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartReasonChangingJobs = new ApexCharts(document.querySelector("#course_related_initial_gross"), optionsReasonChangingJob);
    chartReasonChangingJobs.render();



</script>


<?= $this->endSection(); ?>