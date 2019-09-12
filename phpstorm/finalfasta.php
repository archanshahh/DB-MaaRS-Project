<?php
$servername = "localhost";
$username = "root";
$pswd="";
$dbname = "project";
require("..\phpstorm\database.php");

$data = new data();
$con = new mysqli($servername,$username,$pswd,$dbname);
if($con->connect_error)
{
    echo "<script>alert('Connection Error\\nPlease Refresh this Page Or Try Again Later');</script>";
}
else{

}
session_start();
//$_POST['seid'] = $session_id();
$fonts = $_SESSION['fonts']."px";
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        #regForm {
            background-color: #f2f2f2;
            margin: 60px auto;
            padding: 20px;
            width: 90%;
            min-width: 300px;
            font-family: "Courier New";
        }
        #tab{
            width: 90%;
        }
        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            width: 250px;
            border-radius: 5px;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .button5 {
            background-color: #555555;
            color: white;
            border: 2px solid #555555;
        }

        .button5:hover {
            background-color: white;
            color: black;
        }
        .myDiv {
            border:2px solid gray;
            -webkit-border-top-left-radius:6px;
            -webkit-border-top-right-radius:6px;
            -moz-border-radius-topleft:6px;
            -moz-border-radius-topright:6px;
            border-top-left-radius:6px;
            border-top-right-radius:6px;
            width:605px;
            font-size:12pt; /* or whatever */
        }
        .myDiv h2 {
            padding:4px;
            color:#fff;
            margin:0;
            background-color:gray;
            font-size:18pt; /* or whatever */
        }
        .myDiv p {
            padding:4px;
        }
        #content {
            max-width: 1000px;
            margin: auto;
            left: 10%;
            right: 1%;
            position: absolute;
        }
        .foo {
            float: left;
            width: 15px;
            height: 15px;
            margin: 5px;
            border: 1px solid rgba(0, 0, 0, .2);
        }
        .navy {
            background: navy;
        }

        .orangered {
            background: orangered;
        }

        .plum {
            background: plum;
        }
        .gold{
            background: gold;
        }
        .lightgreen{
            background: lightgreen;
        }
    </style>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body >
<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="HomePage.php" class="w3-bar-item w3-button"><b>DB</b>-MaaRS</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="Form.php" class="w3-bar-item w3-button">Try Mutations</a>
            <a href="#Team" class="w3-bar-item w3-button">Team</a>
            <a href="#contact" class="w3-bar-item w3-button">Contact</a>
        </div>
    </div>
</div>
<br>
<br>
<br>
<table align="center">
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;&nbsp;Amino Acid's Charge:
        </td>
        <td>
            <div class="foo navy"></div>Positively Charged
        </td>
        <td>
            <div class="foo orangered"></div>Negatively Charged
        </td>
        <td>
            <div class="foo plum"></div>Polar Uncharged
        </td>
        <td>
            <div class="foo gold"></div>Special Cases
        </td>
        <td>
            <div class="foo lightgreen"></div>Hydrophobic
        </td>
    </tr>
</table>


<div align="center">
<form id="regForm" action="" method="post">
<?php
/**
 * Created by PhpStorm.
 * User: Archan Shah
 * Date: 18-02-2018
 * Time: 16:29
 */

$arrOfMut=array();
$arrOfMut1=array();
$arrOfFirst="";
$arrOfSec="";
$arrOfSec1="";
$num="";
$cont="";
$flag="0";
$r=0;
$n="";
$narr=array();
$mut="";
$mainFlag = "0";
$aflag=0;

