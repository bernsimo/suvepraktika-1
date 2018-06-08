<?php
require './php/sessionCheck.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
	<meta http-equiv="content-type" content="application/vnd.ms-excel" charset="UTF-8">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

    <div class="content">
        <div class="chapter-header">
			
			<p>Teadusprojekti aruandlus</p>
            <p>Projekti ning taotleja üldandmed</p>
			<button style="float: right; type="button" class="btn btn-success" onclick="location.href='main.php';">Tagasi avalehele</button>
			<button style="float: left; type="button" class="btn btn-success" onclick="location.href='uusTaotlus.php';">Tagasi uue taotluse lehele</button>
			<br>
			<br>
			
        </div>
        <div class="chapter">

            <div class="form-group">
                <label>1. Taotleja ees- ja perekonnanimi / taotleva organisatsiooni nimi ja vastutava (allkirjaõigusliku) isiku nimi </br>( * toetuse taotleja on projekti lõppedes toetuse saaja)</br></label>
                <input type="text" class="form-control" id="nimi">
            </div>
            <div class="form-group">
                <label>2. Taotleja isikukood / organisatsiooni registrikood </label>
                <input type="number" class="form-control" id="isikukood">
            </div>

            <div class="form-group">
                <label>3.Taotleja kontaktandmed:</label>
                <input type="number" class="form-control" placeholder="telefoninumber" id="telefon">
                <br>
                <input type="email" class="form-control" placeholder="e-posti aadress" id="epost">
                <br>
                <input type="text" class="form-control" placeholder="elukoha aadress" id="elukoht">

            </div>
            <div class="form-group">
                <label>4. Taotleja arveldusarve number </label>
                <input type="number" class="form-control" placeholder="number" id="arveldusnumber">
            </div>
            <div class="form-group">
                <label>5. Aruandluse koostaja (juhul, kui erineb taotlejast)</label>
                <input type="text" class="form-control" id="aruandlusekoostaja">
            </div>
            <div class="form-group">
                <label>6. Projekti juht (M1 ja M3 projektide puhul saab juhiks olla toetuse taotleja)</label>
                <input type="text" class="form-control" id="projektijuht">
            </div>
            <div class="form-group">
                <label>7. Teised projektimeeskonna liikmed:</label>
                <input type="text" class="form-control">
            </div>
			<div class="form-group">
                <label>8. Juhendaja nimi, ametikoht/haridus, tegevusvaldkond (ainult M1 projekt) :</label>
                <input type="text" class="form-control" placeholder="juhendaja nimi" id="juhendajanimi">
                <br>
                <input type="text" class="form-control" placeholder="ametikoht/haridus" id="juhendajaametikoht">
                <br>
                <input type="text" class="form-control" placeholder="tegevusvaldkond" "juhendajategevusvaldkond">
            </div>
			<div class="form-group">
                <label>9. Projekti pealkiri :</label>
                <input type="text" class="form-control" id="projektipealkiri">
            </div>
    
            <div class="form-group">
                <label>10. Projekti tegelik elluviimise periood (algus- ning lõpukuupäev) :</label>
                <input type="date" class="form-control" placeholder="alguskuupäev" id="algus">
                <br>
                <input type="date" class="form-control" placeholder="lõpukuupäev" id="lopp">
            </div>
			<div class="form-group">
                <label>11. Määratav toetus :</label>
                <input type="number" class="form-control" id="mtoetus">
			</div>
			<div class="form-group">
                <label>12. Tegelik kulu (teadusprojektide vahenditest planeeritud kulu) :</label>
                <input type="number" class="form-control" id="kulu">
            </div>
			</div>


        </div>
		<div class="content">
        <div class="chapter-header">
            <p>Projekti kirjeldus</p>
			</div>
        
        <div class="chapter">
            <div class="form-group">
                <label>13. Probleemi püstitus ja sihtrühma kirjeldus :</label>
                <input type="text" class="form-control">
				</div>
            
            <div class="form-group">
                <label>14. Projekti eesmärk :</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>15. Projekti tulemused 
                    <br>(eesmärk on võrrelda, mis sai esitatud projekti taotluses ning kuidas see tegelikult täitus. “Planeeritud” lahtrisse kopeerida taotluses esitatu ning “tegelik” lahtris kirjeldada tegelikku teostamist) :</br></label>
            </div>
            <div class="form-group">
                <label>15.1 Oodatud tulemused <br>(mida projektiga taheti saavutada) :</br></label>
                <input type="text" class="form-control" placeholder="1.">
                <input type="text" class="form-control" placeholder="2.">
                <input type="text" class="form-control" placeholder="3.">
				<tr>
                
              </tr>
            </div>
			<div class="form-group">
                <label>15.2 Tegelikud tulemused : <br>(kui tegelik erineb oodatust, siis selgita ja põhjenda) :</br></label>
                <input type="text" class="form-control" placeholder="1.">
                <input type="text" class="form-control" placeholder="2.">
                <input type="text" class="form-control" placeholder="3.">
				<tr>
                
              </tr>
            </div>
			<div class="form-group">
                <label>16. Tegevuste loetelu koos tähtajaga :</label>
            </div>
			<div class="form-group">
                <label>16.1 Planeeritud tegevused ja tähtaeg <br>(mida projektiga taheti saavutada) :</label>
                <input type="text" class="form-control" placeholder="1.">
                <input type="text" class="form-control" placeholder="2.">
                <input type="text" class="form-control" placeholder="3.">
				<tr>
                
              </tr>
            </div>
			<div class="form-group">
                <label>16.2 Tegelikud tegevused ja tähtaeg <br>(kui tegelik erineb oodatust, siis selgita ja põhjenda):</br></label>
                <input type="text" class="form-control" placeholder="1.">
                <input type="text" class="form-control" placeholder="2.">
                <input type="text" class="form-control" placeholder="3.">
				<tr>
                
              </tr>
            </div>
            <div class="form-group">
                <label>17.(ainult M1 taotleja) Uurimismeetodite kirjeldus :</label>
            </div>
			<div class="form-group">
                <label>17.1. Planeeritud :</label>
                <input type="text" class="form-control">
				<tr>
                
              </tr>
            </div>
			<div class="form-group">
                <label>17.2. Tegelik :</label>
                <input type="text" class="form-control">
				<tr>
                
              </tr>
            </div>
            <div class="form-group">
                <label>18. (ainult M2 taotleja) Planeeritava ürituse programmi kirjeldus ning esinejate loetelu; projekti raames avaldatava
                    materjali kirjeldus (Vajadusel lisada taotlusele lisafailina.):</label>
        
            </div>
			<div class="form-group">
                <label>18.1. Planeeritud :</label>
                <input type="text" class="form-control">
				<tr>
                
              </tr>
            </div>
			<div class="form-group">
                <label>18.2 Tegelik :</label>
                <input type="text" class="form-control">
				<tr>
                
              </tr>
            </div>
            <div class="form-group">
                <label>(ainult M3 taotleja) Teadustöö esitlemise vormi, teadustöö sisu ning esitluspaiga või ürituse kirjeldus:</label>
            </div>
			<div class="form-group">
                <label>19.1. Planeeritud :</label>
                <input type="text" class="form-control">
				<tr>
                
              </tr>
            </div>
			<div class="form-group">
                <label>19.2 Tegelik :</label>
                <input type="text" class="form-control">
				<tr>
                
              </tr>
            </div>
            <div class="form-group">
                <label>20. Täiendav informatsioon projekti kohta (meediakajastus, koostööpartnerid jm oluline):</label>
                <input type="text" class="form-control">
            </div>
			
			 <hr>
        <div class="chapter-header">
            <p>Projekti eelarve ning põhjendus</p>
        </div>
        <div class="chapter">
          <table class="table table-bordered">
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
                <td><input type="number" class="form-control" placeholder=""></td>
                <td><input type="number" class="form-control" placeholder=""></td>
                <td><input type="number" class="form-control" placeholder=""></td>
                <td><input type="number" class="form-control" placeholder=""></td>
                <td><input type="text" class="form-control" placeholder=""></td>
              </tr>
              <tr>
                <td><button type="button" name="addToTable">+</button></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Projekti summa kokku:<input type="number" class="form-control" placeholder=""></td>
                <td>TLÜst toatletav summa:<input type="number" class="form-control" placeholder=""></td>

              </tr>
            </tbody>
          </table>
        </div>
        <hr>
       
          <div class="form-group">
              <label>17. Eelarve põhjendus (selgitus erinevustele planeeritust; seos projekti elluviimisega):</label>
              <input type="text" class="form-control" placeholder="eelarve põhjendus">
          </div>
		   
        </div>
		 <hr>
        <div class="chapter-header">
            <p>Kinnitusleht</p>
        </div>
        <div class="chapter">
            <div class="form-group">
                <label>Käesoleva aruande allkirjastamisega kinnitan, et:</label>
                <ul>
                  <li>aruandes esitatud andmed on õiged ning tõesed;</li>
                  <li>olen teadlik, et aruandeid menetleval komisjonil on õigus nõuda lisadokumente ja kutsuda aruande esitaja vestlusele, mille käigus peab aruande esitaja andma lisainformatsiooni projekti, selle osade ja/või rahaliste vahendite kasutamise kohta.</li>
                </ul>
            </div>
            <div class="form-group">
                <label>Kinnitan:</label>
                <input type="checkbox" class="form-control" placeholder="">
            </div>
        </div>
        </div>

        <hr>
		</div>
        </div>
		</div>
	</div>
<!--

Projekti eelarve ning põhjendus vaja teha, tuleb keerulisem

-->
    </div>

</body>

</html>
