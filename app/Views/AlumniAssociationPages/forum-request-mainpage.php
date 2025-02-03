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

    .description-cell {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        /* Number of lines to display */
        overflow: hidden;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/Dashboard" class="text-primary">WAETS</a>
                </li>
                <li class="breadcrumb-item active"><span>Forum Request Page</span></li>
            </ol>
        </nav>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0"><strong>Forum Request Page</strong></h4>
            </div>
        </div>

        <hr>


        <div class="card-body">
            <?php if ($info): ?>
                <div class="">
                    <table class="" id="forum-request-table">
                        <thead>
                            <tr>
                                <th>Forum Name</th>
                                <th>Description</th>
                                <th>Requestor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($info as $infos): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $infos['forum_name'] ?></td>
                                    <td class=""><?= $infos['description'] ?></td>
                                    <td><?= $infos['created_by'] ?></td>
                                    <td>
                                        <a href="/AlumniAssociationController/RemoveRequest/<?= $infos['forum_id'] ?>"
                                            type="button" class="btn btn-outline-danger btn-sm">Remove</a>
                                        <a href="/AlumniAssociationController/ApprovedRequest/<?= $infos['forum_id'] ?>"
                                            type="button" class="btn btn-outline-primary btn-sm">Approve</a>
                                    </td>
                                </tr>
                                </a>
                            <?php endforeach; ?>
                </div>
                </tbody>
                </table>
            <?php else: ?>
                <div class="text-center fst-italic mt-5 mb-5">
                    <h3 class="mb-0">NO REQUEST</h3>
                    <small>Currently, there are no requests to display.</small>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- F O R U M  M O D A L -->
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

<script>
    new DataTable('#forum-request-table');
</script>

<?= $this->endSection(); ?>