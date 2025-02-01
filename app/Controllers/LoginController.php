<?php

namespace App\Controllers;

use App\Models\MajorModel;
use App\Models\TracerStudyHeaderModel;
use App\Models\UserModel;
use App\Models\AdminMasterKeyModel;
use App\Models\SchoolYearModel;

class LoginController extends BaseController
{

    // user type
    public function UserType()
    {
        return view('/indexPages/user-type');
    }

    // login
    public function AlumniAssociationLoginPage()
    {
        return view('/indexPages/alumni-association-login');
    }

    public function AlumniMembersLoginPage()
    {
        return view('/indexPages/alumni-members-login');
    }

    // register
    public function AlumniAssociationRegisterPage()
    {
        $model = new MajorModel();
        $data['majors'] = $model->findAll();
        return view('/indexPages/alumni-association-register', $data);
    }

    public function AlumniMembersRegisterPage()
    {
        $model = new MajorModel();
        $major = $model->findAll();

        $schoolYearModel = new SchoolYearModel();
        $schoolYear = $schoolYearModel->findAll();

        $data = [
            'majors' => $major,
            'yearGraduated' => $schoolYear,
        ];

        return view('/indexPages/alumni-members-register', $data);
    }

    // validations
    public function LoginValidation($user_type)
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new UserModel();
        $check_user = $model->where('username', $username)->where('is_approve', 'true')->first();
        $check_user_approval = $model->where('username', $username)->where('is_approve', 'false')->first();

