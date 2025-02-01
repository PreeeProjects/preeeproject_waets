<?php
$nav_active = session()->get('nav_active');

$dshbrd = '';
$member = '';
$assistance = '';
$forum = '';
$journey = '';
$job_offer = '';
$others = '';

if ($nav_active == "dashboard") {
    $dshbrd = 'active';
} else if ($nav_active == "members") {
    $member = 'active';
} else if ($nav_active == "assistance") {
    $assistance = 'active';
} else if ($nav_active == "forum") {
    $forum = 'active';
} else if ($nav_active == "learning_journey") {
    $journey = 'active';
} else if ($nav_active == "job_offer") {
    $job_offer = 'active';
}
?>

<style>
    #layout-menu {
        background-color: red;
    }
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand mt-3 d-flex justify-content-center">
        <a href="#" class="app-brand-link">
            <img src="/assets/logo_folder/logo-big-transparent.png" style="height: 150px; width: auto;" />
        </a>

        <a href="#" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none ">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase mt-1">
            <span class="menu-header-text">FEED</span>
        </li>

        <li class="menu-item <?= $dshbrd ?>">
            <a href="/AlumniController/Dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>

        <li class="menu-item <?= $member ?>">
            <a href="/AlumniController/Members" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div data-i18n="Dashboards">Members</div>
            </a>
        </li>

        <li class="menu-item <?= $assistance ?>">
            <a href=" /AlumniController/AssistanceMainpage" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-voice"></i>
                <div data-i18n="Dashboards">Assistance</div>
            </a>
        </li>

        <li class="menu-item <?= $forum ?> ">
            <a href="/AlumniController/ForumMainPage" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group" type='solid'></i>
                <div data-i18n="User interface">Forum</div>
            </a>
        </li>

        <li class="menu-item <?= $journey ?>">
            <a href="/AlumniController/LearningJourney" class="menu-link">
                <i class="menu-icon tf-icons bx bx-photo-album"></i>
                <div data-i18n="Basic">Learning Journey</div>
            </a>
        </li>

        <li class="menu-item text-danger <?= $job_offer ?>">
            <a href="/AlumniController/JobOffer" class="menu-link">
                <i class="menu-icon tf-icons bx bx-briefcase-alt"></i>
                <div data-i18n="Basic">Job Offer</div>
            </a>
        </li>
</aside>