function signupvalidation(){
    let x = document.forms["signup"]["name1"].value;
    let y = document.forms["signup"]["email"].value;
    let z = document.forms["signup"]["password"].value;
  
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }
    
    if (y == "") {
      alert("Enter correct mail");
      return false;
    }
    
    if (z <= 8) {
      alert("Pass must be more than 8 char");
      return false;
    }
  }
  function ValidateEmail(inputText)
    {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(inputText.value.match(mailformat))
    {
    document.login.email.focus();
    return true;
    }
    else
    {
    alert("You have entered an invalid email address!");
    document.login.email.focus();
    return false;
    }
    }
    function CheckPassword(inputtxt) 
  { 
  var passw=  /^[A-Za-z]\w{7,14}$/;
  if(inputtxt.value.match(passw)) 
  { 
  alert('Correct, try another...')
  return true;
  }
  else
  { 
  alert('Wrong...!')
  return false;
  }
  }