var attendanceListArray = [];
var index=1;
var flag = 0;

function signOut(){
    window.location.href = '../php/logout.php';
}

function takeAttendance(){
    $.post("../php/display-attendance-sheet.php",function(data){
        $("#display-pane").html(data);
    });
}

function getAttendeeList(){
    var session = $("#session-field").val(); 
    $.post("../php/fetch-students.php",{session:session}, function(data){
        $("#display-att").html(data);     
    });
}

function getRegAttendeeNumbers(){
    flag++;
    if($('#att_status'+flag).is(':checked')){
        
        for(var i=1;i<=flag;i++){
        $('#att_status'+i).val(i);
        alert($('#att_status'+i).val());
        }
    }else{
        for(var i=1;i<=flag;i++){
            if($('#att_status'+i).is(':checked')){

            }else{
                $('#att_status'+i).val("");
                alert($('#att_status'+i).val());
            }
        }
        
    }
    index++;
}