$numOfC = $_SESSION['numOfC'];
if($numOfC==null)
{
    $numOfC=30;
}
    $data1 = $_SESSION['data1'];
    $c_m = $_SESSION['c_m'];
    $mailid = $_SESSION['mailid'];


    if ($data1 == null) {
        $mainFlag = "1";
    }

    $seq = $data->getSeq($con, $data1);

    $seq = str_replace("\n", '', $seq);
    $seq = preg_replace("/[^A-Z]+/", "", $seq);
    //echo $seq;
    $arrOfSeq = str_split($seq);
    $lenOfSeq = strlen($seq);

        $codes = $_SESSION['muts'];
        if ($codes == null) {
            $flag = "1";
            $mainFlag = "1";
        } else {
            $flag = "0";
        }

    if (strlen($codes) < 7) {
        $mainFlag = "1";
    }

    if ($flag === "0") {
        $arrOfCodes = explode(",", $codes);
    }
    $len = sizeof($arrOfCodes);
    echo "<h2>Sequence for $data1 showing $len mutations : </h2>";
    $cont.="<h2>Sequence for $data1 showing $len mutations : </h2>";
    echo "<br>";
    if ($mainFlag == "0") {

        for ($i = 0; $i < sizeof($arrOfCodes); $i++) {
            $arr = $arrOfCodes[$i];

            for ($j = 0; $j < 3; $j++) {
                if (is_numeric($arr[$j])) {
                    $mainFlag = "1";
                    break;
                } else {
                    $arrOfFirst .= $arr[$j];
                }
            }
            $ansOfFirst = $data->searchFirst($con, $arrOfFirst);
            if ($ansOfFirst == null) {
                $mainFlag = "1";
                break;
            } else {
                $mut .= $ansOfFirst;
                //echo "hiii";
            }

            for ($j = 0; $j < strlen($arr); $j++) {
                $a = $arr[$j];
                if (is_numeric($a)) {
                    $num .= $a;
                }
            }
            if ($num == null) {
                $mainFlag = "1";
                break;
            }
            if ($num > $lenOfSeq) {
                $mainFlag = "1";
                break;
            }
            $mut .= $num;

            if ($ansOfFirst != $arrOfSeq[$num - 1]) {
                $mainFlag = "1";
            }

            for ($j = strlen($arr) - 3; $j < strlen($arr); $j++) {
                if (is_numeric($arr[$j])) {
                    $mainFlag = "1";
                    break;
                } else {
                    $arrOfSec1 .= $arr[$j];
                }
            }

            $ansOfSec = $data->searchSecond($con, $arrOfSec1);
            if ($ansOfSec == null) {
                $mainFlag = "1";
                break;
            } else {
                //echo $ansOfSec;
                $mut .= $ansOfSec;
                $mut .= ",";
            }

            $ansOfSec = "";
            $num = "";
            $arrOfFirst = "";
            $arrOfSec = "";
            $arrOfSec1 = "";
        }
    }

    $arrOfMut = explode(",", $mut);
    $n = "";
    for ($i = 0; $i < sizeof($arrOfMut) - 1; $i++) {
        $ar = $arrOfMut[$i];
        for ($j = 0; $j < strlen($ar); $j++) {
            $p = $ar[$j];
            if (is_numeric($p)) {
                $n .= $p;
            }
        }
        $narr[$i] = $n;
        $n = "";
    }


    for ($i = 0; $i < (sizeof($arrOfMut) - 1); $i++) {
        for ($j = 0; $j < (sizeof($arrOfMut) - 2); $j++) {
            if ($narr[$j] > $narr[$j + 1]) {
                $temp = $arrOfMut[$j];
                $arrOfMut[$j] = $arrOfMut[$j + 1];
                $arrOfMut[$j + 1] = $temp;
                $temp1 = $narr[$j];
                $narr[$j] = $narr[$j + 1];
                $narr[$j + 1] = $temp1;
            }
        }
    }

    if ($mainFlag == "0") {

        $z = 0;
        $arr11 = "";
        $x = 0;
        $flag1 = 1;

        echo "<div id='tab'>";

        echo "<label>";
        $cont.="<b><table style='font-size: $fonts'><tr>";
        echo "<b><table style='font-size: $fonts'><tr>";
        $numbers = array();
        $abc = array();
        //echo "Size che  : ".sizeof($arrOfMut);
        for ($k = 0; $k < sizeof($arrOfMut) - 1; $k++) {
            $arr11 = $arrOfMut[$k];
            //echo $arr11."<br>";

            $num1 = 0;
            for ($j = 0; $j < strlen($arr11); $j++) {
                $m = $arr11[$j];
                if (is_numeric($m)) {
                    $num1 .= $m;
                }
            }
            $numbers[$k] = $num1 - 1;
            $abc[$k] = $arr11[strlen($arr11) - 1];

        }
        for ($z = 0; $z < sizeof($arrOfSeq); $z++) {
            //echo $z;
            $cont.="<td><table><tr><td>";
            echo "<td><table><tr><td>";
            if (($z) % $numOfC == 0) {
                $str = (string)$z+1;
                while(strlen($str)<4)
                {
                    $str = "0".$str;
                }
                $cont .= ($z + 1)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo($str)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            }
//             elseif ($z % $numOfC == 0) {
//                $cont.=$z + 1;
//                echo($z + 1);}
             else {
                $cont.='';
                echo "";
            }
            $cont.="<br></td>";
            echo "<br></td>";

            for ($i = 0; $i < sizeof($arrOfMut) - 1; $i++) {
                if ($z == $numbers[$i]) {
                    $flag1 = 0;
                    break;
                } else {
                    $flag1 = 1;
                }
            }
//            $cont.="<tr>";
//            echo "<tr>";

            if ($flag1 == 0) {
                $col= $data->getColor($con,$arrOfSeq[$z]);
                $cont.="<td style='border:black solid 2px;color: $col'>";
                echo "<td style='border:black solid 2px;color: $col'>";
                $cont.=$arrOfSeq[$z];
                echo $arrOfSeq[$z];
                $cont.="</td>";
                echo "</td>";
                if(($z+1) % $numOfC == 0) {
                    $cont.="<td>&nbsp;&nbsp;&nbsp;".($z + 1)."</td>";
                    echo "<td>&nbsp;&nbsp;&nbsp;".($z + 1)."</td>";
                }
                $cont.="</tr>";
                echo "</tr>";
//                $cont.="<br>";
//                echo "<br>";
                $col= $data->getColor($con,$abc[$x]);
                $cont.="<tr>";
                echo "<tr>";
                $cont.="<td></td><td style='border:black solid 2px;color:$col'>";
                echo "<td></td><td style='border:black solid 2px;color:$col'>";
                $cont.=$abc[$x];
                echo $abc[$x];
                $cont.="</td>";
                echo "</td>";
                $x++;

            }

            else {
                $cont.="<td>";
                echo "<td>";
                $cont.=$arrOfSeq[$z];
                echo $arrOfSeq[$z];
                $cont.="</td>";
                echo "</td>";
                if(($z+1) % $numOfC == 0) {
                    $cont.="<td>&nbsp;&nbsp;&nbsp;".($z + 1)."</td>";
                    echo "<td>&nbsp;&nbsp;&nbsp;".($z + 1)."</td>";
                }
                $cont.="<tr>";
                echo "<tr>";
                $cont.="<td></td><td>";
                echo "<td></td><td>";
                $cont.="&nbsp;"."</td>";
                echo "&nbsp;"."</td>";
//                $cont.="</tr>";
//                echo "</tr>";
            }


            $cont.="</tr>";
            echo "</tr>";

            $cont.="</table></td>";
            echo "</table></td>";
            if (($z + 1) % $numOfC == 0) {
                $cont.="</tr><tr></tr>";
                echo "</tr><tr></tr>";
            }
            elseif($z==sizeof($arrOfSeq)-1)
            {
                $cont.="</tr>";
                echo "</tr>";
            }
        }
        $cont.="</b></table>";
        echo "</b></table>";
        echo "</label>";
        echo "</div>";

        $_POST['c'] = $cont;
        ?>
        <input type="hidden" name="c" value="<?php $_POST['c'] ?>">
        <br>
        <br>
        <?php
        $pdbid = $data->getPDBid($con,$data1);
        if($pdbid != null){
            $link = "http://3dmol.csb.pitt.edu/viewer.html?pdb=".$pdbid."";

            echo "<div class='myDiv' ><h2>Structure ID : $pdbid</h2><iframe style=\"height: 500px; width: 600px;\" src=".$link."></iframe></div>";
        }
//        JMOLSCRIPT{color background white; zoom 1500; set spin x 10; set spin y 10; spin;}
        else{
            echo "PDB Id not available";
        }

    }
    else {
        $_SESSION['wrong'] = "Wrong";
        header('Location: Form.php');
    }
    ?>
    <br>
    <input class="button button5" type="submit" name="btn" value="Download PDF">
    <input class="button button5" type="submit"  name="mailbtn" value="Mail PDF">
