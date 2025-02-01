<?= $this->extend('/indexComponents/main-layout') ?>
<?= $this->section('section') ?>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- header -->
            <div class="text-center">
                <span class="text-black fst-italic">Happy to see you again!</span>
                <h1 class="mt-2">WAETS System</h1>
            </div>

            <div class="row">
                <!-- Alumni Association -->
                <div class="col-sm-6 mb-3">
                    <div class="card" id="card-effect">
                        <div class="card-body text-center">
                            <!-- contents -->
                            <a href="/LoginController/AlumniAssociationLoginPage">
                                <i class="bx bx-user" type='' style="font-size: 100px;"></i>
                                <br>
                                <span class="text-black">Alumni Association</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Alumni Member -->
                <div class="col-sm-6">
                    <div class="card" id="card-effect">
                        <div class=" card-body text-center">
                            <!-- contents -->
                            <a href="/LoginController/AlumniMembersLoginPage">
                                <i class="bx bx-user" type='solid' style="font-size: 100px;"></i>
                                <br>
                                <span class="text-black">Alumni Member</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>