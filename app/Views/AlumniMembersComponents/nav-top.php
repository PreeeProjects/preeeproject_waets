<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <small class="text-black">Alumni Engagement Tracking System</small>

        <div class="ms-auto">
            <div class="row">
                <div class="col pe-0 navbar-nav flex-row align-items-center">
                    <button class="btn btn-secondary rounded-pill dropdown-toggle d-flex align-items-center hide-arrow"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-bell fs-small me-2"></i>
                        Notification
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-scroll"
                        style="max-height: 500px; overflow-y: auto; min-width: 500px;">
                        <div class="my-3 px-3 border-bottom">
                            <h5>
                                <strong>Notification</strong>
                            </h5>
                        </div>

                        <!-- <li class="dropdown-item border-bottom mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong class="text-primary">Sample Notification</strong>
                                <small>January 31, 2026</small>
                            </div>
                            Contents of the notification is placed here!
                        </li> -->

                        <?php if (!empty($notif)): ?>
                            <?php foreach ($notif as $_column): ?>
                                <li class="dropdown-item border-bottom mb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <strong class="text-primary"><?= $_column['context']; ?></strong>
                                        <small><?= $_column['date_time']; ?></small>
                                    </div>
                                    <?= $_column['content']; ?>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="dropdown-item text-center my-5">
                                <span class="fst-italic">There are no notification/s!</span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="col ps-1">
                    <ul class="navbar-nav flex-row align-items-center">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <i data-bs-toggle="tooltip" data-bs-offset="0,5" data-bs-placement="bottom"
                                        data-bs-html="true" title="Profile">
                                        <img src="<?= session()->get('profile_pic') ?>" alt class="rounded-circle"
                                            height="40" width="40" />
                                    </i>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" style="min-width: 250px;">
                                <li>
                                    <a class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="<?= session()->get('profile_pic') ?>" alt
                                                        class="rounded-circle" height="40" width="40" />
                                                </div>
                                            </div>

                                            <div class="">
                                                <strong><?= session()->get('name') ?></strong><br>
                                                <small>@<?= session()->get('user_logged_un') ?></small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- <li>
                                            <div class="dropdown-divider"></div>
                                        </li> -->
                                <!-- <li>
                                            <a class="dropdown-item" href="/AlumniAssociationController/profile">
                                                <i class="bx bx-user me-2"></i>
                                                <span class="align-middle">My Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/AlumniAssociationController/ProfileEdit">
                                                <i class="bx bx-edit-alt me-2"></i>
                                                <span class="align-middle">Edit Profile</span>
                                            </a>
                                        </li> -->
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a href="/LoginController/logout" class="dropdown-item text-danger mb-2"><i
                                            class="bx bx-log-out-circle me-3"></i>Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </div>
        </div>

    </div>
</nav>