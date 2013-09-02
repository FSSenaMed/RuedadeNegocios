    function showMe(){
        
        if(document.getElementById("option").checked == true){
          document.getElementById("div1").style.display = "";
          
          //alert("esta checkeado");
        }else{
          document.getElementById("div1").style.display = "none";
         //alert("no esta checkeado");
        }
    }
    
    function Deshabilitar(){
        var password1 = document.getElementById("pass1").value;
        var password2 = document.getElementById("pass2").value;
        
        if(password1 != password2){
            
            document.getElementById("siguiente").disabled = true;
            document.getElementById("error1").style.display = "";
             document.getElementById("error2").style.display = "none";
        }else if(password1 == "" || password2 == ""){
            document.getElementById("error1").style.display = "none";
            document.getElementById("error2").style.display = "";
        }else{
            
            document.getElementById("siguiente").disabled = false;
            document.getElementById("error1").style.display = "none";
            document.getElementById("error2").style.display = "none";
        }
    }
      
