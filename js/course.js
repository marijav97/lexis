window.onload=function(){
    writeAll();
    document.getElementById("search").addEventListener("blur", function(){
        $.ajax({
            url:"course.php",
            dataType:"json",
            method:"post",
            success:function(data){
                let html=$("#search").val();
                data=data.filter(p=>p.name.toUpperCase().indexOf(html.toUpperCase())!=-1);
                writeAll(data);  
             },  
            error:function(error){
                console.log(error);
            }  
             
        })
    })
        
}
function writeAll(){
    $.ajax({
        url:"course.php",
        method: "post",
        dataType: "json",
        data:{

        },
        success: function(data){
            let ispis="";
            for(let item of data){
                ispis+=`
                <h4 class="heading">${item.name}</h4>
                 <img src="images/${item.src}" alt="${item.name}">  
                <a href="course/${item.link}"><button type="button" class="btn btn-info btn-lg courseBtn">Look</button></a>   
                `;
            }
            $("#item").html(ispis);
        }, 
        error:function(error){
            console.log(error);
        }
    })
}