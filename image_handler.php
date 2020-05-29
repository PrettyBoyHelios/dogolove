<?php
    function uploadImage($fname, $fsize, $tmpname)
    {
        $currentDirectory = getcwd();
        $uploadDirectory = "/images/";

        $errors = []; // Store errors here

        $fileExtensionsAllowed = ['jpeg', 'jpg', 'png']; // These will be the only file extensions allowed
        $array = explode('.', $fname);
        $fileExtension = strtolower(end($array));
        $newName = uniqid('', true) . '.' . $fileExtension;
        $uploadPath = $currentDirectory . $uploadDirectory . $newName;
        debug_to_console($currentDirectory);
        debug_to_console($fileExtension);
        debug_to_console($newName);
        debug_to_console($uploadPath);

        if (!in_array($fileExtension, $fileExtensionsAllowed)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fsize > 4000000) {
            $errors[] = "File exceeds maximum size (4MB)";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($tmpname, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fname) . " has been uploaded";
                return $newName;
            } else {
                echo "An error occurred. Please contact the administrator.";
                return "";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
                debug_to_console(print_r($error));
            }
        }

        return "";
    }
