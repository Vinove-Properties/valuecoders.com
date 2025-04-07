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
    <form id="calculatorForm">
    <div class="steps-navigation" id="stepsNav"></div>
    <div class="form-file" id="stepsNav">
    	
    </div>    	
    </form>
    <div class="button-group">
        <button type="button" id="prevBtn" onclick="changeStep(-1)" class="hidden">Back</button>
        <button type="button" id="nextBtn" onclick="changeStep(1)">Next</button>
        <button type="submit" id="submitBtn" class="hidden">Finish</button>
    </div>
</div>
</section>
<script>
document.addEventListener("DOMContentLoaded",function (){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/VC-calculator/data-analytics-bi-calculator.json", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var formData = JSON.parse(xhr.responseText);
            console.log(formData);
            populateForm(formData);
        }
    };
    xhr.send();
});	
// try{
//     //const response = await fetch("http://localhost:3000/0");
//     const response = await fetch("http://localhost/VC-calculator/data-analytics-bi-calculator.json");    
//     const formData = await response.json();
//     populateForm(formData);
// } catch (error) {
//     console.error("Error fetching JSON data:", error);
// }


function populateForm(formData) {
const formContainer = document.getElementById("calculatorForm");
let stepIndex = 1;

Object.keys(formData).forEach((key) => {
    const stepData = formData[key];
    const stepDiv = document.createElement("div");
    stepDiv.classList.add("step", stepData["dom-class"]);
    if (stepIndex === 1) stepDiv.classList.add("active");
    stepDiv.id = `step${stepIndex}`;

    stepData.questions.forEach((question, qIndex) => {
        const questionContainer = document.createElement("div");
        questionContainer.classList.add("question-container");
        questionContainer.setAttribute("data-required", question.isRequired);

        const questionTitle = document.createElement("h4");
        questionTitle.classList.add("question-name");
        questionTitle.textContent = question.title;
        questionContainer.appendChild(questionTitle);

        const optionsContainer = document.createElement("div");
        optionsContainer.classList.add("dom-class-column");

        question.options.forEach(option => {
            const label = document.createElement("label");
            const inputName = `${key}_question${qIndex}`;
            if (option.include === "textarea" && (!option.type || !option.name)) {
                label.innerHTML = `
                <div class="textarea-row">
                    <textarea class="input-textarea" name="${inputName}_other" placeholder="Please specify..."></textarea>
                </div>
                `;
            } else if (option.type === "checkbox" && option.include === "textarea") {
                label.innerHTML = `
                <div class="checkbox-textarea-row">
                    <input type="checkbox" name="${inputName}" value="Other"> 
                    <textarea class="input-textarea" name="${inputName}_other" placeholder="${option.name} (Please specify)"></textarea>
                </div>`;
            } else if (option.type === "radio" && option.include === "textarea") { 
                label.innerHTML = `<div class="radio-textarea-row">
                    <input type="radio" name="${inputName}" value="Other"> 
                    <textarea class="input-textarea" name="${inputName}_other" placeholder="${option.name} (Please specify)"></textarea><div>
                `;
            } else if (option.type === "checkbox") {
                label.innerHTML = `
                <div class="textarea-row">
                    <input type="checkbox" name="${inputName}" value="${option.name}">${option.name}
                </div>
                `;
            } else if (option.type === "inputtext") {
                label.innerHTML = `
                <div class="input-text-row">
                    <input type="text" name="${inputName}_input" placeholder="Enter your response...">
                    </div>
                `;
            } else {
                label.innerHTML = `
                 <div class="radio-row">
                    <input type="radio" name="${inputName}" value="${option.name}">${option.name}
                    </div>
                `;
            }
            optionsContainer.appendChild(label);
        });

        questionContainer.appendChild(optionsContainer);
        const errorMsg = document.createElement("span");
        errorMsg.classList.add("error-msg");
        errorMsg.textContent = "Please fill in the required fields.";
        questionContainer.appendChild(errorMsg);

        stepDiv.appendChild(questionContainer);
    });

    formContainer.appendChild(stepDiv);
    stepIndex++;
});

updateNavigation();
}

let currentStep = 1;

function updateNavigation() {
const stepsNav = document.getElementById('stepsNav');
stepsNav.innerHTML = '';
const steps = document.querySelectorAll('.step');

steps.forEach((_, index) => {
    const stepNav = document.createElement('div');
    stepNav.innerText = `${index + 1}`;
    stepNav.classList.toggle('active', index + 1 === currentStep);

    if (index + 1 < currentStep) {
        stepNav.classList.add('clickable');
        stepNav.addEventListener("click", () => goToStep(index + 1));
    }

    stepsNav.appendChild(stepNav);
});

document.getElementById('prevBtn').classList.toggle('hidden', currentStep === 1);
document.getElementById('nextBtn').classList.toggle('hidden', currentStep === steps.length);
document.getElementById('submitBtn').classList.toggle('hidden', currentStep !== steps.length);
}
function goToStep(step) {
const steps = document.querySelectorAll('.step');
steps[currentStep - 1].classList.remove('active');
currentStep = step;
steps[currentStep - 1].classList.add('active');
updateNavigation();
}

function validateStep(step) {
const stepElement = document.getElementById(`step${step}`);
const questions = stepElement.querySelectorAll('.question-container');
let isValid = true;

questions.forEach((question) => {
    const isRequired = question.getAttribute('data-required') === "yes";
    const inputs = question.querySelectorAll('input, textarea');
    let questionValid = !isRequired;

    inputs.forEach(input => {
        if ((input.type === "radio" || input.type === "checkbox") && input.checked) {
            questionValid = true;
        } else if ((input.type === "text" || input.tagName.toLowerCase() === "textarea") && input.value.trim()) {
            questionValid = true;
        }

        input.addEventListener("input", () => {
            question.querySelector(".error-msg").style.opacity = "0";
        });

        if (input.type === "radio" || input.type === "checkbox") {
            input.addEventListener("change", () => {
                question.querySelector(".error-msg").style.opacity = "0";
            });
        }
    });

    if (isRequired && !questionValid) {
        question.querySelector(".error-msg").style.opacity = "1";
        isValid = false;
    }
});

return isValid;
}

function changeStep(direction) {
if (direction === 1 && !validateStep(currentStep)) {
    return;
}

document.querySelectorAll('.step')[currentStep - 1].classList.remove('active');
currentStep += direction;
document.querySelectorAll('.step')[currentStep - 1].classList.add('active');

updateNavigation();
}

document.getElementById("submitBtn").addEventListener("click", function (event) {
if (!validateStep(currentStep)) {
    event.preventDefault();
}
});
</script>
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
