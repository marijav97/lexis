$("#sendReg").click(function(e){
    e.preventDefault();
    var firstName=$("#firstName").val();
    var lastName=$("#lastName").val();
    var email=$("#emailReg").val();
    var username=$("#usernameReg").val();
    var password=$("#passwordReg").val();

    var reFirstName=/^[A-Z][a-z]{2,11}$/;
    var reLastName=/^([A-Z][a-z]{2,15})+$/;
    var reEmail=/^[a-z\.\-\_0-9]+@([a-z]+\.){1,}[a-z]{2,}$/;
    var rePassword=/^\w{6,}\d{1,}$/;
    var reUsername=/^\w{6,}\d{1,}$/;

    var errors=[];

    if(!reFirstName.test(firstName)){
        errors.push('First Name is not in good format!');
    } 
    if(!reLastName.test(lastName)){
        errors.push('Last Name is not in good format!');
    } 
    if(!reEmail.test(email)){
        errors.push('Email is not in good format!');
    } 
    if(!rePassword.test(password)){
        errors.push('Password is not in good format!Password must have at least one number!');
    } 
    if(!reUsername.test(username)){
        errors.push('Username is not in good format!Username must have at least one number!');
    } 
    if(errors.length != 0){
        var errors_print ="";
            for (let index = 0; index < errors.length; index++) {
            errors_print += "<li>" + errors[index] + "</li>";
        }
        $('#simple-msg').html(errors_print);
       
    }else{
       
       
        $.ajax({
        url: "register.php",
        method: "POST",
        data: {
        send: true,
        firstName : firstName ,
        lastName : lastName,
        emailReg : email,
        passwordReg : password,
        usernameReg : username
        },
        success: function(data){
        alert("Registration has been succesfully");
       
        },
       error: function(xhr, status,error){
        var status = xhr.status;
       switch(status){
        case 422:
        alert('Informations are not good!');
        break;
        case 409:
        alert('Mail already exist.');
        break;
        case 500:
        alert("Error with DataBase.");
        break;
        case 412: 
        alert("User already exists.");
        break;
        default:
        alert("Error:" + xhr.status);
        }
        }
        });
        } 
       
       
  })