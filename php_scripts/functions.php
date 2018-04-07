<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    exit(header('Location: ../'));
}
// Function to sanitize form variables
function sanitizeVar($var)
{
    return htmlspecialchars(stripslashes(trim($var)));
}

// Function to close prepared statements and database connection
function closeConnections($prep, $dbhandle)
{
    mysqli_stmt_close($prep);
    mysqli_close($dbhandle);
}
