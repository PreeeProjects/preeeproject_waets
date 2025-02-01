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
                <h2 class="m-0">Tracer Study</h2>
            </div>
        </div>
    </div>

    <hr>

     <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0">BTTE/BTVTEd_Tracer Study_TUPT</h4>
            </div>
        </div>
        <p class="ms-4"> Good day! </p>
        <p class="ms-4 me-5" style="text-align:justify;"> TUP Taguig is conducting a tracer study to keep track of the graduates and their development, check on the employability, and create linkage between TUPT and the alumni. We request to please find time to complete this Graduate Tracer Study (GTS) questionnaire as accurately & frankly as possible. </p>
        <p class="ms-4 me-5" style="text-align:justify;"> All data obtained in this survey will be processed by the BTVTEd Program Faculty of Technological University of the Philippines Taguig. By answering this form, you hereby allow TUP-Taguig to access and record your personal data. The processing of all personal data shall be governed by the University’s applicable privacy policy and all relevant data protection laws, including Republic Act No. 10173, also known as the Data Privacy Act of 2012. Rest assured that all the answers will be treated with strictest confidentiality. </p>
        <p class="ms-4"> Thank you for your kind cooperation and support. </p> 

    <div class="form-check mt-3 ms-4 mb-4    ">
        <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1" />
        <label class="form-check-label" for="defaultRadio1"> I Accept </label>
    </div>
