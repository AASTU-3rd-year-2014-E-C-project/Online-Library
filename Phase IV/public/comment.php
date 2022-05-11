<?php
date_default_timezone_get();
include '../inc/conn.php';
include 'comment.inc.php';
?>

<?php
echo"<div class="comment">
    <form method='POST' action='".setComment($conn)."'>
        <input type='hidden' name='user_id' value='Anonymous'>
        <input type='hidden' name='resource_id' value='Anonymous'>
        <input type='hidden' name='comment_date' value='".date('Y-m-d' H:i:s)."'>
        <textarea name='comment'></textarea><br>
        <button name='commentSubmit' type='submit'>Comment</botton>
    </form>
</div>"
?> 