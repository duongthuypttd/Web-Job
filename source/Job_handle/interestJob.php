<?php
$sql= "SELECT  * FROM jobs LIMIT  16";
$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>=1){
    while ($row = $result->fetch_array()) {
        echo "<div class=\"border border-5 border-light m-3 rounded bg-white\">";
        echo    "<div class=\"d-flex  m-3\">";
        echo        "<div>";
        echo            "<img src=\"../images/computer.jpg\" class=\"card-img-top m-3\" style=\" width:60%; height: 60%;\" alt=\"Logo\">";
        echo        "</div>";
        echo        "<div>";
        echo            "<!-- Tittle -->";
        echo            "<a href=\"../Job_handle/jobDetail.php?job_id=".$row['id']."\" class=\"text-decoration-none text-dark\">";
        echo                "<div>".$row['position']." Up to ".$row['salary']."</div>";
        echo                "<!-- Location -->";
        echo                "<div>".$row['name']." | <i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>".$row['area']."</div>";
        echo                "<!-- Language -->";
        echo               "<div><i class=\"fa fa-code\" aria-hidden=\"true\"></i>".$row['language']."</div>";
        echo                "<!-- Salary -->";
        echo              "<div>";
        echo                  "<p><i class=\"fa fa-money\" aria-hidden=\"true\"></i>".$row['salary']."</p>";
        echo              "</div>";
        echo          "</a>";
        echo       "</div>";
        echo      "<!-- Button -->";
        echo      "<div class=\"d-flex align-items-center ms-auto p-2 bd-highlight\">";
        echo          "<button type=\"submit\" class=\"btn btn-success\"><a href=\"../Job_handle/jobDetail.php?job_id=".$row['id']."\" class=\"text-decoration-none text-light\">Apply Now </a> </button>";
        echo      "</div>";
        echo  "</div>";
        echo "</div>";
    }
}