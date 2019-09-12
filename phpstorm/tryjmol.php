<?php
/**
 * Created by PhpStorm.
 * User: Archan Shah
 * Date: 05-04-2018
 * Time: 13:34
 */

?>
<!DOCTYPE html>
<html>
<title>A simple Jsmol example</title>
<head>
    <script type="text/javascript" src="jsmol/JSmol.min.js"></script>
    <script type="text/javascript" src="jsmol/js/JSmoljQueryExt.js"></script>
    <script type="text/javascript" src="jsmol/js/JSmolCore.js"></script>
    <script type="text/javascript" src="jsmol/js/JSmolApplet.js"></script>
    <script type="text/javascript" src="jsmol/js/JSmolApi.js"></script>
    <script type="text/javascript" src="jsmol/js/j2sjmol.js"></script>
    <script type="text/javascript" src="jsmol/js/JSmol.js"></script>
    <!-- // following two only necessary for WebGL version: -->
    <script type="text/javascript" src="jsmol/js/JSmolThree.js"></script>
    <script type="text/javascript" src="jsmol/js/JSmolGLmol.js"></script>

    <script type="text/javascript">
        var Info = {
            width: 300,
            height: 300,
//  serverURL: "http://chemapps.stolaf.edu/jmol/jsmol/jsmol.php ",
            serverURL: "http://propka.ki.ku.dk/~jhjensen/jsmol/jsmol.php ",
            use: "HTML5",
            j2sPath: "jsmol/j2s",
            console: "jmolApplet0_infodiv"
        }
    </script>
</head>
<body>
<script type="text/javascript">
    jmolApplet0 = Jmol.getApplet("jmolApplet0", Info);
    Jmol.script(jmolApplet0,"background black;load 2PME.pdb; spin on")
</script>
<br>
<a href="javascript:Jmol.script(jmolApplet0,'spin on')">spin</a>
<a href="javascript:Jmol.script(jmolApplet0,'background white')">spin</a>
<a href="javascript:Jmol.script(jmolApplet0,'spin off')">off</a>
</body>
