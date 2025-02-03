<?= $this->extend('/AlumniAssociationComponents/main-layout') ?>
<?= $this->section('section') ?>

<style>
    .arrow-icon {
        display: none;
    }

    .card:hover .arrow-icon {
        display: inline-block;
    }

    .view-text {
        display: none;
    }

    .card:hover .view-text {
        display: inline;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/Dashboard" class="text-primary">WAETS</a>
                </li>
                <li class="breadcrumb-item active"><span>Forum</span></li>
            </ol>
        </nav>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0"><strong>Forum</strong></h4>
                <li class="bx bx-add-to-queue fs-xlarge text-primary" data-bs-toggle="modal"
                    data-bs-target="#backDropModal"></li>
            </div>
        </div>
    </div>

    <hr>

    <?php if ($info): ?>
        <?php foreach ($info as $infos): ?>
            <div class="card text-white mb-3" id="card-effect">
                <a href="/AlumniAssociationController/ForumVisit/<?= $infos['forum_id'] ?>">
                    <div class="card-body d-flex justify-content-between align-items-center p-3">
                        <div>
                            <small class="text-secondary">#<?= $infos['forum_id'] ?></small>
                            <h3 class="text-primary fw-bold m-0"><?= $infos['forum_name'] ?></h3>
                            <small class="text-secondary mt-2 mb-0"> <?= $infos['description'] ?> </small>
                        </div>
                        <div class="view-text">
                            <small class="text-secondary">Visit
                                <li class="bx bx-right-arrow-alt fs-xlarge arrow-icon"></li>
                            </small>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="text-center fst-italic mt-5 mb-5">
            <h3 class="mb-0">NO DATA</h3>
            <small>Unfortunately, it seems there are no posts available</small>
        </div>
    <?php endif; ?>

    <!-- Modal -->
    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" method="post" action="/AlumniAssociationController/ForumValidation">
                <div class="modal-header">
                    <h3 class="modal-title">Forum Page Form</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr class="mb-0">
                <div class="modal-body mb-10">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBackdrop" class="form-label">Forum Page Name</label>
                            <input type="text" id="nameBackdrop" class="form-control" name="forum_name"
                                placeholder="Enter Name" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="membersSelect" class="form-label">Members</label>
                            <select id="membersSelect" class="form-select" name="major_id"
                                aria-label="Default select example">
                                <?php foreach ($majors as $major): ?>
                                    <option value="<?= $major['major_id'] ?>"><?= $major['major_acronym'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="nameBackdrop" class="form-label mt-0">Description</label>
                            <textarea type="text" id="nameBackdrop" class="form-control" name="description"></textarea>
                        </div>
                    </div>

                </div>

                <div class="modal-footer border-top">
                    <div class="mt-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button href="/AlumniAssociationController/ForumValidation" type="submit"
                            class="btn btn-primary pe-5 ps-5">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>