</div>

     <!--  S E C T I O N  2 -->
    <div class="divider text-start">
        <div class="divider-text fw-bold">SECTION 2</div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0">GENERAL INFORMATION</h4>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">1. Email</label>
                    <input class="form-control" type="email" id="email" name="number_1" placeholder="@gmail.com" required autofocus />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">2. Full Name</label>
                    <input class="form-control" type="email" id="full_name" name="number_2" placeholder="Surname, First Name, MI" required autofocus />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">3. Permanent Address</label>
                    <input class="form-control" type="email" id="address" name="number_3" placeholder="Enter your answer" required autofocus />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">4. Mobile Number</label>
                    <input class="form-control" type="email" id="mobile_number" name="number_4" placeholder="09XXXXXXXXX" required autofocus />
                </div>
            </div>

            <label class="form-label">5. Civil Status</label>

            <div class="form-check ms-4 mt-2">
                <input name="number_5" class="form-check-input" type="radio" value="Single" id="defaultRadio1"/>
                <label class="form-check-label" for="defaultRadio1"> Single </label>
            </div>

            <div class="form-check mt-3 ms-4">
                <input name="number_5" class="form-check-input" type="radio" value="Married" id="defaultRadio1"/>
                <label class="form-check-label" for="defaultRadio1"> Married </label>
            </div>

            <div class="form-check mt-3 ms-4">
                <input name="number_5" class="form-check-input" type="radio" value="Separate" id="defaultRadio1"/>
                <label class="form-check-label" for="defaultRadio1"> Separate </label>
            </div>

            <div class="form-check mt-3 ms-4">
                <input name="number_5" class="form-check-input" type="radio" value="Single Parent" id="defaultRadio1"/>
                <label class="form-check-label" for="defaultRadio1"> Single Parent </label>
            </div>

            <div class="form-check mt-3 ms-4 mb-3">
                <input name="number_5" class="form-check-input" type="radio" value="Widow or Widower" id="defaultRadio1"/>
                <label class="form-check-label" for="defaultRadio1"> Widow or Widower </label>
            </div>

            <label class="form-label">6. Sex</label>

            <div class="form-check ms-4 mt-2">
                <input name="number_6"class="form-check-input" type="radio" value="Female" id="defaultRadio1"/>
                <label class="form-check-label" for="defaultRadio1"> Female </label>
            </div>

            <div class="form-check mt-3 ms-4 mb-3">
                <input name="number_6" class="form-check-input" type="radio" value="Male" id="defaultRadio1"/>
                <label class="form-check-label" for="defaultRadio1"> Male </label>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">7. Birthdate</label>
                    <input class="form-control" type="date" id="birthdate" name="number_7" placeholder="" required autofocus />
                </div>
            </div>

            <label class="form-label">8. Region of Origin</label>
            <div class="card-body">
                <div class="row mt-0">
                    <div class="col-md-6"> 
                        <div class="form-check ms-4">
                            <input name="number_8"  class="form-check-input" type="radio" value="Region 1" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 1 </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="Region 2" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 2 </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="Region 3" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 3 </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="Region 4" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 4 </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="Region 5" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 5 </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="Region 5" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 5 </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="Region 6" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 6 </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="Region 7" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 7 </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="Region 8" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 8 </label>
                        </div>
                    </div>

                    <div class="col-md-6"> 

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="Region 9" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 9 </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="Region 10" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 10 </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="Region 11" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 11 </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="Region 12" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Region 12 </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="NCR" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> NCR </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="CAR" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> CAR </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="ARMM" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> ARMM </label>
                        </div>

                        <div class="form-check mt-3 ms-4">
                            <input name="number_8" class="form-check-input" type="radio" value="CARAGA" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> CARAGA </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">9. PROVINCE</label>
                    <input class="form-control" type="text" id="province" name="number_9" placeholder="Enter your answer" required autofocus />
                </div>
            </div>

            <label class="form-label">10. Location of Residence</label>

            <div class="form-check ms-4 mt-2">
                <input name="number_10" class="form-check-input" type="radio" value="City" id="defaultRadio1"/>
                <label class="form-check-label" for="defaultRadio1"> City </label>
            </div>

            <div class="form-check mt-3 ms-4 mb-3">
                <input name="number_10" class="form-check-input" type="radio" value="Municipality" id="defaultRadio1"/>
                <label class="form-check-label" for="defaultRadio1"> Municipality </label>
            </div>
        </div>
    </div>

    <!-- S E C T I O N  3 -->
    <div class="divider text-start">
        <div class="divider-text fw-bold">SECTION 3</div>
    </div>

     <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-2">EDUCATIONAL BACKGROUND</h4>
            </div>
            <small> Educational Attainment (This is for your Baccalaureate Degree only) </small>
        </div>
        
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label">11. Year Graduated</label>
                <input class="form-control" type="text" id="yr_graduated" name="number_11" placeholder="YYYY" required autofocus />
            </div>
        </div>

        <label class="form-label">12. Degree and Specialization</label>

        <div class="form-check ms-4 mt-2 mb-3">
            <input name="number_12" class="form-check-input" type="radio" value="BTTE / BTVTE" id="defaultRadio1"/>
            <label class="form-check-label" for="defaultRadio1"> BTTE / BTVTE </label>
        </div>

         <label class="form-label">13. College or University</label>

        <div class="form-check ms-4 mt-2">
            <input name="number_13" class="form-check-input" type="radio" value="Technological University of the Philippines - Taguig" id="defaultRadio1"/>
            <label class="form-check-label" for="defaultRadio1"> Technological University of the Philippines - Taguig </label>
        </div>

         <div class="form-check ms-4 mt-2 mb-3">
            <input name="number_13" class="form-check-input" type="radio" value="Others" id="defaultRadio1"/>
            <label class="form-check-label" for="defaultRadio1"> Others </label>
        </div>

         <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label">14. Honor(3) or Award(s) Received (write N/A if none)</label>
                <input class="form-control" type="text" id="yr_graduated" name="number_14" placeholder="Enter your answer" required autofocus />
            </div>
        </div>

        <label class="form-label">15. Reason(s) for taking the course(s) or pursuing degree(s). <small> You may check (✓) more than one answer. </small></label>

         <div class="card-body">
            <div class="row mt-0">
                <div class="col-md-7"> 
                    <div class="form-check">
                        <input name="number_15" class="form-check-input" type="checkbox" value="High grades in the course or subject area(s) related to the course" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> High grades in the course or subject area(s) related to the course </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_15" class="form-check-input" type="checkbox" value="Good grades in high school" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Good grades in high school </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_15" class="form-check-input" type="checkbox" value="Influence of parents or relatives" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Influence of parents or relatives </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_15" class="form-check-input" type="checkbox" value="Peer influence" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Peer influence </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_15" class="form-check-input" type="checkbox" value="Inspired by a role model" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Inspired by a role model </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_15" class="form-check-input" type="checkbox" value="Strong passion for the profession" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Strong passion for the profession </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_15" class="form-check-input" type="checkbox" value="Prospect for immediate employment" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Prospect for immediate employment </label>
                    </div>
                </div>

                <div class="col-md-5"> 

                     <div class="form-check">
                        <input name="number_15" class="form-check-input" type="checkbox" value="Status or prestige of the profession" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Status or prestige of the profession </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_15" class="form-check-input" type="checkbox" value="Availability of course offering in chosen institution" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Availability of course offering in chosen institution </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_15" class="form-check-input" type="checkbox" value="Prospect of career advancement" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Prospect of career advancement </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_15" class="form-check-input" type="checkbox" value="Affordable for the family" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Affordable for the family </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_15" class="form-check-input" type="checkbox" value="Prospect of attractive compensation" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Prospect of attractive compensation </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_15" class="form-check-input" type="checkbox" value="Opportunity for employment abroad" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Opportunity for employment abroad </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_15" class="form-check-input" type="checkbox" value="No particular choice or no better idea" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> No particular choice or no better idea </label>
                    </div>
                </div>
            </div>
        </div>

         <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label">16. Professional Examination(s) Passed</label> </br>
                <small> Write all your professional Examination(s) Passed using the following format: </small> </br>
                <small> 1. Name of Exam - Date Taken - Rating </small> </br>
                <small> 2. Name of Exam - Date Taken - Rating </small>
                <input  name="number_16" class="form-control mt-2" type="text" id="yr_graduated" name="award" placeholder="Enter your answer" required autofocus />
            </div>
        </div>
    </div>
