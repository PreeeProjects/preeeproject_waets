<?php

namespace App\Controllers;

use App\Models\AssistanceModel;
use App\Models\MajorModel;
use App\Models\ForumModel;
use App\Models\ForumPostModel;
use App\Models\UserModel;
use App\Models\LearningJourneyModel;
use App\Models\JobOfferModel;
use App\Models\NotificationModel;
use App\Models\CommentModel;
use App\Models\TracerStudyHeaderModel;
use App\Models\TracerStudyModel;
use App\Models\ForumCommentSubModel;
use App\Models\DashboardModel;

class AlumniController extends BaseController
{
    public function Dashboard()
    {
        $_tracer_study_header_id = session()->get('tracer_study_header_id');
        $userId = session()->get('tupt');

        $dashboardModel = new DashboardModel();
        $dashboard = $dashboardModel->orderBy('date_created', 'desc')->findAll();

        $model = new UserModel();
        $_tracer_study = $model->where('tupt_id', $userId)->where('tracer_study_header_id', $_tracer_study_header_id)->where('is_tracer_study', 'true')->first();

        $assistanceModel = new AssistanceModel();
        $assistance = $assistanceModel->findAll();

        $major_id = session()->get('major_id');
        $forumModel = new ForumModel();
        $forum = $forumModel->where('major_id', $major_id)->findAll();

        session()->set(['nav_active' => "dashboard"]);

        // D I S P L A Y   N O T I F I C A T I O N
        $user_id = session()->get('user_id');

        $notificationModel = new NotificationModel();
        $notif = $notificationModel->where('user_id !=', $user_id)->where('audience', $major_id)->orWhere('audience', 0)->orderBy('date_time', 'desc')->findAll();

        $data = [
            'notif' => $notif,
            'tracer_study' => $_tracer_study,
            'info' => $dashboard,
            'assistance' => $assistance,
            'forum' => $forum
        ];

        return view('/AlumniMembersPages/dashboard', $data);
    }

    // P R O F I L E  C O N T R O L L E R 
    public function Profile()
    {
        session()->set(['nav_active' => ""]);

        // D I S P L A Y   N O T I F I C A T I O N
        $user_id = session()->get('user_id');

        $notificationModel = new NotificationModel();
        $major_id = session()->get('major_id');
        $data['notif'] = $notificationModel->where('user_id !=', $user_id)->where('audience', $major_id)->orWhere('audience', 0)->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniMembersPages/profile', $data);
    }

    public function ProfileEdit()
    {
        session()->set(['nav_active' => ""]);

        $model = new MajorModel();
        $data['majors'] = $model->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $user_id = session()->get('user_id');

        $notificationModel = new NotificationModel();
        $major_id = session()->get('major_id');
        $data['notif'] = $notificationModel->where('user_id !=', $user_id)->where('audience', $major_id)->orWhere('audience', 0)->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniMembersPages/profile-edit', $data);
    }

    public function EditProfile()
    {
        $userModel = new UserModel();
        $user_id = session()->get('user_logged_id');

        $img_path = "/assets/profile_picture/";
        $directoryPath = FCPATH . $img_path;

        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phoneNumber');
        $address = $this->request->getPost('address');
        $bio = $this->request->getPost('bio');
        $work = $this->request->getPost('work');

        $profile = $this->request->getFile('profile_pic');

        // Check if profile is not empty and is an image
        if ($profile && $profile->isValid()) {
            $profile_name = $profile->getName();
            $profile_path = "$img_path/$profile_name";

            $update_data = [
                'email' => $email,
                'phone_number' => $phone,
                'address' => $address,
                'bio' => $bio,
                'work' => $work,
                'profile_pic' => $profile_path,
            ];
            $userModel->update($user_id, $update_data);
            $profile->move($directoryPath, $profile_name);

            $override = [
                'address' => $address,
                'email' => $email,
                'phone' => $phone,
                'profile_pic' => $profile_path,
                'bio' => $bio,
                'work' => $work,
            ];
            session()->set($override);

            session()->setFlashdata('edited', "Profile have been Updated");

            $_major_id = session()->get('major_id');

            $notification = new NotificationModel();
            $profileData = [
                'context' => 'Profile',
                'audience' => $_major_id,
                'user_id' => $user_id,
                'content' => session()->get('name') . " changed profile picture",
            ];
            $notification->insert($profileData);


            return redirect()->to("/AlumniController/profile");
        } else {
            $update_data = [
                'email' => $email,
                'phone_number' => $phone,
                'address' => $address,
                'bio' => $bio,
                'work' => $work,
            ];
            $userModel->update($user_id, $update_data);

            $override = [
                'address' => $address,
                'email' => $email,
                'phone' => $phone,
                'bio' => $bio,
                'work' => $work,
            ];
            session()->set($override);

            session()->setFlashdata('edited', "Profile have been Updated");
            return redirect()->to("/AlumniController/profile");
        }
    }

