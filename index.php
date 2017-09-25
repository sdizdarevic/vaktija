

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="mobile.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description"
          content="Vaktija -prayer times">
    <meta name="keywords"
          content="vaktija, prayer times">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1">


    <title>Vaktija -prayer times </title>
</head>
<body>

<script>
   var isInIframe = (window.location != window.parent.location) ? true : false;

  if(isInIframe) 
  {
	console.log("in")
  }
  else 
  {
	console.log("out")
  }
</script> 

 <?php
//mysql_connect("localhost", "root", "root");
 

if (!$db=@mysql_connect("127.6.157.2:3306", "admin9anTvWL", "NNWMgU9D6gL3"))
{
die ("<b>Spajanje na mysql server je neuspješno</b>");

}
if (!mysql_select_db("vaktija", $db))
{
die ("<b>Greška pri odabiru baze</b>");
}
mysql_set_charset('utf8', $db); //rjesenje za c,s,z

date_default_timezone_set('Europe/Paris');
$upit="SELECT * FROM schedule WHERE _id="; //trebaju vremena
$daynum=date('z')+2;
$upit=$upit . $daynum;

$sqlq=mysql_query($upit);


$red = mysql_fetch_row($sqlq); //vremena za Sarajevo

  //dodavanje 1 minute na vrijeme
//$endTime = strtotime("+1 minutes", strtotime($red[2])); //dodaj na sabah 1 minutu offseta

//echo date('h:i', $endTime);

 


if(isset($_POST['gradovi'])) {
$varijabla= $_POST["gradovi"]; 
//echo $varijabla;
}
else{
$varijabla= 107; 
//echo $varijabla;
}
//$odabranigrad = $varijabla;
//echo $odabranigrad;






$upit2="SELECT fajr,dhuhr,asr FROM `offset` WHERE month=4 AND location_id=". $varijabla; //location id visoko

$sqlq2=mysql_query($upit2);

$red2 = mysql_fetch_row($sqlq2);


$upitn="SELECT location FROM `locations` WHERE _id=". $varijabla; //location id visoko

$sqlqn=mysql_query($upitn);

$red3 = mysql_fetch_row($sqlqn);

/*
print "<br />";
print "Grad " .$red3[0];
print "<br />";
echo $niz[0] . " " . date('h:i',strtotime($red2[0]. "minutes", strtotime($red[2]))); //dodaj red1[0] dodaju se minute 1 1 1 za visoko
print "<br />";
echo $niz[1] . " " .date('h:i',strtotime($red2[0]. "minutes", strtotime($red[3])));
print "<br />";
echo $niz[2] . " " .date('h:i',strtotime($red2[1]. "minutes", strtotime($red[4])));
print "<br />";
echo $niz[3] . " " .date('G:i',strtotime($red2[2]. "minutes", strtotime($red[5]))); //"G:I" za ispis 19:01 a ne 7:01
print "<br />";
echo $niz[4] . " " .date('G:i',strtotime($red2[2]. "minutes", strtotime($red[6])));
print "<br />";
echo $niz[5] . " " .date('G:i',strtotime($red2[2]. "minutes", strtotime($red[7])));*/



?>



<div class="shadow">
    <table>
        <tr>
                        
                        <td colspan="2"><span class="grad"> <?php echo $red3[0]; ?> </span>
                         

            </td>
        </tr>

                <tr>
            <th>zora</th>
            <td><?php echo date('h:i',strtotime($red2[0]. "minutes", strtotime($red[2]))); ?> </td> 
        </tr>
        <tr>
            <th>izlazak sunca</th>
            <td><?php echo date('h:i',strtotime($red2[0]. "minutes", strtotime($red[3]))); ?></td>
        </tr>
        <tr>
            <th>podne</th>
            <td><?php echo date('h:i',strtotime($red2[1]. "minutes", strtotime($red[4]))); ?></td>
        </tr>
        <tr>
            <th>ikindija</th>
            <td><?php echo date('G:i',strtotime($red2[2]. "minutes", strtotime($red[5]))); ?></td>
        </tr>
        <tr>
            <th>akšam</th>
            <td><?php echo date('G:i',strtotime($red2[2]. "minutes", strtotime($red[6]))); ?></td>
        </tr>
        <tr>
            <th>jacija</th>
            <td><?php echo date('G:i',strtotime($red2[2]. "minutes", strtotime($red[7]))); ?></td>
        </tr>

    </table>


</div>
<div class="copyleft">
    <!-- <span class="c1"> Copyleft</span> -->
    <span class="c2"> <a href="/" target="_blank">sdizdarevic.com</a>
		</span><span class="c1"> 2016 - 2017 </span>
        <br>
        <span class="c1"> Released under GNU GPL General licence </span>
</div>

<form action="" method="post"> <!--<form action="gradovi.php" method="post">  -->

    <select name="gradovi" onchange='this.form.submit()'>