</div> 

         <!-- S E C T I O N  4 -->
        <div class="divider text-start">
            <div class="divider-text fw-bold">SECTION 4</div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-2">TRAINING(S)/ADVANCE STUDIES ATTENDED AFTER COLLEGE</h4>
                </div>
                <small>Please list down all professional or work-related training program(s) including advance studies you have attended after college. </small>
            </div>
            
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-3">
                <label class="form-label">17. Write all your Training and advance study in this format: (Write "N/A" if none)</label> </br>
                <small> 1. Title of Training or Advance Study - Duration and credits earned - Name of Training Institution/College/University. </small> </br>
                <small> 2. Title of Training or Advance Study - Duration and credits earned - Name of Training Institution/College/University.</small> </br>
                <input class="form-control mt-2 mb-3" type="text" id="number_17" name="number_17" placeholder="Enter your answer" required autofocus />
       

           <label class="form-label">18. Reason(s) for taking the course(s) or pursuing degree(s). <small> You may check (✓) more than one answer. </small></label>
                 
                <div class="ms-4">
                    <div class="form-check">
                        <input name="number_18" class="form-check-input" type="checkbox" value="For Promotion" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> For Promotion </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_18" class="form-check-input" type="checkbox" value="For Professional Development" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> For Professional Development </label>
                    </div>


                    <div class="form-check mt-3">
                        <input class="form-check-input mt-1" type="checkbox" value="" id="defaultCheck1" />
                            <div class="row">
                                <div class="col-md-6">
                                <input name="number_18" id="smallInput" class="form-control form-control-sm" type="text"  placeholder="Others" />
                                </div>
                            </div>
                    </div>
                <div> 
            </div>
        </div>
    </div>
</div>
</div>
</div>

    <!-- S E C T I O N  5 -->
        <div class="divider text-start">
            <div class="divider-text fw-bold">SECTION 5</div>
        </div>  

        <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0">EMPLOYMENT DATA</h4>
            </div>
        </div>
       <div class="card-body">

         <label class="form-label">19. Are you presently employed?</label>

        <div class="form-check ms-4 mt-2">
            <input name="number_19" class="form-check-input" type="radio" value="Employed" id="defaultRadio1"/>
            <label class="form-check-label" for="defaultRadio1"> Yes </label>
        </div>

        <div class="form-check mt-3 ms-4">
            <input name="number_19" class="form-check-input" type="radio" value="Not Employed" id="defaultRadio1"/>
            <label class="form-check-label" for="defaultRadio1"> No </label>
        </div>

        <div class="form-check mt-3 ms-4">
            <input name="number_19" class="form-check-input" type="radio" value="Never been employed" id="defaultRadio1"/>
            <label class="form-check-label" for="defaultRadio1"> Never been employed </label>
        </div>
    </div>
