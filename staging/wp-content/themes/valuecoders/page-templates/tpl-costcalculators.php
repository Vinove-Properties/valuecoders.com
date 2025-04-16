<?php
/*
Template Name: Cost - Calculators Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="cost-banner">
  <div class="container">
    <?php while( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile; ?>
  </div>
</section>
<section class="vc-cost-calc">
  <div class="container">


   <div class="cost-wrap">


    <div class="cost-left">
<h2>Estimate The Cost of Telecom Software Development </h2>
<p>Answer a few simple questions about the IT consulting support you need. We will analyze your needs and provide a tailored cost estimation for your case.</p>
<div class="img-wrap">
<img loading="lazy" src="<?php bloginfo('template_url'); ?>/v6.0/images/cost-image.svg" alt="valuecoders" width="384" height="325">
</div>


    </div>



    <div class="cost-right">
    <form id="cost-calc-form">
      <div class="steps-navigation" id="stepsNav"></div>
      <div id="calculatorForm"></div>
      <div class="step last-step" id="stepFinal">
        <h3>Your Contact Data</h3>
        <label>Full Name:
        <input type="text" name="uname" id="fullName" value="Jhon Doe" required>
        <span class="error-msg" id="fullNameError">Please fill in the required fields.</span>
        </label>                
        <label>Company Name:
        <input type="text" name="company" id="companyName" value="Valuecoders" required>
        <span class="error-msg" id="companyNameError">Please fill in the required fields.</span>
        </label>                
        <label>Work Email:
        <input type="email" name="email" id="workEmail" value="jhon.doe@yopmail.com" required>
        <span class="error-msg" id="workEmailError">Please fill in the required fields.</span>
        </label>                
        <label>Phone Number:<input type="text" name="phone"  value="0000000000" id="phoneNumber"></label>
      </div>
      <div class="button-group">
        <button type="button" id="prevBtn" onclick="changeStep(-1)" class="hidden">Back</button>
        <button type="button" id="nextBtn" onclick="changeStep(1)">Next</button>
        <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
        <button type="submit" id="submitBtn" class="hidden">Finish</button>
      </div>
      <div id="sub-outpur"></div>
    </form>
</div>
</div>


  </div>
</section>



<style type="text/css">


.cost-banner{padding: 117px 0 80px; min-height: initial; background: linear-gradient(180deg, #211f47 0%, #05164d 100%) !important; text-align: center;}
.cost-banner p{margin-top: 20px; line-height: 30px; color: rgba(252, 252, 252, 0.87); font-size: 18px; font-weight: 400;}

.vc-cost-calc{background:#FFF6E5; padding:25px 0;}
.cost-wrap{display:flex; flex-wrap: nowrap; justify-content:space-between; align-items: center;}

.cost-left{flex-basis:30%;}
.cost-left h2{font-size:30px; line-height:1.3; margin:0 0 20px;}
.cost-left .img-wrap{margin:60px 0 0;}
.cost-right{    flex-basis: 65%; background: rgba(255, 255, 255, 1); border-radius: 10px; padding: 22px}

.steps-navigation { display: flex; justify-content: space-between; margin-bottom: 20px;padding: 10px 0;     align-items: center; position:relative;}
.steps-navigation:after{content:''; width:100%; height:1px; background:rgba(0, 0, 0, 0.05); position:absolute; top: 20px; left:0;}
.steps-navigation div {padding: 2px; z-index: 9; cursor: pointer;background: #FFF6E5; color:#5e6373; border: 5px solid transparent;  margin: -5px -5px 0 0;border-radius: 30px;width: 24px;height: 24px;display: inline-flex;align-items: center;justify-content: center;font-size: 12px;font-weight: 600;}
.steps-navigation div.active {background: #FFAD00; color: white; border: 5px solid #fff6d8 ; height: 30px;min-width: 30px;}
.question-name{margin: 0 0 20px; font-size: 18px; line-height: 30px;}

label {display: block; margin: 0 0 14px 0; width: 100%; border: 1px solid rgba(244, 242, 242, 1); padding: 6px 20px; border-radius: 5px;}
.radio-row{color: rgba(0, 0, 0, 0.8); font-weight: 500;}
input[type="radio"],input[type="checkbox"] { margin: 0 10px 0 0;}


input[type="radio"] {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  width:18px;
  height: 18px;
  border: 1px solid #C9C9C9;
  border-radius: 50%;
  background-color: transparent;
  cursor: pointer;
  position: relative;
  vertical-align: middle;
  margin-right: 10px;
}

 input[type="radio"]::before {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  width: 12px;
  height: 12px;
  background-color: #FFAD00;
  border-radius: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}

input[type="radio"]:checked{border-color: #FFAD00;}

input[type="radio"]:checked::before {
  opacity: 1;
}

input[type="checkbox"] {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 18px;
  height: 18px;
  border: 1px solid #C9C9C9;
  border-radius: 4px; /* square box with slight rounding */
  background-color: transparent;
  cursor: pointer;
  position: relative;
  vertical-align: middle;
  margin-right: 10px;
}

input[type="checkbox"]::before {
  content: "✓";
  color: white;
  font-size: 13px;
  font-weight: bold;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  pointer-events: none;
}
 input[type="checkbox"]:checked {
  background-color: #FFAD00;
}

input[type="checkbox"]:checked::before {
  opacity: 1;
}






.hidden { display: none; }
.step { display: none; }
.step.active { display: block; }
.button-group {margin-top: 20px;
    text-align: right;
    gap: 20px;
    display: flex
;
    justify-content: right;}
button {padding: 10px 23px;  border: none; font-weight: 500; font-size: 16px; border-radius: 5px; cursor: pointer; }
button:hover{background:#05164d;}
#prevBtn {    background: #FFF6E5;}
#nextBtn, #submitBtn {background: #FFAD00; color: #000000; }

input[type="text"], input[type="email"], textarea { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; }


.steps-navigation div.disabled { background: #ccc; pointer-events: none; opacity: 0.5; }
.error-msg { color: red; display: block; font-size:14px; margin:0 0 10px; opacity: 0; transition: opacity 0.3s ease-in-out; }

.input-textarea{width:auto;}
.col-1-1 .dom-class-column{column-count: 1;}
.col-1-2 .dom-class-column{column-count: 2;}
.col-2-1 .question-container{width: 49%;}
.radio-textarea-row,.checkbox-textarea-row {display: flex;align-items: center;}
.radio-textarea-row textarea ,.checkbox-textarea-row textarea { width: 100%;flex: 1; height: 35px;resize: none;}
*{box-sizing: border-box;}

.textarea-row{width:100%;}
.textarea-row textarea{width:100%;}
.col-2-1-1 .dom-class-column{column-count: 2;}
.col-2-1-1 .question-container:nth-child(2) .dom-class-column{column-count: 1;}
.col-2-1-1 .question-container:nth-child(2) .dom-class-column .textarea-row textarea{width: 100%;flex: 1; 
height: 80px;resize: none;}
.col-1-2-1 .dom-class-column:nth-child(1){column-count: 1;}
.col-1-2-1 .question-container:nth-child(2) .dom-class-column{column-count: 2;}
.col-1-2-1 .question-container:nth-child(1) .dom-class-column .textarea-row textarea{width: 100%;flex: 1; 
height: 80px;resize: none;}
.col-2-1-2{column-count: 2;}

.question-container{width: 100%;}


.step.active{display: flex; flex-wrap: wrap; justify-content: space-between ;}

.last-step label{border: 0; margin: 0 0 10px; padding: 0;} 



</style>
<?php get_footer(); ?>
