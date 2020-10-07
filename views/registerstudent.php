<?php
echo '<div reg-form-div>
            <select name="title" id="title-field" class="form-field">
                <option>Title</option>
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Bro.">Bro.</option>
                <option value="Sis.">Sis.</option>
            </select>
            <input type="text" name ="surname" id ="surname-field" class="form-field" placeholder = "Enter Surname"/>
            <input type="text" name ="fname" id ="fname-field" class="form-field" placeholder = "Enter First Name"/>
            <input type="text" name ="othername" id ="othername-field" class="form-field" placeholder = "Enter Other name"/><br>
            Gender: <input type="radio" name ="sex" value="Male" id ="msex" class="form-field"/> Male <input type="radio" name ="sex" value="Female" id ="fsex" class="form-field"/> Female <br>
            Marital Status: <input type="radio" name ="marital_status" value="Single" id ="single" class="form-field"/>Single <input type="radio" name ="marital_status" value="Married" id ="mariried" class="form-field"/>Married <input type="radio" name ="marital_status" value="Divorced" id ="divorce" class="form-field"/>Divorced <br>
            <textarea name ="address" id ="address-field" class="form-field" placeholder = "Enter Address" rows="6" cols="30"/><br>
            <input type="text" name ="bus_stop" id ="bus-stop-field" class="form-field" placeholder = "Nearest Bus Stop"/>
            <input type="number" name ="phone" id ="phone-field" class="form-field" placeholder = "Enter Phone Number"/>
            <input type="email" name ="email" id ="email-field" class="form-field" placeholder = "Enter Email"/><br>
            Date Of Birth: <input type="date" name ="dob" id ="dob-field" class="form-field" placeholder = "DD/MM/YYYY" />
            <select name ="session" id="session" class ="form-field">
                <option>Select Session</option>
                <option value="Week Days">Week-Days</option>
                <option value="Saturdays">Saturdays</option>
                <option value="Sundays">Sundays</option>
            </select>
            Registration Date:<input type="date" name ="regDate" id ="reg_date_field" class="form-field" placeholder = "DD/MM/YYYY" /><br>
            <input type="radio" name = "payment" value="Not Paid" id="not_paid" class="form-field"/>Not Paid 
            <input type="radio" name = "payment" value = "Paid" id ="paid" class="form-field"/>Paid <br>
            <input type="number" name="amount_paid" id ="amount-paid-field" class="form-field" placeholder="Amount Paid"/> <input type="number" name="balance" id ="balance-field" class="form-field" placeholder="Balance"/> <br>
            <button id="regBtn" onclick = "uploadStudent()">Submit</button>
    </div>';
?>
