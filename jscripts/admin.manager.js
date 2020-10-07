var paymentStatus="";
var num_fields =0;

function regStudent(){
    $.post("../views/registerstudent.php",function(data){
        $('#display-pane').html(data);
        $("#amount-paid-field").hide();
        $("#balance-field").hide();
        $("#not_paid").click(function(){
            paymentStatus = $("#not_paid").val();
            $("#amount-paid-field").hide();
            $("#balance-field").hide();
        });
        $("#paid").click(function(){
            paymentStatus = $("#paid").val();
            $("#amount-paid-field").show();
            $("#balance-field").show();
        });
        
    });
}

function uploadStudent(){
    var title = $("#title-field").val();
    var surname = $("#surname-field").val();
    var fname = $("#fname-field").val();;
    var othername = $("#othername-field").val();
    var gender = $("input[name = sex]").val();
    var marital_status = $("input[name = marital_status]").val();
    var address = $("#address-field").val();
    var bus_stop = $("#bus-stop-field").val();
    var phone = $("#phone-field").val();
    var email = $("#email-field").val();
    var dob = $("#dob-field").val(); 
    var session = $("#session").val();
    var regDate = $("#reg_date_field").val();
    var amountPaid = $("#amount-paid-field").val();
    var balance = $("#balance-field").val();

    if(paymentStatus=="Not Paid"){
        $.post("../php/process-student-registration.php",{title:title,surname:surname,fname:fname,othername:othername,gender:gender,marital_status:marital_status,address:address,bus_stop:bus_stop,phone:phone,email:email,dob:dob,session:session,regDate:regDate, paymentStatus:paymentStatus},function(data){
            alert(data);
            regStudent();
        });
    }
    if(paymentStatus=="Paid"){
        $.post("../php/process-student-registration.php",{title:title,surname:surname,fname:fname,othername:othername,gender:gender,marital_status:marital_status,address:address,bus_stop:bus_stop,phone:phone,email:email,dob:dob,session:session,regDate:regDate, paymentStatus:paymentStatus,amountPaid:amountPaid, balance:balance},function(data){
            alert(data);
            regStudent();
        });
    }
}

function regTeacher(){
    $.post("../views/teacher-registration-form.php",function(data){
        $('#display-pane').html(data);
    });
}

function uploadTeacher(){
    var title = $("#title-field").val();
    var surname = $("#t-surname-field").val();
    var fname = $("#t-fname-field").val();
    var othername = $("#t-othername-field").val();
    var gender = $("input[name = sex]").val();
    var phone = $("#t-phone-field").val();
    var email = $("#t-email-field").val();
    var session = $("#t-session").val();
    var defaultPassword =$("#t-default-psword").val();
    $.post("../php/process-teacher-registration.php",{title:title, surname:surname, fname:fname,othername:othername, gender:gender, phone:phone, email:email, session:session, defaultPassword:defaultPassword},function(data){
        alert(data);
    });
}

function viewStudent(){
    $.post("../php/get-all-student.php",function(data){
        $('#display-pane').html(data);
    });
}

function uploadClasses(){
    $.post("../php/upload-classes-view.php", function(data){
        $('#display-pane').html(data);
    });
}

function getFields(){
    num_fields = $("#total-classes").val();
    $.post("../php/topics-upload-form.php",{num_fields:num_fields}, function(data){
        $('#display-form-fields').html(data);
    });
}

function classesFormUpload(){
    var respTracker=0;
    for(var i=1; i<=num_fields;i++){
        var clas = $("#class"+i+"").val();
        $.post("../php/proccess-class-upload.php",{clas:clas},function(data){
           if(data!=="successful"){
               respTracker+=1;
           }
        });
    }
    if(respTracker==num_fields){
        alert("Classes Successfully Uploaded");
        for(var i=1; i<=num_fields;i++){
            var clas = $("#class"+i+"").val("");
        }
    }
}

function viewAttendance(){
    $.post("../php/view-attendance.php",function(data){
        $('#display-pane').html(data);
    });
}

function setupSystem(){
    $.post("../php/setup.php",function(data){
        if(data = "Setup Successful"){
            alert(data);
            $("#setup-btn").hide();
        }
        else{
            alert(data);
        }
    });
}