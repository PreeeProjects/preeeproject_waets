<?php

namespace App\Controllers;

use App\Models\SchoolYearModel;
use App\Models\UserModel;
use App\Models\AssistanceModel;
use App\Models\CommentModel;
use App\Models\ForumModel;
use App\Models\LearningJourneyModel;
use App\Models\MajorModel;
use App\Models\JobOfferModel;
use App\Models\ForumPostModel;
use App\Models\NotificationModel;
use Dompdf\Dompdf;
use App\Models\AdminMasterKeyModel;
use App\Models\TracerStudyModel;
use App\Models\TracerStudyHeaderModel;
use App\Models\ForumCommentSubModel;
use App\Models\DashboardModel;
use Carbon\Carbon;

class AlumniAssociationController extends BaseController
{

    public function Dashboard()
    {
        session()->set(['nav_active' => "dashboard"]);
        // $data = ['bread_crumb' => 'WAETS / Alumni Association Dashboard'];

        $dashboardModel = new DashboardModel();
        $data['info'] = $dashboardModel->orderBy('date_created', 'desc')->findAll();

        $assistanceModel = new AssistanceModel();
        $data['assistance'] = $assistanceModel->where('is_expired', '0')->findAll();

        $forumModel = new ForumModel();
        $data['forum'] = $forumModel->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniAssociationPages/dashboard', $data);
    }

    public function DashboardUploadPage()
    {
        return view('/AlumniAssociationPages/dashboard-post');
    }

    public function DashboardUpload()
    {
        $model = new DashboardModel();
        $title = $this->request->getPost('title');

        $img_path = "/assets/dashboard/$title";
        $directoryPath = FCPATH . $img_path;

        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        $uploadData = [
            'title' => $title,
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
        session()->setFlashdata('folder_added', 'Successfully Posted');

        $notification = new NotificationModel();
        $dashboardData = [
            'context' => 'Dashboard',
            'audience' => '0',
            'content' => " Admin shared a post: " . $title,
        ];
        $notification->insert($dashboardData);

        // Notify User
        $this->NotifyAllAlumni(8);
        return redirect()->to("/AlumniAssociationController/Dashboard");
    }

    public function DeleteDashboard($id)
    {
        $model = new DashboardModel();
        $model->delete($id);
        session()->setFlashdata('folder_deleted', 'Post have been Deleted');

        return redirect()->to("/AlumniAssociationController/Dashboard");
    }

    // P R O F I L E  C O N T R O L L E R 
    public function Profile()
    {
        session()->set(['nav_active' => ""]);

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniAssociationPages/profile', $data);
    }

    public function ProfileEdit()
    {
        session()->set(['nav_active' => ""]);

        $model = new MajorModel();
        $data['majors'] = $model->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();


        return view('/AlumniAssociationPages/profile-edit', $data);
    }

    public function EditProfile()
    {
        $userModel = new UserModel();
        $user_id = session()->get('user_logged_id');

        $img_path = "/assets/profile_picture";
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
            return redirect()->to("/AlumniAssociationController/profile");
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
            return redirect()->to("/AlumniAssociationController/profile");
        }
    }

    // M E M B E R S  C O N T R O L L E R 

    public function MemberRegistration()
    {
        session()->set(['nav_active' => "member_request"]);

        $userModel = new UserModel();
        $data['alumni'] = $userModel->where('is_approve', 'false')->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();


        return view('/AlumniAssociationPages/member-registration-mainpage', $data);
    }

    public function RemoveRegisteredAlumni($id)
    {
        $userModel = new UserModel();
        $rejectRegisteredAlumni = $userModel->where('user_id', $id)->first();
        $emailNotify = $rejectRegisteredAlumni['email'];


        // Notify Use
        if ($emailNotify) {
            $this->SendEmail($emailNotify, 6);
        }
        $userModel->delete($id);
        return redirect()->back();
    }

    public function ApproveRegisteredAlumni($id)
    {
        $userModel = new UserModel();
        $approveRegisteredAlumni = $userModel->where('user_id', $id)->first();
        $emailNotify = $approveRegisteredAlumni['email'];

        $data = [
            'is_approve' => 'true'
        ];
        $userModel->update($approveRegisteredAlumni['user_id'], $data);


        // Notify Use

        if ($emailNotify) {
            $this->SendEmail($emailNotify, 1);
        }

        return redirect()->back();
    }

    // public function AddMember()
    // {
    //     $tupt_id = $this->request->getPost('tupt_id');
    //     $fname = $this->request->getPost('fname');
    //     $mname = $this->request->getPost('mname');
    //     $lname = $this->request->getPost('lname');
    //     $course = $this->request->getPost('course');
    //     $school_year = $this->request->getPost('school_year');
    //     $school_year_id = $this->request->getPost('school_year_id');

    //     $_explode_course = explode(':', $course);
    //     // $_explode_school_year = explode(':', $school_year);

    //     $model = new UserModel();
    //     $_checkUser = $model->where('tupt_id', $tupt_id)->first();

    //     if ($_checkUser) {
    //         session()->setFlashdata('unsucessful', "TUPT-ID is already exist");
    //         return redirect()->back();
    //     }

    //     $data = [
    //         'tupt_id' => $tupt_id,
    //         'first_name' => strtoupper($fname),
    //         'middle_initial' => strtoupper($mname),
    //         'last_name' => strtoupper($lname),
    //         'full_name' => strtoupper($lname . "," . " " . $fname . " " . $mname),
    //         'major_id' => $_explode_course[0],
    //         'major' => $_explode_course[1],
    //         // 'school_year_id' => $_explode_school_year[0],
    //         // 'school_year' => $_explode_school_year[1],
    //         'school_year_id' => $school_year_id,
    //         'school_year' => $school_year,
    //         'is_register' => 'NOT REGISTERED',
    //         'user_type' => '0',
    //     ];
    //     $model->insert($data);

    //     session()->setFlashdata('post_added', "Successfully Added a Member");

    //     return redirect()->back();
    // }

    public function Members()
    {
        session()->set(['nav_active' => "members"]);

        $model = new SchoolYearModel();
        $data['school_years'] = $model->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();


        return view('/AlumniAssociationPages/members-mainpage', $data);
    }

