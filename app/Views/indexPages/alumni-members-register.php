<?= $this->extend('/IndexComponents/main-layout') ?>
<?= $this->section('section') ?>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-2 fw-bold">Registration Form</h1>
                    <span class="mb-0">Please fill all the fields to create an account.</span>
                    <hr class="mb-4 mt-1">

                    <form id="formAuthentication" class="mb-3" action="/LoginController/SendOTP" method="post">
                        <input type="hidden" name="userType" id="userType" value="0">
                        <div class="mb-3">
                            <label for="tupt_id" class="form-label">TUPT ID</label>
                            <input type="text" class="form-control" id="tupt_id" name="tupt_id"
                                placeholder="TUPT-XX-XXXX" autofocus required />
                            <small id="tuptIdValidationMessage" class="text-danger"></small>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe"
                                autofocus required />
                        </div>

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="John"
                                autofocus required />
                        </div>

                        <div class="mb-3">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name"
                                placeholder="Cruz" autofocus required />
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email" required />
                            <small id="emailValidationMessage" class="text-danger"></small>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Year Graduated <small>from
                                    Registrar</small></label>
                            <select name="year_graduated" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <?php foreach ($yearGraduated as $yearGraduateds): ?>
                                    <option
                                        value="<?= $yearGraduateds['year_graduated_id'] ?>:<?= $yearGraduateds['year_graduated'] ?>">
                                        <?= $yearGraduateds['year_graduated'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">PROGRAM</label>
                            <select name="program" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                <?php foreach ($majors as $major): ?>
                                    <option value="<?= $major['major_id'] ?>:<?= $major['major_acronym'] ?>">
                                        <?= $major['major_acronym'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                    placeholder="0900 000 0000" />
                            </div>
                            <small id="phoneNumberValidationMessage" class="text-danger"></small>
                        </div>

                        <div class="mb-3">
                            <label for="user_name" class="form-label">Username</label>
                            <input type="text" class="form-control" id="user_name" name="user_name"
                                placeholder="Enter your username" autofocus required />
                            <small id="usernameValidationMessage" class="text-danger"></small>
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            <small id="passwordValidationMessage" class="text-danger"></small>
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="retype_password">Retype Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="retype_password" class="form-control" name="retype_password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            <small id="retypePasswordValidationMessage" class="text-danger"></small>
                        </div>

                        <button class="btn btn-primary d-grid w-100" type="submit"
                            id="register-submit">Register</button>
                    </form>

                    <p class="text-center">
                        <span>Already have an Account</span>
                        <a href="/LoginController/AlumniMembersLoginPage"><span>Login Now!</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const registerButton = document.getElementById('register-submit');

        const emailInput = document.getElementById('email');
        const validationMessage = document.getElementById('emailValidationMessage');

        const tuptIdInput = document.getElementById('tupt_id');
        const tuptIdValidationMessage = document.getElementById('tuptIdValidationMessage');

        const phoneNumberInput = document.getElementById('phoneNumber');
        const phoneNumberValidationMessage = document.getElementById('phoneNumberValidationMessage');

        const passwordInput = document.getElementById('password');
        const passwordValidationMessage = document.getElementById('passwordValidationMessage');

        const retypePasswordInput = document.getElementById('retype_password');
        const retypePasswordValidationMessage = document.getElementById('retypePasswordValidationMessage');

        const usernameInput = document.getElementById('user_name');
        const usernameValidationMessage = document.getElementById('usernameValidationMessage');

        function validateEmail() {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailPattern.test(emailInput.value)) {
                validationMessage.textContent = '';
                emailInput.classList.remove('is-invalid');
            } else {
                validationMessage.textContent = 'Please enter a valid email address.';
                emailInput.classList.add('is-invalid');
            }
        }

        function validateTuptId() {
            const tuptIdPattern = /^TUPT-\d{2}-\d{4}$/;
            if (tuptIdPattern.test(tuptIdInput.value)) {
                tuptIdValidationMessage.textContent = '';
                tuptIdInput.classList.remove('is-invalid');
            } else {
                tuptIdValidationMessage.textContent = 'Please enter a valid TUPT ID';
                tuptIdInput.classList.add('is-invalid');
            }
        }

        function validatePhoneNumber() {
            const phoneNumberPattern = /^09\d{9}$/;
            if (phoneNumberPattern.test(phoneNumberInput.value)) {
                phoneNumberValidationMessage.textContent = '';
                phoneNumberInput.classList.remove('is-invalid');
            } else {
                phoneNumberValidationMessage.textContent = 'Please enter a valid phone number';
                phoneNumberInput.classList.add('is-invalid');
            }
        }

        function validatePassword() {
            if (passwordInput.value.length >= 8) {
                passwordValidationMessage.textContent = '';
                passwordInput.classList.remove('is-invalid');
            } else {
                passwordValidationMessage.textContent = 'Password must be at least 8 characters long.';
                passwordInput.classList.add('is-invalid');
            }
        }

        function validateRetypePassword() {
            if (retypePasswordInput.value === passwordInput.value) {
                retypePasswordValidationMessage.textContent = '';
                retypePasswordInput.classList.remove('is-invalid');
            } else {
                retypePasswordValidationMessage.textContent = 'Passwords do not match.';
                retypePasswordInput.classList.add('is-invalid');
            }
        }

        function validateUsername() {
            const usernamePattern = /^[a-zA-Z0-9_-]+$/;
            if (usernamePattern.test(usernameInput.value)) {
                usernameValidationMessage.textContent = '';
                usernameInput.classList.remove('is-invalid');
            } else {
                usernameValidationMessage.textContent = 'Username must only contain letters, numbers, underscores (_) and hyphens (-).';
                usernameInput.classList.add('is-invalid');
            }
        }

        function validateForm() {
            validateEmail();
            validateTuptId();
            validatePhoneNumber();
            validatePassword();
            validateRetypePassword();
            validateUsername();

            const isValid = !validationMessage.textContent &&
                !tuptIdValidationMessage.textContent &&
                !phoneNumberValidationMessage.textContent &&
                !passwordValidationMessage.textContent &&
                !retypePasswordValidationMessage.textContent &&
                !usernameValidationMessage.textContent;

            registerButton.disabled = !isValid;
        }

        emailInput.addEventListener('input', validateEmail);
        tuptIdInput.addEventListener('input', validateTuptId);
        phoneNumberInput.addEventListener('input', validatePhoneNumber);
        passwordInput.addEventListener('input', validatePassword);
        retypePasswordInput.addEventListener('input', validateRetypePassword);
        usernameInput.addEventListener('input', validateUsername);

        emailInput.addEventListener('blur', validateEmail);
        tuptIdInput.addEventListener('blur', validateTuptId);
        phoneNumberInput.addEventListener('blur', validatePhoneNumber);
        passwordInput.addEventListener('blur', validatePassword);
        retypePasswordInput.addEventListener('blur', validateRetypePassword);
        usernameInput.addEventListener('blur', validateUsername);

        document.getElementById('formAuthentication').addEventListener('submit', function (e) {
            e.preventDefault();
            validateForm();
            if (registerButton.disabled) {
                return;
            }
            this.submit();
        });

    });
</script>

<?= $this->endSection() ?>