$(document).ready(function(){
  //Ajax call form to check if email already exists
  $("#email").on("keypress blur", function(){
    let email = $("#email");
    // console.log(email);
    $.ajax({
      url:"Student/addstudent.php",
      method:"POST",
      data:{
        checkmail:"checkmail",
        stuemail:email.val(),
      },
      success:function(data){
        if(data != 0){
          $("#email-div").removeClass("success");
          $("#email-div").addClass("error");
          $("#su-email").text("Email Already Exists");
          $("#submit").attr("disabled",true);
        }
        else if(data == 0 && isEmail(email.val())){
          $("#email-div").removeClass("error");
          $("#email-div").addClass("success");
          $("#su-email").text("There you go!");
          $("#submit").attr("disabled",false);
        }
        else{
          $("#email-div").removeClass("success");
          $("#email-div").addClass("error");
          $("#su-email").text("Please Enter a valid email");
          $("#submit").attr("disabled",true);
        }
      } 
    })
  })
});


//Ajax call to add student

const form = document.getElementById("form");
let check1 = true,check2 = true,check3 = true,check4=true, check5=true;
form.addEventListener('submit', (event) => {
  console.log("Clicked");
  event.preventDefault();
  const username = document.getElementById("username");
  const email= document.getElementById("email");
  const password= document.getElementById("password");
  console.log(username.value.trim());
  console.log(password.value.trim());
  console.log(email.value.trim());
  if (username.value.trim() === "") {
    setErrorMsg(username, 'Username cannot be empty');
  } else if (username.value.trim().length <= 2) {
    setErrorMsg(username, 'Username cannont be less than 3 characters');
  } else {
    setSuccessMsg(username);
    check1 = false;
  }
  if (email.value.trim() === "") {
    setErrorMsg(email, 'Email cannot be empty');

  }
  else if (!isEmail(email.value.trim())) {
    setErrorMsg(email, 'Enter a valid email');
  }
  else {
    setSuccessMsg(email);
    check2 = false;
  }
  if (password.value.trim() === "") {
    setErrorMsg(password, 'Password cannot be empty');
  } else if (password.value.trim().length < 5) {
    setErrorMsg(password, 'Password cannot be less than 5 character');
  } else {
    setSuccessMsg(password);
    check3 = false;
  }
 if(check1 === false && check2 === false && check3 === false){
  $.ajax({
    url:'Student/addstudent.php',
    method: 'POST',
    dataType:"json",
    data:{
      stusignup: "stusignup",
      username: username.value.trim(),
      email: email.value.trim(),
      password: password.value.trim(), 
    },
    success:function (data) {
      console.log(data)
      if(data == "OK"){
        alert("Registration Successful!");
        clearStuRegField();
      }
      else if(data == "Failed"){
        alert("Unable to Register");
      }
    }
  })
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

//-------------------Login-----------------------

const form1 = document.getElementById("form1");
form1.addEventListener('submit', (e) => {
  e.preventDefault();
  console.log("Login Clicked");
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
    check4 = false;
  }
  if (passwordLog.value.trim() === "") {
    setErrorMsg(passwordLog, 'Password cannot be empty');
  } else if (passwordLog.value.trim().length < 5) {
    setErrorMsg(passwordLog, 'Password cannot be less than 5 character');
  } else {
    setSuccessMsg(passwordLog);
    check5 = false;
  }
  if(check4 === false && check5 === false){
    console.log("Check");
    $.ajax({
      url:'Student/addstudent.php',
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
          alert("Login Successfully")
          window.location.href = "home.php";
          clearStuRegField();
        }
      
      }
    });
  }
  
})