<!-- Success Toast -->
<?php if (session()->get('success')) : ?>
    <div class="bs-toast toast fade bg-success top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-check me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('success'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- Deleted Successfully Toast -->
<?php if (session()->get('deleted')) : ?>
    <div class="bs-toast toast fade bg-danger top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-layer-minus me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('deleted'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- Success Toast -->
<?php if (session()->get('edited')) : ?>
    <div class="bs-toast toast fade bg-success top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-edit-alt me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('edited'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- Posted Successfully Toast -->
<?php if (session()->get('post_added')) : ?>
    <div class="bs-toast toast fade bg-success top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-calendar-check me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('post_added'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- Post Delete Successfully Toast -->
<?php if (session()->get('post_deleted')) : ?>
    <div class="bs-toast toast fade bg-danger top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-calendar-x me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('post_deleted'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- Edited Successfully Toast -->
<?php if (session()->get('post_edited')) : ?>
    <div class="bs-toast toast fade bg-info top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-calendar-edit me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('post_edited'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- Forum added Successfully Toast -->
<?php if (session()->get('forum_added')) : ?>
    <div class="bs-toast toast fade bg-success top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-bookmark-plus me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('forum_added'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- Forum added Successfully Toast -->
<?php if (session()->get('forum_deleted')) : ?>
    <div class="bs-toast toast fade bg-danger top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-bookmark-minus me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('forum_deleted'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- Folder added Successfully Toast -->
<?php if (session()->get('folder_added')) : ?>
    <div class="bs-toast toast fade bg-success top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-folder-plus me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('folder_added'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- Folder deleted Successfully Toast -->
<?php if (session()->get('folder_deleted')) : ?>
    <div class="bs-toast toast fade bg-danger top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-folder-minus me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('folder_deleted'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- Job added Successfully Toast -->
<?php if (session()->get('job_offer_added')) : ?>
    <div class="bs-toast toast fade bg-success top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-paper-plane me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('job_offer_added'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- Job deleted Successfully Toast -->
<?php if (session()->get('job_offer_deleted')) : ?>
    <div class="bs-toast toast fade bg-danger top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-paper-plane me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('job_offer_deleted'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- Security Access -->
<?php if (session()->get('access')) : ?>
    <div class="bs-toast toast fade bg-danger top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-lock-alt me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('access'); ?></div>
        </div>
    </div>
<?php endif; ?>

<!-- OTP Message  -->
<?php if (session()->get('mail_sent')) : ?>
    <div class="bs-toast toast fade bg-success top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-mail-send me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('mail_sent'); ?></div>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->get('mail_failed')) : ?>
    <div class="bs-toast toast fade bg-danger top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-mail-send me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('mail_failed'); ?></div>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->get('otp_wrong')) : ?>
    <div class="bs-toast toast fade bg-danger top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-shield-x me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('otp_wrong'); ?></div>
        </div>
    </div>
<?php endif; ?>


<?php if (session()->get('internet_failed')) : ?>
    <div class="bs-toast toast fade bg-danger top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-wifi-off me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('internet_failed'); ?></div>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->get('unsucessful')) : ?>
    <div class="bs-toast toast fade bg-danger top-0 start-50 translate-middle-x m-2" style="position: absolute; width:auto;" id="validation-container" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="padding-bottom: 10px; padding-top: 10px;">
            <!-- Icon -->
            <i class="bx bx-x fs-xlarge me-2"></i>
            <!-- Message -->
            <div class="me-auto fw-semibold"><?= session()->get('unsucessful'); ?></div>
        </div>
    </div>
<?php endif; ?>

<script>
    setTimeout(function() {
        var toastElement = document.querySelector('.toast');
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
        setTimeout(function() {
            toast.hide();
        }, 50000);
    }, 99);
</script>