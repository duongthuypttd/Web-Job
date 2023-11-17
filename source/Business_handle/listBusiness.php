<?php
$sql= "SELECT  * FROM business ORDER BY 'id' DESC LIMIT 10 ";
$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>=1){
    while ($row = $result->fetch_array()) {
        echo "<div class=\"col-sm-3 mb-3\">";
        echo    "<div class=\"card m-1\">";
        echo        "<div class=\"card-body text-center\">";
        echo            "<a class=\"text-decoration-none\" href=\"../Job_handle/job.php?business_job=".$row['name']."\" >";
        echo                "<img src=\"".$row['img']."\" class=\"card-img-top m-3\" style=\"width:50%; height: 100px;\" alt=\"Logo ".$row['name']."\">";
        echo                "<h5 class=\"card-title text-center m-2\" style=\"color: black;\">".$row['name']."</h5>";
        echo            "</a>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";        
    }
    
}
?>