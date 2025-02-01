<?= $this->extend('/AlumniMembersComponents/alumni-main-layout') ?>
<?= $this->section('section') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-9 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="color: #E72929;">Welcome Back 🎉</h3>
                    <p class="mb-4">
                        Today is <strong><?= date('F d, Y') ?></strong>. Have a great day a head of you!
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <?php if ($tracer_study): ?>
                        <div class="text-center">
                            <h3 class="card-title" style="color: #E72929;">Tracer Study</h3>
                            <p class="mb-4">
                                <a href="/AlumniController/SectionOne/"><i>Answer Now!</i></a>
                            </p>
                        <?php else: ?>
                            <div class="text-center">
                                <h3 class="card-title text-danger">Tracer Study</h3>
                                <p class="mb-4">
                                    <i>Unavailable</i>
                                </p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr class="m-0">

        <div class="row mt-4">
            <div class="col-lg-3 mb-3">
                <div class="card" id="card-effect">
                    <a href="/AlumniController/Members">
                        <div class="card-body pt-3 pb-3 d-flex text-black">
                            <span style="font-size: 35px;" class="m-0 me-4">&#x1F468;&#x200D;&#x1F393;</span>
                            <div>
                                <h4 class="mb-2" style="color: #E72929;">Members</h4>
                                <small>Click here!</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 mb-3">
                <div class="card" id="card-effect">
                    <a href="/AlumniController/AssistanceMainpage">
                        <div class="card-body pt-3 pb-3 d-flex text-black">
                            <span style="font-size: 35px;" class="m-0 me-4">&#128187;</span>

                            <div>
                                <h4 class="mb-2" style="color: #E72929;">Assistance</h4>
                                <small>Click here!</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-lg-3 mb-3">
                <div class="card" id="card-effect">
                    <a href="/AlumniController/ForumMainPage">
                        <div class="card-body pt-3 pb-3 d-flex text-black">
                            <span style="font-size: 35px;" class="m-0 me-4 ">&#x1F4E2;</span>

                            <div>
                                <h4 class="mb-2" style="color: #E72929;">Forum</h4>
                                <small>Click here!</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 mb-3">
                <div class="card" id="card-effect">
                    <a href="/AlumniController/JobOffer">
                        <div class="card-body pt-3 pb-3 d-flex text-black">
                            <span style="font-size: 35px;" class="m-0 me-4">&#128188;</span>

                            <div>
                                <h4 class="mb-2" style="color: #E72929;">Job Offer</h4>
                                <small>Click here!</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <?= $this->endSection() ?>