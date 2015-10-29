<?php $passwort = "14148888";
session_start();
function getThisFile($myFile){
  return substr($myFile, 1+strrpos($myFile, "/"));
}
if ($_REQUEST['pass'] == $passwort && isset($_REQUEST['email'])) {
    $_SESSION['loggedIn'] = true;
    $_SESSION['email'] = $_REQUEST['email'];
    $_SESSION['userDir'] = $_REQUEST['email'];
    header("Location: index_auflistung.php");
    exit;
} else {
	if (isset($_REQUEST['email'])) {
		echo "<center><h5 style='color: red;'>Passwort war falsch.</h5></center>";
		sleep(3);// Wartezeit in Sekunden
	}
}
require('../inc.htmlheader.html');
?>
	
      <h2>Zugang zum Daten-Transferbereich</h2>
            <br/>
            <br/>
            <br/>
            <br/>
        <form name="frm_Entry" action="" method="post">
        <table>
          <tr>
            <td>
              <p>
                E-Mail-Adresse:
                <br/><input type="text" name="email" id="email" style="width:190px;" />
                <br/>
                <br/>Passwort:
                <br/><input type="password" name="pass" id="pass"  style="width:190px;" />
                <br/><img src="pw.gif"/>
                <br/><input type="submit" name="submit" value="OK" style="width:195px; margin-top: 30px;"  />
              </p>
            </td>
          </tr>
        </table>
      </form>
      
<?php
require('../inc.htmlfooter.html');
?>

<script language="JavaScript" type="text/javascript">
    document.getElementById('email').focus();
</script>
