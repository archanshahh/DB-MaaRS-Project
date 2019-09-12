<?php
$servername= "localhost";
$username = "root";
$pswd="";
$dbname = "project";
require("D:\spdproject\phpstorm\database.php");

$data = new data();
$con = new mysqli($servername,$username,$pswd,$dbname);
if($con->connect_error)
{
    echo "<script>alert('Connection Error\\nPlease Refresh this Page Or Try Again Later');</script>";
}
else{

}
session_start();
if($_SESSION['logflag']==1)
{
    echo "<script>window.location=\"admin.php\";</script>";
}
if(isset($_POST['logout']))
{
    $_SESSION['logflag']=1;
    echo "<script>window.location=\"admin.php\";</script>";
}
if (isset($_POST['insert'])){
    $id =$_POST['id'];
    $aars =$_POST['aars'];
    $c_m = $_POST['c_m'];
    $seq= $_POST['txtarea_seq'];
    $pdb_id = $_POST['pdb'];
    if($id==null || $aars==null || $c_m==null || $seq==null)
    {
        echo "<script>alert('Some fields are missing.\\nPlease fill them.');</script>";
    }
    else{
        if ($data->insert($con,$id,$aars,$c_m,$seq,$pdb_id)){
            echo "<script>alert('New record inserted.');</script>";
        }else{
            echo "<script>alert('Something went wrong...\\nPlease try again');</script>";
        }
    }
}
if (isset($_POST['delete'])){
    $aars =$_POST['aars'];
    if($data->searchaars($con,$aars))
    {
        $data->delete($con,$aars);
        echo "<script>alert('Record deleted.');</script>";
    }
    else{
        echo "<script>alert('Record was not found.');</script>";
    }
}
if (isset($_POST['btnshow'])){
    $aars =$_POST['aars'];
    $sh = $data->show($con,$aars);
    if($data->searchaars($con,$aars))
    {
        $_POST['s'] = $sh[1];
        $_POST['s1'] = $sh[0];
        $_POST['s2'] = $sh[2];
        $_POST['s3'] = $sh[3];
        $_POST['s4'] = $sh[4];
        ?>
        <input type="hidden" name="s" value="<?php $_POST['s'] ?>">
        <input type="hidden" name="s1" value="<?php $_POST['s1'] ?>">
        <input type="hidden" name="s2" value="<?php $_POST['s2'] ?>">
        <input type="hidden" name="s3" value="<?php $_POST['s3'] ?>">
        <input type="hidden" name="s4" value="<?php $_POST['s4'] ?>">
        <?php
    }
    else{
        echo "<script>alert('Record was not found.');</script>";
        $_POST['s'] = null;
        $_POST['s1'] = null;
        $_POST['s2'] = null;
        $_POST['s3'] = null;
        $_POST['s4'] = null;
        ?>
        <input type="hidden" name="s" value="<?php $_POST['s'] ?>">
        <input type="hidden" name="s1" value="<?php $_POST['s1'] ?>">
        <input type="hidden" name="s2" value="<?php $_POST['s2'] ?>">
        <input type="hidden" name="s3" value="<?php $_POST['s3'] ?>">
        <input type="hidden" name="s4" value="<?php $_POST['s4'] ?>">
        <?php
    }
}
$data1="";
if(isset($_POST['btnfetch']))
{
    $seqid = $_POST['id'];
    if($seqid==null)
    {
        $_POST['s3']=null;
        $_POST['s1'] = null;
        echo "<script>alert('Input ID.');</script>";
        ?>
        <input type="hidden" name="s3" value="<?php $_POST['s3'] ?>">
        <input type="hidden" name="s1" value="<?php $_POST['s1'] ?>">
        <?php
    }
    else{
        $url="https://www.uniprot.org/uniprot/".$seqid.".fasta";
        $urloutput=file_get_contents($url);
        $file = fopen('file.txt','w');
        fwrite($file, $urloutput);
        fclose($file);
        $file = fopen('file.txt','r');
        $data = fread($file,filesize('file.txt'));
        //$data = preg_replace("/[^A-Z]+/", "", $data);
        fclose($file);
        unlink('file.txt');
        $sp = explode("\n", $data);
        for ($i=1;$i<sizeof($sp);$i++)
        {
            $data1.= $sp[$i];
        }
        $_POST['s3']=$data1;
        $_POST['s1'] = $seqid;
        ?>
        <input type="hidden" name="s3" value="<?php $_POST['s3'] ?>">
        <input type="hidden" name="s1" value="<?php $_POST['s1'] ?>">
        <?php
    }
}

