newfieldscount = 0;

function addNewField(num){
    return $.ajax({
        type: 'GET',
        url: '/'+ baseUrl +'/equipment/add?num='+num,
        async: false
    }).responseText;
}

var removeNew = function(){
  $('#removenewrecord').click(function(e){
    e.preventDefault();
    $(this).parent().remove();
    $('#newrecord').remove();
  })
};

function removeType(id){
    var typeid = $('#'+id).val();
    var type_div =id.replace('_id', '');
    $.ajax({
        type: 'GET',
        url: '/'+ baseUrl +'/equipment/deleteType?id='+typeid,
        async: false,
        success: function(){
            $('#'+type_div).remove();
        }
    });
    
}

$(document).ready(function(){        
    $('#addequipmenttype').click(function(e){
        e.preventDefault();
        $('#addv').append(addNewField(newfieldscount));
        newfieldscount = newfieldscount + 1;
        $('#removenewrecord').unbind('click');
        removeNew();
    });    
});
