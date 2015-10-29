<?php
session_start();

function  getRelIconDirectory() {
	return "/transfer/";
}
function  getRelDataDirectory() {
	return "/transfer/data/";
}
function getAbsDataDirectory() {
	return getcwd().getRelDataDirectory();
}


if (isset($_REQUEST['btnFileupload'])) {
	$fileName = basename( $_FILES['uploaded']['name']);
	if (strlen($fileName) > 1) {
		uploadFile($fileName);
	}
}
if (isset($_REQUEST['toDelete'])) {
	if ($_REQUEST['toDelete'] != "") {
		deleteFile($_REQUEST['toDelete']);
		$_REQUEST['toDelete'] = "";
	}
}
$loeschenChecked="";
if (isset($_REQUEST['loeschenaktivieren'])) {	
	if ($_REQUEST['loeschenaktivieren'] == 'on') {
	  $loeschenChecked="checked";
	}
}
$thisFile = getThisFile($_SERVER["PHP_SELF"]);

?>
<!DOCTYPE html>
<html lang="de">
<head>
  <title>weber-agrarconsulting</title>
  <meta name="robots" content="noindex,nofollow">
  <meta charset="iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/jquery-1.11.3.min.map"></script>
  <script src="js/bootstrap.min.js"></script>
  
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="16x16" href="apple-touch-icon16.png">
	<link rel="apple-touch-icon" sizes="32x32" href="apple-touch-icon32.png">
	<link rel="apple-touch-icon" sizes="36x36" href="apple-touch-icon36.png">
	<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon57.png">
	<link rel="apple-touch-icon" sizes="76x76" href="apple-touch-icon72.png">
	<link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon144.png" /><!-- Retina iPad --> 
	<link rel="apple-touch-icon" sizes="152x152" href="apple-touch-icon144.png">
  
  <link rel="stylesheet" href="css/weber-agrarconsulting.css">
</head>
<body>

<div class="container-fluid">

  <div class="row">
    <div class="col-sm-6">

      <div class="row">
        <div class="col-sm-12 p0"><img src="img/hg_tomaten_640x480.jpg" width="100%"/></div>
      </div>

      <div class="row">
        <div class="col-sm-12  pl1">

        	<p class="ueberschrift_1">N&uuml;tzliche Dokumente und Informationen f&uuml;r den Download</p>

<?php 
$psw = "";
$loggedIn = "";

if (isset($_REQUEST["psw"]) ) {
 	$psw = substr("xxxx".str_replace(" ", "", $_REQUEST["psw"]), -4);
 	$loggedIn = $psw;
}


if ($loggedIn != "7867") {
?>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default btn-lg" id="myBtn">nicht eingeloggt</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post">
          
          	<input type="hidden" id="loggedIn" name="loggedIn" value="<?= $psw ?>"/>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="text" class="form-control" id="psw" name="psw" placeholder="Enter password">
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
      </div>
      
    </div>
  </div> 

<?php 
} else {
	//echo "logged in!<br>";
?>

	<button type="button" id="btnForUploadBar" class="btn-link pull-right">
		<span class="glyphicon glyphicon-retweet"></span>
	</button>

	<form name="frm_Loeschen" action="<?= $thisFile ?>" method="post">
       		<input type="hidden" name="toDelete" id="toDelete" value="">
            <div class="dokusAnzeigen">
              <?= dokusAnzeigen(); ?>
            </div>
        	<input type="hidden" id="psw" name="psw" value="<?= $psw ?>"/>
           	<input type="hidden" id="loggedIn" name="loggedIn" value="<?= $psw ?>"/>
	</form>
	   
	<div class="collapse">
		<form name="frm_Eingabe" method="post" enctype="multipart/form-data">
      		<input type="hidden" name="MAX_FILE_SIZE" value="900000000" />
	        <table class="uploadBar"><tr>
	        	<td width="300">
					<input type="file"  name="uploaded" id="uploaded" />
	        	</td>
	        	<td width="80">
					<input type="submit" name="btnFileupload" id="btnFileupload" onclick="jsFktBtnUpload()"/>
				</td>
				<td width="*" align="right">
 	       			loeschen aktivieren <input type="checkbox" name="loeschenaktivieren" id="loeschenaktivieren" onclick="jsFktLoeschenAktiv(this.checked);" <?= $loeschenChecked ?> />
				</td>
	        </tr></table>
        	<input type="hidden" id="psw" name="psw" value="<?= $psw ?>"/>
           	<input type="hidden" id="loggedIn" name="loggedIn" value="<?= $psw ?>"/>
		</form> 
	</div>
	
	   
<?php // 	echo "loggedIn=[".$loggedIn."]<br>";
}//end if
?>
        	
        </div>
      </div>

    </div>

    <div class="col-sm-3">
      <div class="row">
        <div class="col-sm-12 p0"><img src="img/hg_chriesi_320x480oben.jpg" width="100%"/></div>
      </div>
      <div class="row">
        <div class="col-sm-12 p0 hidden-xs"><img src="img/hg_chriesi_320x480unten.jpg" width="100%"/></div>
      </div>
    </div>
    <div class="col-sm-3">

      <div class="row">
		<div class="col-sm-12 p0">

	        <ul class="menu_ul">
	        	<li><a href="index.html">Home</a></li>
	        	<li><a href="uebermich.html">&Uuml;ber mich</a></li>
	        	<li><a href="kompetenzen.html">Kompetenzen</a></li>
	        	<li><a href="referenzen.html">Referenzen</a></li>
	        	<li><a href="links.html">Links</a></li>
	        	<li><a href="kontakt.php">Kontakt</a></li>
	        	<li><a href="impressum.html">Impressum</a></li>
	        	<li class="hidden-xs">Login</li>
	        </ul>

	    </div>
      </div>
      <div class="row">
        <div class="col-sm-12 p0"><img src="img/hg_gruen_mit_logo_320x480.png" width="100%"/></div>
      </div>

    </div>
  </div>
  
