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
              <h4 class="mb-2">Generate Manual Key 🔒</h4>
              <p class="mb-4">Keep this manual key safe for accessing WAETS features.</p>
              <form id="formAuthentication" class="mb-3" action="/AlumniAssociationController/GenerateManualKey" method="POST">
              <div class="mb-3">
                <label for="tupt_id" class="form-label">KEY VALUE</label>
                <input
                    type="text"
                    class="form-control"
                    id="tupt_id"
                    READONLY
                    value="<?= session()->get('key_value')?>"
                />
                <div id="tuptIdValidationMessage" class="text-danger"></div> <!-- Add this line -->
            </div>
            <button type="submit" class="btn btn-outline-secondary">
                <span class="tf-icons bx bx-key" type="solid"></span>&nbsp; Generate Manual Key
            </button>

             <a href="/AlumniAssociationController/dashboard" type="button" class="btn btn-outline-primary">
                <span class="tf-icons bx bx-chevrons-right" type="solid"></span>&nbsp; Continue
</a>

              </form>
              <div class="text-center">
                <a href="/AlumniAssociationController/GenerateManualKeyMainpage" class="d-flex align-items-center justify-content-center">
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


<?= $this->endSection() ?>

