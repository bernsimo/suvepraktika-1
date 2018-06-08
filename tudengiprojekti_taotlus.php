<?php
require './php/sessionCheck.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tudengiprojekti taotlus</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    let counter=3;
      function addOneToTable() {
        var table = document.getElementById("projectBudgetTable");
        var row = table.insertRow(counter);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        cell1.innerHTML = '<input type="text" class="form-control" placeholder="">';
        cell2.innerHTML = '<input type="number" class="form-control" placeholder="" min="0">';
        cell3.innerHTML = '<input type="number" class="form-control" placeholder="" min="0">';
        cell4.innerHTML = '<input type="number" class="form-control" placeholder="" min="0">';
        cell5.innerHTML = '<input type="number" class="form-control" placeholder="" min="0">';
        cell6.innerHTML = '<input type="text" class="form-control" placeholder="">';
        counter++;
      }
      function removeOneFromTable() {
        if (counter>3) {
          document.getElementById("projectBudgetTable").deleteRow(counter-1);
          counter--;
        } else {
          alert("Rohkem ei saa eemaldada!");
        }
      }
    </script>
</head>

<body>


    <div class="content">
		
        <div class="chapter-header">
			<p>Tudengiprojekti taotlus</p>
            <p>Projekti ning taotleja üldandmed</p>
			<button type="button" class="btn btn-success" onclick="location.href='main.php';">Tagasi avalehele</button>
			<br>
			<br>
			<button type="button" class="btn btn-success" onclick="location.href='uusTaotlus.php';">Tagasi uue taotluse lehele</button>
        </div>
        <div class="chapter">

            <div class="form-group">
                <label>Ees- ja perekonnanimi / taotleva organisatsiooni nimi ja vastutava (allkirjaõigusliku) isiku nimi:</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label>Organisatsiooni seos tudengi ja ülikooliga:</label>
                <input type="text" class="form-control" id="connection">
            </div>
            <div class="form-group">
                <label>Taotleja isikukood / organisatsiooni registrikood:</label>
                <input type="number" class="form-control" id="code">
            </div>

            <div class="form-group">
                <label>Taotleja kontaktandmed:</label>
                <input type="number" class="form-control" placeholder="telefoninumber" id="phone">
                <br>
                <input type="email" class="form-control" placeholder="e-posti aadress" id="email">
                <br>
                <input type="text" class="form-control" placeholder="elukoha aadress" id="address">

            </div>
            <div class="form-group">
                <label>Õppeinfo:</label>
                <input type="text" class="form-control" placeholder="eriala" id="speciality">
                <br>
                <input type="text" class="form-control" placeholder="õppetase" id="degree">
                <br>
                <input type="number" class="form-control" placeholder="õppeaasta" id="year">
            </div>
            <div class="form-group">
                <label>Projekti juht:</label>
                <input type="text" class="form-control" id="project_manager">

            </div>
            <div class="form-group">
                <label>Teised projektimeeskonna liikmed</label>
                <input type="text" class="form-control" id="team_members">
            </div>
            <div class="form-group">
                <label>Projekti pealkiri</label>
                <input type="text" class="form-control" id="project_name">
            </div>
            <div class="form-group">
                <label>Tudengiprojekti toetusest taotletav summa</label>
                <input type="number" class="form-control" id="requested_amount">
            </div>
            <div class="form-group">
                <label>Projekti kogu eelarve</label>
                <input type="number" class="form-control" placeholder="tudengiprojekti toetus + kaasfinantseering + omaosalus" id="budget">
                <br>
            </div>
			<div class="form-group">
                <label>Projekti eeldatav periood:</label>
                <input type="number" class="form-control" placeholder="alguskuupäev" id="initial_date">
                <br>
                <input type="number" class="form-control" placeholder="lõpukuupäev" id="end_date">
            </div>
            <div class="form-group">
                <label>Taotletava summa kasutamise eesmärk (ühe lausega)</label>
                <input type="text" class="form-control" id="requested_amount_goal">
            </div>


        </div>
        <hr>
        <div class="chapter-header">
            <p>Projekti meede</p>
        </div>
        <div class="chapter">
            <div class="form-group">
                <label>Vali projekti meede:</label>
                <select class="form-control" id="project_option">
                    <option>1. Eriala arendus</option>
                    <option>2. Kodanikuühiskonnas kaasa rääkimine</option>
                    <option>3. Traditsioonide hoidmine ja edendamine</option>
					<option>4. Kaasamine</option>
					<option>5. Tervislike eluviiside ja keskkonna väärtustamine</option>
                </select>
                <small id="project_option" class="form-text text-muted">
                    <b>1: </b> projekt soodustab erialast seotust ning erialast aktiivsust; aitab kaasa üliõpilaste teadustöö populariseerimisele;
                    <br>
                    <b>2: </b> projekt tõmbab tähelepanu ühiskonnas aktuaalsetele teemadele ja/või probleemidele ning innustab üliõpilasi mõtlema ühiskonnas olulistele teemadele;
                    <br>
                    <b>3: </b> projekt kannab rahvuslikke, Tallinna Ülikooli või üliõpilaskonna traditsioone;
					<br>
                    <b>4: </b> projekti on korraldus- ja/või osalemistasandil kaasatud Tallinna ülikooli tudengid ja teised ülikooli liikmed;
					<br>
                    <b>5: </b> projekt propageerib tervislikke elamis- ja käitumisviise ning tõstab teadlikkust keskkonnahoiust;

                </small>

            </div>
        </div>
        <hr>
        <div class="chapter-header">
            <p>Projekti kirjeldus</p>
        </div>
        <div class="chapter">
            <div class="form-group">
                <label>Probleemi püstitus ja sihtrühma kirjeldus (kirjelda sihtgruppi ja selle probleeme või vajadusi; põhjenda
                    projekti olulisust):</label>
                <input type="text" class="form-control" id="problem">
            </div>
            <div class="form-group">
                <label>Projekti eesmärk (ühe lausega; eesmärk ei saa olla tegevus):</label>
                <input type="text" class="form-control" id="project_goal">
            </div>
            <div class="form-group">
                <label>Projekti oodatavad tulemused
                    <br>(mõju sihtgrupile, valdkonnale ja ühiskonnale laiemalt; oodatav tulemus peab
                    olema konkreetne, objektiivselt mõõdetav ja kaasa aitama eesmärgi saavutamisele):</label>
					 <textarea class="form-control" id="results" placeholder="1. ..."> </textarea>
            </div>
            <div class="form-group">
                <label>Tegevuste loetelu koos tähtajaga (vajadusel kirjelda, kuidas tegevused aitavad oodatavaid tulemusi saavutada):</label>
                <textarea class="form-control" id="activities" placeholder="1. ..."> </textarea>
            </div>
            <div class="form-group">
                <label>Täiendav informatsioon projekti kohta (kõik vajalik, mida ei saanud eelnevates punktides kirjutada või selgitada)</label>
                <input type="text" class="form-control" id="additional_info">
            </div>

        </div>

		<hr>
        <div class="chapter-header">
            <p>Projekti eelarve ning põhjendus</p>
			</div>
			<div class="chapter">
				<table class="table table-bordered" id="projectBudgetTable">
					<thead>
					  <tr>
						<th>Eelarverida ehk kuluartikkel</th>
						<th>Ühik</th>
						<th>Ühiku hind</th>
						<th>Ühiku kogus</th>
						<th>Kuluartikli summa</th>
						<th>Rahastaja</th>
					  </tr>
					  <tr>
						<th class="tableExplanation">(nt. trükkimine, transport)</th>
						<th class="tableExplanation">(nt. plakat, bussi pilet)</th>
						<th class="tableExplanation">(nt. ühe plakati hind, ühe bussi pileti hind)</th>
						<th class="tableExplanation">(nt. 45 plakatit, 10 bussipiletit)</th>
						<th class="tableExplanation">(ühiku hind x ühiku kogus)</th>
						<th class="tableExplanation">(märkida, kas kulu on planeeritud TLÜ toetusest, omafinantseeringust või kaasfinantseeringust*)</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td><input type="text" class="form-control" placeholder="1."></td>
						<td><input type="number" class="form-control" placeholder="" min=""></td>
						<td><input type="number" class="form-control" placeholder="" min=""></td>
						<td><input type="number" class="form-control" placeholder="" min=""></td>
						<td><input type="number" class="form-control" placeholder="" min=""></td>
						<td><input type="text" class="form-control" placeholder=""></td>
					  </tr>
					  <tr>
						<td><button type="button" name="addToTable" onclick="addOneToTable()">+</button> <button type="button" name="removeFromTable" onclick="removeOneFromTable()">-</button></td>
					  </tr>
					  <tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Projekti summa kokku:<input type="number" class="form-control" placeholder=""></td>
						<td>TLÜst toatletav summa: <br><br><br> <input type="number" class="form-control" placeholder=""></td>

					  </tr>
					</tbody>
				</table>
			</div>
      <hr>
		<div class="chapter">
				<div class="budget">
                <label>Eelarve põhjendus (selgitus üldsõnalistele kuluartiklitele; seos projekti elluviimisega)</label>
                <input type="text" class="form-control" id="reason">
            </div>
            <br>
			<div class="budget">
                <label>Toetuse taotlemise põhjus (Kuidas aitab taotletav toetus kaasa projekti kvaliteedi olulisele paranemisele ehk mida saab rahastuse abil paremini teha.)</label>
                <input type="text" class="form-control">
            </div>
            <br>
		</div>
		<hr>
        <div class="chapter-header">
            <p>Kinnitusleht</p>
        </div>
        <div class="chapter">
            <div class="form-group">
                <label>Käesoleva aruande allkirjastamisega kinnitan, et:</label>
                <ul>
                  <li>taotluses esitatud andmed on õiged ning realistlikud;</li>
                  <li>olen teadlik, et projekte menetleval komisjonil on õigus nõuda lisadokumente ja kutsuda taotluse esitaja vestlusele, mille käigus peab taotluse esitaja andma lisainformatsiooni projekti, selle osade ja/või rahaliste vahendite kasutamise kohta;</li>
				  <li>olen teadlik positiivse rahastusotsuse korral kehtivatest aruandlusnõuetest ning valmis neid õigeaegselt esitama;</li>
                </ul>
            </div>
            <div class="form-group">
                <label>Kinnitan:</label>
                <input type="checkbox" class="form-control" placeholder="">
            </div>
        </div>



</div>

</body>

</html>
