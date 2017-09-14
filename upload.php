<?php
if(isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Failo savybes
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_newname = $_POST['newname'];


    //Nustatom tipa failo
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    $allowed =  array('jpg' , 'png' , 'jpeg', 'bmp');

    //Patikrinam ar failas tinkamo formato ir dydzio

    if(in_array($file_ext, $allowed)) {
        if($file_error === 0) {
            if($file_size <= 1048576) {

                $file_name = $file_newname . "." . $file_ext ;
                $file_destination = "uploads/" . $file_name ;

                if(move_uploaded_file($file_tmp, $file_destination)) {
                    echo "Failo pavadinimas sėkmingai pakeistas ir įkeltas į šią direktoriją: " . $file_destination;
                }
            }
        }
    }

print_r($_FILES);
}