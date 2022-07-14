<?php
function generateMessage($message,$type){
    return  '<div class="alert alert-'.$type.' border-0 bg-'.$type.' alert-dismissible fade show">
    <div class="text-white">'.$message.'</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>