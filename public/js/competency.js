alert('jah')
$(document).ready(function(){

    //Display items for Professional
    
            competencies = 'o';
                
            counter = 0;
            row_update = "row_"+counter;
            data = 0;
    
        len = competencies.length;
        for (i = 0; i < len; i++) {
            var u_comp = competencies[i].competency;
                var u_name = u_comp;
                if(u_comp.indexOf(' ') >= 0){
                    u_name = u_comp.replace(/\s/gi, "_");
                }
            if(i==0){ 
                
                data = data + 1;
                counter = counter +1;
                row_update = "row_"+counter;
                $("#professional").append('<tr id="professionalrow_'+counter+'"></tr>');
                $('#professional'+row_update).append('<td id="data_professional_'+counter+'_'+data+'"><div style="padding-bottom:40px;"><div class="  text-center"><br><p><b>'+competencies[i].competency+'</b></p><p>'+competencies[i].description+'</p><br><br><div class="slidecontainer"><input type="range" min="0" max="5" value="0" class="slider" id="'+u_name+'"><p>Value: <span class="display"></span></p><input type="hidden" name="'+u_name+'" class="score"></div><br> </div> </div></td>');
            }
            if((i%3) == 0 && i != 0){
                
                data = 0;
                counter = counter + 1;
                row_update = "row_"+counter;
                $("#professional").append('<tr id="professionalrow_'+counter+'"></tr>');
                $('#professional'+row_update).append('<td id="data_professional_'+counter+'_'+data+'"><div style="padding-bottom:40px;"><div class="  text-center"><br><p><b>'+competencies[i].competency+'</b></p><p>'+competencies[i].description+'</p><br><br><div class="slidecontainer"><input type="range" min="0" max="5" value="0" class="slider" id="'+u_name+'"><p>Value: <span class="display"></span></p><input type="hidden" name="'+u_name+'" class="score"></div><br> </div> </div></td>');
            }
    
            if((i%3) != 0 && i != 0){
                data = data + 1
                row_update = "row_"+counter;
                
                $('#professional'+row_update).append('<td id="data_professional_'+counter+'_'+data+'"><div style="padding-bottom:40px;"><div class="  text-center"><br><p><b>'+competencies[i].competency+'</b></p><p>'+competencies[i].description+'</p><br><br><div class="slidecontainer"><input type="range" min="0" max="5" value="0" class="slider" id="'+u_name+'"><p>Value: <span class="display"></span></p><input type="hidden" name="'+u_name+'" class="score"></div><br> </div> </div></td>');
    
            }
    
            if(i==(len-1)){
    
                data = data + 1
    
                row_update = "row_"+counter;
                
               // $('#professional'+row_update).append('');
    
            }
        }
    
        
      
    
        
    
    $(' .slider').change(function(){ alert('po')
    var myvalue = $(this).val();
        $(this).parent().find('.score').val(myvalue);
        var myword='';
        switch (myvalue) { 
        case '0': 
            myword = 'N/A';
            break;
        case '1': 
            myword = 'Never';
            break;
        case '2': 
            myword = 'Rarely';
            break;		
        case '3': 
            myword = 'Sometimes';
            break;
        case '4': 
            myword = 'Usually';
            break;
        case '5': 
            myword = 'Always';
            break;
        default:
            myword = '';
        }
        
        $(this).parent().find('.display').text(myword);
        
    });
    
        
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        
        $(".next").click(function(){
        
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;
        
        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 600
        });
        });
        
        $(".previous").click(function(){
        
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show();
        
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;
        
        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
        },
        duration: 600
        });
        });
        
        $(".submit").click(function(){
        return false;
        })
        
        });