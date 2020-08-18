
                                                  $(document).ready(function(){
                                                  document.getElementById("demop").innerHTML = document.getElementById("myRangep").value;
                                                  iter_val = "myRangep";
                                                  iter_out = "demop";
                                                  if(document.getElementById(iter_val).value == "1"){
                                                  document.getElementById(iter_out).innerHTML = " Never";
                                                  }
                                                  else if(document.getElementById(iter_val).value == "2"){
                                                  document.getElementById(iter_out).innerHTML = "Rarely";
                                                  }
                                                  else if(document.getElementById(iter_val).value == "3"){
                                                  document.getElementById(iter_out).innerHTML = "Sometimes";
                                                  }
                                                  else if(document.getElementById(iter_val).value == "4"){
                                                  document.getElementById(iter_out).innerHTML = "Usually";
                                                  }
                                                  else{
                                                  document.getElementById(iter_out).innerHTML = "Always";
                                                  }
                                                  }
                                                  );
                                                 
                                                 
                                                 function slide_val(id){
                                                
                                                 iter_val = id;
                                                 iter_out = "demop";
                                                 if(document.getElementById(iter_val).value == "1"){
                                                  document.getElementById(iter_out).innerHTML = " Never";
                                                  }
                                                  else if(document.getElementById(iter_val).value == "2"){
                                                  document.getElementById(iter_out).innerHTML = "Rarely";
                                                  }
                                                  else if(document.getElementById(iter_val).value == "3"){
                                                  document.getElementById(iter_out).innerHTML = "Sometimes";
                                                  }
                                                  else if(document.getElementById(iter_val).value == "4"){
                                                  document.getElementById(iter_out).innerHTML = "Usually";
                                                  }
                                                  else{
                                                  document.getElementById(iter_out).innerHTML = "Always";
                                                  }
                                                 }
                                                 