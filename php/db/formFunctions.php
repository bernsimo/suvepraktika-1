<?php
    require("dbConfig.php");
    $user_email = $_SESSION["userEmail"];
    switch($_POST["action"]){
        case "listUserSubmissions":
            listScientificApplications($user_email);
            listScientificReports($user_email);
            listStudentReports($user_email);
            listStudentApplications($user_email);
            break;
        case "listAllSubmissions":
            listScientificApplications('%');
            listScientificReports('%');
            listStudentReports('%');
            listStudentApplications('%');
            break;
    }

    function listScientificApplications($email){
        $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	    $stmt = $mysqli->prepare("SELECT id, date_created, project_name FROM scientific_project_application WHERE user_email like ? AND is_deleted = 0");
        $stmt->bind_param("s",$email);
        $stmt->bind_result($id, $creationDate, $projectName);
        $stmt->execute();
        
            while($stmt->fetch()){
                echo '<tr>';
                echo '<td>'. $creationDate .'</td>';
                echo '<td>Teadusprojekti taotlus</td>';
                echo '<td>'. $projectName.'</td>';
                echo '<td><button type="button" id="'.$id.'" class="btn btn-danger btn-sm" name="deleteAdmin">Kustuta</button></td>';
                echo '</tr>';
            }
        $stmt->close();
    }
    function listScientificReports($email){
        $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	    $stmt = $mysqli->prepare("SELECT id, date_created, project_name FROM scientific_project_report WHERE user_email like ? AND is_deleted = 0");
        $stmt->bind_param("s",$email);
        $stmt->bind_result($id, $creationDate, $projectName);
        $stmt->execute();
        
            while($stmt->fetch()){
                echo '<tr>';
                echo '<td>'. $creationDate .'</td>';
                echo '<td>Teadusprojekti aruanne</td>';
                echo '<td>'. $projectName.'</td>';
                echo '<td><button type="button" id="'.$id.'" class="btn btn-danger btn-sm" name="deleteAdmin">Kustuta</button></td>';
                echo '</tr>';
            }
        $stmt->close();
    }
    function listStudentApplications($email){
        $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	    $stmt = $mysqli->prepare("SELECT id, date_created, project_name FROM student_project_application WHERE user_email like ? AND is_deleted = 0");
        $stmt->bind_param("s",$email);
        $stmt->bind_result($id,$creationDate, $projectName);
        $stmt->execute();
        
            while($stmt->fetch()){
                echo '<tr>';
                echo '<td>'. $creationDate .'</td>';
                echo '<td>Tudengiprojekti taotlus</td>';
                echo '<td>'. $projectName.'</td>';
                echo '<td><button type="button" id="'.$id.'" class="btn btn-danger btn-sm" name="deleteAdmin">Kustuta</button></td>';
                echo '</tr>';
            }
        $stmt->close();
    }
    function listStudentReports($email){
        $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	    $stmt = $mysqli->prepare("SELECT id, date_created, project_name FROM student_project_report WHERE user_email like ? AND is_deleted = 0");
        $stmt->bind_param("s",$email);
        $stmt->bind_result($id, $creationDate, $projectName);
        $stmt->execute();
        
            while($stmt->fetch()){
                echo '<tr>';
                echo '<td>'. $creationDate .'</td>';
                echo '<td>Tudengiprojekti aruanne</td>';
                echo '<td>'. $projectName.'</td>';
                echo '<td><button type="button" id="'.$id.'" class="btn btn-danger btn-sm" name="deleteAdmin">Kustuta</button></td>';
                echo '</tr>';
            }
        $stmt->close();
    }
?>