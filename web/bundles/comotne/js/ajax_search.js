/**
 * This script is for ajax search
 */

$(document).ready(function() {

            $("#search_form_text").keyup(function(){
               if($("#search_form_text").val().length < 3) return;

               $.post('ajax/search/'+$("#search_form_text").val(),function(data){
                    var result = '<table class="table table-striped table-hover well"><tbody>';
                    if(data.error){
                        result= result+ '<tr colspan="3">';
                        result= result+ '<td>'+data.error+'</td>';
                    }else{
                        $.each(data, function(index, value) { 

                                  result= result+ '<tr ';
                                  var cl = "row-fluid even";
                                  if(index % 2 == 0)
                                    cl = "row-fluid odd";
                                  result= result+  '>';
                                  result= result+ '<td>'+value.location+'</td>';
                                  result= result+ '<td><a href="/job/'+value.company_s+'/'+value.location_s+'/'+value.ref+'/'+value.position+'">'+value.position +'</a> </td>';
                                  result= result+ '<td>'+value.company +'</td></tr>';
                        });
                    }
                    result= result+ '</tbody></table>';
                    $('#output').html(result);
                  }
               );
            });
});