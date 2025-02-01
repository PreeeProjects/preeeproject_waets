<?= $this->extend('/IndexComponents/main-layout') ?>
<?= $this->section('section') ?>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-2 fw-bold">Change Password</h1>
                    <span class="mb-0">Please set new password.</span>
                    <hr class="mb-4 mt-1">

                    <form id="formAuthentication" class="mb-3" action="/LoginController/ChangePassword" method="post">
                        <input type="hidden" name="userType" id="userType" value="0">

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">New Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            <small id="passwordValidationMessage" class="text-danger"></small>
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Retype Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="retype_password" class="form-control" name="retype_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            <small id="retypePasswordValidationMessage" class="text-danger"></small>
                        </div>

                        <button class="btn btn-primary d-grid w-100" type="submit" id="register-submit">Submit</button>
                    </form>

                    <p class="text-center">
                        <span>Already have an Account</span>
                        <a href="/LoginController/alumniAssociationLoginPage"><span>Login Now!</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    
    // password
    const passwordInput = document.getElementById('password');
    const passwordValidationMessage = document.getElementById('passwordValidationMessage');

    // retype password
    const retypePasswordInput = document.getElementById('retype_password');
    const retypePasswordValidationMessage = document.getElementById('retypePasswordValidationMessage');

    passwordInput.addEventListener('input', function() {
        if (passwordInput.value.length >= 8) {
            passwordValidationMessage.textContent = '';
            passwordInput.style.borderColor = '';
            registerButton.disabled = false;
        } else {
            passwordValidationMessage.textContent = 'Password must be at least 8 characters long.';
            passwordInput.style.borderColor = '#FE5A3E';
            registerButton.disabled = true;
        }
    });

    retypePasswordInput.addEventListener('input', function() {
        if (retypePasswordInput.value === passwordInput.value) {
            retypePasswordValidationMessage.textContent = '';
            retypePasswordInput.style.borderColor = '';
            registerButton.disabled = false;
        } else {
            retypePasswordValidationMessage.textContent = 'Passwords do not match.';
            retypePasswordInput.style.borderColor = '#FE5A3E';
            registerButton.disabled = true;
        }
    });

</script>

<?= $this->endSection() ?>s