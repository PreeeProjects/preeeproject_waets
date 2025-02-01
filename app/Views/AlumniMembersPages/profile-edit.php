<?= $this->extend('/AlumniMembersComponents/alumni-main-layout') ?>
<?= $this->section('section') ?>

<style>
    .image-container {
        position: relative;
        overflow: hidden;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        clip-path: circle(20% at 50% 50%);
    }

    .image-container:hover .overlay {
        opacity: 0.7;
    }

    .overlay a {
        color: white;
        text-decoration: none;
    }
</style>

<div class="container-xxl flex-grow-2 container-p-y">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniController/Dashboard" class="text-primary">WAETS</a>
                    <a href="/AlumniController/Dashboard" class="text-primary">WAETS</a>
                </li>
                <li class="breadcrumb-item active"><span>Profile Edit</span></li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <form action="/AlumniController/editProfile" method="post" enctype="multipart/form-data">
            <div class="card-body">

                <!-- First Row -->
                <div class="row">
                    <div class="col-sm-3 text-center">
                        <div class="image-container position-relative">
                            <img src="<?= session()->get('profile_pic') ?>" id="uploadedAvatar" alt="user-avatar"
                                class="rounded-circle mb-1" style="width: 200px; height: 200px; object-fit: cover;" />
                            <div class="overlay">
                                <a href="#"
                                    onclick="document.getElementById('profile_upload').click(); return false;"><i
                                        class="bx bx-upload me-1"></i> Upload</a>
                            </div>
                            <input type="file" id="profile_upload" name="profile_pic" style="display: none;"
                                onchange="previewImage(this)">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-sm-9">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Full Name</label>
                            <input type="text" READONLY class="form-control" id="first_name" name="first_name"
                                value="<?= session()->get('name') ?>" placeholder="John" autofocus required />
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="tupt" class="form-label">TUPT-ID</label>
                                    <input type="text" READONLY id="tupt_id" class="form-control"
                                        id="basic-default-company" name="tupt" value="<?= session()->get('tupt') ?>" />
                                    <small id="tuptIdValidationMessage" class="text-danger"></small>
                                </div>
                            </div>

                            <div class="col-sm-4">

                                <div class="mb-3">
                                    <label for="tupt" class="form-label">MAJOR</label>
                                    <input type="text" READONLY id="tupt_id" class="form-control"
                                        id="basic-default-company" name="tupt" value="<?= session()->get('major') ?>" />
                                    <small id="tuptIdValidationMessage" class="text-danger"></small>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="major" class="form-label">Year Graduated</label>
                                    <input READONLY type="number" class="form-control" name="school_year"
                                        value="<?= session()->get('school_year') ?>" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="divider text-start">
                        <div class="divider-text">Other Information</div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" id="email" class="form-control" name="email"
                                    value="<?= session()->get('email') ?> " />
                                <small id="emailValidationMessage" class="text-danger"></small>
                            </div>
                        </div>


                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" id="basic-default-address" class="form-control" name="address"
                                    value="<?= session()->get('address') ?> " />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="text" id="phone_number" class="form-control" name="phoneNumber"
                                    value="<?= session()->get('phone') ?> " />
                                <small id="phoneNumberValidationMessage" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="address" class="form-label">Work</label>
                                <input type="text" class="form-control phone-mask mb-2"
                                    aria-describedby="basic-default-phone" name="work"
                                    value="<?= session()->get('work') ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3">
                            <label for="" class="form-label">Bio</label>
                            <textarea class="form-control" name="bio"><?= session()->get('bio') ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer border-top text-end">
                    <button type="submit" id="update_button" class="btn btn-primary me-2">Save changes</button>
                    <a href="/AlumniAssociationController/profile" class="btn btn-outline-secondary">Cancel</a>
                </div>
        </form>
    </div>
</div>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#uploadedAvatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // update button
    const updateButton = document.getElementById('update_button');

    // email input
    const emailInput = document.getElementById('email');
    const validationMessage = document.getElementById('emailValidationMessage');

    // tupt input
    const tuptIdInput = document.getElementById('tupt_id');
    const tuptIdValidationMessage = document.getElementById('tuptIdValidationMessage');

    // phone num input
    const phoneNumberInput = document.getElementById('phone_number');
    const phoneNumberValidationMessage = document.getElementById('phoneNumberValidationMessage');

    emailInput.addEventListener('input', function () {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailPattern.test(emailInput.value)) {

            validationMessage.textContent = '';
            emailInput.style.borderColor = '';
            updateButton.disabled = false;
        } else {
            validationMessage.textContent = 'Please enter a valid email address.';
            emailInput.style.borderColor = '#FE5A3E';
            updateButton.disabled = true;
        }
    });

    tuptIdInput.addEventListener('input', function () {
        const tuptIdPattern = /^TUPT-\d{2}-\d{4}$/;
        if (tuptIdPattern.test(tuptIdInput.value)) {
            tuptIdValidationMessage.textContent = '';
            tuptIdInput.style.borderColor = '';
            updateButton.disabled = false;
        } else {
            tuptIdValidationMessage.textContent = 'Please enter a valid TUPT ID';
            tuptIdInput.style.borderColor = '#FE5A3E';
            updateButton.disabled = true;
        }
    });

    phoneNumberInput.addEventListener('input', function () {
        const phoneNumberPattern = /^09\d{9}$/;
        if (phoneNumberPattern.test(phoneNumberInput.value)) {
            phoneNumberValidationMessage.textContent = '';
            phoneNumberInput.style.borderColor = '';
            updateButton.disabled = false;
        } else {
            phoneNumberValidationMessage.textContent = 'Please enter a valid phone number';
            phoneNumberInput.style.borderColor = '#FE5A3E';
            updateButton.disabled = true;
        }
    });
</script>

<?= $this->endSection() ?>