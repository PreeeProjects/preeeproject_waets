<?= $this->extend('/AlumniAssociationComponents/main-layout') ?>
<?= $this->section('section') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/Dashboard" class="text-primary">WAETS</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/Members" class="text-primary">School Year</a>
                </li>
                <li class="breadcrumb-item active"><span>Members</span></li>
            </ol>
        </nav>
    </div>


    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="m-0">Members</h2>
                <div>
                    <li class="bx bx-search-alt-2 fs-xlarge text-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#searchBackDropModal"></li>
                    <a href="/AlumniAssociationController/GeneratePDF/<?= $year_graduated_id ?>" target="_blank">
                        <li class="bx bx-printer fs-xlarge me-3"></li>
                    </a>
                    <!-- <li class="bx bx-folder-plus fs-xlarge text-primary" data-bs-toggle="modal"
                        data-bs-target="#addMemberBackDropModal">
                    </li> -->
                </div>
            </div>
        </div>
    </div>

    <!-- A C T I V E  U S E R S -->
    <div class="divider text-start">
        <div class="divider-text">Active Users</div>
    </div>
    <div class="d-flex justify-content-left mb-3">
        <div class="col-lg-7">
            <div class="row">
                <?php
                $count = 0;
                foreach ($members as $member):
                    if ($count >= 10)
                        break;
                    ?>
                    <div class="col-1">
                        <?php if ($member['status'] == 'online'): ?>
                            <div class="avatar avatar-online">
                                <img src="<?= $member['profile_pic'] ?>" alt="<?= $member['full_name'] ?>"
                                    class="rounded-circle" data-bs-toggle="tooltip" data-bs-offset="0,5"
                                    data-bs-placement="bottom" data-bs-html="true"
                                    title="<small><?= $member['full_name'] ?></small>" />
                            </div>
                        <?php elseif ($member['status'] == 'offline'): ?>
                            <div class="avatar avatar-offline">
                                <img src="<?= $member['profile_pic'] ?>" alt="<?= $member['full_name'] ?>"
                                    class="rounded-circle" data-bs-toggle="tooltip" data-bs-offset="0,5"
                                    data-bs-placement="bottom" data-bs-html="true"
                                    title="<small><?= $member['full_name'] ?></small>" />
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php
                    $count++;
                endforeach;
                ?>
            </div>
        </div>
    </div>

    <!-- data-bs-toggle="modal" data-bs-target="#modalCenter" -->


    <!-- D I S P L A Y  M E M B E R S  -->
    <div class="card">
        <div class="card-body">
            <?php if ($members): ?>
                <div class="table-responsive text-nowrap list-group-item-action">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>TUPT-ID</th>
                                <th>Full Name</th>
                                <th>Major</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($members as $member): ?>
                                <a href="/AlumniAssociationController/MemberProfileView/<?= $member['user_id'] ?>">
                                    <tr onclick="window.location='/AlumniAssociationController/MemberProfileView/<?= $member['user_id'] ?>';"
                                        class="list-group-item-action">
                                        <td><?= $member['tupt_id'] ?></td>
                                        <td><?= $member['full_name'] ?></td>
                                        <td><?= $member['major'] ?></td>
                                        <td class="text-center">
                                            <a onclick="return confirm('Are you sure you want to remove <?= $member['full_name'] ?> ?')"
                                                href="/AlumniAssociationController/DeleteMember/<?= $member['user_id'] ?>"
                                                type="button" class="btn btn-outline-danger btn-sm">Remove</a>
                                        </td>
                                    </tr>
                                </a>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="text-center fst-italic mt-5 mb-5">
                        <h3 class="mb-0">NO MEMBER(S)</h3>
                        <small>Unfortunately, no members to display</small>
                    </div>
                <?php endif; ?>
            </div>
        </div>


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

                <h5 class="ml-0 mb-1 fw-bold">Contacts</h5>

                <div id="noDataMessage" class="text-center fst-italic mt-5 mb-5" style="display: none;">
                    <h5 class="mb-0">NO USER FOUND</h5>
                    <small>Unfortunately, it seems the person is not present</small>
                </div>


                <div class="table-responsive text-nowrap mt-3">
                    <table class="table table-borderless" id="myTable">
                        <thead class="d-none">
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>

                        </thead>
                        <tbody>
                            <?php foreach ($members as $member): ?>
                                <tr onclick="window.location='/AlumniAssociationController/MemberProfileView/<?= $member['user_id'] ?>';"
                                    class="member-row">
                                    <td class="pe-0"><img src="<?= $member['profile_pic'] ?>"
                                            alt="<?= $member['full_name'] ?>" class="rounded-circle" height="40"
                                            width="40" /></td>
                                    <td class="ps-0 pe-0 pt-2 pb-0"><?= $member['full_name'] ?></td>
                                    <?php if ($member['status'] == 'online'): ?>
                                        <td class="ps-0 pt-2 pb-0 text-center"><span
                                                class="badge bg-label-primary me-1">Active</span></td>
                                    <?php else: ?>
                                        <td class="ps-0 pt-2 pb-0 text-center"><span
                                                class="badge bg-label-secondary me-1">Offline</span></td>
                                    <?php endif; ?>
                                    <td class="text-center">
                                        <a onclick="return confirm('Are you sure you want to remove <?= $member['full_name'] ?> ?')"
                                            href="/AlumniAssociationController/DeleteMember/<?= $member['user_id'] ?>"
                                            type="button" class="btn btn-outline-danger btn-sm">Remove</a>
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

<!-- A D D  M E M B E R S  M O D A L -->
<div class="modal fade" id="addMemberBackDropModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="post" action="/AlumniAssociationController/AddMember">
            <div class="modal-header">
                <h3 class="modal-title">Add Member</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr class="mb-0">
            <div class="modal-body mb-10">
                <div class="row">
                    <div class="col mb-3">
                        <label for="tuptIdBackdrop" class="form-label">TUPT-ID</label>
                        <input type="text" id="tuptIdBackdrop" class="form-control" name="tupt_id"
                            placeholder="TUPT-XX-XXXX" />
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3 col-md-4">
                        <label for="firstNameBackdrop" class="form-label">FIRST NAME</label>
                        <input type="text" id="firstNameBackdrop" class="form-control" name="fname"
                            placeholder="JOHN" />
                    </div>
                    <div class="col mb-3 col-md-4">
                        <label for="middleNameBackdrop" class="form-label">MIDDLE NAME</label>
                        <input type="text" id="middleNameBackdrop" class="form-control" name="mname"
                            placeholder="CRUZ" />
                    </div>
                    <div class="col mb-3 col-md-4">
                        <label for="lastNameBackdrop" class="form-label">LAST NAME</label>
                        <input type="text" id="lastNameBackdrop" class="form-control" name="lname" placeholder="DOE" />
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="membersSelect" class="form-label">COURSE</label>
                        <select id="membersSelect" class="form-select" name="course"
                            aria-label="Default select example">
                            <?php foreach ($majors as $major): ?>
                                <option value="<?= $major['major_id'] ?>:<?= $major['major_acronym'] ?>">
                                    <?= $major['major_acronym'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <input name="school_year_id" type="hidden" value="<?= $school_year['year_graduated_id'] ?>" />
            <input name="school_year" type="hidden" value="<?= $school_year['year_graduated_id'] ?>" />

            <div class="modal-footer border-top">
                <div class="mt-3">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary pe-5 ps-5">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>



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

<?= $this->endSection() ?>