    // M E M B E R S  C O N T R O L L E R 

    public function Members()
    {
        session()->set(['nav_active' => "members"]);

        $user_id = session()->get('user_id');
        $major_id = session()->get('major_id');

        $userModel = new UserModel();
        $data['members'] = $userModel->where('major_id', $major_id)->where('user_id !=', $user_id)->where('user_type', '0')->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $major_id = session()->get('major_id');
        $data['notif'] = $notificationModel->where('user_id !=', $user_id)->where('audience', $major_id)->orWhere('audience', 0)->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniMembersPages/members-mainpage', $data);
    }

    public function MemberProfileView($id)
    {
        $userModel = new UserModel();
        $profile_view = $userModel->where('user_id', $id)->first();
        $data['profile'] = $profile_view;

        $journeyModel = new LearningJourneyModel();
        $folders = $journeyModel->where('user_id', $profile_view['user_id'])->findAll();
        $data['folders'] = $folders;


        // D I S P L A Y   N O T I F I C A T I O N
        $user_id = session()->get('user_id');

        $notificationModel = new NotificationModel();
        $major_id = session()->get('major_id');
        $data['notif'] = $notificationModel->where('user_id !=', $user_id)->where('audience', $major_id)->orWhere('audience', 0)->orderBy('date_time', 'desc')->findAll();


        return view('/AlumniMembersPages/member-profile-view', $data);
    }

    // A S S I S T A N C E  C O N T R O L L E R 

    public function AssistanceMainpage()
    {
        session()->set(['nav_active' => "assistance"]);
        $userModel = new AssistanceModel();
        $data['info'] = $userModel->orderBy('assistance_id', 'desc')->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $user_id = session()->get('user_id');

        $notificationModel = new NotificationModel();
        $major_id = session()->get('major_id');
        $data['notif'] = $notificationModel->where('user_id !=', $user_id)->where('audience', $major_id)->orWhere('audience', 0)->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniMembersPages/assistance-mainpage', $data);
    }

    public function JoinAssistance()
    {

    }

    // F O R U M  C O N T R O L L E R 

    public function ForumMainPage()
    {
        session()->set(['nav_active' => "forum"]);

        $model = new MajorModel();
        $data['majors'] = $model->findAll();

        $forumModel = new ForumModel();
        $data['info'] = $forumModel->where('status', 'APPROVED')->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $user_id = session()->get('user_id');

        $notificationModel = new NotificationModel();
        $major_id = session()->get('major_id');
        $data['notif'] = $notificationModel->where('user_id !=', $user_id)->where('audience', $major_id)->orWhere('audience', 0)->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniMembersPages/forum-mainpage', $data);
    }

    public function ForumValidation()
    {
        $user_id = session()->get('user_logged_id');
        $frm_name = $this->request->getPost('forum_name');
        $major_id = $this->request->getPost('major_id');
        $dscrptn = $this->request->getPost('description');
        $rqstr = $this->request->getPost('requestor');

        $first_letter = strtoupper(substr($frm_name, 0, 1));
        $img_path = "/assets/forum_picture/$first_letter.png";

        $forumPageData = [
            'major_id' => $major_id,
            'forum_name' => $frm_name,
            'description' => $dscrptn,
            'forum_photo' => $img_path,
            'user_id' => $user_id,
            'created_by' => $rqstr,
            'status' => 'PENDING',
        ];
        $forumModel = new ForumModel();
        $forumModel->insert($forumPageData);

        session()->setFlashdata('forum_added', "The administrator is still reviewing the page. We'll notify you once it's approved.");

        $notification = new NotificationModel();
        $forumData = [
            'context' => 'Forum',
            'audience' => $major_id,
            'content' => 'You have been added to a new group: ' . $frm_name,
        ];
        $notification->insert($forumData);

        return redirect()->to('AlumniController/ForumMainPage');
    }


