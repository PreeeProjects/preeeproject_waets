<?= $this->extend('/AlumniMembersComponents/alumni-main-layout') ?>
<?= $this->section('section') ?>

<div class="container-xxl flex-grow-2 container-p-y">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniController/Dashboard" class="text-danger">WAETS</a>
                </li>
                <li class="breadcrumb-item active"><span>Members</span></li>
            </ol>
        </nav>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0"><strong>Members</strong></h4>
                <a href="#">
                    <li class="bx bx-search-alt-2 fs-xlarge" data-bs-toggle="modal" data-bs-target="#backDropModal">
                    </li>
                </a>
            </div>
        </div>
    </div>

    <!-- A C T I V E  U S E R S -->
    <div class="divider text-start">
        <div class="divider-text text-danger">Active Users</div>
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
                                <img src="<?= $member['profile_pic'] ?>" alt="" class="rounded-circle" data-bs-toggle="tooltip"
                                    data-bs-offset="0,5" data-bs-placement="bottom" data-bs-html="true"
                                    title="<small><?= $member['full_name'] ?></small>" />
                            </div>
                        <?php elseif ($member['status'] == 'offline'): ?>
                            <div class="avatar avatar-offline">
                                <img src="<?= $member['profile_pic'] ?>" alt="" class="rounded-circle" data-bs-toggle="tooltip"
                                    data-bs-offset="0,5" data-bs-placement="bottom" data-bs-html="true"
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

    <!-- Members Section -->
    <div class="row">
        <?php foreach ($members as $member): ?>
            <div class="col-lg-6 mb-3" id="<?= $member['full_name'] ?>">
                <div id="card-effect">
                    <div class="card">
                        <a href="/AlumniController/MemberProfileView/<?= $member['user_id'] ?>">
                            <div class="card-body d-flex text-black">
                                <!-- Profile picture -->
                                <img src="<?= $member['profile_pic'] ?>"
                                    class="rounded-circle me-4 profile-pic expandable-image" height="75" width="75" />

                                <!-- Details -->
                                <div>
                                    <h5 class="mb-2 fw-bold"><?= $member['full_name'] ?></h5>
                                    <span class="mb-1">Email: <?= $member['email'] ?></span><br>
                                    <span class="mb-1">Major: <?= $member['major'] ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- M O D A L -->
    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
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
                            </thead>
                            <tbody>
                                <?php foreach ($members as $member): ?>
                                    <tr onclick="window.location='/AlumniController/MemberProfileView/<?= $member['user_id'] ?>';"
                                        class="member-row">
                                        <td><img src="<?= $member['profile_pic'] ?>" alt="" class="rounded-circle"
                                                height="40" width="40" /></td>
                                        <td class="ps-0 pt-2 pb-0"><?= $member['full_name'] ?></td>
                                        <?php if ($member['status'] == 'online'): ?>
                                            <td class="ps-0 pt-2 pb-0 text-center"><span
                                                    class="badge bg-label-primary me-1">Active</span></td>
                                        <?php else: ?>
                                            <td class="ps-0 pt-2 pb-0 text-center"><span
                                                    class="badge bg-label-secondary me-1">Offline</span></td>
                                        <?php endif; ?>
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