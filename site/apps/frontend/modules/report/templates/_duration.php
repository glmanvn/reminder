<?php
    $completedAt = $Task->getCompletedAt();
    if ($completedAt) {
        $dd = date_diff(new DateTime($Task->getCreatedAt()), new DateTime($completedAt));
        echo "$dd->h : $dd->i : $dd->s";
    }
?>

