$(document).ready(function(){
    closeModal();
})

function closeModal(){
    $('#modal-1').hide();

}

function showAdminLogin(){
    $('#modal-1').show();
    $('#adminLoginForm').show();
    $('#teacherLoginForm').hide();
}

function showTeacherLogin(){
    $('#modal-1').show();
    $('#adminLoginForm').hide();
    $('#teacherLoginForm').show();
}

function signInAdmin(){
    var adminUsername = $('#admin-username').val();
    var adminPassword = $('#admin-password').val();
    var userType = 'admin';
    $.post('../php/usersignin.php',{userType: userType, 'username':adminUsername, 'password':adminPassword},function(data){
        if(data != 'connection_error' || data != 'Not Found Error'){
            
            window.location.href = 'admin.manager.php';
        }
        else{
            alert('Error:'+data);
        }
    })
}

function signInTeacher(){
    var tUsername = $('#teacher-username').val();
    var tPassword = $('#teacher-password').val();
    var userType = 'teacher';
     $.post('php/usersignin.php',{userType: userType, 'username':tUsername, 'password':tPassword},function(data){
         if(data != 'connection_error' || data != 'Not Found Error'){
             window.location.href = 'views/attendance.php';
         }
         else{
             alert('Error:'+data);
         }
     })
}