    public function ForumVisit($forum_id)
    {
        $forumModel = new ForumModel();
        $forum_info = $forumModel->where('forum_id', $forum_id)->first();

        // other forumns
        $other_forums = $forumModel->findAll();

        // forum posts
        $forumPostModel = new ForumPostModel();
        $forumPost = $forumPostModel->where('forum_id', $forum_id)->orderBy('date', 'desc')->findAll();

        // major
        $major_id = $forum_info['major_id'];
        $majorModel = new MajorModel();
        $major_info = $majorModel->where('major_id', $major_id)->first();

        // members
        $userModel = new UserModel();
        $members = $userModel->where('major_id', $major_id)->where('user_type', '0')->where('is_approve', 'true')->findAll();

        // major details
        $major_title = $major_info['major_title'];
        $major_acrnm = $major_info['major_acronym'];

        // comments
        $_commentModel = new CommentModel();
        $_commentInfo = $_commentModel->findAll();

        // sub-comments
        $_commentSubModel = new ForumCommentSubModel();
        $_commentSubInfo = $_commentSubModel->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $user_id = session()->get('user_id');
        $major_id = session()->get('major_id');

        $notificationModel = new NotificationModel();
        $data = $notificationModel->where('user_id !=', $user_id)->where('audience', $major_id)->orWhere('audience', 0)->orderBy('date_time', 'desc')->findAll();


        // datas
        $data = [
            'forum_name' => $forum_info['forum_name'],
            'forum_photo' => $forum_info['forum_photo'],
            'members' => $members,
            'major_title' => $major_title,
            'major_acrnm' => $major_acrnm,

            // Post Data
            'forum_posts' => $forumPost,
            'forum_post_id' => $forum_id,
            'other_forums' => $other_forums,

            // comment
            '_comment_info' => $_commentInfo,
            'notif' => $data,

            // sub-comment
            '_commentSubInfo' => $_commentSubInfo
        ];

        return view('/AlumniMembersPages/forum-visit', $data);
    }

    public function ForumCommentCreate()
    {
        $_user_id = session()->get('user_id');
        $_user_name = session()->get('name');
        $_user_path = session()->get('profile_pic');
        $_rqst_comment = $this->request->getPost('_rqst_comment');
        $_rqst_post_id = $this->request->getPost('_rqst_post_id');

        $_commentModel = new CommentModel();
        $_comment_data = [
            'user_id' => $_user_id,
            'user_name' => $_user_name,
            'user_image_path' => $_user_path,
            'forum_post_id' => $_rqst_post_id,
            'comment' => $_rqst_comment,
        ];
        $_commentModel->insert($_comment_data);

        $forumPostModel = new ForumPostModel();
        $forum_info = $forumPostModel->where('forum_post_id', $_rqst_post_id)->first();

        $notification = new NotificationModel();
        $forumData = [
            'context' => 'Forum',
            'audience' => '7',
            'content' => " " . $_user_name . " " . 'commented on your post: ' . $forum_info['caption'],
        ];
        $notification->insert($forumData);


        return redirect()->back();
    }

    public function ForumCommentDelete($_comment_id)
    {
        $_commentModel = new CommentModel();
        $_commentModel->delete($_comment_id);
        return redirect()->back();
    }

    public function ForumCommentSub()
    {

        $_user_id = session()->get('user_id');
        $_user_name = session()->get('name');
        $_user_path = session()->get('profile_pic');
        $_rqst_comment_reply = $this->request->getPost('_rqst_comment_reply');
        $_rqst_reply_post_id = $this->request->getPost('_rqst_reply_post_id');
        $_rqst_reply_comment_id = $this->request->getPost('_rqst_reply_comment_id');

        $_commentSubModel = new ForumCommentSubModel();
        $_comment_reply_data = [
            'user_id' => $_user_id,
            'user_name' => $_user_name,
            'user_image_path' => $_user_path,
            'forum_post_id' => $_rqst_reply_post_id,
            'comment_id' => $_rqst_reply_comment_id,
            'comment_reply' => $_rqst_comment_reply,
        ];
        $_commentSubModel->insert($_comment_reply_data);

        $forumPostModel = new ForumPostModel();
        $forum_info = $forumPostModel->where('forum_post_id', $_rqst_reply_post_id)->first();

        $notification = new NotificationModel();
        $forumData = [
            'context' => 'Forum',
            'audience' => '7',
            'content' => " " . $_user_name . " " . 'reply on your comment: ' . $forum_info['caption'],
        ];
        $notification->insert($forumData);

        return redirect()->back();

    }

    public function ForumCommentSubDelete($_comment_reply_id)
    {
        $_commentSubModel = new ForumCommentSubModel();
        $_commentSubModel->delete($_comment_reply_id);
        return redirect()->back();
    }

