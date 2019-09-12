<?php
class data{

    function data(){

    }

    function getSeq($con,$aaRS)
    {
        //echo $aaRS.$c_m;
        $sql1 = "select fasta_seq from fasta_seq_format WHERE aars='".$aaRS."' LIMIT 1 ";
        $q = $con->query($sql1);
        $row = $q->fetch_assoc();
        return $row['fasta_seq'];
//        $id= $row["seq_id"];
//
//        exec("python D:\spdproject\phpstorm\pythonsamp.py". " ".$id,$seq);
//        return $seq[0];

    }
    function getColor($con,$code)
    {
        $sql = "select color from amino_3_1 WHERE 1_code='".$code."' LIMIT 1";
        $q = $con->query($sql);
        $row = $q->fetch_assoc();
        return $row['color'];
    }
    function searchFirst($con,$first)
    {
        $sql = "select 1_code from amino_3_1 WHERE 3_code='".$first."' LIMIT 1";
        $q = $con->query($sql);
        //$q->data_seek(0);
        $row = $q->fetch_assoc();
        //echo $row["1_code"];
        return $row['1_code'];
    }
    function searchSecond($con,$second)
    {
        $que = "select 1_code from amino_3_1 WHERE 3_code='".$second."' LIMIT 1";
        $q1 = $con->query($que);
        //$q1->data_seek(0);
        $row1 = $q1->fetch_assoc();
        //echo $row["1_code"];
        return $row1['1_code'];
    }
    function dropc($con)
    {
        $array1 = array();
        $i=0;
        $que = "select aars from fasta_seq_format WHERE c_or_m='c'";
        $q1 = $con->query($que);
        while($row2 = $q1->fetch_assoc()){
            //echo (string)$row;
            $array1[$i] = $row2['aars'];
            $i++;
        }
        //$row1 = $q1->fetch_assoc();
        return $array1;
    }
    function dropm($con)
    {
        $array1 = array();
        $i=0;
        $que = "select aars from fasta_seq_format WHERE c_or_m='m'";
        $q1 = $con->query($que);
        while($row2 = $q1->fetch_assoc()){
            //echo (string)$row;
            $array1[$i] = $row2['aars'];
            $i++;
        }
        //$row1 = $q1->fetch_assoc();
        return $array1;
    }
    function getPDBid($con,$data1)
    {
        $sql = "select pdb_id from fasta_seq_format WHERE aars='".$data1."' LIMIT 1";
        $q = $con->query($sql);
        //$q->data_seek(0);
        $row = $q->fetch_assoc();
        //echo $row["1_code"];
        return $row['pdb_id'];
    }
    function validate($pwd,$uname,$con){


        $sql = "select username from login_table WHERE username='".$uname."' AND password='".$pwd."' LIMIT 1";
        $q = $con->query($sql);
        $row = $q->fetch_assoc();
        //echo $row['username'];
        if ($row == null)
        {
            return false;
        }else
        {
            return true;
        }
    }
    function insert($con,$sid,$aars,$class,$seq,$pdb){
        $sql = "INSERT INTO fasta_seq_format VALUES ('$sid','$aars','$class','$seq','$pdb')";
        if( $con->query($sql))
        {
            return true;
        }
        else{
            return false;
        }

    }
    function searchaars($con,$aars1)
    {
        $sql = "select seq_id from fasta_seq_format where aars='$aars1' LIMIT 1";
        $q=$con->query($sql);
        $row = $q->fetch_assoc();
        if ($row == null)
        {
            return false;
        }else
        {
            return true;
        }
    }
    function delete($con,$aars1)
    {
        $sql = "delete from fasta_seq_format where aars='$aars1'";
        $q=$con->query($sql);
        if(!$q)
        {
            return false;
        }
        else{
            return true;
        }
    }
    function show($con,$aars1)
    {
        $arr = array();
        $sql = "select * from fasta_seq_format where aars='$aars1' LIMIT 1";
        $q=$con->query($sql);
        $row = $q->fetch_assoc();
        $arr[0] = $row['seq_id'];
        $arr[1] = $row['aars'];
        $arr[2] = $row['c_or_m'];
        $arr[3] = $row['fasta_seq'];
        $arr[4] = $row['pdb_id'];
        return $arr;
    }
    function update($con,$id,$aars1,$c_m,$seq,$pdb_id)
    {
        $sql = "update fasta_seq_format set seq_id='$id',c_or_m='$c_m',fasta_seq='$seq',pdb_id='$pdb_id' WHERE aars='$aars1'";
        if( $con->query($sql))
        {
            return true;
        }
        else{
            return false;
        }
    }
}
?>
