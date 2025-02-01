<?= $this->extend('/indexComponents/main-layout') ?>
<?= $this->section('section') ?>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="#" class="app-brand-link gap-2">
                            <img src="/assets/logo_folder/logo-big-transparent.png" style="max-width: 200px; aspect-ratio: 1/1; object-fit: cover; border-radius: 150%;">
                        </a>
                    </div>

                    <!-- Form -->
                    <form id="formAuthentication" class="mb-3" action="/LoginController/LoginValidation/0" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <input type="text" class="form-control" id="email" name="username" placeholder="Enter your username" autofocus required />
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <a href="/LoginController/AlumiMemberForgotPassword">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>

                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Log in</button>
                        </div>
                    </form>

                    <div class="text-center">
                        <span>Don't have an Account? </span>
                        <a href="/LoginController/alumniMembersRegisterPage"><span>Register Now!</span></a><br><br>
                        <a href="/"><i class="bx bx-chevron-left"></i> Return</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>s