    public function ForumUpload($forum_id)
    {
        $name = session()->get('name');
        $forumModel = new ForumModel();
        $forum_info = $forumModel->where('forum_id', $forum_id)->first();

        $forumPostModel = new ForumPostModel();

        $img_path = "/assets/forum_post_folder";
        $directoryPath = FCPATH . $img_path;

        // Create folder path
        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }
        $post_type = $this->request->getPost('post_type');

        if ($post_type == '1') {
            $captions = $this->request->getPost('caption');

            // Caption Post
            $forumPostModel->insert([
                'forum_id' => $forum_id,
                'post_type' => $post_type,
                'caption' => $captions,
                'posted_by' => $name,
            ]);

            session()->setFlashdata('post_added', "Uploaded a new Post");

            $notification = new NotificationModel();
            $forumData = [
                'context' => 'Forum',
                'audience' => $forum_info['major_id'],
                'content' => 'New Caption Added: ' . $captions,
            ];
            $notification->insert($forumData);

            // NOTIFY ALUMNI
            $this->ForumPostNotification($forum_info['major_id'], 1);

            return redirect()->to("/AlumniController/ForumVisit/$forum_id");
        } else if ($post_type == '2') {
            $image = $this->request->getFile('image_only_upload');

            if ($image->getSize() > 5000000) {
                // return error
                session()->setFlashdata('unsucessful', "Invalid file. File exceeds the size limit.");
                return redirect()->to("/AlumniController/ForumVisit/$forum_id");
            }

            // Image Post
            $image_name = $image->getName();
            $image->move($directoryPath, $image_name);
            $image_path = "$img_path/$image_name";

            $forumPostModel->insert([
                'forum_id' => $forum_id,
                'post_type' => $post_type,
                'image' => $image_path,
                'posted_by' => $name,
            ]);

            session()->setFlashdata('post_added', "Uploaded a new Post");

            $notification = new NotificationModel();
            $forumData = [
                'context' => 'Forum',
                'audience' => $forum_info['major_id'],
                'content' => 'A new image has been posted. Check this out!',
            ];
            $notification->insert($forumData);

            // NOTIFY ALUMNI
            $this->ForumPostNotification($forum_info['major_id'], 1);
            return redirect()->to("/AlumniController/ForumVisit/$forum_id");
        } else if ($post_type == '3') {
            $image = $this->request->getFile('image_upload');
            $captions = $this->request->getPost('caption');

            if ($image->getSize() > 5000000) {
                // return error
                session()->setFlashdata('unsucessful', "Invalid file. File exceeds the size limit.");
                return redirect()->to("/AlumniController/ForumVisit/$forum_id");
            }
            // Image and Caption Post
            $image_name = $image->getName();
            $image->move($directoryPath, $image_name);
            $image_path = "$img_path/$image_name";

            $forumPostModel->insert([
                'forum_id' => $forum_id,
                'post_type' => $post_type,
                'caption' => $captions,
                'image' => $image_path,
                'posted_by' => $name,
            ]);

            session()->setFlashdata('post_added', "Uploaded a new Post");

            $notification = new NotificationModel();
            $forumData = [
                'context' => 'Forum',
                'audience' => 0, //$forum_info['major_id']
                'content' => 'A new post with an image and caption has been uploaded: ' . $captions,
            ];
            $notification->insert($forumData);

            // NOTIFY ALUMNI
            $this->ForumPostNotification($forum_info['major_id'], 1);
            return redirect()->to("/AlumniController/ForumVisit/$forum_id");
        } else {
            session()->setFlashdata('error', "Post failed");
            return redirect()->to('/AlumniController/ForumVisit');
        }
    }


    public function DeleteForumPost($id, $visit_id)
    {
        $model = new ForumPostModel();
        $model->delete($id);

        $_commentModel = new CommentModel();
        $_commentModel->where('forum_post_id', $id)->delete();

        $_commentSubModel = new ForumCommentSubModel();
        $_commentSubModel->where('forum_post_id', $id)->delete();

        session()->setFlashdata('post_deleted', "Post have been Deleted");

        return redirect()->to("/AlumniAssociationController/ForumVisit/$visit_id");
    }
    // L E A R N I N G  J O U R N E Y  C O N T R O L L E R 

    public function LearningJourney()
    {
        // Set the active nav
        session()->set(['nav_active' => "learning_journey"]);

        $username = session()->get('name');

        $userModel = new UserModel();
        $user = $userModel->where('full_name', $username)->first();

        if ($user) {
            $full_name = $user['full_name'];
            $jrny_folder = new LearningJourneyModel();

            $folders = $jrny_folder->where('created_by', $full_name)->findAll();

            $data['folders'] = $folders;

            // D I S P L A Y   N O T I F I C A T I O N
            $user_id = session()->get('user_id');
            $major_id = session()->get('major_id');

            $notificationModel = new NotificationModel();
            $data['notif'] = $notificationModel->where('user_id !=', $user_id)->where('audience', $major_id)->orWhere('audience', 0)->orderBy('date_time', 'desc')->findAll();


            return view('AlumniMembersPages/learning-journey-mainpage', $data);
        }
    }

    public function uploadPage($folderId)
    {
        $data['folderId'] = $folderId;
        return view('/AlumniMembersPages/learning-journey-upload', $data);
    }

    public function UploadPhoto()
    {

        // D I S P L A Y   N O T I F I C A T I O N
        $user_id = session()->get('user_id');
        $major_id = session()->get('major_id');

        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('user_id !=', $user_id)->where('audience', $major_id)->orWhere('audience', 0)->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniMembersPages/learning-journey-upload', $data);
    }

    public function LearningJourneyUpload()
    {
        $model = new LearningJourneyModel();
        $folder = $this->request->getPost('folder_name');
        $user_id = session()->get('user_logged_id');
        $user_name = session()->get('name');

        $img_path = "/assets/learning_journey/$folder";
        $directoryPath = FCPATH . $img_path;

        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        $uploadData = [
            'created_by' => $user_name,
            'folder_name' => $folder,
            'user_id' => $user_id,
        ];

        for ($i = 1; $i <= 5; $i++) {
            $file = $this->request->getFile('image' . $i);
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move($directoryPath, $newName);
                $uploadData['image_' . $i] = $img_path . '/' . $newName;
            }
        }

        $model->insert($uploadData);
        session()->setFlashdata('folder_added', 'Folder have been Created');

        $_major_id = session()->get('major_id');

        $notification = new NotificationModel();
        $learningjourneyData = [
            'context' => 'Learning Journey',
            'audience' => $_major_id,
            'user_id' => $user_id,
            'content' => $user_name . " shared a journey: " . $folder,
        ];
        $notification->insert($learningjourneyData);


        return redirect()->to("/AlumniController/LearningJourney");
    }

    public function DeleteFolder($id)
    {
        $model = new LearningJourneyModel();
        $model->delete($id);
        session()->setFlashdata('folder_deleted', 'Folder have been Deleted');

        return redirect()->to("/AlumniController/LearningJourney/$id");
    }

    // J O B  O F F E R  C O N T R O L L E R 
    public function JobOffer()
    {
        // Set the active nav
        session()->set(['nav_active' => "job_offer"]);

        $assistanceModel = new AssistanceModel();
        $data['assistance'] = $assistanceModel->orderBy('assistance_id', 'desc')->findAll();

        $jobOfferModel = new JobOfferModel();
        $data['job_offers'] = $jobOfferModel->orderBy('date', 'desc')->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $user_id = session()->get('user_id');
        $major_id = session()->get('major_id');

        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('user_id !=', $user_id)->where('audience', $major_id)->orWhere('audience', 0)->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniMembersPages/job-offer-mainpage', $data);
    }

    public function test()
    {
        $user_id = session()->get('user_logged_id');

        echo $user_id;
    }

    // T R A C E R   S T U D Y 

    public function SectionOne()
    {
        return view('/AlumniMembersPages/TracerStudyForm/section-one');
    }

    public function SectionTwo()
    {
        return view('/AlumniMembersPages/TracerStudyForm/section-two');
    }

    public function SectionThreePage()
    {
        return view('/AlumniMembersPages/TracerStudyForm/section-three');
    }

    public function SectionFourPage()
    {
        return view('/AlumniMembersPages/TracerStudyForm/section-four');
    }

    public function SectionFiveEmployedPage()
    {
        return view('/AlumniMembersPages/TracerStudyForm/section-five-employed');
    }

    public function SectionFiveNotEmployedPage()
    {
        return view('/AlumniMembersPages/TracerStudyForm/section-five-not-employed');
    }

    public function SectionSixPage()
    {
        return view('/AlumniMembersPages/TracerStudyForm/section-six-first-job');
    }

    public function SectionSevenPage()
    {
        return view('/AlumniMembersPages/TracerStudyForm/section-seven');
    }

    public function SectionThree()
    {
        $rqst_question_1 = $this->request->getGet('question_1');
        $rqst_question_2 = $this->request->getGet('question_2');
        $rqst_question_3 = $this->request->getGet('question_3');
        $rqst_question_4 = $this->request->getGet('question_4');
        $rqst_question_5 = $this->request->getGet('question_5');
        $rqst_question_6 = $this->request->getGet('question_6');
        $rqst_question_7 = $this->request->getGet('question_7');
        $rqst_question_8 = $this->request->getGet('question_8');
        $rqst_question_9 = $this->request->getGet('question_9');
        $rqst_question_10 = $this->request->getGet('question_10');

        $data = [
            'question1' => $rqst_question_1,
            'question2' => $rqst_question_2,
            'question3' => $rqst_question_3,
            'question4' => $rqst_question_4,
            'question5' => $rqst_question_5,
            'question6' => $rqst_question_6,
            'question7' => $rqst_question_7,
            'question8' => $rqst_question_8,
            'question9' => $rqst_question_9,
            'question10' => $rqst_question_10,
        ];
        session()->set($data);

        return view('/AlumniMembersPages/TracerStudyForm/section-three');
    }

    public function SectionFour()
    {
        $rqst_question_11 = $this->request->getGet('question_11');
        $rqst_question_12 = $this->request->getGet('question_12');
        $rqst_question_13 = $this->request->getGet('question_13');
        $rqst_question_14 = $this->request->getGet('question_14');
        $rqst_question_15 = $this->request->getGet('question_15');

        $data = [
            'question11' => $rqst_question_11,
            'question12' => $rqst_question_12,
            'question13' => $rqst_question_13,
            'question14' => $rqst_question_14,
            'question15' => $rqst_question_15,
        ];
        session()->set($data);

        return view('/AlumniMembersPages/TracerStudyForm/section-four');
    }

    public function SectionFive()
    {

        $rqst_question_16_1 = $this->request->getGet('question_16_1');
        $rqst_question_16_2 = $this->request->getGet('question_16_2');
        $rqst_question_16_3 = $this->request->getGet('question_16_3');
        $rqst_question_17_1 = $this->request->getGet('question_17_1');
        $rqst_question_17_2 = $this->request->getGet('question_17_2');
        $rqst_question_17_3 = $this->request->getGet('question_17_3');
        $rqst_question_17_4 = $this->request->getGet('question_17_4');
        $rqst_question_18 = $this->request->getGet('question_18');

        $data = [
            'question16_1' => $rqst_question_16_1,
            'question16_2' => $rqst_question_16_2,
            'question16_3' => $rqst_question_16_3,
            'question17_1' => $rqst_question_17_1,
            'question17_2' => $rqst_question_17_2,
            'question17_3' => $rqst_question_17_3,
            'question17_4' => $rqst_question_17_4,
            'question18' => $rqst_question_18,
        ];
        session()->set($data);

        if ($rqst_question_18 === 'Yes') {
            return view('/AlumniMembersPages/TracerStudyForm/section-five-employed');
        } else {
            return view('/AlumniMembersPages/TracerStudyForm/section-five-not-employed');
        }
    }

    public function SectionFiveNotEmployed()
    {
        $rqst_question_19 = $this->request->getGet('question_19');

        $data = [
            'question19' => $rqst_question_19,
        ];
        session()->set($data);

        return view('/AlumniMembersPages/TracerStudyForm/submit-page');
    }

    public function SectionFiveEmployed()
    {
        $rqst_question_20 = $this->request->getGet('question_20');
        $rqst_question_21 = $this->request->getGet('question_21');
        $rqst_question_22 = $this->request->getGet('question_22');
        $rqst_question_23 = $this->request->getGet('question_23');
        $rqst_question_24 = $this->request->getGet('question_24');
        $rqst_question_25 = $this->request->getGet('question_25');

        $data = [
            'question20' => $rqst_question_20,
            'question21' => $rqst_question_21,
            'question22' => $rqst_question_22,
            'question23' => $rqst_question_23,
            'question24' => $rqst_question_24,
            'question25' => $rqst_question_25,
        ];
        session()->set($data);

        if ($rqst_question_25 === 'Yes') {
            return view('/AlumniMembersPages/TracerStudyForm/section-six-first-job');
        } else {
            return view('/AlumniMembersPages/TracerStudyForm/section-six-not-first-job');
        }
    }

    public function SectionSixFirstJob()
    {
        $rqst_question_26 = $this->request->getGet('question_26');
        $rqst_question_27 = $this->request->getGet('question_27');

        $data = [
            'question26' => $rqst_question_26,
            'question27' => $rqst_question_27,
        ];
        session()->set($data);

        if ($rqst_question_27 === 'Yes') {
            return view('/AlumniMembersPages/TracerStudyForm/section-seven-course-related');
        }
        return view('/AlumniMembersPages/TracerStudyForm/submit-page');
    }

    public function SectionSixNotFirstJob()
    {
        $rqst_question_28 = $this->request->getGet('question_28');
        $rqst_question_29 = $this->request->getGet('question_29');
        $rqst_question_30 = $this->request->getGet('question_30');
        $rqst_question_31 = $this->request->getGet('question_31');
        $rqst_question_32 = $this->request->getGet('question_32');
        $rqst_question_33 = $this->request->getGet('question_33');
        $rqst_question_34 = $this->request->getGet('question_34');
        $rqst_question_35 = $this->request->getGet('question_35');

        $data = [
            'question28' => $rqst_question_28,
            'question29' => $rqst_question_29,
            'question30' => $rqst_question_30,
            'question31' => $rqst_question_31,
            'question32' => $rqst_question_32,
            'question33' => $rqst_question_33,
            'question34' => $rqst_question_34,
            'question35' => $rqst_question_35,
        ];
        session()->set($data);

        if ($rqst_question_35 === 'Yes') {
            return view('/AlumniMembersPages/TracerStudyForm/section-seven-curriculum-relevant');
        } else {
            return view('/AlumniMembersPages/TracerStudyForm/submit-page');
        }
    }

    public function SectionSevenCurriculumRelevant()
    {

        $rqst_question_36 = $this->request->getGet('question_36');

        $data = [
            'question36' => $rqst_question_36,
        ];
        session()->set($data);

        return view('/AlumniMembersPages/TracerStudyForm/submit-page');
    }

    public function SectionSevenCourseRelated()
    {
        $rqst_question_37 = $this->request->getGet('question_37');
        $rqst_question_38 = $this->request->getGet('question_38');
        $rqst_question_39 = $this->request->getGet('question_39');

        $data = [
            'question37' => $rqst_question_37,
            'question38' => $rqst_question_38,
            'question39' => $rqst_question_39,
        ];
        session()->set($data);

        return view('/AlumniMembersPages/TracerStudyForm/submit-page');
    }

    public function SubmitPapge()
    {
        $question1 = session()->get('question1');
        $question2 = session()->get('question2');
        $question3 = session()->get('question3');
        $question4 = session()->get('question4');
        $question5 = session()->get('question5');
        $question6 = session()->get('question6');
        $question7 = session()->get('question7');
        $question8 = session()->get('question8');
        $question9 = session()->get('question9');
        $question10 = session()->get('question10');
        $question11 = session()->get('question11');
        $question12 = session()->get('question12');
        $question13 = session()->get('question13');
        $question14 = session()->get('question14');
        $question15 = session()->get('question15');
        $question16_1 = session()->get('question16_1');
        $question16_2 = session()->get('question16_2');
        $question16_3 = session()->get('question16_3');
        $question17_1 = session()->get('question17_1');
        $question17_2 = session()->get('question17_2');
        $question17_3 = session()->get('question17_3');
        $question17_4 = session()->get('question17_4');
        $question18 = session()->get('question18');
        $question19 = session()->get('question19');
        $question20 = session()->get('question20');
        $question21 = session()->get('question21');
        $question22 = session()->get('question22');
        $question23 = session()->get('question23');
        $question24 = session()->get('question24');
        $question25 = session()->get('question25');
        $question26 = session()->get('question26');
        $question27 = session()->get('question27');
        $question28 = session()->get('question28');
        $question29 = session()->get('question29');
        $question30 = session()->get('question30');
        $question31 = session()->get('question31');
        $question32 = session()->get('question32');
        $question33 = session()->get('question33');
        $question34 = session()->get('question34');
        $question35 = session()->get('question35');
        $question36 = session()->get('question36');
        $question37 = session()->get('question37');
        $question38 = session()->get('question38');
        $question39 = session()->get('question39');

        $_year_graduated = session()->get('year_graduated_id');
        $_tracer_study_header_id = session()->get('tracer_study_header_id');

        $tracerStudyModel = new TracerStudyModel();

        $data = [
            'email' => $question1,
            'full_name' => $question2,
            'address' => $question3,
            'mobile_number' => $question4,
            'civil_status' => $question5,
            'sex' => $question6,
            'birthdate' => $question7,
            'region' => $question8,
            'province' => $question9,
            'residence' => $question10,
            'year_graduated' => $question11,
            'degree' => $question12,
            'university' => $question13,
            'award' => $question14,
            'course_reason' => $question15,
            'exam_passed_name' => $question16_1,
            'exam_passed_date' => $question16_2,
            'exam_passed_rating' => $question16_3,
            'training_title' => $question17_1,
            'training_duration' => $question17_2,
            'training_credits_earned' => $question17_3,
            'training_institution' => $question17_4,
            'is_employed' => $question18,
            'not_employed_reason' => $question19,
            'employed_employment_status' => $question20,
            'employed_skill_acquired' => $question21,
            'employed_occupation' => $question22,
            'employed_business_line' => $question23,
            'employed_work_place' => $question24,
            'is_first_job' => $question25,
            'first_job_reson_for_staying' => $question26,
            'is_first_job_course_related' => $question27,
            'reason_for_changing' => $question28,
            'first_job_duration' => $question29,
            'first_job_referral' => $question30,
            'first_job_land_duration' => $question31,
            'first_job_level_position' => $question32,
            'current_job_level_position' => $question33,
            'first_job_income' => $question34,
            'is_job_curriculum_related' => $question35,
            'useful_competencies' => $question36,
            'course_related_first_job' => $question37,
            'course_related_land_job_duration' => $question38,
            'course_related_income' => $question39,
            'school_year' => $_year_graduated,
            'tracer_study_header_id' => $_tracer_study_header_id,
        ];
        $tracerStudyModel->insert($data);
        session()->setFlashdata('success', 'Successfully Submitted the Form');

        $userId = session()->get('tupt');

        $userModel = new UserModel();
        $_is_user_study = $userModel->where('tupt_id', $userId)->first();

        $userData = [
            'is_tracer_study' => 'false',
        ];
        $userModel->update($_is_user_study, $userData);

        $session = session();
        $session->remove('question1');
        $session->remove('question2');
        $session->remove('question3');
        $session->remove('question4');
        $session->remove('question5');
        $session->remove('question6');
        $session->remove('question7');
        $session->remove('question8');
        $session->remove('question9');
        $session->remove('question10');
        $session->remove('question11');
        $session->remove('question12');
        $session->remove('question13');
        $session->remove('question14');
        $session->remove('question15');
        $session->remove('question16_1');
        $session->remove('question16_2');
        $session->remove('question16_3');
        $session->remove('question17_1');
        $session->remove('question17_2');
        $session->remove('question17_3');
        $session->remove('question17_4');
        $session->remove('question18');
        $session->remove('question19');
        $session->remove('question20');
        $session->remove('question21');
        $session->remove('question22');
        $session->remove('question23');
        $session->remove('question24');
        $session->remove('question25');
        $session->remove('question26');
        $session->remove('question27');
        $session->remove('question28');
        $session->remove('question29');
        $session->remove('question30');
        $session->remove('question31');
        $session->remove('question32');
        $session->remove('question33');
        $session->remove('question34');
        $session->remove('question35');
        $session->remove('question36');
        $session->remove('question37');
        $session->remove('question38');
        $session->remove('question39');


        return redirect()->to('/AlumniController/Dashboard');

    }

    public function ForumPostNotification($majorID, $messagetype)
    {
        $userModel = new UserModel();
        $alumnis = $userModel->where('user_type', '0')->where('is_approve', 'true')->where('major_id', $majorID)->findAll();

        if (!empty($alumnis)) {
            foreach ($alumnis as $alumni) {
                $email = $alumni['email'];
                if (!empty($email)) {
                    $this->SendEmail($email, $messagetype);
                }
            }
        }
    }


    public function SendEmail($email, $messagetype)
    {
        // check internet connection
        helper('network');
        if (!is_connected()) {
            session()->setFlashdata('internet_failed', "No Internet Connection!");
            return redirect()->back();
        }

        $emailDetails = $this->EmailDetails($messagetype);
        $title = $emailDetails['title'];
        $subject = $emailDetails['subject'];
        $message = $emailDetails['message'];

        $templatePath = APPPATH . '/Views/EmailTemplates/email.html';
        $emailsubject = $subject;
        $emailtemplate = file_get_contents($templatePath);
        $emailtemplate = str_replace('{{title}}', $title, $emailtemplate);
        $emailtemplate = str_replace('{{message}}', $message, $emailtemplate);

        // send the message to email
        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setSubject($emailsubject);
        $emailService->setMessage($emailtemplate);

        if ($emailService->send()) {
            echo "Email Sent";
        }
    }

    public function EmailDetails($messagetype)
    {
        $emailDetails = [];

        if ($messagetype == 1) {
            return [
                'title' => 'New Forum Post',
                'subject' => 'Notification Forum Post',
                'message' => 'A new post is up on the forum page! Check it out, join the discussion, and share your thoughts. Stay engaged and be part of the conversation!',
            ];
        }
    }

}
