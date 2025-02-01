<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <!-- <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" id="searchInput" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
            </div>
        </div> -->
        <!-- /Search -->

        <div class="ms-auto">
            <div class="row">
                <div class="col pe-0 navbar-nav flex-row align-items-center">
                    <button class="btn btn-secondary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-bell fs-small" data-bs-toggle="tooltip" data-bs-offset="0,5" data-bs-placement="bottom" data-bs-html="true" title="Notification"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-scroll" style="max-height: 500px; overflow-y: auto;">
                        <h4 class="dropdown-item border-bottom">Notification
                        </h4>
                        <?php if (!empty($notif)) : ?>
                            <?php foreach ($notif as $_column) : ?>
                                <li class="dropdown-item border-bottom">
                                    <strong class="text-primary"><?= $_column['context']; ?></strong> <?= $_column['content']; ?>
                                    <div><small><?= $_column['date_time']; ?></small></div>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li class="dropdown-item">No notifications</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="col ps-1">
                    <ul class="navbar-nav flex-row align-items-center">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <i data-bs-toggle="tooltip" data-bs-offset="0,5" data-bs-placement="bottom" data-bs-html="true" title="Profile">
                                        <img src="<?= session()->get('profile_pic') ?>" alt class="rounded-circle" height="40" width="40" />
                                    </i>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="/AlumniController/profile">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">

                                                <div class="avatar avatar-online">
                                                    <img src="<?= session()->get('profile_pic') ?>" alt class="rounded-circle" height="40" width="40" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block m-0"><?= session()->get('name') ?></span>
                                                <small class="text-muted">@<?= session()->get('user_logged_un') ?></small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/AlumniController/profile">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/AlumniController/ProfileEdit">
                                        <i class="bx bx-edit-alt me-2"></i>
                                        <span class="align-middle">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/LoginController/logout">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
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