    public function SchoolYearMembers($year_graduated_id)
    {
        session()->set(['nav_active' => "members"]);

        $model = new MajorModel();
        $majors = $model->findAll();

        $schoolYearModel = new SchoolYearModel();
        $school_year = $schoolYearModel->where('year_graduated_id ', $year_graduated_id)->first();

        $userModel = new UserModel();
        $userModel->select('*')->where('user_type', '0')->where('year_graduated_id', $year_graduated_id)->where('is_approve', 'true');
        $members = $userModel->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $notification = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        $data = [
            'notif' => $notification,
            'majors' => $majors,
            'members' => $members,
            'year_graduated_id' => $year_graduated_id,
            'school_year' => $school_year,
        ];

        return view('/AlumniAssociationPages/members-school-year', $data);
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
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniAssociationPages/member-profile-view', $data);
    }

    public function DeleteMember($id)
    {

        $model = new UserModel();
        $model->delete($id);
        session()->setFlashdata('deleted', 'Member has been removed');

        return redirect()->to("/AlumniAssociationController/Members/$id");
    }

    // A S S I S T A N C E  C O N T R O L L E R 

    public function AssistanceMainpage()
    {
        session()->set(['nav_active' => "assistance"]);
        $userModel = new AssistanceModel();
        $data['info'] = $userModel->where('is_expired', '0')->orderBy('assistance_id', 'desc')->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        // $this->AssistanceAutomaticDelete();

        return view('/AlumniAssociationPages/assistance-mainpage', $data);
    }

    public function AssistancePost()
    {

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniAssociationPages/assistance-post', $data);
    }

    public function AssistanceValidation()
    {

        $mentorshopModel = new AssistanceModel();
        $id = $this->request->getPost('id');
        $theme = $this->request->getPost('theme');
        $What = $this->request->getPost('what');
        $Where = $this->request->getPost('where');
        $When = $this->request->getPost('when');
        $time_from = $this->request->getPost('time_from');
        $time_to = $this->request->getPost('time_to');
        $quali = $this->request->getPost('qualification');
        $details = $this->request->getPost('details');

        $mntrshp_data = [
            'assistance_id' => $id,
            'title' => $theme,
            'what' => $What,
            'where' => $Where,
            'when' => $When,
            'time_from' => $time_from,
            'time_to' => $time_to,
            'qualification' => $quali,
            'details' => $details,
        ];
        $mentorshopModel->insert($mntrshp_data);
        session()->setFlashdata('post_added', "Uploaded a new Post");

        $notification = new NotificationModel();
        $assistanceData = [
            'context' => 'Assistance',
            'audience' => '0',
            'content' => '&#x1F680; A new post has been published: ' . $theme,
        ];
        $notification->insert($assistanceData);

        // Notify User
        // $this->NotifyAllAlumni(3);
        return redirect()->to('AlumniAssociationController/AssistanceMainpage');
    }

    public function DeleteAssistance($id)
    {
        $assistanceModel = new AssistanceModel();
        $assistanceModel->where('assistance_id', $id)->delete();
        session()->setFlashdata('post_deleted', "Post have been Deleted");

        return redirect()->to("/AlumniAssociationController/AssistanceMainpage");
    }


    // public function AssistanceAutomaticDelete()
    // {
    //     $assistanceModel = new AssistanceModel();

    //     // $currentDate = date('Y-m-d');

    //     $data = [
    //         'is_expired' => 1,
    //     ];
    //     $assistanceModel->where('when < CURDATE()')->set($data)->update();


    // }



    public function AssistanceEditPage($mntrshp_id)
    {
        $model = new AssistanceModel();
        $mntrshp_info = $model->where('assistance_id', $mntrshp_id)->first();
        $details = $mntrshp_info['details'];
        $quali = $mntrshp_info['qualification'];
        $theme = $mntrshp_info['title'];
        $where = $mntrshp_info['where'];
        $what = $mntrshp_info['what'];
        $when = $mntrshp_info['when'];

        $data = [
            'assistance_id' => $mntrshp_id,
            'title' => $theme,
            'what' => $what,
            'when' => $when,
            'where' => $where,
            'qualification' => $quali,
            'details' => $details,
        ];

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniAssociationPages/assistance-update', $data);
    }

    public function AssistanceEditPost()
    {
        $mntrshp_id = $this->request->getPost('assistance_id');
        $model = new AssistanceModel();

        $data = [
            'title' => $this->request->getPost('theme'),
            'what' => $this->request->getPost('what'),
            'when' => $this->request->getPost('when'),
            'where' => $this->request->getPost('where'),
            'qualification' => $this->request->getPost('qualification'),
            'details' => $this->request->getPost('details'),
        ];
        $model->update($mntrshp_id, $data);

        session()->setFlashdata('post_edited', "Post have been Updated");
        return redirect()->to("/AlumniAssociationController/AssistanceMainpage");
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
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniAssociationPages/forum-mainpage', $data);
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
        $members = $userModel->where('major_id', $major_id)->where('is_approve', 'true')->findAll();

        // major details
        $major_title = $major_info['major_title'];
        $major_acrnm = $major_info['major_acronym'];

        // comments
        $_commentModel = new CommentModel();
        $_commentInfo = $_commentModel->findAll();

        // sub-comments
        $_commentSubModel = new ForumCommentSubModel();
        $_commentSubInfo = $_commentSubModel->findAll();

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

            // sub-comment
            '_commentSubInfo' => $_commentSubInfo
        ];

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniAssociationPages/forum-visit', $data);
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

