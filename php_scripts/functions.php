<?php
// Function to sanitize form variables
function sanitizeVar($var)
{
    $var = htmlspecialchars(stripslashes(trim($var)));
    return $var;
}
