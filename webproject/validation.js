function validateUsername()
{

    field = document.getElementById("usname").value
    field2 = document.getElementById("psword").value
    if(field != ""){
        if(/^\d+$/.test(field)){
            alert("number")
        }
        else{
            document.getElementById("userHelp").textContent = "field cannot be string value "
            document.getElementById("userHelp").style.color = "red"  
        }
        document.getElementById("usname").style.borderColor = "gray"
        document.getElementById("userHelp").textContent = "we will never share your email with anyone"
        document.getElementById("userHelp").style.color = "gray"
    }
    else if(field == ""){
        document.getElementById("userHelp").textContent = "*field cannot be empty"
        document.getElementById("userHelp").style.color = "red"   
        document.getElementById("usname").style.borderColor = "red"
    }
    else if(field2 ==""){
        document.getElementById("passHelp").textContent = "password must be present"
        document.getElementById("psword").style.borderColor = "red"  
    }
    else if ((field2.length<9) || (field2.length>9)){
        document.getElementById("passHelp").textContent = "*field should contain 9 numbers"
        document.getElementById("psword").style.borderColor = "red"  
    }
    else{
    
    }
    
}