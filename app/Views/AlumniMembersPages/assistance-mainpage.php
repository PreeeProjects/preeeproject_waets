<?= $this->extend('/AlumniMembersComponents/alumni-main-layout') ?>
<?= $this->section('section') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mt-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-0 mb-4">
                <li class="breadcrumb-item">
                    <a href="/AlumniController/Dashboard" class="text-danger">WAETS</a>
                </li>
                <li class="breadcrumb-item active"><span>Assistance</span></li>
            </ol>
        </nav>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0"><strong>Assistance</strong></h4>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <?php if ($info): ?>
            <?php foreach ($info as $assistance): ?>
                <div class="col-sm-4 mb-3">
                    <div class="card" id="card-effect">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="m-0 fw-bold text-danger"><?= $assistance['title'] ?></h4>
                                <!-- <div class="">
                                    <div class="">
                                        <button type="button" class="btn rounded-pill btn-outline-danger joinBtn">
                                            <span class="tf-icons bx bx-link-alt"></span>&nbsp;<span
                                                class="joinText">JOIN</span>
                                        </button>

                                    </div>
                                </div> -->
                                <img src="/assets/logo_folder/logo-transparent.png" class="m-0"
                                    style="height: 30px; width: auto;" />
                            </div>
                        </div>
                        <hr class="m-0">

                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>What: <?= $assistance['what'] ?></li>
                                <li>When: <?= $assistance['when'] ?></li>
                                <li>Where: <?= $assistance['where'] ?></li>
                                <li>Qualification: <?= $assistance['qualification'] ?></li>
                            </ul>
                            <p class="card-text"> Details: <?= $assistance['details'] ?></p>
                        </div>
                        <hr class="m-0">


                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center fst-italic mt-5 mb-5">
                <h3 class="mb-0">NO DATA</h3>
                <small>Unfortunately, it seems there are no posts available</small>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- <script>
    document.querySelectorAll(".joinBtn").forEach(function (button) {
        button.addEventListener("click", function () {
            var joinText = this.querySelector(".joinText");

            if (joinText.textContent === "JOIN") {
                // Change text to "JOINED" and add shading
                joinText.textContent = "JOINED";
                this.classList.add("red");

                // Send AJAX request to AssitanceJoin() function
                fetch("/AlumniAssociationController/AssitanceJoin", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest"
                    },
                    body: JSON.stringify({})
                })
                    .then(response => response.text())
                    .then(data => {
                        console.log("Response:", data);
                    })
                    .catch(error => console.error("Error:", error));

            } else {
                // Change text to "JOIN" and remove shading
                joinText.textContent = "JOIN";
                this.classList.remove("red");
            }
        });
    });
</script> -->



<?= $this->endSection(); ?>