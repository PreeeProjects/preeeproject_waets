<?php

include '../servicebase/servicebase.php';
include '../includes/jwt_checker.php';
include '../includes/header.php';
include '../includes/enc_dec.php';

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;


$obj = new servicebase();

try {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $user_profile_id = $_POST['user_profile_id'];

        $obj->select('app_social_services_tbl', '*', null, "AND user_profile_id='{$user_profile_id}'", null, null);
        $servicesData = $obj->getResult();

        foreach ($servicesData as $service) {
            $id = $service['id'];
            $userProfileID = $service['user_profile_id'];
            $requestType = $service['social_services_request_type'];
            $userMobileNumber = $service['user_mobile_number'];
            $status = $service['status'];
            $date = $service['date'];
            $fname = $service['fname'];
            $mname = $service['mname'];
            $lname = $service['lname'];
            $gender = $service['gender'];
            $birthdate = $service['birthdate'];
            $age = $service['age'];
            $birthplace = $service['birthplace'];
            $contact = $service['contact'];
            $presentAddress = $service['present_address'];
            $provAddress = $service['prov_address'];
            $highestEduc = $service['highest_educ'];
            $philhealthNo = $service['philhealth_no'];
            $skillOccupation = $service['skill_occupation'];
            $monthlyIncome = $service['monthly_income'];
            $modeAdmission = $service['mode_admission'];
            $problemPresented = $service['problem_presented'];
            $findings = $service['findings'];
            $recommendations = $service['recommendations'];
            $amount = $service['amount'];
            $school = $service['school'];
            $yearlevel = $service['yearlevel'];
            $bloodPressure = $service['blood_pressure'];
            $screeningReferral = $service['screening_referral'];
            $shortStory = $service['short_story'];
            $patientCategory = $service['patient_category'];
            $reason = $service['reason'];
            $socialMedia = $service['social_media'];
            $sourceOfIncome = $service['source_of_income'];
            $ECPName = $service['emergency_contact_person_name'];
            $ECPNumber = $service['emergency_contact_person_number'];
            $ECPRelationship = $service['emergency_contact_person_relationship'];
            $typeOfCase = $service['type_of_case'];
            $diagnosis = $service['diagnosis'];
            $lateralization = $service['lateralization'];
            $underlyingCondition = $service['underlying_condition'];
            $rightFootElevation = $service['right_foot_elevation'];
            $rightFootInsertion = $service['right_foot_insertion'];
            $rightFootSize = $service['right_foot_size'];
            $leftFootElevation = $service['left_foot_elevation'];
            $leftFootInsertion = $service['left_foot_insertion'];
            $leftFootSize = $service['left_foot_size'];
            $typeOfShoe = $service['type_of_shoe'];
            $fibularHeadToGround = $service['fibular_head_to_ground'];
            $shoeSize = $service['shoe_size'];
            $recommendedDevice = $service['recommended_device'];

            $response_select = array(
                'id' => $id ?? '',
                'user_profile_id' => $userProfileID ?? '',
                'social_services_request_type' => $requestType ?? '',
                'user_mobile_number' => $userMobileNumber ?? '',
                'status' => $status ?? '',
                'date' => $date ?? '',
                'fname' => $fname ?? '',
                'mname' => $mname ?? '',
                'lname' => $lname ?? '',
                'gender' => $gender ?? '',
                'birthdate' => $birthdate ?? '',
                'age' => $age ?? '',
                'birthplace' => $birthplace ?? '',
                'contact' => $contact ?? '',
                'present_address' => $presentAddress ?? '',
                'prov_address' => $provAddress ?? '',
                'highest_educ' => $highestEduc ?? '',
                'philhealth_no' => $philhealthNo ?? '',
                'skill_occupation' => $skillOccupation ?? '',
                'monthly_income' => $monthlyIncome ?? '',
                'mode_admission' => $modeAdmission ?? '',
                'problem_presented' => $problemPresented ?? '',
                'findings' => $findings ?? '',
                'recommendations' => $recommendations ?? '',
                'amount' => $amount ?? '',
                'school' => $school ?? '',
                'yearlevel' => $yearlevel ?? '',
                'blood_pressure' => $bloodPressure ?? '',
                'screening_referral' => $screeningReferral ?? '',
                'short_story' => $shortStory ?? '',
                'patient_category' => $patientCategory ?? '',
                'reason' => $reason ?? '',
                'social_media' => $socialMedia ?? '',
                'source_of_income' => $sourceOfIncome ?? '',
                'emergency_contact_person_name' => $ECPName ?? '',
                'emergency_contact_person_number' => $ECPNumber ?? '',
                'emergency_contact_person_relationship' => $ECPRelationship ?? '',
                'type_of_case' => $typeOfCase ?? '',
                'diagnosis' => $diagnosis ?? '',
                'lateralization' => $lateralization ?? '',
                'underlying_condition' => $underlyingCondition ?? '',
                'right_foot_elevation' => $rightFootElevation ?? '',
                'right_foot_insertion' => $rightFootInsertion ?? '',
                'right_foot_size' => $rightFootSize ?? '',
                'left_foot_elevation' => $leftFootElevation ?? '',
                'left_foot_insertion' => $leftFootInsertion ?? '',
                'left_foot_size' => $leftFootSize ?? '',
                'type_of_shoe' => $typeOfShoe ?? '',
                'fibular_head_to_ground' => $fibularHeadToGround ?? '',
                'shoe_size' => $shoeSize ?? '',
                'recommended_device' => $recommendedDevice ?? '',
            );
            $history[] = $response_select;
        }

        $obj->select('certificates', '*', null, "AND created_by='{$user_profile_id}'", null, null);
        $certificateData = $obj->getResult();

        foreach ($certificateData as $certificate) {
            $id = $certificate['cert_id'];
            $certNo = $certificate['cert_no'];
            $certPurpose = $certificate['cert_purpose'];
            $certType = $certificate['cert_type'];
            $certStatus = $certificate['cert_status'];
            $certAmount = $certificate['cert_amount'];
            $certDiscount = $certificate['cert_discount'];
            $certReleaseAt = $certificate['cert_released_at'];
            $certReleaseBy = $certificate['cert_released_by'];
            $certCreatedAt = $certificate['created_at'];
            $certCreatedBy = $certificate['created_by'];
            $certRequestedBy = $certificate['cert_requested_by'];
            $beneficiaryAddress = $certificate['beneficiary_address'];
            $beneficiaryBarangay = $certificate['beneficiary_barangay'];
            $beneficiaryBirthdate = $certificate['beneficiary_birthdate'];
            $beneficiaryContact = $certificate['beneficiary_contact'];
            $beneficiaryDistrict = $certificate['beneficiary_district'];
            $beneficiaryEmail = $certificate['beneficiary_email'];
            $beneficiaryFullName = $certificate['beneficiary_fullname'];
            $beneficiaryGender = $certificate['beneficiary_gender'];
            $beneficiaryMunicipality = $certificate['beneficiary_municipality'];
            $beneficiaryCivilStatus = $certificate['beneficiary_civil_status'];
            $beneficiaryBirthPlace = $certificate['beneficiary_place_of_birth'];
            $beneficiaryRelationship = $certificate['relationship_to_beneficiary'];
            $clientAddress = $certificate['client_address'];
            $clientBarangay = $certificate['client_barangay'];
            $clientBirthdate = $certificate['client_birthdate'];
            $clientContact = $certificate['client_contact'];
            $clientDistrict = $certificate['client_district'];
            $clientEmail = $certificate['client_email'];
            $clientFullName = $certificate['client_fullname'];
            $clientGender = $certificate['client_gender'];
            $clientMunicipality = $certificate['client_municipality'];
            $clientCivilStatus = $certificate['client_civil_status'];
            $clientBirthPlace = $certificate['client_place_of_birth'];
            $yearOfResidency = $certificate['year_of_residency'];

            $response_select = array(
                'cert_id' => $id,
                'cert_no' => $certNo,
                'cert_purpose' => $certPurpose,
                'cert_type' => $certType,
                'cert_status' => $certStatus,
                'cert_amount' => $certAmount,
                'cert_discount' => $certDiscount,
                'cert_released_at' => $certReleaseAt,
                'cert_released_by' => $certReleaseBy,
                'created_at' => $certCreatedAt,
                'created_by' => $certCreatedAt,
                'cert_requested_by' => $certRequestedBy,
                'beneficiary_address' => $beneficiaryAddress,
                'beneficiary_barangay' => $beneficiaryBarangay,
                'beneficiary_birthdate' => $beneficiaryBirthdate,
                'beneficiary_contact' => $beneficiaryContact,
                'beneficiary_district' => $beneficiaryDistrict,
                'beneficiary_email' => $beneficiaryEmail,
                'beneficiary_fullname' => $beneficiaryFullName,
                'beneficiary_gender' => $beneficiaryGender,
                'beneficiary_municipality' => $beneficiaryMunicipality,
                'beneficiary_civil_status' => $beneficiaryCivilStatus,
                'beneficiary_place_of_birth' => $beneficiaryBirthPlace,
                'relationship_to_beneficiary' => $beneficiaryRelationship,
                'client_address' => $clientAddress,
                'client_barangay' => $clientBarangay,
                'client_birthdate' => $clientBirthdate,
                'client_contact' => $clientContact,
                'client_district' => $clientDistrict,
                'client_email' => $clientEmail,
                'client_fullname' => $clientFullName,
                'client_gender' => $clientGender,
                'client_municipality' => $clientMunicipality,
                'client_civil_status' => $clientCivilStatus,
                'client_place_of_birth' => $clientBirthPlace,
                'year_of_residency' => $yearOfResidency,
            );
            $history[] = $response_select;
        }

        if (!empty($history)) {
            $response = array(
                'status' => true,
                'service' => $history,
                'message' => 'Success Fetch: Social Services',
            );
        } else {
            $response = array(
                'status' => false,
                'message' => 'No service: Social Services',
            );
        }

        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode($response);
    } else {
        http_response_code(405);
        echo json_encode(
            array(
                'status' => false,
                'message' => 'Access Denied'
            )
        );
    }
} catch (Exception $e) {
    echo json_encode([
        'status' => false,
        'message' => $e,
    ]);
}
