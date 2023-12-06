<div class="container">
  <div class="dis-flex justify-sb">
    <div class="left-box">
      <h2>Book Free Consultation</h2>
      <div class="side-dash1 list-box">
        <h3>Fill up your details</h3>
        <p>Get Custom Solutions, Recommendations, Estimates. Confidentiality & Same Day Response Guaranteed!</p>
      </div>
      <div class="side-dash2 list-box">
        <h3>What's next?</h3>
        <p>One of our Account Managers will contact you shortly</p>
        <div class="dis-flex profile-outer">
          <div class="profile-pic">
            <i class="pic1 vlazy"></i>
            <span> Atul </span>
          </div>
          <div class="profile-pic">
            <i class="pic3 vlazy"></i>
            <span> Avi </span>
          </div>
          <div class="profile-pic">
            <i class="pic4 vlazy"></i>
            <span> Akhil </span>
          </div>
        </div>
      </div>
    </div>
    <div class="right-box">
      <?php require_once 'form-footer.php'; ?>
    </div>
  </div>
</div>
<script>
  function validateMquiz(){
  	let que     = document.getElementById("j-quiz").textContent;
  	let ans     = document.getElementById("j-quiz-ans").value;
  	let qerror  = document.getElementById("captchaerror");
  	if( eval(que) == ans ){
  		qerror.textContent = "";
  		return true;
  	}else{
  		qerror.textContent = "Invalid Answer";
  		return false;
  	}
  }
  
  var jQuizExists = document.getElementById("j-quiz");
  if (jQuizExists) {
  	generateWsQuiz();
  }
  function generateWsQuiz() {
  	let n1 = Math.floor(Math.random() * 9) + 1;
  	let n2 = Math.floor(Math.random() * 9) + 1;
  	document.getElementById("j-quiz").textContent = n1 + " + " + n2;
  }
</script>