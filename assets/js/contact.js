//KONTAKT
document.getElementById("review_submit").addEventListener("click", function() {
    
    var ok = true;
    var ime = document.getElementById('input_name').value;
    var email = document.getElementById('input_email').value;
    var message = document.getElementById('input_message').value;

    if(ime==""){
      document.getElementById('input_name').classList.add("borderColor");
      ok = false;
  }
  else{
      document.getElementById('input_name').classList.remove("borderColor");
  }

    if(email==""){
        document.getElementById('input_email').classList.add("borderColor");
        ok = false;
    }
    else{
        document.getElementById('input_email').classList.remove("borderColor");
    }
        
    if(message==""){
      document.getElementById('input_message').classList.add("borderColor");
      ok = false;
    }
    else{
        document.getElementById('input_message').classList.remove("borderColor");
    }

    if(ok==true){
        $.ajax({
            url:"php/slanjePoruke.php",
            method:"POST",
            data:{
                email:email,
                message:message,
                send:true,
            },
            success:function(data){
                document.getElementById("contactForm").reset();
            },
            error:function(xhr, status, error){
                console.log("Greška");
            }

        })
    }
        
});