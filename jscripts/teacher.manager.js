var attendanceListArray = [1,3,4,5,6,7];

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
    var list_length = $('#list_length').val();
    for(var i=1; i<=list_length;i++){
        if($('#att_status'+i).is(':checked')){
            attendanceListArray.push($('#att_status'+i).val());
        }
        else{
            attendanceListArray.splice(i,1);
        }
    }
    
}