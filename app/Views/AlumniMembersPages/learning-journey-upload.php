<?= $this->extend('/AlumniMembersComponents/alumni-main-layout') ?>
<?= $this->section('section') ?>

<style>
    .image-card {
        position: relative;
        width: 140px;
        height: 140px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        overflow: hidden;
        position: relative;
    }

    .image-card img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    .image-row {
        display: inline-flex;
        flex-wrap: wrap;
    }

    .image-col {
        flex: 0 0 auto;
        margin-right: 20px;
        position: relative;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mt-10">
        <ol class="breadcrumb my-0 ms-0 mb-4">
            <li class="breadcrumb-item">
                <a href="/AlumniController/Dashboard" class="text-primary">WAETS</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/AlumniController/LearningJourney" onclick="return confirm('Photos might not be saved. Are you certain you want to go back?')" class="text-primary">Learning Journey</a>
            </li>
            <li class="breadcrumb-item active"><span>Learning Journey Upload</span></li>
        </ol>
    </div>


    <div class="card">
        <div class="card-header">
            <h3 class="m-0">Create New Post: Learning Journey</h3>
        </div>
        <hr class="m-0">
        <form id="imageUploadForm" action="/AlumniController/LearningJourneyUpload" method="post" enctype="multipart/form-data">
            <div class="card-body">

                <label for="exampleFormControlInput1" class="form-label">Folder Name:</label>
                <input type="text" class="form-control" name="folder_name" id="exampleFormControlInput1" placeholder="Enter folder name">
                <br>
                <div id="imageContainer" class="container m-0 p-0">
                    <div class="image-row content justify-content-center">
                        <!-- First Image -->
                        <div class="image-col">
                            <input type="file" name="image1" id="image1" class="uploadCard" style="display: none;">
                            <label for="image1" class="image-card">
                                <h1 class="text-primary text-center">+</h1>
                            </label>
                        </div>

                        <!-- Second Image -->
                        <div class="image-col">
                            <input type="file" name="image2" id="image2" class="uploadCard" style="display: none;">
                            <label for="image2" class="image-card" style="display: none;">
                                <h1 class="text-primary mt-5 text-center">+</h1>
                            </label>
                        </div>

                        <!-- Third Image -->
                        <div class="image-col">
                            <input type="file" name="image3" id="image3" class="uploadCard" style="display: none;">
                            <label for="image3" class="image-card" style="display: none;">
                                <h1 class="text-primary mt-5 text-center">+</h1>
                            </label>
                        </div>

                        <!-- Fourth Image -->
                        <div class="image-col">
                            <input type="file" name="image4" id="image4" class="uploadCard" style="display: none;">
                            <label for="image4" class="image-card" style="display: none;">
                                <h1 class="text-primary mt-5 text-center">+</h1>
                            </label>
                        </div>

                        <!-- Fifth Image -->
                        <div class="image-col">
                            <input type="file" name="image5" id="image5" class="uploadCard" style="display: none;">
                            <label for="image5" class="image-card" style="display: none;">
                                <h1 class="text-primary mt-5 text-center">+</h1>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer border-top text-end">
                <button type="button" id="uploadButton" class="btn btn-primary me-2 pe-5 ps-5" onclick="submitForm()" disabled>Upload</button>
                <a href="/AlumniController/LearningJourney" onclick="return confirm('Photos might not be saved. Are you certain you want to go back?')" class="btn btn-outline-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
    let imageCount = 0;
    let folderNameInput = document.querySelector('input[name="folder_name"]');
    let uploadButton = document.getElementById('uploadButton');

    document.addEventListener('DOMContentLoaded', function() {
        const MAX_IMAGES = 5;

        const fileInputs = document.querySelectorAll('input[type="file"]');
        const imageLabels = document.querySelectorAll('.image-card');

        fileInputs.forEach(function(input, index) {
            input.addEventListener('change', function() {
                const files = input.files;
                if (files.length > 0) {
                    const file = files[0]; // Get the first selected file
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imageUrl = e.target.result;
                        replaceButtonWithImage(input, imageUrl, index);
                        checkUploadButtonState();
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        folderNameInput.addEventListener('input', function() {
            checkUploadButtonState();
        });

        function replaceButtonWithImage(input, imageUrl, index) {
            imageLabels[index].style.display = 'none'; // Hide the current label (plus sign button)
            const imageContainer = imageLabels[index].parentNode; // Get the parent container
            imageContainer.style.display = 'block'; // Show the container

            const img = document.createElement('img');
            img.src = imageUrl;
            img.style.width = '140px';
            img.style.height = '140px';
            img.style.objectFit = 'cover';
            img.classList.add('uploaded-image');

            imageContainer.appendChild(img); // Append the image

            imageCount++;
            if (imageCount < MAX_IMAGES) {
                imageLabels[index + 1].style.display = 'block'; // Show the next label (plus sign button)
            }
        }

        function checkUploadButtonState() {
            const folderName = folderNameInput.value.trim();
            if (folderName !== '' && imageCount > 0) {
                uploadButton.disabled = false;
            } else {
                uploadButton.disabled = true;
            }
        }

        window.submitForm = function() {
            document.getElementById('imageUploadForm').submit();
        };
    });
</script>



<?= $this->endSection(); ?>