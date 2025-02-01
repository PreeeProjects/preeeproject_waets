<?= $this->extend('/AlumniAssociationComponents/main-layout') ?>
<?= $this->section('section') ?>


    <style>
        #imagePreview {
            max-width: 100%;
            max-height: 200px;
        }

        #imageOnlyPreview {
            max-width: 100%;
            max-height: 200px;
        }

        .fixed-column {
            position: sticky;
            top: 20px;
            height: 100vh;
            overflow-y: auto;
        }

        @media screen and (max-width: 767px) {
            .fixed-column {
                display: none;
            }
        }

        .image-container {
            position: relative;
            overflow: hidden;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            clip-path: circle(20% at 50% 50%);
        }

        .image-container:hover .overlay {
            opacity: 0.7;
        }

        .overlay a {
            color: white;
            text-decoration: none;
        }
    </style>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="mt-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2 mb-4">
                    <li class="breadcrumb-item">
                        <a href="/AlumniAssociationController/Dashboard" class="text-primary">WAETS</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/AlumniAssociationController/ForumMainPage" class="text-primary">Forum</a>
                    </li>
                    <li class="breadcrumb-item active"><span>Forum Feed</span></li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="text-center">
                            <form id="forum_form" action="/AlumniAssociationController/ModifyForumPhoto" method="post" enctype="multipart/form-data">
                                <div class="image-container position-relative">
                                    <img src="<?= $forum_photo ?>" id="uploadedAvatar" class="rounded-circle mb-1" height="220" width="220" /><br>
                                    <div class="overlay">
                                        <a href="#" onclick="triggerFileUpload(); return false;"><i class="bx bx-upload me-1"></i> Upload</a>
                                    </div>
                                    <div class="d-none">
                                        <input type="file" id="forum_upload" name="forum_pic" onchange="forumImagePreview(this)">
                                        <input type="text" name="forum_visit_id" value="<?= $forum_post_id ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="fw-bold m-0"><?= $forum_name ?></h3>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="fw-bold"><?= $major_acrnm ?></h5>
                            <p class="m-0"><?= $major_title ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card overflow-hidden pb-3 mb-3" style="height: 517px">
                    <h5 class="card-header">Members</h5>
                    <hr class="m-0">
                    <div class="card-body pt-3" id="vertical-example">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-borderless" id="members_table">
                                <thead class="d-none">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($members): ?>
                                    <?php foreach ($members as $members): ?>
                                        <tr>
                                            <td><img src="<?= $members['profile_pic'] ?>" class="rounded-circle" height="40" width="40"></td>
                                            <td class="ps-0 pt-2 pb-0"><?= $members['full_name'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <h3 class="fst-italic text-center">No Members</h3>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="nav-align-top mb-3">
                            <!-- P I L L S -->
                            <ul class="nav nav-pills mb-3" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-caption" aria-controls="navs-pills-top-home" aria-selected="true">
                                        Caption
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-image" aria-controls="navs-pills-top-profile" aria-selected="false">
                                        Image
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-imageCaption" aria-controls="navs-pills-top-messages" aria-selected="false">
                                        Caption with Image
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content col-sm-12">
                                <!-- C A P T I O N  P O S T -->
                                <div class="tab-pane fade show active" id="navs-pills-top-caption" role="tabpanel">
                                    <form method="post" action="/AlumniAssociationController/ForumUpload/<?= $forum_post_id ?>" enctype="multipart/form-data">
                                        <input type="hidden" value="1" name="post_type">
                                        <textarea id="postContent" name="caption" class="form-control mt-0" placeholder="Write something..."></textarea>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-sm ps-5 pe-5 btn-outline-primary mt-3">Post</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- I M A G E  P O S T -->
                                <div class="tab-pane fade" id="navs-pills-top-image" role="tabpanel">
                                    <form method="post" action="/AlumniAssociationController/ForumUpload/<?= $forum_post_id ?>" enctype="multipart/form-data">
                                        <input type="hidden" value="2" name="post_type">
                                        <input type="file" id="image_only_upload" name="image_only_upload" style="display: none;">

                                        <div class="d-flex justify-content-center">
                                            <img id="imageOnlyPreview">
                                        </div>

                                        <div class="text-center mt-2">
                                            <button type="button" id="add_image_only" class="btn btn-outline-primary btn-sm ps-5 pe-5">Choose File</button>
                                            <button type="submit" class="btn btn-outline-primary btn-sm ps-5 pe-5">Post</button>
                                            <p class="mt-2"><b>File Size: </b> <span id="fileSizeImageOnly">No file
                                                selected</span>
                                            </p>

                                            <input type="file" id="image_only_upload" style="display:none;">
                                            <input type="file" id="forum_upload" style="display:none;">
                                            <img id="imageOnlyPreview" style="display:none;">
                                            <img id="uploadedAvatar" style="display:none;">
                                            <form id="forum_form" style="display:none;"></form>
                                        </div>
                                    </form>
                                </div>

                                <!-- I M A G E  A N D  C A P T I O N -->
                                <div class="tab-pane fade" id="navs-pills-top-imageCaption" role="tabpanel">
                                    <form method="post" action="/AlumniAssociationController/ForumUpload/<?= $forum_post_id ?>" enctype="multipart/form-data">
                                        <input type="hidden" value="3" name="post_type">
                                        <input type="file" id="image_upload" name="image_upload" style="display: none;">

                                        <div class="input-group mb-3">
                                            <textarea id="postContent" name="caption" class="form-control mt-0" placeholder="Write something..."></textarea>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <img id="imagePreview">
                                        </div>

                                        <div class="text-center mt-3">
                                            <button type="button" id="add_image" class="btn btn-outline-primary btn-sm ps-5 pe-5">Choose File</button>
                                            <button type="submit" class="btn btn-outline-primary btn-sm ps-5 pe-5">Post</button>
                                            <p class="mt-2"><b>File Size: </b> <span id="fileSizeImage">No file
                                                selected</span>
                                            </p>

                                            <input type="file" id="image_upload" style="display:none;">
                                            <input type="file" id="forum_upload" style="display:none;">
                                            <img id="imagePreview" style="display:none;">
                                            <img id="uploadedAvatar" style="display:none;">
                                            <form id="forum_form" style="display:none;"></form>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>


        <div class="row d-flex justify-content-center">
            <!--  F O R U M S -->
            <div class="col-sm-4 fixed-column mb-0">
                <div class="card">
                    <div class="card-body m-0">
                        <div class="text-center">
                            <div class="mt-2">
                                <h4 class="fw-bold text-primary m-0">Visit Other Forums</h4>
                                <small>Come and Visit us!</small>
                                <br><br>
                                <?php if ($other_forums): ?>
                                    <?php foreach ($other_forums as $other_forum): ?>
                                        <a href="/AlumniAssociationController/ForumVisit/<?= $other_forum['forum_id'] ?>" class="list-group-item list-group-item-action p-2"><?= $other_forum['forum_name'] ?></a>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="text-center fst-italic mt-5 mb-5">
                                        <h3 class="mb-0">NO DATA</h3>
                                        <small>Unfortunately, it seems there are no posts available</small>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <a onclick="return confirm('Are you sure you want to delete? All post will be deleted.')" href="/AlumniAssociationController/DeleteForumAll/<?= $forum_post_id ?>"><button class="btn btn-sm btn-danger form-control mt-3">Delete Forum</button></a>
            </div>

            <!-- F O R U M -->
            <div class="col-sm-8">
                <?php if ($forum_posts): ?>
                    <?php foreach ($forum_posts as $forums): ?>
                        <!-- C A P T I O N  P O S T -->
                        <?php if ($forums['post_type'] == '1'): ?>
                            <div class="row d-flex justify-content-end">
                                <div class="col-sm-12">
                                    <div class="card mb-3">
                                        <!-- POST TITLE -->
                                        <div class="card-body pb-1">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <h5 class="card-title fw-bold m-0"><span style="font-size: 20px;">&#x1F4E2;</span><?= $forum_name ?></h5>
                                                    <small class="text-muted fst-italic mb-1">Posted By <?= $forums['posted_by'] ?></small>
                                                    <p class="card-text">
                                                        <?= $forums['caption'] ?>
                                                    </p>
                                                </div>

                                                <?php if ($forums['posted_by'] == session()->get('name')): ?>
                                                    <!-- DELETE -->
                                                    <div class="col-sm-1">
                                                        <a onclick="return confirm('Are you sure you want to delete this post?')" class="text-black" href="/AlumniAssociationController/DeleteForumPost/<?= $forums['forum_post_id'] ?>/<?= $forum_post_id ?>"><i class=" menu-icon tf-icons bx bx-trash"></i></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <hr class="mb-0">

                                        <!-- COMMENTS -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#comment-<?= $forums['forum_post_id'] ?>" aria-expanded="false" aria-controls="comment-<?= $forums['forum_post_id'] ?>">
                                                    <small><i><?= countComments($_comment_info, $forums['forum_post_id']) ?> Comments</i></small>
                                                </button>
                                            </h2>

                                            <div id="comment-<?= $forums['forum_post_id'] ?>" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?php $_has_comment = false ?>
                                                    <?php foreach ($_comment_info as $_column): ?>
                                                        <?php if ($_column['forum_post_id'] == $forums['forum_post_id']): ?>
                                                            <?php $_has_comment = true ?>
                                                            <?php if ($_column['user_id'] == session()->get('user_id')): ?>
                                                                <!-- COMMENT SECTION -->
                                                                <div class="comment-section">
                                                                    <!-- MAIN COMMENT -->
                                                                    <div class="d-flex align-items-start mb-3">
                                                                        <div class="me-3">
                                                                            <img src="<?= $_column['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                        </div>
                                                                        <div class="flex-grow-1">
                                                                            <div class="">
                                                                                <strong><?= $_column['user_name'] ?></strong>
                                                                                <small class="text-muted ms-2 fs-sm"><?= $_column['date_time'] ?></small>
                                                                                <a class="text-black ms-2" href="/AlumniAssociationController/ForumCommentDelete/<?= $_column['comment_id'] ?>"><i class="bx bx-trash"></i></a>
                                                                            </div>
                                                                            <div>
                                                                                <p class="mb-0"><?= $_column['comment'] ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- OUTPUT REPLIES -->
                                                                    <?php foreach ($_commentSubInfo as $_column_sub_comment): ?>
                                                                        <?php if ($_column_sub_comment['comment_id'] == $_column['comment_id']): ?>
                                                                            <?php if ($_column_sub_comment['user_id'] == session()->get('user_id')): ?>
                                                                                <!-- CURRENT USER POSTS -->
                                                                                <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                    <div class="me-3">
                                                                                        <img src="<?= $_column_sub_comment['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                                    </div>
                                                                                    <div class="flex-grow-1">
                                                                                        <div class="">
                                                                                            <strong><small class="text-muted">Replied: </small><?= $_column_sub_comment['user_name'] ?></strong>
                                                                                            <small class="text-muted ms-2"><?= $_column_sub_comment['date_time'] ?></small>
                                                                                            <a class="text-black ms-2" href="/AlumniAssociationController/ForumCommentSubDelete/<?= $_column_sub_comment['forum_comments_sub_id'] ?>"><i class="bx bx-trash"></i></a>
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="mb-0"><?= $_column_sub_comment['comment_reply'] ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php else: ?>
                                                                                <!-- OTHER USER COMMENTS -->
                                                                                <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                    <div class="me-3">
                                                                                        <img src="<?= $_column_sub_comment['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                                    </div>
                                                                                    <div class="flex-grow-1">
                                                                                        <div class="">
                                                                                            <strong><small class="text-muted">Replied: </small><?= $_column_sub_comment['user_name'] ?></strong>
                                                                                            <small class="text-muted ms-2"><?= $_column_sub_comment['date_time'] ?></small>
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="mb-0"><?= $_column_sub_comment['comment_reply'] ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>

                                                                    <!-- REPLY FORM -->
                                                                    <form action="/AlumniAssociationController/ForumCommentSub" method="post">
                                                                        <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                            <div class="flex-grow-1">
                                                                                <input type="text" name="_rqst_comment_reply" id="" class="form-control rounded-pill" placeholder="Enter comment here...">
                                                                                <input type="hidden" name="_rqst_reply_post_id" value="<?= $forums['forum_post_id'] ?>">
                                                                                <input type="hidden" name="_rqst_reply_comment_id" value="<?= $_column['comment_id'] ?>">
                                                                            </div>

                                                                            <div class="ms-3">
                                                                                <button class="btn btn-secondary btn-block rounded-pill">Reply</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <?php else: ?>
                                                                <!-- COMMENT SECTION -->
                                                                <div class="comment-section">
                                                                    <!-- MAIN COMMENT -->
                                                                    <div class="d-flex align-items-start mb-3">
                                                                        <div class="me-3">
                                                                            <img src="<?= $_column['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                        </div>
                                                                        <div class="flex-grow-1">
                                                                            <div class="">
                                                                                <strong><?= $_column['user_name'] ?></strong>
                                                                                <small class="text-muted ms-2 fs-sm"><?= $_column['date_time'] ?></small>
                                                                            </div>
                                                                            <div>
                                                                                <p class="mb-0"><?= $_column['comment'] ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- OUTPUT REPLIES -->
                                                                    <?php foreach ($_commentSubInfo as $_column_sub_comment): ?>
                                                                        <?php if ($_column_sub_comment['comment_id'] == $_column['comment_id']): ?>
                                                                            <?php if ($_column_sub_comment['user_id'] == session()->get('user_id')): ?>
                                                                                <!-- CURRENT USER POSTS -->
                                                                                <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                    <div class="me-3">
                                                                                        <img src="<?= $_column_sub_comment['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                                    </div>
                                                                                    <div class="flex-grow-1">
                                                                                        <div class="">
                                                                                            <strong><small class="text-muted">Replied: </small><?= $_column_sub_comment['user_name'] ?></strong>
                                                                                            <small class="text-muted ms-2"><?= $_column_sub_comment['date_time'] ?></small>
                                                                                            <a class="text-black ms-2" href="/AlumniAssociationController/ForumCommentSubDelete/<?= $_column_sub_comment['forum_comments_sub_id'] ?>"><i class="bx bx-trash"></i></a>
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="mb-0"><?= $_column_sub_comment['comment_reply'] ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php else: ?>
                                                                                <!-- OTHER USER COMMENTS -->
                                                                                <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                    <div class="me-3">
                                                                                        <img src="<?= $_column_sub_comment['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                                    </div>
                                                                                    <div class="flex-grow-1">
                                                                                        <div class="">
                                                                                            <strong><small class="text-muted">Replied: </small><?= $_column_sub_comment['user_name'] ?></strong>
                                                                                            <small class="text-muted ms-2"><?= $_column_sub_comment['date_time'] ?></small>
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="mb-0"><?= $_column_sub_comment['comment_reply'] ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>

                                                                    <!-- REPLY FORM -->
                                                                    <form action="/AlumniAssociationController/ForumCommentSub" method="post">
                                                                        <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                            <div class="flex-grow-1">
                                                                                <input type="text" name="_rqst_comment_reply" id="" class="form-control rounded-pill" placeholder="Enter comment here...">
                                                                                <input type="hidden" name="_rqst_reply_post_id" value="<?= $forums['forum_post_id'] ?>">
                                                                                <input type="hidden" name="_rqst_reply_comment_id" value="<?= $_column['comment_id'] ?>">
                                                                            </div>

                                                                            <div class="ms-3">
                                                                                <button class="btn btn-secondary btn-block rounded-pill">Reply</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>

                                                    <!-- NO COMMENT -->
                                                    <?php if (!$_has_comment): ?>
                                                        <div class="text-center fst-italic mt-5 mb-5">
                                                            <h3 class="mb-0">NO COMMENTS</h3>
                                                            <small>Unfortunately, no one commented in this post</small>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="row mt-2">
                                                        <form action="/AlumniAssociationController/ForumCommentCreate" method="post">
                                                            <div class="row">
                                                                <div class="col-sm-10 pe-1">
                                                                    <input type="text" name="_rqst_comment" id="" class="form-control rounded-pill" placeholder="Enter comment here...">
                                                                    <input type="hidden" name="_rqst_post_id" value="<?= $forums['forum_post_id'] ?>">
                                                                </div>
                                                                <div class="col-sm-2 text-center pe-0 ps-0">
                                                                    <button class="btn btn-primary btn-block rounded-pill">Comment</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- I M A G E  P O S T -->
                        <?php elseif ($forums['post_type'] == '2'): ?>
                            <div class="row d-flex justify-content-end">
                                <div class="col-sm-12">
                                    <div class="card mb-3">
                                        <img class="card-img-top" src="<?= $forums['image'] ?>" alt="Card image cap">
                                        <div class="card-body pb-1">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <small class="text-muted fst-italic mb-1">Posted By:
                                                        <?= $forums['posted_by'] ?></small></br>
                                                    <small class="text-muted"><?= $forums['date'] ?></small>
                                                </div>

                                                <?php if ($forums['posted_by'] == session()->get('name')): ?>
                                                    <!-- DELETE -->
                                                    <div class="col-sm-1">
                                                        <a onclick="return confirm('Are you sure you want to delete this post?')" class="text-black" href="/AlumniAssociationController/DeleteForumPost/<?= $forums['forum_post_id'] ?>/<?= $forum_post_id ?>"><i class=" menu-icon tf-icons bx bx-trash"></i></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <hr class="mb-0">

                                        <!-- COMMENTS -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#comment-<?= $forums['forum_post_id'] ?>" aria-expanded="false" aria-controls="comment-<?= $forums['forum_post_id'] ?>">
                                                    <small><i><?= countComments($_comment_info, $forums['forum_post_id']) ?> Comments</i></small>
                                                </button>
                                            </h2>

                                            <div id="comment-<?= $forums['forum_post_id'] ?>" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?php $_has_comment = false ?>
                                                    <?php foreach ($_comment_info as $_column): ?>
                                                        <?php if ($_column['forum_post_id'] == $forums['forum_post_id']): ?>
                                                            <?php $_has_comment = true ?>
                                                            <?php if ($_column['user_id'] == session()->get('user_id')): ?>
                                                                <!-- COMMENT SECTION -->
                                                                <div class="comment-section">
                                                                    <!-- MAIN COMMENT -->
                                                                    <div class="d-flex align-items-start mb-3">
                                                                        <div class="me-3">
                                                                            <img src="<?= $_column['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                        </div>
                                                                        <div class="flex-grow-1">
                                                                            <div class="">
                                                                                <strong><?= $_column['user_name'] ?></strong>
                                                                                <small class="text-muted ms-2 fs-sm"><?= $_column['date_time'] ?></small>
                                                                                <a class="text-black ms-2" href="/AlumniAssociationController/ForumCommentDelete/<?= $_column['comment_id'] ?>"><i class="bx bx-trash"></i></a>
                                                                            </div>
                                                                            <div>
                                                                                <p class="mb-0"><?= $_column['comment'] ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- OUTPUT REPLIES -->
                                                                    <?php foreach ($_commentSubInfo as $_column_sub_comment): ?>
                                                                        <?php if ($_column_sub_comment['comment_id'] == $_column['comment_id']): ?>
                                                                            <?php if ($_column_sub_comment['user_id'] == session()->get('user_id')): ?>
                                                                                <!-- CURRENT USER POSTS -->
                                                                                <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                    <div class="me-3">
                                                                                        <img src="<?= $_column_sub_comment['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                                    </div>
                                                                                    <div class="flex-grow-1">
                                                                                        <div class="">
                                                                                            <strong><small class="text-muted">Replied: </small><?= $_column_sub_comment['user_name'] ?></strong>
                                                                                            <small class="text-muted ms-2"><?= $_column_sub_comment['date_time'] ?></small>
                                                                                            <a class="text-black ms-2" href="/AlumniAssociationController/ForumCommentSubDelete/<?= $_column_sub_comment['forum_comments_sub_id'] ?>"><i class="bx bx-trash"></i></a>
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="mb-0"><?= $_column_sub_comment['comment_reply'] ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php else: ?>
                                                                                <!-- OTHER USER COMMENTS -->
                                                                                <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                    <div class="me-3">
                                                                                        <img src="<?= $_column_sub_comment['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                                    </div>
                                                                                    <div class="flex-grow-1">
                                                                                        <div class="">
                                                                                            <strong><small class="text-muted">Replied: </small><?= $_column_sub_comment['user_name'] ?></strong>
                                                                                            <small class="text-muted ms-2"><?= $_column_sub_comment['date_time'] ?></small>
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="mb-0"><?= $_column_sub_comment['comment_reply'] ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>

                                                                    <!-- REPLY FORM -->
                                                                    <form action="/AlumniAssociationController/ForumCommentSub" method="post">
                                                                        <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                            <div class="flex-grow-1">
                                                                                <input type="text" name="_rqst_comment_reply" id="" class="form-control rounded-pill" placeholder="Enter comment here...">
                                                                                <input type="hidden" name="_rqst_reply_post_id" value="<?= $forums['forum_post_id'] ?>">
                                                                                <input type="hidden" name="_rqst_reply_comment_id" value="<?= $_column['comment_id'] ?>">
                                                                            </div>

                                                                            <div class="ms-3">
                                                                                <button class="btn btn-secondary btn-block rounded-pill">Reply</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <?php else: ?>
                                                                <!-- COMMENT SECTION -->
                                                                <div class="comment-section">
                                                                    <!-- MAIN COMMENT -->
                                                                    <div class="d-flex align-items-start mb-3">
                                                                        <div class="me-3">
                                                                            <img src="<?= $_column['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                        </div>
                                                                        <div class="flex-grow-1">
                                                                            <div class="">
                                                                                <strong><?= $_column['user_name'] ?></strong>
                                                                                <small class="text-muted ms-2 fs-sm"><?= $_column['date_time'] ?></small>
                                                                            </div>
                                                                            <div>
                                                                                <p class="mb-0"><?= $_column['comment'] ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- OUTPUT REPLIES -->
                                                                    <?php foreach ($_commentSubInfo as $_column_sub_comment): ?>
                                                                        <?php if ($_column_sub_comment['comment_id'] == $_column['comment_id']): ?>
                                                                            <?php if ($_column_sub_comment['user_id'] == session()->get('user_id')): ?>
                                                                                <!-- CURRENT USER POSTS -->
                                                                                <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                    <div class="me-3">
                                                                                        <img src="<?= $_column_sub_comment['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                                    </div>
                                                                                    <div class="flex-grow-1">
                                                                                        <div class="">
                                                                                            <strong><small class="text-muted">Replied: </small><?= $_column_sub_comment['user_name'] ?></strong>
                                                                                            <small class="text-muted ms-2"><?= $_column_sub_comment['date_time'] ?></small>
                                                                                            <a class="text-black ms-2" href="/AlumniAssociationController/ForumCommentSubDelete/<?= $_column_sub_comment['forum_comments_sub_id'] ?>"><i class="bx bx-trash"></i></a>
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="mb-0"><?= $_column_sub_comment['comment_reply'] ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php else: ?>
                                                                                <!-- OTHER USER COMMENTS -->
                                                                                <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                    <div class="me-3">
                                                                                        <img src="<?= $_column_sub_comment['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                                    </div>
                                                                                    <div class="flex-grow-1">
                                                                                        <div class="">
                                                                                            <strong><small class="text-muted">Replied: </small><?= $_column_sub_comment['user_name'] ?></strong>
                                                                                            <small class="text-muted ms-2"><?= $_column_sub_comment['date_time'] ?></small>
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="mb-0"><?= $_column_sub_comment['comment_reply'] ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>

                                                                    <!-- REPLY FORM -->
                                                                    <form action="/AlumniAssociationController/ForumCommentSub" method="post">
                                                                        <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                            <div class="flex-grow-1">
                                                                                <input type="text" name="_rqst_comment_reply" id="" class="form-control rounded-pill" placeholder="Enter comment here...">
                                                                                <input type="hidden" name="_rqst_reply_post_id" value="<?= $forums['forum_post_id'] ?>">
                                                                                <input type="hidden" name="_rqst_reply_comment_id" value="<?= $_column['comment_id'] ?>">
                                                                            </div>

                                                                            <div class="ms-3">
                                                                                <button class="btn btn-secondary btn-block rounded-pill">Reply</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>

                                                    <!-- NO COMMENT -->
                                                    <?php if (!$_has_comment): ?>
                                                        <div class="text-center fst-italic mt-5 mb-5">
                                                            <h3 class="mb-0">NO COMMENTS</h3>
                                                            <small>Unfortunately, no one commented in this post</small>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="row mt-2">
                                                        <form action="/AlumniAssociationController/ForumCommentCreate" method="post">
                                                            <div class="row">
                                                                <div class="col-sm-10 pe-1">
                                                                    <input type="text" name="_rqst_comment" id="" class="form-control rounded-pill" placeholder="Enter comment here...">
                                                                    <input type="hidden" name="_rqst_post_id" value="<?= $forums['forum_post_id'] ?>">
                                                                </div>
                                                                <div class="col-sm-2 text-center pe-0 ps-0">
                                                                    <button class="btn btn-primary btn-block rounded-pill">Comment</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- C A P T I O N / I M A G E  P O S T -->
                        <?php elseif ($forums['post_type'] == '3'): ?>
                            <div class="row d-flex justify-content-end">
                                <div class="col-sm-12">
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img class="card-img" src="<?= $forums['image'] ?>" style="object-fit: cover; height: 100%;">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body pb-1">
                                                    <div class="row">
                                                        <div class="col-sm-11">
                                                            <h5 class="card-title fw-bold m-0"><span style="font-size: 20px;">&#x1F4E2;</span> <?= $forum_name ?></h5>
                                                            <small class="text-muted fst-italic mb-1">Posted By:
                                                                <?= $forums['posted_by'] ?></small>
                                                            <!-- <small class="text-muted fst-italic"><?= $forums['date'] ?></small> -->

                                                            <p class="card-text mt-3">
                                                                Caption: <?= $forums['caption'] ?>
                                                            </p>
                                                        </div>

                                                        <?php if ($forums['posted_by'] == session()->get('name')): ?>
                                                            <!-- DELETE -->
                                                            <div class="col-sm-1">
                                                                <a  onclick="return confirm('Are you sure you want to delete this post?')" class="text-black" href="/AlumniAssociationController/DeleteForumPost/<?= $forums['forum_post_id'] ?>/<?= $forum_post_id ?>"><i class=" menu-icon tf-icons bx bx-trash"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="mb-0">
                                        <div class="card-footer p-0">
                                            <!-- COMMENTS -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#comment-<?= $forums['forum_post_id'] ?>" aria-expanded="false" aria-controls="comment-<?= $forums['forum_post_id'] ?>">
                                                        <small><i><?= countComments($_comment_info, $forums['forum_post_id']) ?> Comments</i></small>
                                                    </button>
                                                </h2>

                                                <div id="comment-<?= $forums['forum_post_id'] ?>" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <?php $_has_comment = false ?>
                                                        <?php foreach ($_comment_info as $_column): ?>
                                                            <?php if ($_column['forum_post_id'] == $forums['forum_post_id']): ?>
                                                                <?php $_has_comment = true ?>
                                                                <?php if ($_column['user_id'] == session()->get('user_id')): ?>
                                                                    <!-- COMMENT SECTION -->
                                                                    <div class="comment-section">
                                                                        <!-- MAIN COMMENT -->
                                                                        <div class="d-flex align-items-start mb-3">
                                                                            <div class="me-3">
                                                                                <img src="<?= $_column['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <div class="">
                                                                                    <strong><?= $_column['user_name'] ?></strong>
                                                                                    <small class="text-muted ms-2 fs-sm"><?= $_column['date_time'] ?></small>
                                                                                    <a class="text-black ms-2" href="/AlumniAssociationController/ForumCommentDelete/<?= $_column['comment_id'] ?>"><i class="bx bx-trash"></i></a>
                                                                                </div>
                                                                                <div>
                                                                                    <p class="mb-0"><?= $_column['comment'] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- OUTPUT REPLIES -->
                                                                        <?php foreach ($_commentSubInfo as $_column_sub_comment): ?>
                                                                            <?php if ($_column_sub_comment['comment_id'] == $_column['comment_id']): ?>
                                                                                <?php if ($_column_sub_comment['user_id'] == session()->get('user_id')): ?>
                                                                                    <!-- CURRENT USER POSTS -->
                                                                                    <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                        <div class="me-3">
                                                                                            <img src="<?= $_column_sub_comment['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1">
                                                                                            <div class="">
                                                                                                <strong><small class="text-muted">Replied: </small><?= $_column_sub_comment['user_name'] ?></strong>
                                                                                                <small class="text-muted ms-2"><?= $_column_sub_comment['date_time'] ?></small>
                                                                                                <a class="text-black ms-2" href="/AlumniAssociationController/ForumCommentSubDelete/<?= $_column_sub_comment['forum_comments_sub_id'] ?>"><i class="bx bx-trash"></i></a>
                                                                                            </div>
                                                                                            <div>
                                                                                                <p class="mb-0"><?= $_column_sub_comment['comment_reply'] ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php else: ?>
                                                                                    <!-- OTHER USER COMMENTS -->
                                                                                    <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                        <div class="me-3">
                                                                                            <img src="<?= $_column_sub_comment['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1">
                                                                                            <div class="">
                                                                                                <strong><small class="text-muted">Replied: </small><?= $_column_sub_comment['user_name'] ?></strong>
                                                                                                <small class="text-muted ms-2"><?= $_column_sub_comment['date_time'] ?></small>
                                                                                            </div>
                                                                                            <div>
                                                                                                <p class="mb-0"><?= $_column_sub_comment['comment_reply'] ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>

                                                                        <!-- REPLY FORM -->
                                                                        <form action="/AlumniAssociationController/ForumCommentSub" method="post">
                                                                            <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                <div class="flex-grow-1">
                                                                                    <input type="text" name="_rqst_comment_reply" id="" class="form-control rounded-pill" placeholder="Enter comment here...">
                                                                                    <input type="hidden" name="_rqst_reply_post_id" value="<?= $forums['forum_post_id'] ?>">
                                                                                    <input type="hidden" name="_rqst_reply_comment_id" value="<?= $_column['comment_id'] ?>">
                                                                                </div>

                                                                                <div class="ms-3">
                                                                                    <button class="btn btn-secondary btn-block rounded-pill">Reply</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                <?php else: ?>
                                                                    <!-- COMMENT SECTION -->
                                                                    <div class="comment-section">
                                                                        <!-- MAIN COMMENT -->
                                                                        <div class="d-flex align-items-start mb-3">
                                                                            <div class="me-3">
                                                                                <img src="<?= $_column['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <div class="">
                                                                                    <strong><?= $_column['user_name'] ?></strong>
                                                                                    <small class="text-muted ms-2 fs-sm"><?= $_column['date_time'] ?></small>
                                                                                </div>
                                                                                <div>
                                                                                    <p class="mb-0"><?= $_column['comment'] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- OUTPUT REPLIES -->
                                                                        <?php foreach ($_commentSubInfo as $_column_sub_comment): ?>
                                                                            <?php if ($_column_sub_comment['comment_id'] == $_column['comment_id']): ?>
                                                                                <?php if ($_column_sub_comment['user_id'] == session()->get('user_id')): ?>
                                                                                    <!-- CURRENT USER POSTS -->
                                                                                    <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                        <div class="me-3">
                                                                                            <img src="<?= $_column_sub_comment['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1">
                                                                                            <div class="">
                                                                                                <strong><small class="text-muted">Replied: </small><?= $_column_sub_comment['user_name'] ?></strong>
                                                                                                <small class="text-muted ms-2"><?= $_column_sub_comment['date_time'] ?></small>
                                                                                                <a class="text-black ms-2" href="/AlumniAssociationController/ForumCommentSubDelete/<?= $_column_sub_comment['forum_comments_sub_id'] ?>"><i class="bx bx-trash"></i></a>
                                                                                            </div>
                                                                                            <div>
                                                                                                <p class="mb-0"><?= $_column_sub_comment['comment_reply'] ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php else: ?>
                                                                                    <!-- OTHER USER COMMENTS -->
                                                                                    <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                        <div class="me-3">
                                                                                            <img src="<?= $_column_sub_comment['user_image_path'] ?>" alt="User Image" class="rounded-circle" height="45" width="45" />
                                                                                        </div>
                                                                                        <div class="flex-grow-1">
                                                                                            <div class="">
                                                                                                <strong><small class="text-muted">Replied: </small><?= $_column_sub_comment['user_name'] ?></strong>
                                                                                                <small class="text-muted ms-2"><?= $_column_sub_comment['date_time'] ?></small>
                                                                                            </div>
                                                                                            <div>
                                                                                                <p class="mb-0"><?= $_column_sub_comment['comment_reply'] ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>

                                                                        <!-- REPLY FORM -->
                                                                        <form action="/AlumniAssociationController/ForumCommentSub" method="post">
                                                                            <div class="d-flex align-items-start mb-3 ms-5 position-relative">
                                                                                <div class="flex-grow-1">
                                                                                    <input type="text" name="_rqst_comment_reply" id="" class="form-control rounded-pill" placeholder="Enter comment here...">
                                                                                    <input type="hidden" name="_rqst_reply_post_id" value="<?= $forums['forum_post_id'] ?>">
                                                                                    <input type="hidden" name="_rqst_reply_comment_id" value="<?= $_column['comment_id'] ?>">
                                                                                </div>

                                                                                <div class="ms-3">
                                                                                    <button class="btn btn-secondary btn-block rounded-pill">Reply</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>

                                                        <!-- NO COMMENT -->
                                                        <?php if (!$_has_comment): ?>
                                                            <div class="text-center fst-italic mt-5 mb-5">
                                                                <h3 class="mb-0">NO COMMENTS</h3>
                                                                <small>Unfortunately, no one commented in this post</small>
                                                            </div>
                                                        <?php endif; ?>

                                                        <div class="row mt-2">
                                                            <form action="/AlumniAssociationController/ForumCommentCreate" method="post">
                                                                <div class="row">
                                                                    <div class="col-sm-10 pe-1">
                                                                        <input type="text" name="_rqst_comment" id="" class="form-control rounded-pill" placeholder="Enter comment here...">
                                                                        <input type="hidden" name="_rqst_post_id" value="<?= $forums['forum_post_id'] ?>">
                                                                    </div>
                                                                    <div class="col-sm-2 text-center pe-0 ps-0">
                                                                        <button class="btn btn-primary btn-block rounded-pill">Comment</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center fst-italic mt-5 mb-5">
                        <h3 class="mb-0">NO DATA</h3>
                        <small>Unfortunately, it seems there are no posts available</small>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

<?php
function countComments($commentInfo, $postId)
{
    $count = 0;
    foreach ($commentInfo as $comment) {
        if ($comment['forum_post_id'] == $postId) {
            $count++;
        }
    }
    return $count;
}
?>

    <script>
        // Function to format file size in a human-readable format
        function formatImageOnlyFileSize(bytes) {
            const units = ['B', 'KB', 'MB', 'GB', 'TB'];
            let unitIndex = 0;
            while (bytes >= 1024 && unitIndex < units.length - 1) {
                bytes /= 1024;
                unitIndex++;
            }
            return `${bytes.toFixed(1)} ${units[unitIndex]}`;
        }

        function formatImageFileSize(bytes) {
            const units = ['B', 'KB', 'MB', 'GB', 'TB'];
            let unitIndex = 0;
            while (bytes >= 1024 && unitIndex < units.length - 1) {
                bytes /= 1024;
                unitIndex++;
            }
            return `${bytes.toFixed(1)} ${units[unitIndex]}`;
        }


        document.getElementById("image_only_upload").addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                // Display file size
                document.getElementById('fileSizeImageOnly').textContent = formatImageOnlyFileSize(file.size);

                // Preview image
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imagePreview = document.getElementById("imageOnlyPreview");
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = "block";
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('add_image_only').addEventListener('click', function () {
            document.getElementById('image_only_upload').click();
        });

        document.getElementById("image_upload").addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                // Display file size
                document.getElementById('fileSizeImage').textContent = formatImageFileSize(file.size);

                // Preview image
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imagePreview = document.getElementById("imagePreview");
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = "block";
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('add_image').addEventListener('click', function () {
            document.getElementById('image_upload').click();
        });

        function previewImage(input) {
            console.log("File selected:", input.files[0].name);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    console.log("Image loaded from file:", e.target.result);
                    $('#uploadedAvatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // U P L O A D  F O R U M  P I C T U R E
        function triggerFileUpload() {
            document.getElementById('forum_upload').click();
        }

        function forumImagePreview(input) {
            var file = input.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('uploadedAvatar').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        // Automatically submit form when file is selected
        document.getElementById('forum_upload').addEventListener('change', function () {
            document.getElementById('forum_form').submit();
        });
    </script>

<?= $this->endSection() ?>