        // check who is logging in
        // alumni ass
        if ($user_type == 1) {

            $adminKey = new AdminMasterKeyModel();
            $check_admin_key = $adminKey->where('user_name', $username)->first();

            // check if user type is the same position of logging user 
            // user type is alumni ass.
            if ($check_admin_key) {
                // check if user exist
                if ($user_type == $check_admin_key['user_type']) {
                    $userpass = $check_admin_key['password'];
                    // check if password match
                    if (password_verify($password, $userpass)) {
                        // session user data
                        $user_data = [
                            'is_logged' => 'true',
                            'user_logged_id' => $check_admin_key['id'],
                            'user_logged_un' => $check_admin_key['user_name'],
                            'user_type' => $check_admin_key['user_type'],
                            'user_id' => $check_admin_key['id'],
                            'name' => $check_admin_key['full_name'],
                            'status' => $check_admin_key['status'],
                            'profile_pic' => $check_admin_key['profile_pic'],
                            // 'year_graduated' => $check_admin_key['year_graduated'],

                            'nav_active' => "dashboard",
                        ];

                        session()->set($user_data);
                        // update db - active 
                        $userModel = new UserModel();
                        $userModel->update($check_admin_key['id'], ['status' => 'online']);

                        session()->setFlashdata('success', "Welcome back! " . $check_admin_key['full_name']);
                        return redirect()->to('/AlumniAssociationController/dashboard');
                    } else {
                        session()->setFlashdata('unsucessful', "Password is incorrect");
                        return redirect()->to('/LoginController/AlumniAssociationLoginPage');
                    }
                } else {
                    session()->setFlashdata('unsucessful', "Username / Password is incorrect");
                    return redirect()->to('/LoginController/AlumniAssociationLoginPage');
                }
            } else {
                session()->setFlashdata('unsucessful', "Username / Password is incorrect");
                return redirect()->to('/LoginController/AlumniAssociationLoginPage');
            }
        }
        // alumni mem.
        elseif ($user_type == 0) {
            // check if user type is the same position of logging user 
            // user type is alumni ass.
            if ($check_user) {
                // check if user exist
                if ($user_type == $check_user['user_type']) {
                    $userpass = $check_user['password'];
                    // check if password match
                    if (password_verify($password, $userpass)) {
                        // session user data
                        $user_data = [
                            'is_logged' => 'true',
                            'user_logged_id' => $check_user['user_id'],
                            'user_logged_un' => $check_user['username'],
                            'user_type' => $check_user['user_type'],
                            'user_id' => $check_user['user_id'],
                            'address' => $check_user['address'],
                            'name' => $check_user['full_name'],
                            'first_name' => $check_user['first_name'],
                            'middle_initial' => $check_user['middle_initial'],
                            'last_name' => $check_user['last_name'],
                            'tupt' => $check_user['tupt_id'],
                            'email' => $check_user['email'],
                            'major' => $check_user['major'],
                            'major_id' => $check_user['major_id'],
                            'phone' => $check_user['phone_number'],
                            'status' => $check_user['status'],
                            'profile_pic' => $check_user['profile_pic'],
                            'year_graduated_id' => $check_user['year_graduated_id'],
                            'year_graduated' => $check_user['year_graduated'],
                            'tracer_study_header_id' => $check_user['tracer_study_header_id'],
                            'is_tracer_study' => $check_user['is_tracer_study'],
                        ];
                        session()->set($user_data);

                        // update db - active 
                        $userModel = new UserModel();
                        $userModel->update($check_user['user_id'], ['status' => 'online']);

                        session()->setFlashdata('success', "Welcome back! " . $check_user['full_name']);
                        return redirect()->to('/AlumniController/Dashboard');
                    } else {
                        session()->setFlashdata('unsucessful', "Password is incorrect");
                        return redirect()->to('/LoginController/AlumniMembersLoginPage');
                    }
                } else {
                    session()->setFlashdata('unsucessful', "Username / Password is incorrect");
                    return redirect()->to('/LoginController/AlumniMembersLoginPage');
                }
            } else if ($check_user_approval) {
                session()->setFlashdata('unsucessful', "Your registered account is still awaiting approval by the admin. We'll notify you once it's been approved.");
                return redirect()->to('/LoginController/AlumniMembersLoginPage');
            } else {
                session()->setFlashdata('unsucessful', "You still do not have an account to log in.");
                return redirect()->to('/LoginController/AlumniMembersLoginPage');
            }
        }
    }

    public function SendOTP()
    {
        $tupt = $this->request->getPost('tupt_id');
        $last_name = $this->request->getPost('last_name');
        $first_name = $this->request->getPost('first_name');
        $middle_initial = $this->request->getPost('middle_name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phoneNumber');
        $program = $this->request->getPost('program');
        $yeargraduated = $this->request->getPost('year_graduated');
        $user_type = $this->request->getPost('userType');
        $username = $this->request->getPost('user_name');
        $password = $this->request->getPost('password');
        $hashed = password_hash($password, PASSWORD_BCRYPT);

        $_explode = explode(':', $program);
        $_explodeYearGraduated = explode(':', $yeargraduated);

        $model = new UserModel();
        $_user = $model->where('tupt_id', $tupt)->first();

        if ($_user) {
            session()->setFlashdata('unsucessful', "TUPT-ID already exist");
            return redirect()->back();
        }
        $alumniRegistration = [
            'tupt_id' => $tupt,
            'email' => $email,
            'username' => $username,
            'password' => $hashed,
            'last_name' => $last_name,
            'first_name' => $first_name,
            'middle_initial' => $middle_initial,
            'full_name' => $last_name . ', ' . $first_name . ' ' . $middle_initial,
            'phone_number' => $phone,
            'user_type' => $user_type,
            'major_id' => $_explode[0],
            'major' => $_explode[1],
            'year_graduated_id' => $_explodeYearGraduated[0],
            'year_graduated' => $_explodeYearGraduated[1],
        ];
        session()->set($alumniRegistration);

        // check internet connection
        helper('network');
        if (!is_connected()) {
            session()->setFlashdata('internet_failed', "No Internet Connection!");
            return redirect()->back();
        }

        // email data
        $verification = mt_rand(100000, 999999);
        $subject = "OTP Verification Code";
        $message = "<h3 style='text-align: center; margin-bottom: 0px;'> Your verification code: </h3> <br> <h1 style='text-align: center; margin-top: 2px;'>$verification</h1>";

        // send the message to email
        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setSubject($subject);
        $emailService->setMessage($message);

        if ($emailService->send()) {
            session()->set('_code_otp', $verification);
            session()->setFlashdata('mail_sent', 'OTP Verification have been sent');
            return redirect()->to("/loginController/OTPVerificationMainpage");
        } else {
            session()->setFlashdata('mail_failed', 'OTP Verification failed to send');
            return redirect()->back();
        }
    }

    public function VerifiedOTP()
    {
        // check if otp is correct
        $_code_otp = session()->get('_code_otp');
        $_user_otp = $this->request->getPost('_user_otp');

        if ($_user_otp != $_code_otp) {
            session()->set('otp_wrong', 'OTP is Incorrect');
            return redirect()->to('/');
        }

        $_tupt_id = session()->get('tupt_id');
        $_email = session()->get('email');
        $_firstName = session()->get('first_name');
        $_lastName = session()->get('last_name');
        $_middleName = session()->get('middle_initial');
        $_fullName = session()->get('full_name');
        $_username = session()->get('username');
        $_majorID = session()->get('major_id');
        $_major = session()->get('major');
        $_password = session()->get('password');
        $_phone = session()->get('phone_number');
        $_user_type = session()->get('user_type');
        $_year_graduated_id = session()->get('year_graduated_id');
        $_year_graduated = session()->get('year_graduated');

        $tracerStudyTracerHeader = new TracerStudyHeaderModel();
        $_tracerStudyTracerHeader = $tracerStudyTracerHeader->where('year_graduated_id', $_year_graduated_id)->first();

        if ($_tracerStudyTracerHeader) {
            
            $userModel = new UserModel();
            $registrationData = [
                'tupt_id' => $_tupt_id,
                'email' => $_email,
                'username' => $_username,
                'password' => $_password,
                'last_name' => $_lastName,
                'first_name' => $_firstName,
                'middle_initial' => $_middleName,
                'full_name' => $_fullName,
                'phone_number' => $_phone,
                'user_type' => $_user_type,
                'major_id' => $_majorID,
                'major' => $_major,
                'year_graduated_id' => $_year_graduated_id,
                'year_graduated' => $_year_graduated,
                'tracer_study_header_id' => $_tracerStudyTracerHeader['id'],
                'is_tracer_study' => 'true',
                'is_approve' => 'false',
            ];
            $userModel->insert($registrationData);
        } else {
            $userModel = new UserModel();

            $registrationData = [
                'tupt_id' => $_tupt_id,
                'email' => $_email,
                'username' => $_username,
                'password' => $_password,
                'last_name' => $_lastName,
                'first_name' => $_firstName,
                'middle_initial' => $_middleName,
                'full_name' => $_fullName,
                'phone_number' => $_phone,
                'user_type' => $_user_type,
                'major_id' => $_majorID,
                'major' => $_major,
                'year_graduated_id' => $_year_graduated_id,
                'year_graduated' => $_year_graduated,
            ];
            $userModel->insert($registrationData);
        }

        if ($_user_type == 1) {
            session()->setFlashdata('success', 'Successfully Registered');
            session()->destroy();
            return redirect()->to('/LoginController/AlumniAssociationLoginPage');
        } else if ($_user_type == 0) {
            session()->setFlashdata('success', 'Successfully Registered');
            session()->destroy();
            return redirect()->to('/LoginController/AlumniMembersLoginPage');
        }

        return redirect()->to('/');
    }

    public function OTPVerificationMainpage()
    {
        return view('/indexPages/alumni-association-otp');
    }

    public function Logout()
    {
        // update db - active 
        $user_id = session()->get('user_logged_id');
        if ($user_id) {
            $userModel = new UserModel();
            $userModel->update($user_id, ['status' => 'offline']);
        }

        // destroy sessions
        session()->destroy();

        return redirect()->to('/LoginController/UserType');
    }

    public function test()
    {
        $sample = strtolower($this->request->uri->getSegment(1));
        echo $sample;
    }

    public function AlumiMemberForgotPassword()
    {
        return view('/indexPages/alumni-members-forgot-password');
    }

    public function AlumiAssociationForgotPassword()
    {
        return view('/indexPages/alumni-association-forgot-password');
    }

    public function AlumiMemberForgotPasswordSendOTP()
    {
        $_tupt = $this->request->getPost('tupt_id');
        $_email = $this->request->getPost('email');

        $_data = [
            'tupt_id' => $_tupt,
            'email' => $_email,
        ];
        session()->set($_data);


        $model = new UserModel();
        $_user = $model->where('tupt_id', $_tupt)->where('user_type', '0')->first();


        if (!$_user) {
            session()->setFlashdata('unsucessful', "TUPT-ID does not exist");
            return redirect()->back();
        } else if ($_user['email'] != $_email) {
            session()->setFlashdata('unsucessful', "Email does not match to the TUPT-ID");
            return redirect()->back();

        } else {
            // check internet connection
            helper('network');
            if (!is_connected()) {
                session()->setFlashdata('internet_failed', "No Internet Connection!");
                return redirect()->back();
            }

            // email data
            $verification = mt_rand(100000, 999999);
            $subject = "OTP Verification Code";
            $message = "<h3 style='text-align: center; margin-bottom: 0px;'> Your verification code: </h3> <br> <h1 style='text-align: center; margin-top: 2px;'>$verification</h1>";

            // send the message to email
            $emailService = \Config\Services::email();
            $emailService->setTo($_email);
            $emailService->setSubject($subject);
            $emailService->setMessage($message);

            if ($emailService->send()) {
                session()->set('_code_forgot_password_otp', $verification);
                session()->setFlashdata('mail_sent', 'OTP Verification have been sent');
                return redirect()->to("/loginController/ForgotPasswordOTPVerificationMainpage");
            } else {
                session()->setFlashdata('mail_failed', 'OTP Verification failed to send');
                return redirect()->back();
            }
        }
    }

    public function AlumiAssociationrForgotPasswordSendOTP()
    {
        $_tupt = $this->request->getPost('tupt_id');
        $_email = $this->request->getPost('email');

        $_data = [
            'tupt_id' => $_tupt,
            'email' => $_email,
        ];
        session()->set($_data);


        $model = new UserModel();
        $_user = $model->where('tupt_id', $_tupt)->where('user_type', '1')->first();


        if (!$_user) {
            session()->setFlashdata('unsucessful', "TUPT-ID does not exist");
            return redirect()->back();
        } else if ($_user['email'] != $_email) {
            session()->setFlashdata('unsucessful', "Email does not match to the TUPT-ID");
            return redirect()->back();

        } else {
            // check internet connection
            helper('network');
            if (!is_connected()) {
                session()->setFlashdata('internet_failed', "No Internet Connection!");
                return redirect()->back();
            }

            // email data
            $verification = mt_rand(100000, 999999);
            $subject = "OTP Verification Code";
            $message = "<h3 style='text-align: center; margin-bottom: 0px;'> Your verification code: </h3> <br> <h1 style='text-align: center; margin-top: 2px;'>$verification</h1>";

            // send the message to email
            $emailService = \Config\Services::email();
            $emailService->setTo($_email);
            $emailService->setSubject($subject);
            $emailService->setMessage($message);

            if ($emailService->send()) {
                session()->set('_code_forgot_password_otp', $verification);
                session()->setFlashdata('mail_sent', 'OTP Verification have been sent');
                return redirect()->to("/loginController/ForgotPasswordOTPVerificationMainpage");
            } else {
                session()->setFlashdata('mail_failed', 'OTP Verification failed to send');
                return redirect()->back();
            }
        }
    }

    public function ForgotPasswordOTPVerificationMainpage()
    {
        return view('/indexPages/forgot-password-otp');
    }

    public function ChangePassword()
    {
        $_password = $this->request->getPost('password');
        $_hashed = password_hash($_password, PASSWORD_BCRYPT);

        $id = session()->get('tupt_id');

        $_model = new UserModel();
        $_user = $_model->where('tupt_id', $id)->first();

        $_data = [
            'password' => $_hashed,
        ];
        $_model->update($_user, $_data);
        session()->setFlashdata('success', "Successfully Set New Password");
        // destroy sessions
        session()->destroy();

        return redirect()->to('/LoginController/UserType');
    }

    public function ForgotPasswordVerifiedOTP()
    {
        // check if otp is correct
        $_code_otp = session()->get('_code_forgot_password_otp');
        $_user_otp = $this->request->getPost('_user_forgot_password_otp');

        if ($_user_otp != $_code_otp) {
            session()->set('otp_wrong', 'OTP is Incorrect');
            return redirect()->to('/');
        }
        return view('/indexPages/forgot-password-change-password');
    }
}