<!-- <option value=''></option> -->
<option selected hidden>Odaberi grad</option>

<option value="1">Banovići</option>
<option value="2">Banja Luka</option>
<option value="3">Bihać</option>
<option value="4">Bijeljina</option>
<option value="5">Bileća</option>
<option value="6">Bos. Brod</option>
<option value="7">Bos. Dubica</option>
<option value="8">Bos. Gradiška</option>
<option value="9">Bos. Grahovo</option>
<option value="10">Bos. Krupa</option>
<option value="11">Bos. Novi</option>
<option value="12">Bos. Petrovac</option>
<option value="13">Bos. Šamac</option>
<option value="14">Bratunac</option>
<option value="15">Brčko</option>
<option value="16">Breza</option>
<option value="17">Bugojno</option>
<option value="18">Busovača</option>
<option value="19">Bužim</option>
<option value="20">Cazin</option>
<option value="21">Čajniče</option>
<option value="22">Čapljina</option>
<option value="23">Čelić</option>
<option value="24">Čelinac</option>
<option value="25">Čitluk</option>
<option value="26">Derventa</option>
<option value="27">Doboj</option>
<option value="28">Donji Vakuf</option>
<option value="29">Drvar</option>
<option value="30">Foča</option>
<option value="31">Fojnica</option>
<option value="32">Gacko</option>
<option value="33">Glamoč</option>
<option value="34">Goražde</option>
<option value="35">Gornji Vakuf</option>
<option value="36">Gračanica</option>
<option value="37">Gradačac</option>
<option value="38">Grude</option>
<option value="39">Hadžići</option>
<option value="40">Han-Pijesak</option>
<option value="41">Hlivno</option>
<option value="42">Ilijaš</option>
<option value="43">Jablanica</option>
<option value="44">Jajce</option>
<option value="45">Kakanj</option>
<option value="46">Kalesija</option>
<option value="47">Kalinovik</option>
<option value="48">Kiseljak</option>
<option value="49">Kladanj</option>
<option value="50">Ključ</option>
<option value="51">Konjic</option>
<option value="52">Kotor-Varoš</option>
<option value="53">Kreševo</option>
<option value="54">Kupres</option>
<option value="55">Laktaši</option>
<option value="56">Lopare</option>
<option value="57">Lukavac</option>
<option value="58">Ljubinje</option>
<option value="59">Ljubuški</option>
<option value="60">Maglaj</option>
<option value="61">Modriča</option>
<option value="62">Mostar</option>
<option value="63">Mrkonjić-Grad</option>
<option value="64">Neum</option>
<option value="65">Nevesinje</option>
<option value="66">Novi Travnik</option>
<option value="67">Odžak</option>
<option value="68">Olovo</option>
<option value="69">Orašje</option>
<option value="70">Pale</option>
<option value="71">Posušje</option>
<option value="72">Prijedor</option>
<option value="73">Prnjavor</option>
<option value="74">Prozor</option>
<option value="75">Rogatica</option>
<option value="76">Rudo</option>
<option value="77">Sanski Most</option>
<option value="107">Sarajevo</option>
<option value="78">Skender-Vakuf</option>
<option value="79">Sokolac</option>
<option value="80">Srbac</option>
<option value="81">Srebrenica</option>
<option value="82">Srebrenik</option>
<option value="83">Stolac</option>
<option value="84">Šekovići</option>
<option value="85">Šipovo</option>
<option value="86">Široki Brijeg</option>
<option value="87">Teslić</option>
<option value="88">Tešanj</option>
<option value="89">Tomislav-Grad</option>
<option value="90">Travnik</option>
<option value="91">Trebinje</option>
<option value="92">Trnovo</option>
<option value="93">Tuzla</option>
<option value="94">Ugljevik</option>
<option value="95">Vareš</option>
<option value="96">V.Kladuša</option>
<option value="97">Visoko</option> <!-- <option value="97" selected="selected">Visoko</option> -->
<option value="98">Višegrad</option>
<option value="99">Vitez</option>
<option value="100">Vlasenica</option>
<option value="101">Zavidovići</option>
<option value="102">Zenica</option>
<option value="103">Zvornik</option>
<option value="104">Žepa</option>
<option value="105">Žepče</option>
<option value="106">Živinice</option>
        <OPTGROUP LABEL="Sandžak">

            <option value="1000">Bijelo Polje</option>
<option value="2000">Gusinje</option>
<option value="3000">Nova Varoš</option>
<option value="4000">Novi Pazar</option>
<option value="5000">Plav</option>
<option value="6000">Pljevlja</option>
<option value="7000">Priboj</option>
<option value="8000">Prijepolje</option>
<option value="9000">Rožaje</option>
<option value="10000">Sjenica</option>
<option value="11000">Tutin</option>
        </OPTGROUP>

    </select>

    <noscript>
        <input type="submit" value="Prikaži" id="submitShow">
    </noscript>
</form>
  
 </body>
</html>


