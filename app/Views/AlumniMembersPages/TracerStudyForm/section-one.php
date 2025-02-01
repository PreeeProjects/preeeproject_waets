<?= $this->extend('/AlumniMembersComponents/alumni-main-layout') ?>
<?= $this->section('section') ?>


<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniController/Dashboard" class="text-primary">WAEST</a>
                </li>
                <li class="breadcrumb-item active"><span>Tracer Study</span></li>
            </ol>
        </nav>
    </div>

    <div class="card mb-4">

        <div class="card-header text-center d-flex justify-content-between">
            <small>Section: <b>1</b>/8</small>
            <h3 class="mb-0">Tracer Study</h3>
            <small><?= date('M d, Y') ?></small>
        </div>

        <hr class="mt-0">
        <div class="row d-flex justify-content-center align-items-justify mt-3" style="text-align: justify;">
            <div class="col-sm-7">
                <div class="card-body pt-0">
                    <p><b>Good day, Alumni!</b> <br><br>
                        TUP Taguig is conducting a tracer study to keep track of the graduates and their development,
                        check on the employability, and create linkage between TUPT and the alumni. We request to please
                        find time to complete this Graduate Tracer Study (GTS) questionnaire as accurately & frankly as
                        possible. </p>
                    All data obtained in this survey will be processed by the BTVTEd Program Faculty of Technological
                    University of the Philippines Taguig. By answering this form, you hereby allow TUP-Taguig to access
                    and record your personal data. The processing of all personal data shall be governed by the
                    University’s applicable privacy policy and all relevant data protection laws, including Republic Act
                    No. 10173, also known as the Data Privacy Act of 2012. Rest assured that all the answers will be
                    treated with strictest confidentiality. </p>
                    <i>Thank you for your kind cooperation and support.</i>
                    </p>
                </div>
            </div>
        </div>


        <hr class="mt-0">

        <div class="card-footer pt-0">
            <div class="d-flex justify-content-center">
                <a href="/AlumniController/SectionTwo" class="btn btn-primary ps-5 pe-5">Accept</a>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>