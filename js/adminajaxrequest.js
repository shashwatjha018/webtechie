const form = document.getElementById("form");
let check1 = true, check2 = true;
form.addEventListener('submit', (e) => {
  e.preventDefault();
  console.log("Admin Clicked");
  const emailLog= document.getElementById("email1");
  const passwordLog= document.getElementById("password1");
  console.log(passwordLog.value.trim());
  console.log(emailLog.value.trim());
  if (emailLog.value.trim() === "") {
    setErrorMsg(emailLog, 'Email cannot be empty');
  }
  else if (!isEmail(emailLog.value.trim())) {
    setErrorMsg(emailLog, 'Enter a valid email');
  }
  else {
    setSuccessMsg(emailLog);
    check1 = false;
  }
  if (passwordLog.value.trim() === "") {
    setErrorMsg(passwordLog, 'Password cannot be empty');
  } else if (passwordLog.value.trim().length < 2) {
    setErrorMsg(passwordLog, 'Password cannot be less than 2 character');
  } else {
    setSuccessMsg(passwordLog);
    check2 = false;
  }
  if(check1 === false && check1 === false){
    console.log("Check Admin");
    $.ajax({
      url:'admin/admin.php',
      method: 'POST',
      dataType:"json",
      data:{
        checklogemail: "checklogemail",
        emailLog: emailLog.value.trim(),
        passwordLog: passwordLog.value.trim(), 
      },
      success:function (data) {
        console.log(data)
        if(data == 0){
          $("#email1-div").removeClass("success");
          $("#pass1-div").removeClass("success");
          $("#email1-div").addClass("error");
          $("#pass1-div").addClass("error");
          $("#si-email").text("Invalid Email or Password");
          $("#si-password").text("");
        }
        else if(data == 1){
          alert("Admin login Successfully")
          window.location.href = "admin/adminDash1.php";
          clearStuRegField();
        }
      
      }
    });
  }
})
function setErrorMsg(input, message) {
  const inputIcons = input.parentElement;
  const small = inputIcons.querySelector('small');
  inputIcons.className = "input-icons error";
  small.innerText = message;
}
function setSuccessMsg(input) {
  const inputIcons = input.parentElement;
  inputIcons.className = "input-icons success";
}
function isEmail(email) {
  let a =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
  return a;
}

//Empty all fields
function clearStuRegField(){
  $("#form").trigger("reset");
  $(".su").text("");
  $(".input-icons").removeClass("success");
}