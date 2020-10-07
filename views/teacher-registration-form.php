<?php
echo '<div  id ="t-reg-form-div">
            <select name="title" id="title-field" class="signup-field">
            <option value="Apostle">Apostle</option>
            <option value="Pastor">Pastor</option>
            <option value="Deacon">Deacon</option>
            <option value="Deaconess">Deaconess</option>
            <option value="Mr.">Mr.</option>
            <option value="Mrs.">Mrs.</option>
            <option value="Bro.">Bro.</option>
            <option value="Sis.">Sis.</option>
            </select>
            <input type="text" name ="surname" id ="t-surname-field" class="form-field" placeholder = "Enter Surname"/><br>
            <input type="text" name ="fname" id ="t-fname-field" class="form-field" placeholder = "Enter First Name"/><br>
            <input type="text" name ="othername" id ="t-othername-field" class="form-field" placeholder = "Enter Other name"/><br>
            Gender: <input type="radio" name ="sex" value="Male" id ="msex" class="form-field" checked/> Male <input type="radio" name ="sex" value="Female" id ="fsex" class="form-field"/> Female <br>
            <input type="number" name ="phone" id ="t-phone-field" class="form-field" placeholder = "Enter Phone Number"/><br>
            <input type="email" name ="email" id ="t-email-field" class="form-field" placeholder = "Enter Email"/><br>
            <select name ="session" id="t-session" class ="form-field">
                <option>Select Session</option>
                <option value="Week Days">Week Days</option>
                <option value="Saturdays">Saturdays</option>
                <option value="Sundays">Sundays</option>
            </select></br></br>
            <input type="password" id="t-default-psword" class="form-field"/></br>
            <button id="regBtn" onclick = " uploadTeacher()">Submit</button>
    </div>';
?>
