<?= $this->extend('/AlumniAssociationComponents/main-layout') ?>
<?= $this->section('section') ?>


<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniAssociationController/Dashboard" class="text-primary">WAETS</a>
                </li>
                <li class="breadcrumb-item active"><span>Tracer Study</span></li>
            </ol>
        </nav>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0"><strong>Tracer Study</strong></h4>

                <div>
                    <a href="#">
                        <li class="bx bx-add-to-queue fs-xlarge text-primary" data-bs-toggle="modal"
                            data-bs-target="#backDropModal"></li>
                    </a>
                    </a>
                </div>
            </div>
        </div>

        <hr class="m-0">

        <!-- D I S P L A Y  U P L O A D S  -->
        <div class="card-body">
            <div>
                <?php if (!empty($header)): ?>
                    <table id="tracer-study-table">
                        <thead>
                            <tr>
                                <th>School Year</th>
                                <th>Caption</th>
                                <th>Date Posted</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($header as $headers): ?>
                                <tr class="list-group-item-action">
                                    <td><?= $headers['year_graduated'] ?></td>
                                    <td><?= $headers['caption'] ?></td>
                                    <td><?= $headers['date'] ?></td>
                                    <td class="text-center">
                                        <a href="/AlumniAssociationController/TracerStudyResult/<?= $headers['id'] ?>"><button
                                                class="btn btn-sm btn-primary">View Result</button></a>
                                        <a onclick="return confirm('Deleting <?= $headers['year_graduated'] ?> Tracer Study will also detele its data. Are you sure you want to proceed?')"
                                            href="/AlumniAssociationController/TracerStudyDelete/<?= $headers['id'] ?>">
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <div class="text-center fst-italic mt-5 mb-5">
                                    <h3 class="mb-0">NO SCHOOL YEAR UPLOADED</h3>
                                    <small>Unfortunately, no school year to display</small>
                                </div>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<!--  A D D  S C H O O L  Y E A R  M O D A L -->
<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="post" action="/AlumniAssociationController/PostTracerStudy">
            <div class="modal-header">
                <h3 class="modal-title">Post Tracer Study</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr class="mb-0">
            <div class="modal-body mb-10">
                <div class="row">
                    <div class="col mb-3">
                        <label for="membersSelect" class="form-label">Alumni's Year Graduated</label>
                        <select id="membersSelect" class="form-select" name="year_graduated"
                            aria-label="Default select example">
                            <?php foreach ($year_graduated as $sy): ?>
                                <option value="<?= $sy['year_graduated_id'] ?>:<?= $sy['year_graduated'] ?>">
                                    <?= $sy['year_graduated'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <label for="tuptIdBackdrop" class="form-label">DESCRIPTION / CAPTION</label>
                        <textarea type="text" name="caption" id="tuptIdBackdrop" row="2" class="form-control"
                            name="tupt_id"> </textarea>
                    </div>
                </div>
            </div>


            <div class="modal-footer border-top">
                <div class="mt-3">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary pe-5 ps-5">Post</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    new DataTable('#tracer-study-table');
</script>
<?= $this->endSection(); ?>