if(isset($_POST['update']))
{
    $id =$_POST['id'];
    $aars =$_POST['aars'];
    $c_m = $_POST['c_m'];
    $seq= $_POST['txtarea_seq'];
    $pdb_id = $_POST['pdb'];

    if($id==null || $aars==null || $c_m==null || $seq==null)
    {
        echo "<script>alert('Some fields are missing.\\nPlease fill them.');</script>";
    }
    else {
        if($data->update($con,$id,$aars,$c_m,$seq,$pdb_id))
        {
            echo "<script>alert('Record updated successfully.');</script>";
        }
        else{
            echo "<script>alert('Something went wrong...\\nPlease try again.');</script>";
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
            width: 60%;
            min-width: 300px;
        }
        input[type=text],input[type=number], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        #b {
            background-color: #4CAF50;
            color: white;
            padding: 10px 10px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 18%;

        }

        #b:hover {
            opacity: 0.8;
        }
        input[type=submit],input[type=reset] {
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
        #log{
            padding: 0px;
            width: 60px;
        }
        div {
            border-radius: 5px;
            background-color: #ffffff;
        }
        input{
            vertical-align: middle;
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
            <br>
            <form method="post">
            <input type="submit" id="log" style="float: right" name="logout" value="Logout">
            </form>
        </div>
    </div>
</div>
<br>
<br>
<form id="regForm" method="post">
    <label>Enter aaRS<sup style="color: red">*</sup> </label>
    <br>
    <input type="text" name="aars" value="<?php if(isset($_POST['btnshow'])){echo $_POST['s']; } ?>" style="width: 70%" placeholder="Enter aaRS.." >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span><input id="b" type="submit" style="height: 40px" name="btnshow" value="Show Details" ></span>
    <br>
    <label>Enter Sequence ID<sup style="color: red">*</sup> </label>
    <br>
    <input type="text"  style="width: 70%" name="id" value="<?php if(isset($_POST['btnshow'])){echo $_POST['s1']; }if (isset($_POST['btnfetch'])){echo $_POST['s1']; } ?>" placeholder="Enter ID..">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span><input id="b" type="submit" style="height: 40px" name="btnfetch" value="Fetch Sequence" ></span>
    <br>
    <label>Enter Class<sup style="color: red">*</sup> </label>
    <br>
    <input type="radio" name="c_m" value="c" <?php if(isset($_POST['btnshow'])) {if ($_POST['s2'] == 'c') : ?>checked="checked"<?php endif; }?>> <span style="color: gray">Cytoplasm</span>
    <br>
    <input type="radio" name="c_m" value="m" <?php if(isset($_POST['btnshow'])) { if ($_POST['s2'] == 'm') : ?>checked="checked"<?php endif ; }?>> <span style="color: gray">Mitochondria</span>
    <br>
    <br>
    <label>Enter Sequence<sup style="color: red">*</sup> </label>
    <br>
    <textarea rows="6" cols="94" name="txtarea_seq"><?php if(isset($_POST['btnshow'])){echo $_POST['s3'];}  if (isset($_POST['btnfetch'])){echo $_POST['s3'];}?></textarea>
    <br>
    <br>
    <label>Enter PDB ID </label>
    <br>
    <input type="text" name="pdb" value="<?php if(isset($_POST['btnshow'])){echo $_POST['s4']; } ?>" placeholder="Enter PDB ID..">
    <br>
    <br>
    <input id="b" type="submit"  name="insert" value="Insert" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input id="b" type="submit"  name="update" value="Update" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input id="b" type="submit"  name="delete" value="Delete" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input id="b" type="reset"  name="reset" value="Reset" >

</form>
</body>
</html>
