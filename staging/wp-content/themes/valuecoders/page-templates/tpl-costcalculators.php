<?php
/*
Template Name: Cost - Calculators Template
*/ 
global $post;
$thisPostID = $post->ID;
get_header();
?>
<section class="hero-section" style="min-height: calc(80vh - 120px); padding: 117px 0 40px;">
  <div class="container">
    <?php while( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>
  </div>
</section>
<section class="vc-cost-calc" style="padding:40px 0;">
<div class="container">
    <form>            
        <div class="steps-navigation" id="stepsNav"></div>      
        <div  id="calculatorForm"></div>
        <div class="step last-step" id="stepFinal">
        <h3>Your Contact Data</h3>                
        <label>Full Name:
            <input type="text" id="fullName" required>
            <span class="error-msg" id="fullNameError">Please fill in the required fields.</span>
        </label>                
        <label>Company Name:
            <input type="text" id="companyName" required>
            <span class="error-msg" id="companyNameError">Please fill in the required fields.</span>
        </label>                
        <label>Work Email:
            <input type="email" id="workEmail" required>
            <span class="error-msg" id="workEmailError">Please fill in the required fields.</span>
        </label>                
        <label>Phone Number:<input type="text" id="phoneNumber"></label>
        </div>
        <div class="button-group">
            <button type="button" id="prevBtn" onclick="changeStep(-1)" class="hidden">Back</button>
            <button type="button" id="nextBtn" onclick="changeStep(1)">Next</button>
            <button type="submit" id="submitBtn" class="hidden">Finish</button>
        </div>
    </form>    
</div>
</section>
<style type="text/css">
.hidden { display: none; }
.step { display: none; }
.step.active { display: block; }
.button-group { margin-top: 20px; text-align: center; }
button { padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
#prevBtn { background: #ccc; }
#nextBtn, #submitBtn { background: #007bff; color: white; }
label { display: block; margin: 0 0 10px 0;width:100%; }
input[type="text"], input[type="email"], textarea { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; }
.steps-navigation { display: flex; justify-content: space-between; margin-bottom: 20px; }
.steps-navigation div {padding: 2px;cursor: pointer;background: #f9fcff; border-radius: 30px;width: 20px;height: 20px;display: inline-flex;align-items: center;justify-content: center;font-size: 12px;font-weight: 600;}
.steps-navigation div.active {background: #ffd546; color: white; border: 5px solid #fff6d8 ; height: 30px; margin: -5px -5px 0 0;min-width: 30px;}
.steps-navigation div.disabled { background: #ccc; pointer-events: none; opacity: 0.5; }
.error-msg { color: red; display: block; margin: 5px 0 10px 0; opacity: 0; transition: opacity 0.3s ease-in-out; }
.question-name{margin:0 0 10px 0;}
.input-textarea{width:auto;}
.col-1-1 .dom-class-column{column-count: 1;}
.col-1-2 .dom-class-column{column-count: 2;}
.col-2-1 .question-container{width: 50%;float: left;}
.radio-textarea-row,.checkbox-textarea-row {display: flex;align-items: center;}
.radio-textarea-row textarea ,.checkbox-textarea-row textarea {margin-left: 5px; width: 100%;flex: 1; height: 35px;resize: none;}
*{box-sizing: border-box;}
input[type="radio"],input[type="checkbox"] { margin: 0 5px 0 0;}
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
</style>
<?php get_footer(); ?>