</div>


<script type="text/javascript">
function loescheDatei(dieDatei){
   document.getElementById('toDelete').value = dieDatei;
   document.frm_Loeschen.submit();
}
function jsFktLoeschenAktiv(isChecked) {
    if (isChecked) {
      document.getElementById('loeschenaktivieren').checked=true;
    } else {
      document.getElementById('loeschenaktivieren').checked=false;
    }
    document.frm_Eingabe.action = "";
  document.frm_Eingabe.submit();
}

$(document).ready(function(){
//     $("#myBtn").click(function(){
//         $("#myModal").modal();
//     });
    $("#myModal").modal();

    $("#btnForUploadBar").click(function(){
        $(".collapse").collapse('toggle');
    });    
});

</script>

</body>
</html>

<?php
function dokusAnzeigen() {
	$loeschenChecked="";
	if (isset($_REQUEST['loeschenaktivieren'])) {	
		if ($_REQUEST['loeschenaktivieren'] == 'on') {
		  $loeschenChecked="checked";
		}
	}
	$absWorkingDir 	= getAbsDataDirectory();
	$relWorkingDir 	= getRelDataDirectory();
	$iconsDir 		= getRelIconDirectory();

	chdir($absWorkingDir);
	$directory = ".";
	if(is_dir($directory) == true){
		$handle = opendir($directory);
        echo('<table class="docTable">
                <tr class="cssKopf">
                    <th colspan="2" align="left"></th>');
        $zaehler=0;
		while (false !== ($file = readdir($handle))){
              $endung2 = strtolower(substr($file, -2));
              $endung3 = strtolower(substr($file, -3));
              $endung4 = strtolower(substr($file, -4));
              if ($endung4 == "docx") 	{$endung3 = "doc";}
              if ($endung4 == "xlsx") 	{$endung3 = "xls";}
              if ($endung4 == "pptx") 	{$endung3 = "ppt";}
              
              if (
                $endung3 == "doc" ||
                $endung3 == "ppt" ||
                $endung3 == "txt" ||
                $endung3 == "xls" ||
                $endung3 == "zip" ||
                $endung3 == "pdf") {

                    $gezeigtesDok = $file;

          		    $trbg = 'cssLineEven';
          		  	if ($zaehler % 2 > 0) {
          		  	  $trbg = 'cssLineOdd';
          		    }
                    $zaehler++;

                    $abfallEimerchen = '<a href="#" onClick="loescheDatei(\''.$gezeigtesDok.'\');"><img src="'.$iconsDir.'button_delete.gif" border="0" title="loescht Dokument"></a>';
                    if ($loeschenChecked=="") {
                      $abfallEimerchen = "";
                    }//end if
                    echo ("<tr class='".$trbg."'><td>
                            <table><tr><td><a href='".$relWorkingDir.$gezeigtesDok."' target='_blank'><img src='".$iconsDir."miniicon_".$endung3.".gif' border='0' height='16' width='16' ></a></td><td class='DokListeAnzeige'>".anzeigeFileName($gezeigtesDok)."</td></tr></table>
                            </td>
                            <td>".$abfallEimerchen."</td>
                           </tr>");
                }
          }//end while
        echo("</table>");
		closedir($handle);
	} //end if
}//end function dokusAnzeigen


function anzeigeFileName($fileName){
  $ret = $fileName;
  $schwellenLaenge = 50;
  if (strlen($fileName) > $schwellenLaenge){
      $ret = substr( $fileName, 0,$schwellenLaenge-4) . ".." . substr($fileName, strlen($fileName)-4, 4);
  }
  return $ret;
}

function uploadFile($fileName) {
	$file = basename( $_FILES['uploaded']['name']);
	//$file = str_replace($file, " ", "");
	$endung2 = strtolower(substr($file, -2));
	$endung3 = strtolower(substr($file, -3));
	$endung4 = strtolower(substr($file, -4));
	if(
			$endung4 == "docx" ||
			$endung4 == "xlsx" ||
			$endung4 == "pptx" ||
			$endung3 == "doc" ||
			$endung3 == "ppt" ||
			$endung3 == "txt" ||
			$endung3 == "xls" ||
			$endung3 == "zip" ||
			$endung3 == "pdf" ||
			$endung3 == "psd" 
	) {
	} else {
		echo "File: ".$file."<br>
                	  	Keine g&uuml;ltige Dateiendung oder File zu gross!<br>
                	  	Maximale Folegr&ouml;sse: 500 MB<br>
                		G&uuml;ltig sind: docx,xlsx,pptx,doc,ppt,pdf,psd,txt,xls,zip,pdf<br><br>
                      	<a href='index.php'>back</a>";
		exit;
	}
	
	$target_path = getAbsDataDirectory().$file;
	if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_path)) {
// 		$sender = "transfer@powerlook.ch";
// 		$empfaenger = "welcome@powerlook.ch";
// 		$betreff = "Neuer Upload";
// 		$mailtext = "Folgende Datei wurde hochgeladen:<br><a href='http://www.powerlook.ch/transfer/".$target_path."' >".$target_path."</a>";
// 		mail($empfaenger, $betreff, $mailtext, "From: $sender\n" . "Content-Type: text/html; charset=iso-8859-1\n");
// 		header("Location: login.php");
//		exit;
	} else{
		echo "There was an error uploading the file, please try again! <a href='login.php'>back</a>";
	}	
}

function getThisFile($myFile){
  return substr($myFile, 1+strrpos($myFile, "/"));
}

function deleteFile($theFile) {
    @unlink(getAbsDataDirectory().$theFile);
}

?>


