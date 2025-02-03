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
                <li class="breadcrumb-item active"><span>Member Registration Page</span></li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0"><strong>Member Registration Page</strong></h4>
                <!-- <div>
                    <li class="bx bx-search-alt-2 fs-xlarge text-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#searchBackDropModal"></li>
                </div> -->
            </div>
        </div>
        <hr class="m-0">

        <div class="card-body">
            <?php if ($alumni): ?>
                <div class="">
                    <table class="" id="members-registration-table">
                        <thead>
                            <tr>
                                <th>TUPT-ID</th>
                                <th>FULL NAME</th>
                                <th>EMAIL</th>
                                <th>MAJOR</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($alumni as $user): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $user['tupt_id'] ?></td>
                                    <td><?= $user['full_name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['major'] ?></td>
                                    <td>
                                        <a href="/AlumniAssociationController/RemoveRegisteredAlumni/<?= $user['user_id'] ?>"
                                            type="button" class="btn btn-outline-danger btn-sm">Remove</a>
                                        <a href="/AlumniAssociationController/ApproveRegisteredAlumni/<?= $user['user_id'] ?>"
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

<!-- S E A R C H  M O D A L -->
<div class="modal fade" id="searchBackDropModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header m-0">
                <small>Find Others</small>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <hr class="mb-0">

            <div class="modal-body mb-10">
                <form class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
                        <input class="form-control" type="text" id="myInput" onkeyup="myFunction()"
                            placeholder="Name Search..">
                    </div>
                </form><br>

                <h5 class="ml-0 mb-1 fw-bold">Registered Account(s)</h5>

                <div id="noDataMessage" class="text-center fst-italic mt-5 mb-5" style="display: none;">
                    <h5 class="mb-0">NO USER FOUND</h5>
                    <small>Unfortunately, it seems the person is not present</small>
                </div>

                <div class="table-responsive text-nowrap mt-3">
                    <table class="table table-borderless" id="myTable">
                        <thead class="d-none">
                            <th>TUPT-ID</th>
                            <th>Name</th>
                            <th>Action</th>

                        </thead>
                        <tbody>
                            <?php foreach ($alumni as $member): ?>
                                <tr class="member-row">
                                    <td class="ps-0 pe-0 pt-2 pb-0"><?= $member['tupt_id'] ?></td>
                                    <td class="ps-0 pe-0 pt-2 pb-0"><?= $member['full_name'] ?></td>
                                    <td class="text-center">
                                        <a href="/AlumniAssociationController/RemoveRegisteredAlumni/<?= $user['user_id'] ?>"
                                            type="button" class="btn btn-outline-danger btn-sm">Remove</a>
                                        <a href="/AlumniAssociationController/ApproveRegisteredAlumni/<?= $user['user_id'] ?>"
                                            type="button" class="btn btn-outline-primary btn-sm">Approve</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    new DataTable('#members-registration-table');
</script>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        var noDataMessage = document.getElementById("noDataMessage");

        // Hide the message initially
        noDataMessage.style.display = "none";

        // Loop through all table rows, except the first one (header row)
        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Index 1 for the "Name" column
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        // Check if any rows are visible
        var anyRowVisible = Array.from(tr).slice(1).some(row => row.style.display !== 'none');
        if (!anyRowVisible) {
            noDataMessage.style.display = "block"; // Show the message if no rows are visible
        } else {
            noDataMessage.style.display = "none"; // Hide the message if there are visible rows
        }
    }


</script>

<?= $this->endSection(); ?>