</div>

     <!-- S E C T I O N  6 -->
        <div class="divider text-start">
            <div class="divider-text fw-bold">SECTION 6</div>
        </div> 

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0">If NO or NEVER BEEN EMPLOYED </h4>
            </div>
        </div>
        <div class="card-body">

           <label class="form-label">20. Please state reason(s) why you are not yet employed. <small> You may check (✓) more than one answer. </small></label>
                 
                <div class="ms-4">
                    <div class="form-check">
                        <input name="number_20" class="form-check-input" type="checkbox" value="Advance or further study" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Advance or further study </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_20" class="form-check-input" type="checkbox" value="Family concern and decided not to find a job" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Family concern and decided not to find a job </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_20" class="form-check-input" type="checkbox" value="Health-related reason(s)" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Health-related reason(s) </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_20" class="form-check-input" type="checkbox" value="Lack of work experience" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Lack of work experience </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_20" class="form-check-input" type="checkbox" value="No job opportunity" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> No job opportunity </label>
                    </div>

                   <div class="form-check mt-3">
                        <input class="form-check-input mt-1" type="checkbox" value="" id="defaultCheck1" />
                            <div class="row">
                                <div class="col-md-6">
                                <input name="number_20" id="smallInput" class="form-control form-control-sm" name="" type="text"  placeholder="Others" />
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
        

             <!-- S E C T I O N  7 -->
                <div class="divider text-start">
                    <div class="divider-text fw-bold">SECTION 7</div>
                </div> 

                    <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="m-0">IF EMPLOYED </h4>
                    </div>
                </div>

                <div class="card-body">

                <label class="form-label">21. Present Employment Status</label>

                <div class="form-check ms-4 mt-2">
                    <input name="number_21" class="form-check-input" type="radio" value="Regular or Permanent" id="defaultRadio1"/>
                    <label class="form-check-label" for="defaultRadio1"> Regular or Permanent </label>
                </div>

                 <div class="form-check ms-4 mt-2">
                    <input name="number_21" class="form-check-input" type="radio" value="Contractual" id="defaultRadio1"/>
                    <label class="form-check-label" for="defaultRadio1"> Contractual </label>
                </div>

                 <div class="form-check ms-4 mt-2">
                    <input name="number_21" class="form-check-input" type="radio" value="Temporary" id="defaultRadio1"/>
                    <label class="form-check-label" for="defaultRadio1"> Temporary </label>
                </div>

                 <div class="form-check ms-4 mt-2">
                    <input name="number_21" class="form-check-input" type="radio" value="Self-employed" id="defaultRadio1"/>
                    <label class="form-check-label" for="defaultRadio1"> Self-employed </label>
                </div>

                 <div class="form-check ms-4 mt-2">
                    <input name="number_21" class="form-check-input" type="radio" value="Casual" id="defaultRadio1"/>
                    <label class="form-check-label" for="defaultRadio1"> Casual </label>
                </div>

                 <label class="form-label mt-3">22. If self-employed, what skills acquired in college were you able to apply in your work?</label>
                    <label for="exampleFormControlTextarea1" class="form-label"></label>
                    <textarea name="number_22" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your answer"></textarea>

                 <div class="row">
                    <div class="col-md-12 mb-3 mt-3">
                        <label class="form-label">23. Present occupation <small> (Ex. Junior High School Teacher, Electrical Engineer, Self-employed) </small></label>
                        <input class="form-control" type="text" id="number_23" name="number_23" placeholder="Enter your answer" required autofocus />
                    </div>
                </div>

                <label class="form-label">24. Major line of business of the company you are presently employed in</label>
                    <div class="card-body">
                        <div class="row mt-0">
                            <div class="col-md-6"> 
                                <div class="form-check ms-4">
                                    <input name="number_24" class="form-check-input" type="radio" value="Agriculture, Hunting and Forestly" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Agriculture, Hunting and Forestly </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Fishing" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Fishing </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Mining and Quarrying" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Mining and Quarrying </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Manufacturing" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Manufacturing </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Electricity, Gas and Water Supply" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Electricity, Gas and Water Supply </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Construction" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Construction </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Wholesale and Retail Trade, repair of motor vehicles, motorcycles and personal and household goods" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Wholesale and Retail Trade, repair of motor vehicles, motorcycles and personal and household goods </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Hotel and Restaurants" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Hotel and Restaurants </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Transport Storage and Communication" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Transport Storage and Communication </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Financial Intermediation" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Financial Intermediation </label>
                                </div>
                            </div>

                            <div class="col-md-6"> 

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Real Estate, Renting and Business Activities" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Real Estate, Renting and Business Activities </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Public Administration and Defense, Compulsory Social Security" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Public Administration and Defense, Compulsory Social Security </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Education" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Education </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Health and Social Work" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Health and Social Work </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Other Community, Social and Personal Service Activities" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Other Community, Social and Personal Service Activities </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Private Households with Employed Persons" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Private Households with Employed Persons </label>
                                </div>

                                <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Extra-territorial Organizations and Bodies" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Extra-territorial Organizations and Bodies </label>
                                </div>

                                 <div class="form-check mt-3 ms-4">
                                    <input name="number_24"class="form-check-input" type="radio" value="Information and Technology Related" id="defaultRadio1"/>
                                    <label class="form-check-label" for="defaultRadio1"> Information and Technology Related </label>
                                </div>
                            </div>
                        </div>
                    </div>

                     <label class="form-label">25. Place of work</label>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_25" class="form-check-input" type="radio" value="Local" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Local </label>
                        </div>

                        <div class="form-check ms-4 mt-2 mb-3">
                            <input name="number_25" class="form-check-input" type="radio" value="Abroad" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Abroad </label>
                        </div>

                        <label class="form-label">26. Is this  your first job after college?</label>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_26" class="form-check-input" type="radio" value="Yes" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Yes </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_26" class="form-check-input" type="radio" value="No" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> No </label>
                        </div>
                    </div>
                </div>

            <!-- S E C T I O N  8 -->
                <div class="divider text-start">
                    <div class="divider-text fw-bold">SECTION 8</div>
                </div> 

                 <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="m-0">Answer if your current hob is your first job </h4>
                        </div>
                    </div>
                    <div class="card-body">

                <label class="form-label">27. What are your reason(s) for staying on the job? <small> You may check (✓) more than one answer. </small></label>
                    
                    <div class="ms-4">
                        <div class="form-check">
                            <input name="number_27" class="form-check-input" type="checkbox" value="Salaries and benefits" id="defaultCheck1" />
                            <label class="form-check-label" for="defaultCheck1"> Salaries and benefits </label>
                        </div>

                        <div class="form-check mt-3">
                            <input name="number_27" class="form-check-input" type="checkbox" value="Career challenge" id="defaultCheck1" />
                            <label class="form-check-label" for="defaultCheck1"> Career challenge </label>
                        </div>

                        <div class="form-check mt-3">
                            <input name="number_27" class="form-check-input" type="checkbox" value="Related to special skill" id="defaultCheck1" />
                            <label class="form-check-label" for="defaultCheck1"> Related to special skill </label>
                        </div>

                        <div class="form-check mt-3">
                            <input name="number_27" class="form-check-input" type="checkbox" value="Related to course or program of study" id="defaultCheck1" />
                            <label class="form-check-label" for="defaultCheck1"> Related to course or program of study </label>
                        </div>

                        <div class="form-check mt-3">
                            <input name="number_27" class="form-check-input" type="checkbox" value="Proximity to residence" id="defaultCheck1" />
                            <label class="form-check-label" for="defaultCheck1"> Proximity to residence </label>
                        </div>

                        <div class="form-check mt-3">
                            <input name="number_27" class="form-check-input" type="checkbox" value="Peer influence" id="defaultCheck1" />
                            <label class="form-check-label" for="defaultCheck1"> Peer influence </label>
                        </div>


                        <div class="form-check mt-3 mb-3">
                            <input class="form-check-input mt-1" type="checkbox" value="" id="defaultCheck1" />
                                <div class="row">
                                    <div class="col-md-6">
                                    <input name="number_27" id="smallInput" class="form-control form-control-sm" name="" type="text"  placeholder="Others" />
                                    </div>
                                </div>
                        </div>
                    </div>

                    <label class="form-label">28. Is your FIRST JOB related to the course you took up in college?</label>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_29" class="form-check-input" type="radio" value="Yes" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Yes </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_29" class="form-check-input" type="radio" value="No" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> No </label>
                        </div>
                    </div>
                </div>

             <!-- S E C T I O N  9 -->
                <div class="divider text-start">
                    <div class="divider-text fw-bold">SECTION 9</div>
                </div>  
                
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="m-0">Answer this section if your current job is NOT your first job. </h4>
                    </div>
                </div>
                <div class="card-body">

                <label class="form-label">29. What were your reasons for changing job? <small> You may check (✓) more than one answer. </small></label>
                        
                    <div class="ms-4">
                        <div class="form-check">
                            <input name="number_29" class="form-check-input" type="checkbox" value="Salaries and benefits" id="defaultCheck1" />
                            <label class="form-check-label" for="defaultCheck1"> Salaries and benefits </label>
                        </div>

                        <div class="form-check mt-3">
                            <input name="number_29" class="form-check-input" type="checkbox" value="Career challenge" id="defaultCheck1" />
                            <label class="form-check-label" for="defaultCheck1"> Career challenge </label>
                        </div>

                        <div class="form-check mt-3">
                            <input name="number_29" class="form-check-input" type="checkbox" value="Related to special skills" id="defaultCheck1" />
                            <label class="form-check-label" for="defaultCheck1"> Related to special skills </label>
                        </div>

                        <div class="form-check mt-3">
                            <input name="number_29" class="form-check-input" type="checkbox" value="Proximity to residence" id="defaultCheck1" />
                            <label class="form-check-label" for="defaultCheck1"> Proximity to residence </label>
                        </div>

                        <div class="form-check mt-3">
                            <input name="number_29" class="form-check-input" type="checkbox" value="Peer Influence" id="defaultCheck1" />
                            <label class="form-check-label" for="defaultCheck1"> Peer Influence </label>
                        </div>

                         <div class="form-check mt-3 mb-3">
                            <input class="form-check-input mt-1" type="checkbox" value="" id="defaultCheck1" />
                                <div class="row">
                                    <div class="col-md-6">
                                    <input name="number_29" id="smallInput" class="form-control form-control-sm" name="" type="text"  placeholder="Others" />
                                    </div>
                                </div>
                        </div>
                    </div>

                        <label class="form-label">30. How long did you stay in your first job?</label>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_30" class="form-check-input" type="radio" value="Less than a month" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Less than a month </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_30" class="form-check-input" type="radio" value="1 to 6 months" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> 1 to 6 months </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_30" class="form-check-input" type="radio" value="7 to 11 months" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> 7 to 11 months </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_30" class="form-check-input" type="radio" value="1 year to less than 2 years" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> 1 year to less than 2 years </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_30" class="form-check-input" type="radio" value="2 years to less than 3 years" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> 2 years to less than 3 years </label>
                        </div>

                         <div class="form-check ms-4 mt-2">
                            <input name="number_30" class="form-check-input" type="radio" value="3 years to less than 4 years" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> 3 years to less than 4 years </label>
                        </div>

                        <div class="form-check ms-4 mt-2 mb-3">
                            <input name="number_30" class="form-check-input" type="radio" value="3 years to less than 4 years" id="defaultRadio1"/>
                            <div class="row">
                                    <div class="col-md-6">
                                    <input name="number_30" id="smallInput" class="form-control form-control-sm" name="" type="text"  placeholder="Others" />
                                    </div>
                            </div>
                        </div>

                         <label class="form-label">31. How did you find your first job?</label>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_31" class="form-check-input" type="radio" value="Response to an advertisement" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Response to an advertisement </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_31" class="form-check-input" type="radio" value="As walk-in applicant" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> As walk-in applicant </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_31" class="form-check-input" type="radio" value="Recommended by someone" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Recommended by someone </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_31" class="form-check-input" type="radio" value="Information from friends" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Information from friends </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_31" class="form-check-input" type="radio" value="Arranged by school's job placement officer" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Arranged by school's job placement officer </label>
                        </div>

                         <div class="form-check ms-4 mt-2">
                            <input name="number_31" class="form-check-input" type="radio" value="Family Business" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Family Business </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_31" class="form-check-input" type="radio" value="Job Fair or Public Employment Service Office (PESO)" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Job Fair or Public Employment Service Office (PESO) </label>
                        </div>

                        <div class="form-check ms-4 mt-2 mb-3">
                            <input name="number_31" class="form-check-input" type="radio" value="3 years to less than 4 years" id="defaultRadio1"/>
                            <div class="row">
                                    <div class="col-md-6">
                                    <input name="number_31" id="smallInput" class="form-control form-control-sm" name="" type="text"  placeholder="Others" />
                                    </div>
                            </div>
                        </div>

                        <label class="form-label">32. How long did it take you to land your first job?</label>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_32" class="form-check-input" type="radio" value="Less than a month" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Less than a month </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_32" class="form-check-input" type="radio" value="1 to 6 months" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> 1 to 6 months </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_32" class="form-check-input" type="radio" value="7 to 11 months" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> 7 to 11 months </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_32" class="form-check-input" type="radio" value="1 year to less than 2 years" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> 1 year to less than 2 years </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_32" class="form-check-input" type="radio" value="2 years to less than 3 years" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> 2 years to less than 3 years </label>
                        </div>

                         <div class="form-check ms-4 mt-2">
                            <input name="number_32" class="form-check-input" type="radio" value="3 years to less than 4 years" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> 3 years to less than 4 years </label>
                        </div>

                        <div class="form-check ms-4 mt-2 mb-3">
                            <input name="number_32" class="form-check-input" type="radio" value="3 years to less than 4 years" id="defaultRadio1"/>
                            <div class="row">
                                    <div class="col-md-6">
                                    <input name="number_32" id="smallInput" class="form-control form-control-sm" name="" type="text"  placeholder="Others" />
                                    </div>
                            </div>
                        </div>

                         <label class="form-label">33. Job Level Position (FIRST JOB)</label>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_33" class="form-check-input" type="radio" value="Rank or Clerical" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Rank or Clerical </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_33" class="form-check-input" type="radio" value="Professional, Technical" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Professional, Technical </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_33" class="form-check-input" type="radio" value="Supervisory" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Supervisory </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_33" class="form-check-input" type="radio" value="Managerial or Executive" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Managerial or Executive </label>
                        </div>


                        <div class="form-check ms-4 mt-2 mb-3">
                            <input name="number_33" class="form-check-input" type="radio" value="Self-employed" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Self-employed </label>
                        </div>

                         <label class="form-label">34. Job Level Position (CURRENT or PRESENT JOB)</label>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_34" class="form-check-input" type="radio" value="Rank or Clerical" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Rank or Clerical </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_34" class="form-check-input" type="radio" value="Professional, Technical" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Professional, Technical </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_34" class="form-check-input" type="radio" value="Supervisory" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Supervisory </label>
                        </div>


                        <div class="form-check ms-4 mt-2">
                            <input name="number_34" class="form-check-input" type="radio" value="Managerial or Executive" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Managerial or Executive </label>
                        </div>


                        <div class="form-check ms-4 mt-2 mb-3">
                            <input name="number_34" class="form-check-input" type="radio" value="Self-employed" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Self-employed </label>
                        </div>

                        <label class="form-label">35. What is your initial gross monthly earning in your first job after college?</label>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_35" class="form-check-input" type="radio" value="Below P4,000.00" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Below P5,000.00 </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_35" class="form-check-input" type="radio" value="P5,000.00 to less than P10,000.00" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> P5,000.00 to less than P10,000.00 </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_35" class="form-check-input" type="radio" value="P10,000.00 to less than P15,000.00" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> P10,000.00 to less than P15,000.00 </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_35" class="form-check-input" type="radio" value="P15,000.00 to less than P20,000.00" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> P15,000.00 to less than P20,000.00 </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_35" class="form-check-input" type="radio" value="P20,000.00 to less than P25,000.00" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> P20,000.00 to less than P25,000.00 </label>
                        </div>

                        <div class="form-check ms-4 mt-2 mb-3">
                            <input name="number_35" class="form-check-input" type="radio" value="P25,000.00 and above" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> P25,000.00 and above </label>
                        </div>

                    <label class="form-label">36. Was the curriculum you had in college relevant to your first job?</label>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_36" class="form-check-input" type="radio" value="Yes" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> Yes </label>
                        </div>

                        <div class="form-check ms-4 mt-2">
                            <input name="number_36" class="form-check-input" type="radio" value="No" id="defaultRadio1"/>
                            <label class="form-check-label" for="defaultRadio1"> No </label>
                        </div>
                </div>
            </div>  

            <!-- S E C T I O N  10 -->
        <div class="divider text-start">
            <div class="divider-text fw-bold">SECTION 10</div>
        </div> 

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0">If YES </h4>
            </div>
        </div>
        <div class="card-body">

           <label class="form-label">37. What competencies learned in college did you find very useful in your first job? <small> You may check (✓) more than one answer. </small></label>
                 
                <div class="ms-4">
                    <div class="form-check">
                        <input name="number_37" class="form-check-input" type="checkbox" value="Communication Skills" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Communication Skills </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_37" class="form-check-input" type="checkbox" value="Human Relations Skills" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Human Relations Skills </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_37" class="form-check-input" type="checkbox" value="Entrepreneurial Skills" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Entrepreneurial Skills </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_37" class="form-check-input" type="checkbox" value="Information Technology Skills" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Information Technology Skills </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_37" class="form-check-input" type="checkbox" value="Problem-solving Skills" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Problem-solving Skills </label>
                    </div>

                    <div class="form-check mt-3">
                        <input name="number_37" class="form-check-input" type="checkbox" value="Critical Thinking Skills" id="defaultCheck1" />
                        <label class="form-check-label" for="defaultCheck1"> Critical Thinking Skills </label>
                    </div>

                     <div class="form-check mt-3 mb-3">
                            <input class="form-check-input mt-1" type="checkbox" value="" id="defaultCheck1" />
                                <div class="row">
                                    <div class="col-md-6">
                                    <input name="number_37" id="smallInput" class="form-control form-control-sm" name="" type="text"  placeholder="Others" />
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        
         <!-- S E C T I O N  11 -->
        <div class="divider text-start">
            <div class="divider-text fw-bold">SECTION 11</div>
        </div> 

        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="m-0">If your FIRST job is related to the course you took up in college.</h4>
                </div>
            </div>
        <div class="card-body">

           <label class="form-label">38. How did you find your first job?</label>

                <div class="form-check ms-4 mt-2">
                    <input name="number_38" class="form-check-input" type="radio" value="Response to an advertisement" id="defaultRadio1"/>
                    <label class="form-check-label" for="defaultRadio1"> Response to an advertisement </label>
                </div>

                <div class="form-check ms-4 mt-2">
                    <input name="number_38" class="form-check-input" type="radio" value="As walk-in applicant" id="defaultRadio1"/>
                    <label class="form-check-label" for="defaultRadio1"> As walk-in applicant </label>
                </div>


                <div class="form-check ms-4 mt-2">
                    <input name="number_38" class="form-check-input" type="radio" value="Recommended by someone" id="defaultRadio1"/>
                    <label class="form-check-label" for="defaultRadio1"> Recommended by someone </label>
                </div>


                <div class="form-check ms-4 mt-2">
                    <input name="number_38" class="form-check-input" type="radio" value="Information from friends" id="defaultRadio1"/>
                    <label class="form-check-label" for="defaultRadio1"> Information from friends </label>
                </div>


                <div class="form-check ms-4 mt-2">
                    <input name="number_38" class="form-check-input" type="radio" value="Arranged by school's job placement officer" id="defaultRadio1"/>
                    <label class="form-check-label" for="defaultRadio1"> Arranged by school's job placement officer </label>
                </div>

                    <div class="form-check ms-4 mt-2">
                    <input name="number_38" class="form-check-input" type="radio" value="Family Business" id="defaultRadio1"/>
                    <label class="form-check-label" for="defaultRadio1"> Family Business </label>
                </div>

                <div class="form-check ms-4 mt-2">
                    <input name="number_38" class="form-check-input" type="radio" value="Job Fair or Public Employment Service Office (PESO)" id="defaultRadio1"/>
                    <label class="form-check-label" for="defaultRadio1"> Job Fair or Public Employment Service Office (PESO) </label>
                </div>

                <div class="form-check ms-4 mt-2 mb-3">
                    <input name="number_38" class="form-check-input" type="radio" value="3 years to less than 4 years" id="defaultRadio1"/>
                    <div class="row">
                            <div class="col-md-6">
                            <input id="smallInput" class="form-control form-control-sm" name="" type="text"  placeholder="Others" />
                            </div>
                    </div>
                </div>

                 <label class="form-label">39. How long did it take you to land your first job?</label>

                    <div class="form-check ms-4 mt-2">
                        <input name="number_39" class="form-check-input" type="radio" value="Less than a month" id="defaultRadio1"/>
                        <label class="form-check-label" for="defaultRadio1"> Less than a month </label>
                    </div>

                    <div class="form-check ms-4 mt-2">
                        <input name="number_39" class="form-check-input" type="radio" value="1 to 6 months" id="defaultRadio1"/>
                        <label class="form-check-label" for="defaultRadio1"> 1 to 6 months </label>
                    </div>


                    <div class="form-check ms-4 mt-2">
                        <input name="number_39" class="form-check-input" type="radio" value="7 to 11 months" id="defaultRadio1"/>
                        <label class="form-check-label" for="defaultRadio1"> 7 to 11 months </label>
                    </div>


                    <div class="form-check ms-4 mt-2">
                        <input name="number_39" class="form-check-input" type="radio" value="1 year to less than 2 years" id="defaultRadio1"/>
                        <label class="form-check-label" for="defaultRadio1"> 1 year to less than 2 years </label>
                    </div>


                    <div class="form-check ms-4 mt-2">
                        <input name="number_39" class="form-check-input" type="radio" value="2 years to less than 3 years" id="defaultRadio1"/>
                        <label class="form-check-label" for="defaultRadio1"> 2 years to less than 3 years </label>
                    </div>

                        <div class="form-check ms-4 mt-2">
                        <input name="number_39" class="form-check-input" type="radio" value="3 years to less than 4 years" id="defaultRadio1"/>
                        <label class="form-check-label" for="defaultRadio1"> 3 years to less than 4 years </label>
                    </div>

                    <div class="form-check ms-4 mt-2 mb-3">
                        <input name="number_39" class="form-check-input mt-1" type="radio" value="3 years to less than 4 years" id="defaultRadio1"/>
                        <div class="row">
                                <div class="col-md-6">
                                <input name="number_39" id="smallInput" class="form-control form-control-sm" name="" type="text"  placeholder="Others" />
                                </div>
                        </div>
                    </div>

                        <label class="form-label">40. What is your initial gross monthly earning in your first job after college?</label>

                    <div class="form-check ms-4 mt-2">
                        <input name="number_40" class="form-check-input" type="radio" value="Below P5,000.00" id="defaultRadio1"/>
                        <label class="form-check-label" for="defaultRadio1"> Below P5,000.00 </label>
                    </div>

                    <div class="form-check ms-4 mt-2">
                        <input name="number_40" class="form-check-input" type="radio" value="P5,000.00 to less than P10,000.00" id="defaultRadio1"/>
                        <label class="form-check-label" for="defaultRadio1"> P5,000.00 to less than P10,000.00 </label>
                    </div>

                    <div class="form-check ms-4 mt-2">
                        <input name="number_40" class="form-check-input" type="radio" value="P10,000.00 to less than P15,000.00" id="defaultRadio1"/>
                        <label class="form-check-label" for="defaultRadio1"> P10,000.00 to less than P15,000.00 </label>
                    </div>

                    <div class="form-check ms-4 mt-2">
                        <input name="number_40" class="form-check-input" type="radio" value="P15,000.00 to less than P20,000.00" id="defaultRadio1"/>
                        <label class="form-check-label" for="defaultRadio1"> P15,000.00 to less than P20,000.00 </label>
                    </div>

                    <div class="form-check ms-4 mt-2">
                        <input name="number_40" class="form-check-input" type="radio" value="P20,000.00 to less than P25,000.00" id="defaultRadio1"/>
                        <label class="form-check-label" for="defaultRadio1"> P20,000.00 to less than P25,000.00 </label>
                    </div>

                    <div class="form-check ms-4 mt-2 mb-3">
                        <input name="number_40" class="form-check-input" type="radio" value="P25,000.00 and above" id="defaultRadio1"/>
                        <label class="form-check-label" for="defaultRadio1"> P25,000.00 and above </label>
                    </div>
            </div>
        </div>

        <hr>

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="">Thank you for your time ... </h4>
            </div>
        </div>
    </div>
            <button data-bs-toggle="modal" data-bs-target="#smallModal" type="button" class="btn btn-primary me-2">POST</button>
            </div>
        </div>
    </div>
</div>
</div>

        <!-- P O S T  M O D A L -->
        <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
                    <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col mb-3">
                        <label for="nameSmall" class="form-label">PROGRAM</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected>Enter program</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col mb-3">
                        <label for="nameSmall" class="form-label">SCHOOL YEAR</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected>Enter school year</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                    </button>
                    <button type="button" class="btn btn-primary">POST</button>
                </div>
                </div>
            </div>
        </div>

   <!-- <script>
    function toggleForm(disable) {
        const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="date"], textarea, select');
        inputs.forEach(input => {
            input.disabled = disable;
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Initially, disable all form elements except the "I Accept" radio button
        toggleForm(true);

        // Listen for changes in the "I Accept" radio button
        const acceptRadio = document.querySelector('input[name="default-radio-1"]');
        acceptRadio.addEventListener('change', () => {
            const isChecked = acceptRadio.checked;
            toggleForm(!isChecked);
        });
    });
</script> -->
<?= $this->endSection(); ?>