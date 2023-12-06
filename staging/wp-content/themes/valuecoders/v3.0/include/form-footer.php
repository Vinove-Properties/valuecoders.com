<form id="contact-form-section" action="https://www.valuecoders.com/v2wp/sendmail1.php" class="contact-form-section"
    enctype="multipart/form-data" method="POST" onsubmit="return vcCmnFormValidation(false);">
    <div class="form-inner dis-flex">
        <div class="form-text-cont">
            <div class="user-input">
                <input type="text" autocomplete="off" id="cont_name" placeholder="Full Name" class="input-field"
                    value="" name="user-name">
                <small>Error Message</small>
            </div>
        </div>
        <div class="form-text-cont">
            <div class="user-input">
                <input type="text" autocomplete="off" id="cont_email" placeholder="Email Address" class="input-field"
                    value="" name="user-email">
                <small>Error Message</small>
            </div>
        </div>
        <div class="form-text-cont">
            <div class="user-input">
                <input type="text" autocomplete="off" class="input-field" id="cont_phpne" placeholder="Phone Number"
                    value="" name="user-phone">
                <small>Error Message</small>
            </div>
        </div>
        <div class="form-text-cont cont_country_section">
            <div class="user-input">
                <input class="input-field input-skype" autocomplete="off" id="cont_country" type="text"
                    placeholder="Country" value="" name="user-country">
                <small>Error Message</small>
            </div>
        </div>
        <div class="form-text-cont width-full">
            <div class="user-input form-control verror">
                <textarea class="input-field comment-input" autocomplete="off" id="user-req" placeholder="Project Brief"
                    name="user-req"></textarea>
                <small>Please Fill Requirement</small>
                <div class="drop-input attachment_brw" id="uploadcontact">
                    <div id="dropcontact"></div>
                </div>
                <div id="drop-area">
                    <input type="file" name="files[]" id="fileElem" multiple=""
                        accept="image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls,.txt"
                        onchange="handleFiles(this.files)" style="display:none;">
                    <button class="button" id="browse-btn" type="button"
                        onclick="document.getElementById('fileElem').click()">BROWSE | DROP FILES HERE</button>
                    <input type="hidden" name="up-counter" id="uplcounter" value="0">
                </div>
            </div>
        </div>
    </div>
    <div id="gloader" class="gal-loader">
        <div class="loader"></div>
        <div id="gallery"></div>
    </div>
    <p id="file-type-error"></p>
    <!--<div class="form-group">
        <div class="quizQ">
            <span id="j-quiz">3 + 2</span>
            <a href="javascript:void(0);" class="refreshbtn" onclick="generateWsQuiz();"></a>
        </div>
        <span class="equal">=</span>
        <div class="quizAns">
            <input type="number" name="captcha" placeholder="??" id="j-quiz-ans" onkeypress="cap_limit(event, this);">
            <span class="error" id="captchaerror"></span>
        </div>
    </div>-->
    <div class="user-input checkout">
        <input type="hidden" name="Uploadedfilename" id="Uploadedfilename" value="">
        <input type="hidden" name="frmqueryString" value="">
        <input type="hidden" name="page_url" value="https://www.valuecoders.com/v2wp/">
        <input type="hidden" name="vc_csrf" value="">
        <input type="submit" id="submitButton" class="checkout-submit" value="Enquire Now">
    </div>
</form>