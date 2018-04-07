<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    exit(header('Location: ../'));
}
// Function to sanitize form variables
function sanitizeVar($var)
{
    $var = htmlspecialchars(stripslashes(trim($var)));
    return $var;
}

function closeConnections($prep, $dbhandle)
{
    mysqli_stmt_close($prep);
    mysqli_close($dbhandle);
}
