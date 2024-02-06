<?php
if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        return date('F j, Y', strtotime($date));
    }
}
?>

