<?php
header('Content-Type: application/json');

// Received credentials from the Android app
$userInputUsername = $_POST['username'];
$userInputPassword = $_POST['password'];

// Array of users
$users = [
    [
        "id" => "1",
        "username" => "lalith",
        "password" => "12345"
    ],
    [
        "id" => "2",
        "username" => "lals",
        "password" => "1111"
    ]
];

// Check if the entered credentials match any user
$loggedInUser = null;
foreach ($users as $user) {
    if ($user['username'] === $userInputUsername && $user['password'] === $userInputPassword) {
        $loggedInUser = $user;
        break;
    }
}

// Respond with success or failure
if ($loggedInUser !== null) {
    echo json_encode(['success' => true, 'message' => 'Login successful', 'user' => $loggedInUser]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
}
?>
