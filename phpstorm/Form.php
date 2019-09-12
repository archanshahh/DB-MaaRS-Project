<?php

$servername = "localhost";
$username = "root";
$pswd="";
$dbname = "project";
require("..\phpstorm\database.php");
$data = new data();
$con = new mysqli($servername,$username,$pswd,$dbname);

session_start();
if($_SESSION['wrong']=="Wrong")
{
    echo "<script type='text/javascript'>alert('Wrong Input !!!');</script>";
    $_SESSION['wrong']=null;
}
if(isset($_POST['submit1']))
{
//    if(isset($_POST['aars1']))
//    {
//        $data1 = $_POST['aars1'];
//        if($data1=="(Cytoplasm)")
//        {
//            $cmflag=1;
//        }
//        else{
//            $cmflag=0;
//            $c_m="c";
//        }
//    }
//    if($cmflag!=0) {
//        if (isset($_POST['aars1'])) {
//            $data1 = $_POST['aars1'];
//            if ($data1 == "(Mitochondria)" && $cmflag == 1) {
//                echo "<script type='text/javascript'>alert('Select Input');</script>";
//                $data1 = null;
//            } else {
//                $c_m = "m";
//            }
//        }
//    }
    if(isset($_POST['aars1']))
    {
        $data1 = $_POST['aars1'];
        if($data1=="(Cytoplasm)" || $data1=="(Mitochondria)")
        {
            echo "<script type='text/javascript'>alert('Select Input');</script>";
            $data1 = null;
        }
        else{
            $_SESSION['data1'] = $data1;
            $_SESSION['c_m']=$c_m;
            $_SESSION['muts'] = $_POST['muts'];
            $_SESSION['numOfC'] = $_POST['numOfC'];
            $_SESSION['fonts'] = $_POST['fonts'];
            $_SESSION['mailid'] = $_POST['mailid'];
            header('Location: finalfasta.php');
        }
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        #regForm {
                background-color: #f2f2f2;
                margin: 60px auto;
                padding: 30px;
                width: 70%;
                min-width: 300px;

            }
        #content {
            max-width: 1000px;
            margin: auto;
            left: 10%;
            right: 1%;
            position: absolute;
        }
        #s{
            width: 35%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=number], select{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .text{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #ffffff;
        }
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 350px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            top: 150%;
            left: 50%;
            margin-left: -175px;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            bottom: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: transparent transparent black transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
        }
        .container {
            display: inline;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size:14px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default radio button */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: lightgray;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input ~ .checkmark {
            background-color: gray;
        }

        /* When the radio button is checked, add a blue background */
        .container input:checked ~ .checkmark {
            background-color: #45a049;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .container input:checked ~ .checkmark:after {
            display: inline;
        }

        /* Style the indicator (dot/circle) */
        .container .checkmark:after {
            top: 7.5px;
            left: 7.5px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: white;
        }
    </style>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
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
<div>
    <form id="regForm" method="post">
        <label>Select aaRS<sup style="color: red">*</sup> <span class="tooltip">&#xFFFD;<span class="tooltiptext">Select aaRS corresponding to either cytoplasm or mitochondria</span></span></label>
        <br>
        <br>
        <label class="container"><input type="radio" onchange="this.form.submit(); " value="c" name="radio">Cytoplasm<span class="checkmark"></span></label>&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label class="container"><input type="radio" onchange="this.form.submit();" value="m" name="radio">Mitochondria<span class="checkmark"></span></label>&nbsp;

        <?php
        if(isset($_POST['radio']))
        {
            $_SESSION['rad'] = $_POST['radio'];
            if($_SESSION['rad'] == 'c')
            {
                ?>
                <br>
                <br>
        <select name="aars1">
            <option>(Cytoplasm)</option>
            <?php
                        $names = $data->dropc($con);
                        $c_m = "c";
                        foreach($names as $name) { ?>
                            <option value="<?php echo $name ?>"><?php echo $name ?></option>
                            <?php
                        } ?>
        </select>
        <?php
            }
            else{
        ?>
                <br>
                <br>
        <select name="aars1">
            <option>(Mitochondria)</option>-->

                        <?php
                        $names = $data->dropm($con);
                        $c_m = "m";
                        foreach($names as $name) { ?>
                            <option value="<?php echo $name ?>"><?php echo $name ?></option>
                            <?php
                        } ?>
        </select>
        <?php
            }
        }
        ?>
        <br>
        <br>
        <label for="lname">Enter Mutations<sup style="color: red">*</sup> <span class="tooltip">&#xFFFD;<span class="tooltiptext">Eg. ala10glu,arg24cys,his650met</span></span></label>
        <br>
        <input type="text" class="text" name="muts" placeholder="Try this: Select Cytoplasm (GRS II), Enter mutation: arg6ala.." required>
        <br>
        <br>
        <label for="lname">Select Number of Characters </label> <span class="tooltip">&#xFFFD;<span class="tooltiptext">Select number of single code amino acids to be displayed per row</span></span> <label style="color: gray">(Optional)</label>
        <br>
        <select name="numOfC">
            <option>20</option>
            <option>30</option>
            <option>40</option>
        </select>
        <br>
        <br>
        <label for="lname">Enter Font-Size</label>  <label style="color: gray">(Optional)</label>
        <br>
        <select name="fonts">
            <option>18</option>
            <option>16</option>
            <option>14</option>

        </select>
        <br>
        <br>
        <label>Enter your E-Mail ID<sup style="color: red">*</sup></label>
        <br>
        <input type="text" class="text" name="mailid" placeholder="Enter E-Mail ID.." required>
        <br>
        <br>
        <span style="display: flex; justify-content: center;">
        <input style="width: 50%;display: block" type="submit" name="submit1" value="Submit">
        </span>
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