</form>
</div>
</body>
<div>
    <div class="w3-container w3-padding-32" id="Team">
        <h3 style="width: 70%" class="w3-border-bottom w3-border-light-grey w3-padding-16">Team</h3>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <img src="w3images/team2.jpg" alt="Archan" style="height: 100px;width: 100px">
            <h3>Archan Shah</h3>
            <p class="w3-opacity">Student</p>
            <p>School of Computer Studies</p>
            <p>Ahmedabad University</p>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <img src="w3images/team1.jpg" alt="Aakanksha" style="height: 100px;width: 100px">
            <h3>Aakanksha Ranpura</h3>
            <p class="w3-opacity">Student</p>
            <p>School of Computer Studies</p>
            <p>Ahmedabad University</p>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <img src="w3images/team3.jpg" alt="Harsh" style="height: 100px;width: 100px">
            <h3>Harsh Ghodasara</h3>
            <p class="w3-opacity">Student</p>
            <p>School of Computer Studies</p>
            <p>Ahmedabad University</p>
        </div>
    </div>

    <div class="w3-container w3-padding-32" id="contact">
        <h3 style="width: 45%" class="w3-border-bottom w3-border-light-grey w3-padding-16">Contact</h3>
        <p>Lets get in touch and talk about your and our next project.</p>
        <form action="" target="_blank">
            <input class="w3-input" type="text" style="width: 30%" placeholder="Name" required name="Name">
            <input class="w3-input w3-section" style="width: 30%" type="text" placeholder="Email" required name="Email">
            <input class="w3-input w3-section" style="width: 30%" type="text" placeholder="Subject" required name="Subject">
            <input class="w3-input w3-section" style="width: 30%" type="text" placeholder="Comment" required name="Comment">
            <button class="w3-button w3-black w3-section" type="submit">
                <i class="fa fa-paper-plane"></i> SEND MESSAGE
            </button>
        </form>
    </div>
</div>
</html>
<?php
if(isset($_POST['btn']))
{
    require ("createPDF.php");
    $pdf = new pdf();
    $sid = session_id();
    if($pdf->createPdf($_POST['c'],$sid))
    {
        echo "<script>alert('Your file is successfully downloaded in your current folder.')</script>";
    }
    else{
        echo "<script>alert('Your file was unable to download\\nPlease try agian later')</script>";
    }
}
if(isset($_POST['mailbtn']))
{
    require ("createPDF.php");
    $pdf = new pdf();
    $sid = session_id();
    $pdf->createPdf($_POST['c'],$sid);
    exec('python Mail.py '.$sid.'.pdf '.$mailid,$op);
    if($op=="Something went wrong...")
    {
        echo "<script>alert('Your file could not be mailed\\nPlease try again later')</script>";
    }
    else{
        echo "<script>alert('Your file is successfully mailed')</script>";
    }
    unlink($sid.'.pdf');
}
?>



