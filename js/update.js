$(document).ready(function(){
    $(".btnUsers").click(function(e){
        e.preventDefault(); 
        var first=$("#firstName").val();
        var last=$("#lastName").val();
        var role=$("#role").val();
        var password=$("#password").val();
        var id= $("#id").val();

        $reFirstName=/^[A-Z][a-z]{2,11}$/;
        $relastName=/^([A-Z][a-z]{2,15})+$/;
        $repass=/^\w{2,}\d*$/; 
        var errors=[];
        if(!$reFirstName.test(first)){
            errors.push("Not good");
        }
        if(!$relastName.test(last)){
            errors.push("Not good");
        }
        if(!$repass.test(password)){
            errors.push("Not good");
        }
        if(role==0){
            errors.push("You must choose role.");
        }
        if(errors.length == 0){
            $.ajax({
                url: "updateForm.php",
                method: "POST",
                data: {               
                    firstName : firstName ,
                    lastName : lastName,
                    password: password,
                    id : id,
                    role : role
                },
                success: function(data){
                alert("Update has been succesfully");
                },
               error: function(xhr, status,error){
                var status = xhr.status;
                switch(status){
                case 422:
                alert("Something is wrong with data you have entered");
                break;
                case 500:
                alert("Error.");
                break;
                case 409:
                alert("User already exists.");
                break;
                default:
                alert("Error:" + xhr.status);
                }
                }
                }); 
        }
    })
})