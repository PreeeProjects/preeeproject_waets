<?= $this->extend('/indexComponents/main-layout') ?>
<?= $this->section('section') ?>

  <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2" style="display: flex; align-items: center;">
                    <img src="/assets/logo_folder/logo-transparent.png" class="m-0" style="height: 50px; width: auto;" />
                    <h3 class="text-body fw-bolder m-0">W A E T S</h3>
                </a>
            </div>

              <!-- /Logo -->
              <h4 class="mb-2">Forgot Password? 🔒</h4>
              <p class="mb-4">Enter your TUPT-ID and Email and we'll send you instructions to reset your password</p>
              <form id="formAuthentication" class="mb-3" action="/LoginController/AlumiMemberForgotPasswordSendOTP" method="POST">
              <div class="mb-3">
                <label for="tupt_id" class="form-label">TUPT-ID</label>
                <input
                    type="text"
                    class="form-control"
                    id="tupt_id"
                    name="tupt_id"
                    placeholder="TUPT-XX-XXXX"
                    autofocus
                />
                <div id="tuptIdValidationMessage" class="text-danger"></div> <!-- Add this line -->
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    autofocus
                />
                <div id="emailValidationMessage" class="text-danger"></div> <!-- Add this line -->
            </div>

                <button type="submit" class="btn btn-primary d-grid w-100">NEXT</button>
              </form>
              <div class="text-center">
                <a href="/LoginController/AlumniMembersLoginPage" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to login
                </a>
              </div>
            </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    // email input
    const emailInput = document.getElementById('email');
    const validationMessage = document.getElementById('emailValidationMessage');

    // tupt input
    const tuptIdInput = document.getElementById('tupt_id');
    const tuptIdValidationMessage = document.getElementById('tuptIdValidationMessage');

    const submitButton = document.querySelector('button[type="submit"]');

    emailInput.addEventListener('input', function() {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailPattern.test(emailInput.value)) {
            validationMessage.textContent = '';
            emailInput.style.borderColor = '';
            submitButton.disabled = false;
        } else {
            validationMessage.textContent = 'Please enter a valid email address.';
            emailInput.style.borderColor = '#FE5A3E';
            submitButton.disabled = true;
        }
    });

    tuptIdInput.addEventListener('input', function() {
        const tuptIdPattern = /^TUPT-\d{2}-\d{4}$/;
        if (tuptIdPattern.test(tuptIdInput.value)) {
            tuptIdValidationMessage.textContent = '';
            tuptIdInput.style.borderColor = '';
            submitButton.disabled = false;
        } else {
            tuptIdValidationMessage.textContent = 'Please enter a valid TUPT ID';
            tuptIdInput.style.borderColor = '#FE5A3E';
            submitButton.disabled = true;
        }
    });
});

        </script>

<?= $this->endSection() ?>

