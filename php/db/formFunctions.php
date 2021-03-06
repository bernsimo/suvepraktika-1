<?php
    require("dbConfig.php");

    function test_input($data){
      $data = trim($data); //eemaldab lõpust tühiku, tab vms
      $data = stripslashes($data); // eemaldab "\"
      $data = htmlspecialchars($data); // eemaldab keelatud märgid
      return $data;
    }

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
        case "detailed_content":
            $formId = $_POST["formId"];
            $tableName = $_POST["tableName"];
            showDetailedContent($formId, $tableName);
            break;
        case "markDeleted":
            markDeleted($_POST["tableName"],$_POST["entryID"]);
            break;
    }

    function listScientificApplications($email){
        $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	    $stmt = $mysqli->prepare("SELECT id, date_created, project_name, m_type FROM scientific_project_application WHERE user_email like ? AND is_deleted = 0");
        $stmt->bind_param("s",$email);
        $stmt->bind_result($id, $creationDate, $projectName, $m_type);
        $stmt->execute();

            while($stmt->fetch()){
                echo '<tr id="'.$m_type.'">';
                echo '<td>'. $creationDate .'</td>';
                echo '<td>Teadusprojekti taotlus</td>';
                echo '<td>'. $projectName.'</td>';

				if ($email == '%') {
					echo (
						'<td>
							<button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
							<button type="button" class="btn btn-info btn-sm" onclick="location.href=\'otsus.php?id='.$id.',scientific_project_application\'">Langeta otsus</button>
						</td>'

					);
				} else{
					echo (
						'<td>
						<button  type="button" id="'.$id.',scientific_project_application" class="btn btn-danger btn-sm" name="markAsDeleted">Kustuta</button>
						<button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
						</td>'

					);
				}

			}
        $stmt->close();

	}
    function listScientificReports($email){
        $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	    $stmt = $mysqli->prepare("SELECT id, date_created, project_name, m_type FROM scientific_project_report WHERE user_email like ? AND is_deleted = 0");
        $stmt->bind_param("s",$email);
        $stmt->bind_result($id, $creationDate, $projectName, $m_type);
        $stmt->execute();

            while($stmt->fetch()){
                echo '<tr id="'.$m_type.'">';
                echo '<td>'. $creationDate .'</td>';
                echo '<td>Teadusprojekti aruandlus</td>';
                echo '<td>'. $projectName.'</td>';

				if ($email == '%') {
					echo (
						'<td>
							<button type="button" id="'.$id.',scientific_project_report" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
							<button type="button" class="btn btn-info btn-sm" onclick="location.href=\'otsus.php?id='.$id.',scientific_project_report\'">Langeta otsus</button>
						</td>'

					);
				} else{
					echo (
						'<td>
						<button  type="button" id="'.$id.',scientific_project_application" class="btn btn-danger btn-sm" name="markAsDeleted">Kustuta</button>
						<button type="button" id="'.$id.',scientific_project_report" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
						</td>'

					);
				}

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
				if ($email == '%') {
					echo (
						'<td>
							<button type="button" id="'.$id.',student_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
							<button type="button" class="btn btn-info btn-sm" onclick="location.href=\'otsus.php?id='.$id.',student_project_application\'">Langeta otsus</button>
						</td>'

					);
				} else{
					echo (
						'<td>
						<button  type="button" id="'.$id.',scientific_project_application" class="btn btn-danger btn-sm" name="markAsDeleted">Kustuta</button>
						<button type="button" id="'.$id.',student_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
						</td>'

					);
				}

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
                echo '<td>Tudengiprojekti aruandlus</td>';
                echo '<td>'. $projectName.'</td>';
				if ($email == '%') {
					echo (
						'<td>
							<button type="button" id="'.$id.',student_project_report" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
							<button type="button" class="btn btn-info btn-sm" onclick="location.href=\'otsus.php?id='.$id.',student_project_report\'">Langeta otsus</button>
						</td>'

					);
				} else{
					echo (
						'<td>
						<button  type="button" id="'.$id.',scientific_project_application" class="btn btn-danger btn-sm" name="markAsDeleted">Kustuta</button>
						<button type="button" id="'.$id.',student_project_report" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
						</td>'

					);
				}

			}
        $stmt->close();
    }
    function showDetailedContent($id, $table) {
      $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
      $stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE id like ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      while ($row = $result->fetch_assoc()) {

        switch($table){
            case "scientific_project_application":
                echo'<center><p id="projektName" style="font-weight: bold; margin-top: 12px;">'.$row['project_name'].'</p></center>';
                echo '<hr>';
                echo '<p><b>ID: </b>'.$row['id'].'</p>';
                echo '<p><b>Saatja E-mail: </b>'.$row['user_email'].'</p>';
                echo '<p><b>Koostatud: </b>'.$row['date_created'].'</p>';
                if ($row['organization']==0) {
                  echo '<p><b>Nimi: </b>'.$row['name'].'</p>';
                  echo '<p><b>Taotleja isikukood: </b>'.$row['code'].'</p>';
                } else {
                  echo '<p><b>Organisatsioon: </b>'.$row['name'].'</p>';
                  echo '<p><b>Organisatsiooni registrikood: </b>'.$row['code'].'</p>';
                  echo '<p><b>Organisatsiooni seos tudengi ja ülikooliga: </b>'.$row['connection'].'</p>';
                }
                echo '<p><b>Taotleja kontaktandmed: </b></p><table class="table table-bordered table-striped table-hover" style="font-size: 12px;"><tr><th>Telefoninumber</th><th>E-posti aadress</th><th>Elukoha aadress</th></tr><tr><th>'.$row['phone'].'</th><th>'.$row['email'].'</th><th>'.$row['address'].'</th></tr></table><br>';
                echo '<p><b>Õppeinfo: </b></p><table class="table table-bordered table-striped table-hover" style="font-size: 12px;"><tr><th>Eriala</th><th>Õppetase</th><th>Õppeaasta</th></tr><tr><th>'.$row['speciality'].'</th><th>'.$row['degree'].'</th><th>'.$row['year'].'</th></tr></table><br>';
                echo '<p><b>Teised projektimeeskonna liikmed: </b>'.$row['team_members'].'</p>';
                echo '<p><b>Projekti tüüp: </b>'.$row['m_type'].'</p>';
                if ($row['m_type']=="M1") {
                    echo '<p><b>Juhendaja info: </b></p><table class="table table-bordered table-striped table-hover" style="font-size: 12px;"><tr><th>Juhendaja nimi</th><th>Ametikoht</th><th>Tegevusvaldkond</th></tr><tr><th>'.$row['supervisor_name'].'</th><th>'.$row['supervisor_occupation'].'</th><th>'.$row['field_of_activity'].'</th></tr></table><br>';
                }
                echo '<b>Projekti pealkiri: </b><p id="projektName">'.$row['project_name'].'</p>';
                echo '<p><b>Taotletav summa: </b>'.$row['requested_amount'].'</p>';
                echo '<p><b>Projekti eeldatav periood: </b>'.$row['initial_date'].' - '.$row['end_date'].'</p>';
                echo '<p><b>Taotleva summa kasutamise eesmärk: </b>'.$row['requested_amount_goal'].'</p>';
                echo '<p><b>Probleemi püstitus ja sihtrühma kirjeldus: </b>'.$row['problem'].'</p>';
                echo '<p><b>Projekti eesmärk: </b>'.$row['project_goal'].'</p>';
                echo '<p><b>Projekti oodatavad tulemused: </b>'.$row['results'].'</p>';
                echo '<p><b>Tegevuste loetelu koos tähtajaga: </b>'.$row['activities'].'</p>';
                switch($row['m_type']){
                  case "M1":
                    echo '<p><b>Uurimismeetodite kirjeldus: </b>'.$row['m'].'</p>';
                    break;
                  case "M2":
                    echo '<p><b>Planeeritava ürituse programmi kirjeldus ning esinejate loetelu; projekti raames avaldatava materjali kirjeldus: </b>'.$row['m'].'</p>';
                    break;
                  case "M3":
                    echo '<p><b>Teadustöö esitlemise vormi, teadustöö sisu ning esitluspaiga või ürituse kirjeldus: </b>'.$row['m'].'</p>';
                    break;
                }
                echo '<p><b>Toetuse taotlemise põhjus: </b>'.$row['reason'].'</p>';

                echo '<b>Projekti eelarve ning põhjendus: </b>';
                echo '<table class="table table-bordered table-striped table-hover" style="font-size: 12px;"><tr><th>Kuluartikkel</th><th>Ühik</th><th>Ühiku hind</th><th>Ühiku kogus</th><th>Kuluartikli summa</th><th>Rahastaja</th></tr>';

                for ($i = 0; $i < sizeof(json_decode($row['budget_table'])[0]); $i++) {
                  echo '<tr><th>'.json_decode($row['budget_table'])[0][$i].'</th><th>'.json_decode($row['budget_table'])[1][$i].'</th><th>'.json_decode($row['budget_table'])[2][$i].'</th><th>'.json_decode($row['budget_table'])[3][$i].'</th><th>'.json_decode($row['budget_table'])[4][$i].'</th><th>'.json_decode($row['budget_table'])[5][$i].'</th></tr>';
                }
                echo '</table>';
                echo '<p><b>Eelarve põhjendus: </b>'.$row['budget_explanation'].'</p>';
                break;
              case "scientific_project_report":
                 echo '<p><b>ID: </b>'.$row['id'].'</p>';
				echo '<p><b>Saatja E-mail: </b>'.$row['user_email'].'</p>';
				echo '<p><b>Koostatud: </b>'.$row['date_created'].'</p>';
				if ($row['organization']==0) {
                  echo '<p><b>Taotleja ees- ja erekonnanimi/taotleva organisatsiooni nimi: </b>'.$row['name'].'</p>';
                  echo '<p><b>Taotleja isikukood: </b>'.$row['code'].'</p>';
				  echo '<p><b>Taotleja kontaktandmed: </b></p><table border="1"><tr><th>Telefoninumber</th><th>E-posti aadress</th><th>Elukoha aadress</th></tr><tr><th>'.$row['phone'].'</th><th>'.$row['email'].'</th><th>'.$row['address'].'</th></tr></table><br>';
				  echo '<p><b>Taotleja arveldusarve number: </b>'.$row['bank_account'].'</p>';
				  echo '<p><b>Aruandluse koostaja: </b>'.$row['report_compiler'].'</p>';
				  echo '<p><b>Projekti juht: </b>'.$row['project_manager'].'</p>';
				  echo '<p><b>Teised projektimeeskonna liikmed: </b>'.$row['team_members'].'</p>';
				  echo '<p><b>Juhendaja nimi, ametikoht/haridus, tegevusvaldkond </b></p><table border="1"><tr><th>Telefoninumber</th><th>E-posti aadress</th><th>Elukoha aadress</th></tr><tr><th>'.$row['supervisor_name'].'</th><th>'.$row['supervisor_occupation'].'</th><th>'.$row['supervisor_field'].'</th></tr></table><br>';
				  echo '<p><b>Projekti pealkiri: </b>'.$row['project_name'].'</p>';
                } else {
                  echo '<p><b>Organisatsioon: </b>'.$row['name'].'</p>';
				  echo '<p><b>Taotleja kontaktandmed: </b></p><table border="1"><tr><th>Telefoninumber</th><th>E-posti aadress</th><th>Elukoha aadress</th></tr><tr><th>'.$row['phone'].'</th><th>'.$row['email'].'</th><th>'.$row['address'].'</th></tr></table><br>';

                echo '<p><b>Teised projektimeeskonna liikmed: </b>'.$row['team_members'].'</p>';
                }
				echo '<p><b>Projekti tegelik elluviimise periood: </b>'.$row['initial_date'].' - '.$row['end_date'].'</p>';

                echo '<p><b>Määratav toetus: </b>'.$row['grant_awarded'].'</p>';
				echo '<p><b>Tegelik kulu: </b>'.$row['actual_cost'].'</p>';
                echo '<p><b>Probleemi püstitus ja taotletava summa eesmärk: </b>'.$row['problem'].'</p>';
                echo '<p><b>Projekti eesmärk: </b>'.$row['project_goal'].'</p>';
                echo '<p><b>Projekti oodatavad tulemused: </b>'.$row['expected_results'].'</p>';
				echo '<p><b>Projekti tegelikud tulemused: </b>'.$row['actual_results'].'</p>';
                echo '<p><b>Tegevuste loetelu koos tähtajaga: </b>'.$row['actual_activities'].'</p>';
				echo '<p><b>Täiendav informatsioon: </b>'.$row['additional_info'].'</p>';
				echo '<p><b>Projekti eelarve ning põhjendus: </b></p><table border="1"><tr><th>Eelarvernamea ehk kuluartikkel</th><th>Ühik</th><th>Ühiku hind</th><th>Ühiku kogus</th><th>Kuluartikli summa</th><th>Rahastaja</th></tr>';
				 for ($i = 0; $i < sizeof(json_decode($row['budget_table'])[0]); $i++) {
                  echo '<tr><th>'.json_decode($row['budget_table'])[0][$i].'</th><th>'.json_decode($row['budget_table'])[1][$i].'</th><th>'.json_decode($row['budget_table'])[2][$i].'</th><th>'.json_decode($row['budget_table'])[3][$i].'</th><th>'.json_decode($row['budget_table'])[4][$i].'</th><th>'.json_decode($row['budget_table'])[5][$i].'</th></tr>';
                }
				echo '<p><b>Eelarve põhjendus: </b>'.$row['budget_explanation'].'</p>';
                break;

              case "student_project_application":
                echo '<p><b>ID: </b>'.$row['id'].'</p>';
				echo '<p><b>Saatja E-mail: </b>'.$row['user_email'].'</p>';
				echo '<p><b>Koostatud: </b>'.$row['date_created'].'</p>';
				if ($row['organization']==0) {
                  echo '<p><b>Nimi: </b>'.$row['name'].'</p>';
                  echo '<p><b>Taotleja isikukood: </b>'.$row['code'].'</p>';
                } else {
                  echo '<p><b>Organisatsioon: </b>'.$row['organization'].'</p>';
                  echo '<p><b>Organisatsiooni registrikood: </b>'.$row['code'].'</p>';
                  echo '<p><b>Organisatsiooni seos tudengi ja ülikooliga: </b>'.$row['connection'].'</p>';
				  echo '<p><b>Taotleja kontaktandmed: </b></p><table border="1"><tr><th>Telefoninumber</th><th>E-posti aadress</th><th>Elukoha aadress</th></tr><tr><th>'.$row['phone'].'</th><th>'.$row['email'].'</th><th>'.$row['address'].'</th></tr></table><br>';
                echo '<p><b>Õppeinfo: </b></p><table border="1"><tr><th>Eriala</th><th>Õppetase</th><th>Õppeaasta</th></tr><tr><th>'.$row['speciality'].'</th><th>'.$row['degree'].'</th><th>'.$row['year'].'</th></tr></table><br>';
                echo '<p><b>Teised projektimeeskonna liikmed: </b>'.$row['team_members'].'</p>';
                }
				 echo '<p><b>Projekti pealkiri: </b>'.$row['project_name'].'</p>';
                echo '<p><b>Taotletav summa: </b>'.$row['requested_amount'].'</p>';
                echo '<p><b>Projekti eeldatav periood: </b>'.$row['initial_date'].' - '.$row['end_date'].'</p>';
                echo '<p><b>Taotleva summa kasutamise eesmärk: </b>'.$row['requested_amount_goal'].'</p>';
                echo '<p><b>Probleemi püstitus ja sihtrühma kirjeldus: </b>'.$row['problem'].'</p>';
                echo '<p><b>Projekti eesmärk: </b>'.$row['project_goal'].'</p>';
                echo '<p><b>Projekti oodatavad tulemused: </b>'.$row['results'].'</p>';
                echo '<p><b>Tegevuste loetelu koos tähtajaga: </b>'.$row['activities'].'</p>';
				echo '<p><b>Toetuse taotlemise põhjus: </b>'.$row['budget_explanation'].'</p>';
				echo '<p><b>Projekti eelarve ning põhjendus: </b></p><table border="1"><tr><th>Eelarvernamea ehk kuluartikkel</th><th>Ühik</th><th>Ühiku hind</th><th>Ühiku kogus</th><th>Kuluartikli summa</th><th>Rahastaja</th></tr>';
				 for ($i = 0; $i < sizeof(json_decode($row['budget_table'])[0]); $i++) {
                  echo '<tr><th>'.json_decode($row['budget_table'])[0][$i].'</th><th>'.json_decode($row['budget_table'])[1][$i].'</th><th>'.json_decode($row['budget_table'])[2][$i].'</th><th>'.json_decode($row['budget_table'])[3][$i].'</th><th>'.json_decode($row['budget_table'])[4][$i].'</th><th>'.json_decode($row['budget_table'])[5][$i].'</th></tr>';
                }
                echo '</table><br>';

                break;
              case "student_project_report":
				echo '<p><b>ID: </b>'.$row['id'].'</p>';
				echo '<p><b>Saatja E-mail: </b>'.$row['user_email'].'</p>';
				echo '<p><b>Koostatud: </b>'.$row['date_created'].'</p>';
				if ($row['organization']==0) {
                  echo '<p><b>Nimi: </b>'.$row['name'].'</p>';
                  echo '<p><b>Taotleja isikukood: </b>'.$row['code'].'</p>';
				  echo '<p><b>Taotleja kontaktandmed: </b></p><table border="1"><tr><th>Telefoninumber</th><th>E-posti aadress</th><th>Elukoha aadress</th></tr><tr><th>'.$row['phone'].'</th><th>'.$row['email'].'</th><th>'.$row['address'].'</th></tr></table><br>';
				  echo '<p><b>Taotleja arveldusarve number: </b>'.$row['bank_account'].'</p>';
				  echo '<p><b>Aruandluse koostaja: </b>'.$row['report_compiler'].'</p>';
				  echo '<p><b>Projekti juht: </b>'.$row['project_manager'].'</p>';
				  echo '<p><b>Teised projektimeeskonna liikmed: </b>'.$row['team_members'].'</p>';
				  echo '<p><b>Projekti pealkiri: </b>'.$row['project_name'].'</p>';
                } else {
                  echo '<p><b>Organisatsioon: </b>'.$row['name'].'</p>';
                  echo '<p><b>Organisatsiooni registrikood: </b>'.$row['code'].'</p>';
                  echo '<p><b>Organisatsiooni seos tudengi ja ülikooliga: </b>'.$row['connection'].'</p>';
				  echo '<p><b>Taotleja kontaktandmed: </b></p><table border="1"><tr><th>Telefoninumber</th><th>E-posti aadress</th><th>Elukoha aadress</th></tr><tr><th>'.$row['phone'].'</th><th>'.$row['email'].'</th><th>'.$row['address'].'</th></tr></table><br>';
                echo '<p><b>Õppeinfo: </b></p><table border="1"><tr><th>Eriala</th><th>Õppetase</th><th>Õppeaasta</th></tr><tr><th>'.$row['speciality'].'</th><th>'.$row['degree'].'</th><th>'.$row['year'].'</th></tr></table><br>';
                echo '<p><b>Teised projektimeeskonna liikmed: </b>'.$row['team_members'].'</p>';
                }
				echo '<p><b>Projekti tegelik elluviimise periood: </b>'.$row['initial_date'].' - '.$row['end_date'].'</p>';

                echo '<p><b>Määratud toetuse summa: </b>'.$row['grant_awarded'].'</p>';
				echo '<p><b>Kasutatud toetuse summa: </b>'.$row['used_grant_awarded'].'</p>';
				echo '<p><b>Projekti kogusumma: </b>'.$row['actual_cost'].'</p>';
                echo '<p><b>Probleemi püstitus ja taotletava summa eesmärk: </b>'.$row['problem'].'</p>';
                echo '<p><b>Projekti eesmärk: </b>'.$row['project_goal'].'</p>';
                echo '<p><b>Projekti oodatavad tulemused: </b>'.$row['planned_results'].'</p>';
				echo '<p><b>Projekti tegelikud tulemused: </b>'.$row['actual_results'].'</p>';
                echo '<p><b>Tegevuste loetelu koos tähtajaga: </b>'.$row['actual_activities'].'</p>';
				echo '<p><b>Täiendav informatsioon: </b>'.$row['additional_info'].'</p>';
				echo '<p><b>Projekti eelarve ning põhjendus: </b></p><table border="1"><tr><th>Eelarvernamea ehk kuluartikkel</th><th>Ühik</th><th>Ühiku hind</th><th>Ühiku kogus</th><th>Kuluartikli summa</th><th>Rahastaja</th></tr>';
				 for ($i = 0; $i < sizeof(json_decode($row['budget_table'])[0]); $i++) {
                  echo '<tr><th>'.json_decode($row['budget_table'])[0][$i].'</th><th>'.json_decode($row['budget_table'])[1][$i].'</th><th>'.json_decode($row['budget_table'])[2][$i].'</th><th>'.json_decode($row['budget_table'])[3][$i].'</th><th>'.json_decode($row['budget_table'])[4][$i].'</th><th>'.json_decode($row['budget_table'])[5][$i].'</th></tr>';
                }
				echo '<p><b>Eelarve põhjendus: </b>'.$row['budget_explanation'].'</p>';
                break;
              case "student_project_application":
                echo '<p><b>ID: </b>'.$row['id'].'</p>';
				echo '<p><b>Saatja E-mail: </b>'.$row['user_email'].'</p>';
				echo '<p><b>Koostatud: </b>'.$row['date_created'].'</p>';
				if ($row['organization']==0) {
                  echo '<p><b>Nimi: </b>'.$row['name'].'</p>';
                  echo '<p><b>Taotleja isikukood: </b>'.$row['code'].'</p>';
		echo '<p><b>Taotleja kontaktandmed: </b></p><table border="1"><tr><th>Telefoninumber</th><th>E-posti aadress</th><th>Elukoha aadress</th></tr><tr><th>'.$row['phone'].'</th><th>'.$row['email'].'</th><th>'.$row['address'].'</th></tr></table><br>';
                } else {
                  echo '<p><b>Organisatsioon: </b>'.$row['name'].'</p>';
                  echo '<p><b>Organisatsiooni registrikood: </b>'.$row['code'].'</p>';
                  echo '<p><b>Organisatsiooni seos tudengi ja ülikooliga: </b>'.$row['connection'].'</p>';
		echo '<p><b>Taotleja kontaktandmed: </b></p><table border="1"><tr><th>Telefoninumber</th><th>E-posti aadress</th><th>Elukoha aadress</th></tr><tr><th>'.$row['phone'].'</th><th>'.$row['email'].'</th><th>'.$row['address'].'</th></tr></table><br>';
                echo '<p><b>Õppeinfo: </b></p><table border="1"><tr><th>Eriala</th><th>Õppetase</th><th>Õppeaasta</th></tr><tr><th>'.$row['speciality'].'</th><th>'.$row['degree'].'</th><th>'.$row['year'].'</th></tr></table><br>';
                echo '<p><b>Teised projektimeeskonna liikmed: </b>'.$row['team_members'].'</p>';
                }
				 echo '<p><b>Projekti pealkiri: </b>'.$row['project_name'].'</p>';
                echo '<p><b>Taotletav summa: </b>'.$row['requested_amount'].'</p>';
                echo '<p><b>Projekti eeldatav periood: </b>'.$row['initial_date'].' - '.$row['end_date'].'</p>';
                echo '<p><b>Taotleva summa kasutamise eesmärk: </b>'.$row['requested_amount_goal'].'</p>';
                echo '<p><b>Probleemi püstitus ja sihtrühma kirjeldus: </b>'.$row['problem'].'</p>';
                echo '<p><b>Projekti eesmärk: </b>'.$row['project_goal'].'</p>';
                echo '<p><b>Projekti oodatavad tulemused: </b>'.$row['results'].'</p>';
                echo '<p><b>Tegevuste loetelu koos tähtajaga: </b>'.$row['activities'].'</p>';
				echo '<p><b>Toetuse taotlemise põhjus: </b>'.$row['budget_explanation'].'</p>';
				echo '<p><b>Projekti eelarve ning põhjendus: </b></p><table border="1"><tr><th>Eelarvernamea ehk kuluartikkel</th><th>Ühik</th><th>Ühiku hind</th><th>Ühiku kogus</th><th>Kuluartikli summa</th><th>Rahastaja</th></tr>';
				 for ($i = 0; $i < sizeof(json_decode($row['budget_table'])[0]); $i++) {
                  echo '<tr><th>'.json_decode($row['budget_table'])[0][$i].'</th><th>'.json_decode($row['budget_table'])[1][$i].'</th><th>'.json_decode($row['budget_table'])[2][$i].'</th><th>'.json_decode($row['budget_table'])[3][$i].'</th><th>'.json_decode($row['budget_table'])[4][$i].'</th><th>'.json_decode($row['budget_table'])[5][$i].'</th></tr>';
                }
                echo '</table><br>';;
                break;
              case "student_project_report":
                case "student_project_report":
				echo '<p><b>ID: </b>'.$row['id'].'</p>';
				echo '<p><b>Saatja E-mail: </b>'.$row['user_email'].'</p>';
				echo '<p><b>Koostatud: </b>'.$row['date_created'].'</p>';
				if ($row['organization']==0) {
                  echo '<p><b>Nimi: </b>'.$row['name'].'</p>';
                  echo '<p><b>Taotleja isikukood: </b>'.$row['code'].'</p>';
				  echo '<p><b>Taotleja kontaktandmed: </b>'.$row['phone'].'</p>';
				  echo '<p><b>Taotleja arveldusarve number: </b>'.$row['bank_account'].'</p>';
				  echo '<p><b>Aruandluse koostaja: </b>'.$row['report_compiler'].'</p>';
				  echo '<p><b>Projekti juht: </b>'.$row['project_manager'].'</p>';
				  echo '<p><b>Teised projektimeeskonna liikmed: </b>'.$row['team_members'].'</p>';
				  echo '<p><b>Projekti pealkiri: </b>'.$row['project_name'].'</p>';
                } else {
                  echo '<p><b>Organisatsioon: </b>'.$row['name'].'</p>';
                  echo '<p><b>Organisatsiooni registrikood: </b>'.$row['code'].'</p>';
                  echo '<p><b>Organisatsiooni seos tudengi ja ülikooliga: </b>'.$row['connection'].'</p>';
				  echo '<p><b>Taotleja kontaktandmed: </b></p><table border="1"><tr><th>Telefoninumber</th><th>E-posti aadress</th><th>Elukoha aadress</th></tr><tr><th>'.$row['phone'].'</th><th>'.$row['email'].'</th><th>'.$row['address'].'</th></tr></table><br>';
                echo '<p><b>Õppeinfo: </b></p><table border="1"><tr><th>Eriala</th><th>Õppetase</th><th>Õppeaasta</th></tr><tr><th>'.$row['speciality'].'</th><th>'.$row['degree'].'</th><th>'.$row['year'].'</th></tr></table><br>';
                echo '<p><b>Teised projektimeeskonna liikmed: </b>'.$row['team_members'].'</p>';
                }
				echo '<p><b>Projekti tegelik elluviimise periood: </b>'.$row['initial_date'].' - '.$row['end_date'].'</p>';

                echo '<p><b>Määratud toetuse summa: </b>'.$row['grant_awarded'].'</p>';
				echo '<p><b>Kasutatud toetuse summa: </b>'.$row['used_grant_awarded'].'</p>';
				echo '<p><b>Projekti kogusumma: </b>'.$row['actual_cost'].'</p>';
                echo '<p><b>Probleemi püstitus ja taotletava summa eesmärk: </b>'.$row['problem'].'</p>';
                echo '<p><b>Projekti eesmärk: </b>'.$row['project_goal'].'</p>';
                echo '<p><b>Projekti oodatavad tulemused: </b>'.$row['planned_results'].'</p>';
				echo '<p><b>Projekti tegelikud tulemused: </b>'.$row['actual_results'].'</p>';
                echo '<p><b>Tegevuste loetelu koos tähtajaga: </b>'.$row['actual_activities'].'</p>';
				echo '<p><b>Täiendav informatsioon: </b>'.$row['additional_info'].'</p>';
				echo '<p><b>Projekti eelarve ning põhjendus: </b></p><table border="1"><tr><th>Eelarvernamea ehk kuluartikkel</th><th>Ühik</th><th>Ühiku hind</th><th>Ühiku kogus</th><th>Kuluartikli summa</th><th>Rahastaja</th></tr>';
				 for ($i = 0; $i < sizeof(json_decode($row['budget_table'])[0]); $i++) {
                  echo '<tr><th>'.json_decode($row['budget_table'])[0][$i].'</th><th>'.json_decode($row['budget_table'])[1][$i].'</th><th>'.json_decode($row['budget_table'])[2][$i].'</th><th>'.json_decode($row['budget_table'])[3][$i].'</th><th>'.json_decode($row['budget_table'])[4][$i].'</th><th>'.json_decode($row['budget_table'])[5][$i].'</th></tr>';
                }
				echo '<p><b>Eelarve põhjendus: </b>'.$row['budget_explanation'].'</p>';
                break;

        }
      }
      $stmt->free_result();
      $stmt->close();
      $mysqli->close();
    }
    function markDeleted($tableName,$id){
        $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("UPDATE ".$tableName." SET is_deleted=1 WHERE id = ?");
        $stmt->bind_param("i", $id);

        if(!$stmt->execute()){
            echo "\n Tekkis viga : " .$stmt->error;
        }
        $stmt->close();
    }
?>
