<?= $this->extend('/AlumniMembersComponents/alumni-main-layout') ?>
<?= $this->section('section') ?>

<div class="container-xxl flex-grow-2 container-p-y">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniController/Dashboard" class="text-primary">WAETS</a>
                </li>
                <li class="breadcrumb-item active"><span>Profile</span></li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?= session()->get('profile_pic') ?>" alt="user-avatar" class="rounded-circle mb-1"
                            style="width: 200px; height: 200px; object-fit: cover;" id="uploadedAvatar" /><br>
                        <div class="mt-2">
                            <h3 class="fw-bold m-0"><?= session()->get('name') ?></h3>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="fw-bold">Bio:</h5>
                        <p class="m-0"><?= session()->get('bio') ?: 'this user has not set his/her bio' ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="fw-bold m-0">Profile Information</h3>
                </div>
                <hr class="m-0">

                <div class="card-body">

                    <!-- school background -->
                    <h5 class="fw-bold">School Background:</h5>
                    <div class="row">
                        <div class="col-sm-5">
                            <p>Full Name: <?= session()->get('name') ?></p>
                        </div>

                        <div class="col-sm-7">
                            <p>TUPT-ID: <?= session()->get('tupt') ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <p>Program & Major: <?= session()->get('major') ?></p>
                        </div>

                        <div class="col-sm-7">
                            <p>Year Graduated: <?= session()->get('school_year') ?></p>
                        </div>
                    </div>

                    <br>

                    <!-- contact Information -->
                    <h5 class="fw-bold">Contact Information:</h5>
                    <div class="row">
                        <div class="col-sm-5">
                            <p>Phone Number:
                                <?= session()->get('phone') ?: "<a href='/AlumniController/ProfileEdit'>update</a>" ?>
                            </p>
                        </div>

                        <div class="col-sm-7">
                            <p>E-mail: <?= session()->get('email') ?></p>
                        </div>
                    </div>
                    <p>Address: <?= session()->get('address') ?: "<a href='/AlumniController/ProfileEdit'>update</a>" ?>
                    </p>


                    <br>

                    <!-- occupation -->
                    <h5 class="fw-bold">Occupation:</h5>
                    <p>Work: <?= session()->get('work') ?: "<a href='/AlumniController/ProfileEdit'>update</a>" ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>