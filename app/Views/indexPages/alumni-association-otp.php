<?= $this->extend('/IndexComponents/main-layout') ?>
<?= $this->section('section') ?>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-2 fw-bold text-primary">OTP Verification</h1>
                    <span class="mb-0">Verification code have been sent to you email.</span>
                    <hr class="mb-4 mt-1">

                    <form id="formAuthentication" class="mb-3" action="/LoginController/VerifiedOTP" method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control text-center fs-large" name="_user_otp" placeholder="XXXXXX" autofocus required />
                            <small id="tuptIdValidationMessage" class="text-danger"></small>
                        </div>

                        <button class="btn btn-primary d-grid w-100" type="submit" id="register-submit">Submit</button>
                    </form>

                    <p class="text-center">
                        <a href="#"><i class="bx bx-chevron-left"></i> Return</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>s