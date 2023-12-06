<?php require_once 'common/inc/config.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - Software Solutions Firm - @ValueCoders</title>
    <meta name="description" content="Contact Us - Software Solutions Firm - @ValueCoders" />
    <meta name="keywords"
        content="software outsourcing company, software development outsourcing, software engineering company in india, software outsourcing company India, offshore software development, software outsourcing services" />
    <meta property="og:title" content="Contact Us - Software Solutions Firm - @ValueCoders" />

    <?php require_once 'include/header-files.php'; ?>
    <link rel="preload stylesheet" type="text/css" href="css/contact-form.min.css" defer />

    <!-- add -->
    <link rel="preload stylesheet" type="text/css" href="css/form-county.css" />
    <link rel="preload stylesheet" type="text/css" href="css/nice-select2.css" />
    <script src="/valuecoders-v2/js/intlTelInput.js"></script>
    <script src="/valuecoders-v2/js/select-bx.js"></script>
</head>

<body id="themeAdd">
    <?php require_once 'include/menu.php'; ?>
    <section class="contact-us-section full-width-form padding-t-150 padding-b-150">


        <div class="container">
            <div class="bg-voilet">
                <div class="form-box-outer right-box" style="padding-top:40px;">
                    <div class="head-txt">
                        <div class="logo-box"></div>
                        <div class="head-box">
                            <h1>Get In Touch</h1>
                            <p>Hire Us And Work With The World-Class Software Development Teams.</p>
                        </div>
                    </div>
                    <form action="" enctype="multipart/form-data" method="POST" id="contact-form-section"
                        onsubmit="return vcCmnFormValidation();" style="margin-top:40px;">
                        <div id="vc-fstep1" class="step-one">
                            <div class="step-head active">
                                <h2>Your Information</h2>
                            </div>
                            <div class="form-inner dis-flex">
                                <div class="form-text-cont">
                                    <div class="lbl-row">
                                        <label for="cont_name">Full Name*</label>
                                        <span class="req-block">Required Fields*</span>
                                    </div>
                                    <div class="user-input">
                                        <input type="text" id="cont_name" placeholder="Enter your full name"
                                            class="input-field" value="" maxlength="50" name="user-name" />
                                        <small>Error Message</small>
                                    </div>
                                </div>
                                <div class="form-text-cont">
                                    <div class="lbl-row">
                                        <label for="cont_email">Email Address*</label>
                                    </div>
                                    <div class="user-input">
                                        <input type="text" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,10}$"
                                            placeholder="Enter your email address" class="input-field" value=""
                                            maxlength="50" name="user-email" id="cont_email" />
                                        <small>Error Message</small>
                                    </div>
                                </div>
                                <div class="form-text-cont cont_country_section">
                                    <div class="row-left">
                                        <label for="cont_phpne">Phone no*</label>
                                        <input type="hidden" id="cont_country" value="in" name="user-country">
                                        <div class="user-input">
                                            <input id="pcode" tabindex="-1" type="text" name="cprefix"
                                                class="pcode-prefix"
                                                onkeydown="javascript:if(event.keyCode != 9) return false;"
                                                onmousedown="return false;">
                                            <input id="cont_phpne" type="tel" maxlength="12" name="user-phone"
                                                class="input-field flg-input">
                                            <small>Error Message</small>
                                        </div>
                                    </div>
                                    <div class="row-right no-erro-fld">
                                        <label id="in-ext">Extension</label>
                                        <div class="user-input">
                                            <input class="input-field input-extension" id="in_ext" type="tel"
                                                placeholder="" autocomplete="off" value="" maxlength="5"
                                                name="user-extension" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-text-cont">
                                    <div class="user-input">
                                        <label for="select-wehelp">How can we help?*</label>
                                        <select class="wide selectize" name="we-help" id="select-wehelp">
                                            <!-- <option value=""></option> -->
                                            <option value="Software Development"
                                                title="For custom software development and fixed cost projects.">
                                                Software Development</option>
                                            <option value="Team Extension"
                                                title="Augment your team with expert software engineers.">Team Extension
                                                (Staff Augmentation)</option>
                                            <option value="Dedicated Software Team"
                                                title="Dedicated autonomous software product engineering teams comprising of multiple skills.">
                                                Dedicated Software Team</option>
                                            <option value="Other Technology Needs"
                                                title="Any other world-class technology solution that you may need.">
                                                Other Technology Needs</option>
                                            <option value="None of the above"
                                                title="Connect with our business consultant to discuss your requirements.">
                                                None of the above</option>
                                        </select>
                                        <small>Error Message</small>
                                    </div>
                                </div>
                                <div class="nxt-btn-box">
                                    <button class="nxt-btn" type="button" onclick="return vcStepOneCheckert();">Save and
                                        Continue</button>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="step-head">
                                <h2>Your Requirements</h2>
                            </div>
                        </div>
                        <!--//Setp 1 Ends Here -->

                        <div id="vc-fstep2" class="step-two" style="display:block;">
                            <div class="step-head-outer">
                                <div class="step-head contact-info">
                                    <h2>Contact Information</h2>
                                    <a href="javascript:void(0);" onclick="dovcstep_one();" class="edit-txt">Edit</a>
                                </div>

                                <div class="form-text-selected-outer dis-flex">
                                    <div class="form-text-selected">
                                        <label for="focusInput">Full Name:</label>
                                        <div class="user-input-selected">
                                            <span id="span-name"></span>
                                        </div>
                                    </div>
                                    <div class="form-text-selected">
                                        <label>Email Address:</label>
                                        <div class="user-input-selected">
                                            <span id="span-email"></span>
                                        </div>
                                    </div>
                                    <div class="form-text-selected">
                                        <label>Phone No :</label>
                                        <div class="user-input-selected">
                                            <span id="span-phone"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step-head active">
                                <h2>Your Requirements</h2>
                            </div>

                            <div class="form-text-cont width-full">
                                <div class="exp-div-row">
                                    <label>What is the expected start date?*</label>
                                    <select name="expected-date" id="inp-expdate">
                                        <!-- <option value=""></option> -->
                                        <option value="I am already late">I am already late</option>
                                        <option value="Immediately">Immediately</option>
                                        <option value="When I get internal funding/approval">When I get internal
                                            funding/approval</option>
                                        <option value="Specify a date">Specify a date</option>
                                        <option value="I don't know">I don't know</option>
                                    </select>
                                    <small></small>
                                </div>

                                <div class="radio-date opt-div" id="radio-date"
                                    style="display:none; margin-bottom:30px;">
                                    <div class="radio-date-list">
                                        <input type="radio" id="oneMonth" name="expected-month" value="1 month" checked>
                                        <label for="oneMonth">1 month</label>
                                    </div>
                                    <div class="radio-date-list">
                                        <input type="radio" id="twoMonth" name="expected-month" value="2 months">
                                        <label for="twoMonth">2 months</label>
                                    </div>
                                    <div class="radio-date-list">
                                        <input type="radio" id="threeMonth" name="expected-month" value="3 months">
                                        <label for="threeMonth">3 months</label>
                                    </div>
                                    <div class="radio-date-list">
                                        <input type="radio" id="sixMonth" name="expected-month" value="6 months">
                                        <label for="sixMonth">6 months</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-text-cont width-full opt-div" id="team-ext-col" style="display:intial;">
                                <div class="form-text-cont width-full">
                                    <div class="lbl-row-new">
                                        <label>How many engineers would you like to add?*</label>
                                    </div>
                                    <select id="inp-resources" name="count-resources">
                                        <!-- <option value=""></option> -->
                                        <option value="1">1</option>
                                        <option value="2-5">2-5</option>
                                        <option value="6-10">6-10</option>
                                        <option value="11-20">11-20</option>
                                        <option value="More than 20">More than 20</option>
                                        <option value="I don't Know">I don't Know</option>
                                    </select>
                                </div>

                                <div id="how-long" class="form-text-cont width-full">
                                    <div class="lbl-row-new">
                                        <label>For how long will you need these engineers?*</label>
                                    </div>
                                    <select id="inp-howlong" name="howlong">
                                        <!--option value=""></option-->
                                        <option value="1-3 Months">1-3 Months</option>
                                        <option value="3-6 Months">3-6 Months</option>
                                        <option value="6+ Months">6+ Months</option>
                                    </select>

                                </div>
                            </div>
                            <div id="temp-tem-ext-dv"></div>
                            <div class="form-text-cont width-full">
                                <div class="lbl-row-new">
                                    <label>Requirement*</label>
                                </div>

                                <div class="user-input">
                                    <textarea class="input-field comment-input" placeholder="What Can We Do For You?"
                                        id="user-req" name="user-req"></textarea>
                                    <small>Error Message</small>
                                    <div class="drop-input attachment_brw" id="uploadcontact">
                                        <div id="dropcontact"></div>
                                    </div>
                                    <div id="drop-area">
                                        <input type="file" name="files[]" id="fileElem" multiple
                                            accept="image/*,application/pdf,.psd,.zip,.docx,.xlsx,.xls,.txt"
                                            onchange="handleFiles(this.files)">
                                        <label class="button" for="fileElem">BROWSE | DROP FILES HERE</label>
                                        <input type="hidden" name="up-counter" id="uplcounter" value="0">
                                        <progress style="display:none;" id="progress-bar" max=100 value=0></progress>
                                    </div>
                                </div>
                            </div>

                            <div id="gloader" class="gal-loader">
                                <div class="loader"></div>
                                <div id="gallery"></div>
                            </div>
                            <p id="file-type-error"></p>
                            <div class="nda-button">
                                <input type="checkbox" id="ndaButton" name="nda" value="Send me NDA">
                                <label for="ndaButton">Send me NDA
                                    <div class="info-box">
                                        <em>i</em>
                                        <span class="info">A Non Disclosure Agreement is a legally binding contract that
                                            establishes a confidential relationship. The party or parties signing the
                                            agreement agree that sensitive information they may obtain will not be made
                                            available to any others. An NDA may also be referred to as a confidentiality
                                            agreement. (credit: Investopedia)</span>
                                    </div>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="quizQ">
                                    <span id="j-quiz"></span>
                                    <a href="javascript:void(0)" ;="" class="refreshbtn"
                                        onclick="generateWsQuiz();"></a>
                                </div>
                                <span class="equal">=</span>
                                <div class="quizAns">
                                    <input type="text" name="captcha" placeholder="??" id="j-quiz-ans"
                                        onkeypress="cap_limit(this);">
                                    <span class="error" id="captchaerror"></span>
                                </div>
                            </div>
                            <div class="user-input checkout">
                                <input type="hidden" name="Uploadedfilename" id="Uploadedfilename" value="">
                                <input type="hidden" name="frmqueryString" value="">
                                <input type="hidden" name="page_url" value="">
                                <input type="hidden" name="vform-type" value="contact">
                                <input type="submit" id="submitButton" class="checkout-submit"
                                    value="Send your request" />
                            </div>
                            <p class="note">Note : We Respect Your Privacy! Your details will never be shared with
                                anyone for marketing purposes.</p>
                        </div><!-- //Step - 2 #Ends -->
                    </form>
                </div>

                <div class="trusted-logos">
                    <div class="dis-flex items-center justify-sb">
                        <span class="text-box">Trusted By</span>
                        <div class="logo-box">
                            <picture>
                                <source type="image/webp" srcset="/images/trusted-logos.webp">
                                <source type="image/png" srcset="/images/trusted-logos.png">
                                <img loading="lazy" src="/images/trusted-logos.png" alt="Valuecoders" width="786"
                                    height="104">
                            </picture>

                        </div>
                    </div>
                </div>

            </div>
            <div class="form-footer dis-flex">
                <div class="left-block">
                    <a href="mailto:sales@valuecoders.com"> <span class="title">Email Us</span>
                        sales@valuecoders.com</a>
                    <a href="tel:+917042020782"><span class="title">Whatsapp</span> +91 704 202 0782</a>
                </div>
                <div class="mid-block dis-flex">
                    <div class="flex-2">
                        <a href="tel:+917042020782"><span class="title">INDIA</span> +91 704 202 0782</a>
                    </div>
                    <div class="flex-2">
                        <a href="tel:+442032392299"><span class="title">UK</span> +44 20 3239 2299</a>
                    </div>
                    <div class="flex-2">
                        <a href="tel:+14152300123"><span class="title">USA</span> +1 415 230 0123</a>
                    </div>
                    <div class="flex-2">
                        <a href="tel:+61280058080"><span class="title">AUS</span> +61 2 8005 8080</a>
                    </div>
                </div>
                <div class="last-block">
                    <ul>
                        <li><strong>Gurugram :</strong> 2nd Floor, 55P, Sector 44, Gurugram 122003, Haryana</li>
                        <li><strong>Noida :</strong> 3rd Floor, Fusion Square, 5A & 5B, Sector 126, Noida 201303</li>
                        <li><strong>Mohali :</strong> Bestech Business Tower, B- 4th floor 401, Sahibzada Ajit Singh
                            Nagar, Punjab 160062</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php require_once 'include/footer.php'; ?>
    <script src="<?=HOST_URL?>js/form-validation.js"></script>


    <script>
    const phoneInputField = document.querySelector("#pcode");
    window.intlTelInput(phoneInputField, {
        utilsScript: "http://localhost/valuecoders-v2/js/utils.js",
    });
    document.addEventListener("DOMContentLoaded", function() {
        let title = document.getElementsByClassName('iti__selected-flag');
        let phoneInp = document.getElementById('pcode');
        title = title[0].getAttribute('title');
        let res = title.replace(/\D/g, "");
        phoneInp.value = '+' + res + ' ';
    });

    document.addEventListener('click', function(event) {
        let phoneInp = document.getElementById('pcode');
        if (event.target.matches('.iti__country')) {
            let title = document.getElementsByClassName('iti__selected-flag');
            title = title[0].getAttribute('title');
            let res = title.replace(/\D/g, "");
            phoneInp.value = '+' + res + ' ';
        }
        event.preventDefault();
    }, false);
    </script>

</body>

</html>