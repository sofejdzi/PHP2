window.onload = function(){

    //EXPORT WORD
    $("#expAutor").click(function(e){
        e.preventDefault()
    
        $.ajax({
            url:"models/export_word.php",
            method:"post",
            dataType:"json",
            data:{
                send:true
            },
            success:function(data){
    
            },
            error: function(xhr){
    
            }
        })
        
    })

}