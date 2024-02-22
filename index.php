<?php
$local_file = "uploads/" . $_FILES["fileToUpload"]["name"];
$remote_url = "https://codegenius-studio.github.io/SayarKyan.com/";

if (copy($local_file, $remote_url)) {
    echo "File uploaded to remote URL successfully.";
} else {
    echo "Failed to upload file to remote URL.";
}
?>