    public function ForumValidation()
    {
        $user_id = session()->get('user_id');
        $frm_name = $this->request->getPost('forum_name');
        $major_id = $this->request->getPost('major_id');
        $dscrptn = $this->request->getPost('description');

        $first_letter = strtoupper(substr($frm_name, 0, 1));
        $img_path = "/assets/forum_picture/$first_letter.png";

        $forumPageData = [
            'major_id' => $major_id,
            'forum_name' => $frm_name,
            'description' => $dscrptn,
            'forum_photo' => $img_path,
            'user_id' => $user_id,
            'created_by' => 'ADMIN',
            'status' => 'APPROVED',
        ];
        $forumModel = new ForumModel();
        $forumModel->insert($forumPageData);

        session()->setFlashdata('forum_added', "Added new Forum Page");

        $notification = new NotificationModel();
        $forumData = [
            'context' => 'Forum',
            'audience' => $major_id,
            'content' => 'You have been added to a new group: ' . $frm_name,
        ];
        $notification->insert($forumData);

        return redirect()->to('AlumniAssociationController/ForumMainPage');
    }
    public function ForumUpload($forum_id)
    {
        $name = session()->get('name');
        $userType = session()->get('user_type');

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
                'user_type' => $userType,
                'major_id' => $forum_info['major_id'],
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
            $this->ForumPostNotification($forum_info['major_id'], 9);

            return redirect()->to("/AlumniAssociationController/ForumVisit/$forum_id");
        } else if ($post_type == '2') {
            $image = $this->request->getFile('image_only_upload');

            if ($image->getSize() > 5000000) {
                // return error
                session()->setFlashdata('unsucessful', "Invalid file. File exceeds the size limit.");
                return redirect()->to("/AlumniAssociationController/ForumVisit/$forum_id");
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
            $this->ForumPostNotification($forum_info['major_id'], 9);

            return redirect()->to("/AlumniAssociationController/ForumVisit/$forum_id");
        } else if ($post_type == '3') {
            $image = $this->request->getFile('image_upload');
            $captions = $this->request->getPost('caption');

            if ($image->getSize() > 5000000) {
                // return error
                session()->setFlashdata('unsucessful', "Invalid file. File exceeds the size limit.");
                return redirect()->to("/AlumniAssociationController/ForumVisit/$forum_id");
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
                'audience' => $forum_info['major_id'],
                'content' => 'A new post with an image and caption has been uploaded: ' . $captions,
            ];
            $notification->insert($forumData);

            // NOTIFY ALUMNI
            $this->ForumPostNotification($forum_info['major_id'], 9);

            return redirect()->to("/AlumniAssociationController/ForumVisit/$forum_id");
        } else {
            session()->setFlashdata('error', "Post failed");
            return redirect()->to('/AlumniAssociationController/ForumVisit');
        }
    }
    public function ModifyForumPhoto()
    {
        $forum_image = $this->request->getFile('forum_pic');
        $forum_visit = $this->request->getPost('forum_visit_id');

        $forumModel = new ForumModel();
        $img_path = "/assets/forum_picture";
        $directoryPath = FCPATH . $img_path;


        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        if ($forum_image && $forum_image->isValid()) {
            $forum_name = $forum_image->getName();
            $forum_path = "$img_path/$forum_name";
            $forumModel->update($forum_visit, ['forum_photo' => $forum_path]);

            // move
            $forum_image->move($directoryPath, $forum_name);

            session()->setFlashdata('edited', "Forum Image have been Updated");
            return redirect()->to("/AlumniAssociationController/ForumVisit/$forum_visit");
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

    public function DeleteForumAll($forum_id)
    {
        $forumModel = new ForumModel();
        $forumPostModel = new ForumPostModel();

        $forumModel->delete($forum_id);
        $forumPostModel->where('forum_id', $forum_id)->delete();

        session()->setFlashdata('forum_deleted', "Forum have been Deleted");
        return redirect()->to("/AlumniAssociationController/ForumMainpage");
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
            $notificationModel = new NotificationModel();
            $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

            return view('AlumniAssociationPages/learning-journey-mainpage', $data);
        }
    }

    public function UploadPage($folderId)
    {
        $data['folderId'] = $folderId;
        return view('/AlumniAssociationPages/learning-journey-upload', $data);
    }
    public function UploadPhoto()
    {
        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniAssociationPages/learning-journey-upload', $data);
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
        return redirect()->to("/AlumniAssociationController/LearningJourney");
    }

    public function DeleteFolder($id)
    {
        $model = new LearningJourneyModel();
        $model->delete($id);
        session()->setFlashdata('folder_deleted', 'Folder have been Deleted');

        return redirect()->to("/AlumniAssociationController/LearningJourney/$id");
    }

    // J O B  O F F E R  C O N T R O L L E R 
    public function JobOffer()
    {
        // Set the active nav
        session()->set(['nav_active' => "job_offer"]);

        $userModel = new UserModel();
        $data['members'] = $userModel->findAll();

        $assistanceModel = new AssistanceModel();
        $data['assistance'] = $assistanceModel->where('is_expired', '0')->orderBy('assistance_id', 'desc')->findAll();

        $jobOfferModel = new JobOfferModel();
        $data['job_offers'] = $jobOfferModel->orderBy('date', 'desc')->findAll();

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniAssociationPages/job-offer-mainpage', $data);
    }

    public function JobOfferUpload()
    {
        $jobModel = new JobOfferModel();
        $img_path = "/assets/job_offer";
        $directoryPath = FCPATH . $img_path;

        // Create folder path
        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        $post_type = $this->request->getPost('post_type');

        if ($post_type == '1') {
            $captions = $this->request->getPost('caption');

            // Caption Post
            $jobModel->insert([
                'post_type' => $post_type,
                'caption' => $captions,
            ]);

            session()->setFlashdata('job_offer_added', "Posted new Job Offer");

            $notification = new NotificationModel();
            $jobofferData = [
                'context' => 'Job Offer',
                'audience' => '0',
                'content' => 'Exploring new job opportunities? Take a look at this!: ' . $captions,
            ];
            $notification->insert($jobofferData);

            // Notify User
            $this->NotifyAllAlumni(4);


            return redirect()->to('/AlumniAssociationController/JobOffer');
        } else if ($post_type == '2') {
            $image = $this->request->getFile('image_only_upload');

            // Image Post
            $image_name = $image->getName();
            $image->move($directoryPath, $image_name);
            $image_path = "$img_path/$image_name";

            $jobModel->insert([
                'post_type' => $post_type,
                'image' => $image_path,
            ]);

            session()->setFlashdata('job_offer_added', "Posted new Job Offer");

            $notification = new NotificationModel();
            $jobofferData = [
                'context' => 'Job Offer',
                'audience' => '0',
                'content' => 'Exploring new job opportunities? A new image has been posted. Check this out!',
            ];
            $notification->insert($jobofferData);

            // Notify User
            $this->NotifyAllAlumni(4);

            return redirect()->to('/AlumniAssociationController/JobOffer');
        } else if ($post_type == '3') {
            $image = $this->request->getFile('image_upload');
            $captions = $this->request->getPost('caption');

            // Image and Caption Post
            $image_name = $image->getName();
            $image->move($directoryPath, $image_name);
            $image_path = "$img_path/$image_name";

            $jobModel->insert([
                'post_type' => $post_type,
                'caption' => $captions,
                'image' => $image_path,
            ]);

            session()->setFlashdata('job_offer_added', "Posted new Job Offer");

            $notification = new NotificationModel();
            $jobofferData = [
                'context' => 'Job Offer',
                'audience' => '0',
                'content' => 'Exploring new job opportunities? Take a look at this!: ' . $captions,
            ];
            $notification->insert($jobofferData);

            // Notify User
            $this->NotifyAllAlumni(4);

            return redirect()->to('/AlumniAssociationController/JobOffer');
        } else {
            session()->setFlashdata('error', "Post failed");
            return redirect()->to('/AlumniAssociationController/JobOffer');
        }
    }

    public function DeletePost($id)
    {
        $model = new JobOfferModel();
        $model->delete($id);
        session()->setFlashdata('job_offer_deleted', "Deleted Job Offer Post");

        return redirect()->to('/AlumniAssociationController/JobOffer');
    }

    // F O R U M  R E Q U E S T  P A G E

    public function ForumRequestMainpage()
    {

        // Set the active nav
        session()->set(['nav_active' => "forum_request"]);

        $model = new MajorModel();
        $data['majors'] = $model->findAll();

        $forumModel = new ForumModel();
        $data['info'] = $forumModel->where('status', 'PENDING')->findAll();


        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniAssociationPages/forum-request-mainpage', $data);
    }

    public function RemoveRequest($id)
    {
        $model = new ForumModel();
        $forum = $model->find($id);
        $model->delete($id);

        // Notify User
        $user_id = $forum['user_id'];

        $userModel = new UserModel();
        $user = $userModel->find($user_id);
        $email = $user['email'];

        if ($email) {
            $this->SendEmail($email, 7);
        }

        session()->setFlashdata('deleted', 'Request has been removed');

        return redirect()->to("/AlumniAssociationController/ForumRequestMainpage/$id");
    }

    public function ApprovedRequest($id)
    {

        $model = new ForumModel();
        $forum = $model->find($id);
        $model->update($id, ['status' => 'APPROVED']);

        $notification = new NotificationModel();
        $forumData = [
            'context' => 'Forum',
            'audience' => '0',
            'content' => 'A new forum page has been added!',
        ];
        $notification->insert($forumData);

        // Notify User
        $user_id = $forum['user_id'];

        $userModel = new UserModel();
        $user = $userModel->find($user_id);
        $email = $user['email'];

        if ($email) {
            $this->SendEmail($email, 2);
        }


        session()->setFlashdata('success', 'Request has been approved successfully');
        return redirect()->to("/AlumniAssociationController/ForumRequestMainpage/$id");
    }


    // G E N E R A T E  P D F

    public function Print()
    {
    }

    public function GeneratePDF($year_graduated_id)
    {
        $userModel = new UserModel();
        $members = $userModel->where('year_graduated_id', $year_graduated_id)->where('is_approve', 'true')->findAll();

        $data['members'] = $members;

        $dompdf = new Dompdf();
        $html = view('/AlumniAssociationPages/pdf-template', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("output.pdf", ['Attachment' => false]);
    }

    // T R A C E R   S T U D Y 

    public function TracerStudyMainPage()
    {
        // Set the active nav
        session()->set(['nav_active' => "tracer_study"]);

        $schoolYearModel = new SchoolYearModel();
        $year_graduated = $schoolYearModel->findAll();

        $tracerStudyHeaderModel = new TracerStudyHeaderModel();
        $headers = $tracerStudyHeaderModel->findAll();

        $data = [
            'year_graduated' => $year_graduated,
            'header' => $headers,
        ];

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();


        return view('/AlumniAssociationPages/tracer-study-mainpage', $data);
    }

    public function PostTracerStudy()
    {
        $rqst_year_graduated = $this->request->getPost('year_graduated');
        $rqst_caption = $this->request->getPost('caption');

        $_explode = explode(':', $rqst_year_graduated);
        $model = new TracerStudyHeaderModel();
        $check_post = $model->where('year_graduated', $_explode[1])->first();

        if (!$check_post) {
            $_data = [
                'year_graduated_id' => $_explode[0],
                'year_graduated' => $_explode[1],
                'caption' => $rqst_caption,
            ];
            $model->insert($_data);

            $userModel = new UserModel();
            $year_graduated = $_explode[1];
            $user_year_graduated = $userModel->where('year_graduated', $year_graduated)->findAll();

            $modelTracerStudy = new TracerStudyHeaderModel();
            $headerID = $modelTracerStudy->where('year_graduated', $year_graduated)->first();

            if ($headerID) {
                foreach ($user_year_graduated as $user) {
                    $_user_data = [
                        'tracer_study_header_id' => $headerID['id'],
                        'is_tracer_study' => 'true',
                    ];
                    $userModel->update($user['user_id'], $_user_data);
                }
            }

            // Notify User
            $this->TracerStudyNotification($_explode[1], 5);
            session()->setFlashdata('post_added', 'Successfully Post Tracer Study');

        } else {
            session()->setFlashdata('unsucessful', $_explode[1] . ' ' . 'Tracer Study is already exist');
        }

        return redirect()->back();

    }

    public function TracerStudyResult($result)
    {
        $tracerStudyHeaderModel = new TracerStudyHeaderModel();
        $test = $tracerStudyHeaderModel->where('id', $result)->first();
        $header = $test;

        $tracerStudy = new TracerStudyModel();
        $checkResult = $tracerStudy->where('tracer_study_header_id', $header['id'])->first();
        // R E S U L T  C O U N T S 
        $resultCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->countAllResults();
        $emailCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('email IS NOT NULL')->countAllResults();
        $fullNameCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('full_name IS NOT NULL')->countAllResults();
        $addressCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('address IS NOT NULL')->countAllResults();
        $mobileNumberCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('mobile_number IS NOT NULL')->countAllResults();
        $civilStatusCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('civil_status IS NOT NULL')->countAllResults();
        $sexCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('sex IS NOT NULL')->countAllResults();
        $birthdateCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('birthdate IS NOT NULL')->countAllResults();
        $regionCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('region IS NOT NULL')->countAllResults();
        $provinceCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('province IS NOT NULL')->countAllResults();
        $cityResidenceCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('residence IS NOT NULL')->countAllResults();
        $yrGraduatedCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('year_graduated IS NOT NULL')->countAllResults();
        $degreeeCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('degree IS NOT NULL')->countAllResults();
        $universityCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('university IS NOT NULL')->countAllResults();
        $awardCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('award IS NOT NULL')->countAllResults();
        $courseReasonCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_reason IS NOT NULL')->countAllResults();
        $nameEPCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('exam_passed_name IS NOT NULL')->countAllResults();
        $dateEPCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('exam_passed_date IS NOT NULL')->countAllResults();
        $ratingEPCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('exam_passed_rating IS NOT NULL')->countAllResults();
        $trainingTitleCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('training_title IS NOT NULL')->countAllResults();
        $trainingDurationCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('training_duration IS NOT NULL')->countAllResults();
        $trainingCreditEarnedCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('training_credits_earned IS NOT NULL')->countAllResults();
        $trainingInstitutionCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('training_institution IS NOT NULL')->countAllResults();
        $notEmployedReasonCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('not_employed_reason IS NOT NULL')->countAllResults();

        // C I V I L   S T A T U S
        $civilStatusSingleCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('civil_status', 'SINGLE')->countAllResults();
        $civilStatusMarriedCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('civil_status', 'MARRIED')->countAllResults();
        $civilStatusSeparateCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('civil_status', 'SEPARATE')->countAllResults();
        $civilStatusSingleParentCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('civil_status', 'SINGLE PARENT')->countAllResults();
        $civilStatusWidowCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('civil_status', 'WIDOW OR WIDOWER')->countAllResults();

        // G E N D E R
        $genderFemaleCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('sex', 'FEMALE')->countAllResults();
        $gendermMaleCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('sex', 'MALE')->countAllResults();

        // R E S I D E N C E
        $cityCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('residence', 'CITY')->countAllResults();
        $municipalityCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('residence', 'MUNICIPALITY')->countAllResults();

        // D E G R E E
        $degreeCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('degree', 'BTTE / BTVTE')->countAllResults();

        // U N I V E R S I T Y
        $universityTUPTCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('university', 'TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES - TAGUIG')->countAllResults();
        $universityOthersCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('university', 'OTHERS')->countAllResults();

        // I S  E M P L O Y E D
        $employedCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('is_employed', 'YES')->countAllResults();
        $notEmployedCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('is_employed', 'NO')->countAllResults();
        $neverBeenEmployedCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('is_employed', 'NEVER BEEN EMPLOYED')->countAllResults();

        // E M P L O Y E M E N T  S T A T U S
        $employmentStatusRegularCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('employed_employment_status', 'REGULAR OR PERMANENT')->countAllResults();
        $employmentStatusContractualCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('employed_employment_status', 'CONTRACTUAL')->countAllResults();
        $employmentStatusTemporaryCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('employed_employment_status', 'TEMPORARY')->countAllResults();
        $employmentStatusSelfEmployedCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('employed_employment_status', 'SELF-EMPLOYED')->countAllResults();
        $employmentStatusCasualCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('employed_employment_status', 'CASUAL')->countAllResults();

        // S E C T I O N  5
        $occupationCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('employed_occupation IS NOT NULL')->countAllResults();
        $skillCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('employed_skill_acquired IS NOT NULL')->countAllResults();
        $businessLineCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('employed_business_line IS NOT NULL')->countAllResults();
        $workPlaceCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('employed_work_place IS NOT NULL')->countAllResults();
        $isFirstJobCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('is_first_job IS NOT NULL')->countAllResults();

        // S E C T I O N  6
        $reasonForStayingCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_reson_for_staying IS NOT NULL')->countAllResults();
        $courseRelatedCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('is_first_job_course_related IS NOT NULL')->countAllResults();
        $firstJobReferralCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_referral IS NOT NULL')->countAllResults();

        // R E A S O N  F O R  C H A N G I N G  J O B
        $salariesCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('reason_for_changing', 'SALARIES AND BENEFITS')->countAllResults();
        $careerCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('reason_for_changing', 'CAREER CHALLEGE')->countAllResults();
        $specialSkillCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('reason_for_changing', 'RELATED TO SPECIAL SKILL')->countAllResults();
        $relatedToCourseCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('reason_for_changing', 'RELATED TO COURSE')->countAllResults();
        $residenceCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('reason_for_changing', 'PROXIMITY TO RESIDENCE')->countAllResults();
        $peerInfluenceCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('reason_for_changing', 'PEER INFLUENCE')->countAllResults();

        // H O W  L O N G  D I D  Y O U  S T A Y   I N   F I  R S T  J O B
        $monthCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_duration', 'LESS THAN A MONTH')->countAllResults();
        $OneToSixCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_duration', '1 TO 6 MONTHS')->countAllResults();
        $sevenElevenCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_duration', '7 TO 11 MONTHS')->countAllResults();
        $oneToTwoYearsCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_duration', '1 YEAR TO LESS THAN 2 YEARS')->countAllResults();
        $TwoToThreeYearsCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_duration', '2 YEARS TO LESS THAN 3 YEARS')->countAllResults();
        $ThreeToFourYearsCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_duration', '3 YEARS TO LESS THAN 4 YEARS')->countAllResults();
        $FiveYearsAboveCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_duration', '5 YEARS AND ABOVE')->countAllResults();

        // H O W  L O N G  D I D  I T  T A K E  Y O U  T O  L A N D   F I  R S T  J O B
        $monthLandCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_land_duration', 'LESS THAN A MONTH')->countAllResults();
        $OneToSixLandCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_land_duration', '1 TO 6 MONTHS')->countAllResults();
        $sevenElevenLandCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_land_duration', '7 TO 11 MONTHS')->countAllResults();
        $oneToTwoYearsLandCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_land_duration', '1 YEAR TO LESS THAN 2 YEARS')->countAllResults();
        $TwoToThreeYearsLandCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_land_duration', '2 YEARS TO LESS THAN 3 YEARS')->countAllResults();
        $ThreeToFourYearsLandCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_land_duration', '3 YEARS TO LESS THAN 4 YEARS')->countAllResults();
        $FiveYearsAboveLandCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_land_duration', '5 YEARS AND ABOVE')->countAllResults();

        // F I R S T  J O B  P O S I T I O N
        $firstJobRankCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_level_position', 'RANK OR CLERICAL')->countAllResults();
        $firstJobTechnicalCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_level_position', 'PROFESSIONAL, TECHNICAL')->countAllResults();
        $firstJobSupervisorCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_level_position', 'SUPERVISORY')->countAllResults();
        $firstJobManagerCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_level_position', 'MANAGERIAL OR EXECUTIVE')->countAllResults();
        $firstJobSelfEmployedCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_level_position', 'SELF-EMPLOYED')->countAllResults();

        // C U R R E N T  J O B  P O S I T I O N
        $currentJobRankCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('current_job_level_position', 'RANK OR CLERICAL')->countAllResults();
        $currentJobTechnicalCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('current_job_level_position', 'PROFESSIONAL, TECHNICAL')->countAllResults();
        $currentJobSupervisorCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('current_job_level_position', 'SUPERVISORY')->countAllResults();
        $currentJobManagerCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('current_job_level_position', 'MANAGERIAL OR EXECUTIVE')->countAllResults();
        $currentJobSelfEmployedCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('current_job_level_position', 'SELF-EMPLOYED')->countAllResults();

        // I N I T I A L  G R O S S
        $belowFiveKCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_income', 'Below P5,000.00')->countAllResults();
        $fiveKCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_income', 'P5,000.00 to less than P10,000.00')->countAllResults();
        $tenKCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_income', 'P10,000.00 to less than P15,000.00')->countAllResults();
        $fiftenKCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_income', 'P15,000.00 to less than P20,000.00')->countAllResults();
        $twentyKCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_income', 'P15,000.00 to less than P20,000.00')->countAllResults();
        $twentyKAboveCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('first_job_income', 'P25,000.00 AND ABOVE')->countAllResults();

        // C U R R I C U L U  M   R E L E V  E N T
        $curriculumRelatedYesCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('is_job_curriculum_related', 'YES')->countAllResults();
        $curriculumRelatedNoCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('is_job_curriculum_related', 'NO')->countAllResults();

        // L E A R N   C O M P E T E N C Y
        $CSCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('useful_competencies', 'COMMUNICATION SKILLS')->countAllResults();
        $HRSCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('useful_competencies', 'HUMAN RELATIONS SKILLS')->countAllResults();
        $ESCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('useful_competencies', 'ENTREPRENEURIAL SKILLS')->countAllResults();
        $ITSCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('useful_competencies', 'INFORMATION TECHNOLOGY SKILLS')->countAllResults();
        $PSSCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('useful_competencies', 'PROBLEM-SOLVING SKILLS')->countAllResults();
        $CTSCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('useful_competencies', 'CRITICAL THINKING SKILLS')->countAllResults();

        // S E C T I O N  7
        $courseRelatedFirstJobCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_first_job IS NOT NULL')->countAllResults();

        // C O U R S E  R E L A T E D  F I R S T  J O B  D U R A T I O N
        $monthLandCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_land_job_duration', 'LESS THAN A MONTH')->countAllResults();
        $OneToSixLandCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_land_job_duration', '1 TO 6 MONTHS')->countAllResults();
        $sevenElevenLandCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_land_job_duration', '7 TO 11 MONTHS')->countAllResults();
        $oneToTwoYearsLandCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_land_job_duration', '1 YEAR TO LESS THAN 2 YEARS')->countAllResults();
        $TwoToThreeYearsLandCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_land_job_duration', '2 YEARS TO LESS THAN 3 YEARS')->countAllResults();
        $ThreeToFourYearsLandCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_land_job_duration', '3 YEARS TO LESS THAN 4 YEARS')->countAllResults();
        $FiveYearsAboveLandCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_land_job_duration', '5 YEARS AND ABOVE')->countAllResults();

        // C O U R S E  R E L A T E D  I N I T I A L  G R O S S
        $belowFiveKCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_income', 'Below P5,000.00')->countAllResults();
        $fiveKCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_income', 'P5,000.00 to less than P10,000.00')->countAllResults();
        $tenKCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_income', 'P10,000.00 to less than P15,000.00')->countAllResults();
        $fiftenKCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_income', 'P15,000.00 to less than P20,000.00')->countAllResults();
        $twentyKCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_income', 'P15,000.00 to less than P20,000.00')->countAllResults();
        $twentyKAboveCRCount = $tracerStudy->where('tracer_study_header_id', $header['id'])->where('course_related_income', 'P25,000.00 AND ABOVE')->countAllResults();


        $userModel = new UserModel();


        // E M A I L  V I E W  R E S U L T
        $resultView = $tracerStudy->where('tracer_study_header_id', $header['id'])->findAll();


        $data = [

            // E M A I L  V I E W  R E S U L T
            'resultView' => $resultView,
            'year_graduated' => $header,

            'results' => $header,
            'countResult' => $resultCount,
            'dataResult' => $checkResult,
            'countEmail' => $emailCount,
            'countFullName' => $fullNameCount,
            'countAddress' => $addressCount,
            'countMobileNumber' => $mobileNumberCount,
            'countCivilStatus' => $civilStatusCount,
            'countSex' => $sexCount,
            'countBirthdate' => $birthdateCount,
            'countRegion' => $regionCount,
            'countProvince' => $provinceCount,
            'countCityResidence' => $cityResidenceCount,
            'countYrGraduated' => $yrGraduatedCount,
            'countDegreee' => $degreeeCount,
            'countUniversity' => $universityCount,
            'countAward' => $awardCount,
            'countCourseReason' => $courseReasonCount,
            'counNameEP' => $nameEPCount,
            'countDateEP' => $dateEPCount,
            'countRatingEP' => $ratingEPCount,
            'countTrainingTitle' => $trainingTitleCount,
            'countTrainingDuration' => $trainingDurationCount,
            'countTrainingCreditEarned' => $trainingCreditEarnedCount,
            'countTrainingInstitution' => $trainingInstitutionCount,
            'countNotEmployedReason' => $notEmployedReasonCount,

            // C I V I L   S T A T U S
            'countSingle' => $civilStatusSingleCount,
            'countMarried' => $civilStatusMarriedCount,
            'countSingleParent' => $civilStatusSingleParentCount,
            'countSeparate' => $civilStatusSeparateCount,
            'countWidow' => $civilStatusWidowCount,

            // G E N D E R
            'countFemale' => $genderFemaleCount,
            'countMale' => $gendermMaleCount,

            // R E S I D E N C E
            'countCity' => $cityCount,
            'countMunicipality' => $municipalityCount,

            // D E G R E E
            'degreeCount' => $degreeCount,

            // U N I V E R S I T Y
            'countUniTupt' => $universityTUPTCount,
            'countUniOthers' => $universityOthersCount,

            // I S  E M P L O Y E D
            'countEmployed' => $employedCount,
            'countNotEmployed' => $notEmployedCount,
            'countNeverBeenEmployed' => $neverBeenEmployedCount,

            // E M P L O Y E M E N T  S T A T U S
            'countRegular' => $employmentStatusRegularCount,
            'countTemporary' => $employmentStatusTemporaryCount,
            'countContractual' => $employmentStatusContractualCount,
            'countSelfEmployed' => $employmentStatusSelfEmployedCount,
            'countCasual' => $employmentStatusCasualCount,

            // S E C T I O N  5
            'countOccupation' => $occupationCount,
            'countSkill' => $skillCount,
            'countBusinessLine' => $businessLineCount,
            'countWorkPlace' => $workPlaceCount,
            'countIsFirstJob' => $isFirstJobCount,

            // S E C T I O N  6
            'countReasonForStaying' => $reasonForStayingCount,
            'countCourseRelated' => $courseRelatedCount,
            'countFirstJobReferral' => $firstJobReferralCount,

            // R E A S O N  F O R  C H A N G I N G  J O B
            'countSalaries' => $salariesCount,
            'countCareer' => $careerCount,
            'countSpeacialSkill' => $specialSkillCount,
            'countRelatedToCourse' => $relatedToCourseCount,
            'residenceCount' => $residenceCount,
            'countPeerInfluence' => $peerInfluenceCount,

            // J O B  D U R A T I O N
            'countMonth' => $monthCount,
            'countOneToSixMonths' => $OneToSixCount,
            'countSevenToSixMonths' => $sevenElevenCount,
            'countOneToTwoYears' => $oneToTwoYearsCount,
            'countTwoToThreeYears' => $TwoToThreeYearsCount,
            'countThreeToFourYears' => $ThreeToFourYearsCount,
            'countFiveYearsAbove' => $FiveYearsAboveCount,

            // J O B  L A N D  D U R A T I O N
            'countLandMonth' => $monthLandCount,
            'countLandOneToSixMonths' => $OneToSixLandCount,
            'countLandSevenToSixMonths' => $sevenElevenLandCount,
            'countLandOneToTwoYears' => $oneToTwoYearsLandCount,
            'countLandTwoToThreeYears' => $TwoToThreeYearsLandCount,
            'countLandThreeToFourYears' => $ThreeToFourYearsLandCount,
            'countLandFiveYearsAbove' => $FiveYearsAboveLandCount,

            // F I R S T  J O B  P O S I T I O N
            'countFirstJobRank' => $firstJobRankCount,
            'countFirstJobTechnical' => $firstJobTechnicalCount,
            'countFirstJobSupervisors' => $firstJobSupervisorCount,
            'countFirstJobManager' => $firstJobManagerCount,
            'countFirstJobSelfEmployed' => $firstJobSelfEmployedCount,

            // C U R R E N T  J O B  P O S I T I O N
            'countCurrentJobRank' => $currentJobRankCount,
            'countCurrentJobTechnical' => $currentJobTechnicalCount,
            'countCurrentJobSupervisors' => $currentJobSupervisorCount,
            'countCurrentJobManager' => $currentJobManagerCount,
            'countCurrentJobSelfEmployed' => $currentJobSelfEmployedCount,

            // I N I T I A L  G R O S S
            'countbBelowFiveK' => $belowFiveKCount,
            'countFiveK' => $fiveKCount,
            'countTenK' => $tenKCount,
            'countFiftenK' => $fiftenKCount,
            'countTwentyK' => $twentyKCount,
            'countTwentyKAbove' => $twentyKAboveCount,

            // C U R R I C U L U  M   R E L E V  E N T
            'countCurriculumRelatedYes' => $curriculumRelatedYesCount,
            'countCurriculumRelatedNo' => $curriculumRelatedNoCount,

            // L E A R N   C O M P E T E N C Y
            'countCS' => $CSCount,
            'countHRS' => $HRSCount,
            'countES' => $ESCount,
            'countITS' => $ITSCount,
            'countPSS' => $PSSCount,
            'countCTS' => $CTSCount,

            // S E C T I O N  7
            'countCourseRelatedFirstJob' => $courseRelatedFirstJobCount,
            'countCRLandMonth' => $monthLandCRCount,
            'countCRLandOneToSixMonths' => $OneToSixLandCRCount,
            'countCRLandSevenToSixMonths' => $sevenElevenLandCRCount,
            'countCRLandOneToTwoYears' => $oneToTwoYearsLandCRCount,
            'countCRLandTwoToThreeYears' => $TwoToThreeYearsLandCRCount,
            'countCRLandThreeToFourYears' => $ThreeToFourYearsLandCRCount,
            'countCRLandFiveYearsAbove' => $FiveYearsAboveLandCRCount,

            // C O U R S E  R E L A T E D  I N I T I A L  G R O S S
            'countCRbBelowFiveK' => $belowFiveKCRCount,
            'countCRFiveK' => $fiveKCRCount,
            'countCRTenK' => $tenKCRCount,
            'countCRFiftenK' => $fiftenKCRCount,
            'countCRTwentyK' => $twentyKCRCount,
            'countCRTwentyKAbove' => $twentyKAboveCRCount,
        ];

        // D I S P L A Y   N O T I F I C A T I O N
        $notificationModel = new NotificationModel();
        $data['notif'] = $notificationModel->where('audience', '7')->orderBy('date_time', 'desc')->findAll();

        return view('/AlumniAssociationPages/tracer-study-result-page', $data);
    }

    public function TracerStudyDelete($id)
    {
        $tracerStudyHeader = new TracerStudyHeaderModel();
        $_tracerStudyheaderID = $tracerStudyHeader->where('id', $id)->first();
        $test = $_tracerStudyheaderID['id'];

        $userModel = new UserModel();
        $users_year_graduated = $userModel->where('tracer_study_header_id', $test)->findAll();

        $data = [
            'is_tracer_study' => 'false',
        ];

        foreach ($users_year_graduated as $user) {
            $userModel->update($user['user_id'], $data);
        }

        $_tracerStudyData = new TracerStudyModel();
        $_tracerStudyData->where('tracer_study_header_id', $test)->delete();

        $_deleteTracerStudyHeader = new TracerStudyHeaderModel();
        $_deleteTracerStudyHeader->where('id', $id)->delete();

        session()->setFlashdata('deleted', 'Successfully Deleted');
        return redirect()->back();
    }


    public function AddSchoolYear()
    {
        $rqst_sy = $this->request->getPost('school_year');

        $model = new SchoolYearModel();
        $_check = $model->where('school_year', $rqst_sy)->first();

        if (!$_check) {
            $_data = [
                'school_year' => $rqst_sy,
            ];
            $model->insert($_data);
            session()->setFlashdata('success', 'Successfully Added the School Year');
            return redirect()->back();
        } else {
            session()->setFlashdata('unsucessful', 'School Year is already exist');
            return redirect()->back();
        }
    }


    public function NotifyAllAlumni($messagetype)
    {
        $userModel = new UserModel();
        $alumnis = $userModel->where('user_type', '0')->where('is_approve', 'true')->findAll();

        if (!empty($alumnis)) {
            foreach ($alumnis as $alumni) {
                $email = $alumni['email'];
                if (!empty($email)) {
                    $this->SendEmail($email, $messagetype);
                }
            }
        }
    }

    public function TracerStudyNotification($yearGraduated, $messagetype)
    {
        $userModel = new UserModel();
        $alumnis = $userModel->where('user_type', '0')->where('is_approve', 'true')->where('year_graduated', $yearGraduated)->findAll();

        if (!empty($alumnis)) {
            foreach ($alumnis as $alumni) {
                $email = $alumni['email'];
                if (!empty($email)) {
                    $this->SendEmail($email, $messagetype);
                }
            }
        }
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
                'title' => 'Account Approved!',
                'subject' => 'Notification Account Status',
                'message' => 'Thank you for registering with WAETS! We are excited to have you on board. Your account has been approved, and you can now log in to access all our features. Welcome to WAETS!',
            ];
        } elseif ($messagetype == 2) {
            return [
                'title' => 'Request Forum Approved!',
                'subject' => 'Notification Forum Status',
                'message' => 'Your forum request has been approved by the administrator! You can check it now and join the discussion. Feel free to share your experience, engage with others, and contribute your thoughts. Happy posting!',
            ];
        } elseif ($messagetype == 3) {
            return [
                'title' => 'Assistance',
                'subject' => 'Assistance Notification',
                'message' => 'Come and join us! The admin has posted an important assistance update. Check it out now and feel free to start new discussions, share your experiences, and connect with others!',
            ];

        } elseif ($messagetype == 4) {
            return [
                'title' => 'Job Offer',
                'subject' => 'Job Offer Notification',
                'message' => 'Looking for a job? Come and check it out! The admin has posted a new job opportunity. Do not miss out—explore, apply, and take the next step in your career!',
            ];

        } elseif ($messagetype == 5) {
            return [
                'title' => 'Tracer Study',
                'subject' => 'Tracer Study Notification',
                'message' => 'The admin has posted a tracer study, and your participation would be deeply appreciated! We just want to stay connected, learn about your journey, and improve our programs. Check it out and share your insights!',
            ];

        } elseif ($messagetype == 6) {
            return [
                'title' => 'Account Denied',
                'subject' => 'Notification Account Status',
                'message' => 'Thank you for registering with WAETS! We are excited to have you on board. Unfortunately, your account has been denied. Please check your email for further details and feel free to contact us if you have any questions. We hope to welcome you again soon!',
            ];

        } elseif ($messagetype == 7) {
            return [
                'title' => 'Request Forum Denied!',
                'subject' => 'Notification Forum Status',
                'message' => 'Your forum request has been declined by the administrator. Please feel free to reach out if you have any questions or need assistance. We appreciate your interest!',
            ];
        } elseif ($messagetype == 8) {
            return [
                'title' => 'Dashboard Update',
                'subject' => 'Notification Dashboard Update',
                'message' => 'The admin has posted an update on the dashboard! Check it out to stay informed, get the latest updates, and stay connected. Do not miss out!',
            ];
        } elseif ($messagetype == 9) {
            return [
                'title' => 'New Forum Post',
                'subject' => 'Notification Forum Post',
                'message' => 'A new post is up on the forum page! Check it out, join the discussion, and share your thoughts. Stay engaged and be part of the conversation!',
            ];
        }
    }

    public function admin()
    {
        $a = 'ep2Wa3t$_';
        $b = '5arWa3t$_';
        $c = '99eWa3t$_';

        $hased1 = password_hash($a, PASSWORD_BCRYPT);
        $hased2 = password_hash($b, PASSWORD_BCRYPT);
        $hased3 = password_hash($c, PASSWORD_BCRYPT);

        // echo $hased1;
        // echo $hased2;
        echo $hased3;
    }
}
