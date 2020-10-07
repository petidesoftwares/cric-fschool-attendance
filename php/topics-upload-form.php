<?php
    $num_fields = $_POST["num_fields"];
    $formString = "";
    for($i=1; $i<=$num_fields;$i++){
        $formString.='<input type="text" id="class'.$i.'" placeholder = "   class    '.$i.'" class="form-field"/>';   
    }
    $formString.='<br><button id="upload-class-form"  onclick = "classesFormUpload()">UPLOAD</button>';

    echo $formString;

?>