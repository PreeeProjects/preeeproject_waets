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
                    <a href="/AlumniAssociationController/AssistanceMainpage" class="text-primary">Assistance</a>
                </li>
                <li class="breadcrumb-item active"><span>Update Post</span></li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="m-0">Update Post: <?= $title ?></h3>
        </div>
        <hr class="m-0">

        <form action="/AlumniAssociationController/AssistanceEditPost" method="post">
            <div class="card-body">
                <input type="hidden" name="assistance_id" value="<?= $assistance_id ?>">

                <div class="row">
                    <div class="mb-3">
                        <label class="form-label">Theme</label>
                        <input class="form-control" type="text" id="theme" name="theme" value="<?= $title ?>"
                            autofocus />
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">What</label>
                        <input class="form-control" type="text" id="what" name="what" value="<?= $what ?>" autofocus />
                    </div>
                    <div class=" mb-3 col-md-6">
                        <label class="form-label">When</label>
                        <input class="form-control" type="date" name="when" id="when" value="<?= $when ?>" />
                    </div>

                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Where</label>
                        <input class="form-control" type="text" id="where" name="where" value="<?= $where ?>"
                            autofocus />
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Qualifiation</label>
                        <input class="form-control" type="text" name="qualification" id="qualification"
                            value="<?= $qualification ?>" />
                    </div>
                </div>

                <div>
                    <label class="form-label">Details</label>
                    <textarea class="form-control" name="details" id="details"><?= $details ?></textarea>
                </div>
            </div>

            <div class="card-footer border-top text-end">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <a href="/AlumniAssociationController/AssistanceMainpage" class="btn btn-outline-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>
</div <?= $this->endSection();
