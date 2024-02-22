<?php

// File to upload
$file_path = '/storage/emulated/0/shopping gpt.html';

// GitHub repository information
$username = 'codegenius-studio';
$repository = 'SayarKyan.com';
$branch = 'main'; // Or 'master', depending on your repository's default branch

// File content
$file_content = file_get_contents($file_path);
$file_name = basename($file_path);

// GitHub API endpoint
$url = "https://api.github.com/repos/{$username}/{$repository}/contents/{$file_name}";

// Authentication
$token = 'YOUR_GITHUB_PERSONAL_ACCESS_TOKEN'; // Replace with your GitHub Personal Access Token
$auth_header = "Authorization: token {$token}";

// File data
$data = array(
    'message' => 'Upload file via PHP',
    'content' => base64_encode($file_content),
    'branch' => $branch
);

// cURL request
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $auth_header));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$response = curl_exec($ch);
curl_close($ch);

// Decode JSON response
$result = json_decode($response, true);

// Check if file was uploaded successfully
if (isset($result['content']['html_url'])) {
    echo "File uploaded successfully: " . $result['content']['html_url'];
} else {
    echo "Error uploading file: " . $result['message'];
}

?>
