<?php
/**
 * Created by PhpStorm.
 * User: Archan Shah
 * Date: 21-03-2018
 * Time: 18:37
 */
?>

<!DOCTYPE html>
<html>
<head>
<style>
    #regForm {
        background-color: #f2f2f2;
        margin: 60px auto;
        padding: 30px;
        width: 98%;
        min-width: 300px;
    }
    #content {
        max-width: 1000px;
        margin: auto;
        left: 10%;
        right: 1%;
        position: absolute;
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
<br>
<div id="regForm">
    <b style="font-size: 20px">What is DB-MaaRS ?</b>
    <br>
    <br>
    <div>
        A large amount of genomic and proteomic data is available for a variety of organisms,
        including the human genome. It is simply impossible to study all proteins experimentally,
        hence only a few are subjected to laboratory experiments while computational tools are used to
        extrapolate to similar proteins.
        <br>
        <br>
        aaRSs are indispensable components of all cellular protein translations machineries, and in humans they drive
        translation in both cytoplasm and mitochondria. Mutations in
        aaRSs have been implicated in a plethora of diseases including neurological conditions , metabolic disorders and cancer.
        <br>
        <br>
        <b>DB-MaaRS</b>(Database of Mutations in aaRSs) is a website used to visualize user-defined mutations on cytoplasmic or mitochondrian protein sequences
        and also exhibits 3D structure of the selected protein.<br> The user can then save or E-Mail the result.
        Additional functionalities have been provided to user for selection of font-size and number of characters of mutated protein sequence
        user wants in a line.
        <br>
        <br>
        <br>
    </div>
    <b style="font-size: 16px">Cytoplasm</b>
    <br>
    <div>
        The material or protoplasm within a living cell, excluding the nucleus.
        aaRS in cytoplasm attaches the appropriate amino acid onto its tRNA.<br>
        Their are 21 cytoplasmic aaRS available for selection to user.
    </div>
    <br>
    <br>
    <b style="font-size: 16px">Mitochondria</b>
    <br>
    <div>
        Mitochondria are organelles, or parts of a eukaryote cell. They are in the cytoplasm, not the nucleus.
        They make most of the cell's supply of adenosine triphosphate (ATP), a molecule that cells use as a
        source of energy. Their main job is to convert energy.
        Most of a cell's DNA is in the cell nucleus, but the mitochondrion has its own independent genome,
        hence it has its own corresponding aaRS.
        <br>
        Their are 20 mitochondrion aaRS available for selection to user.
    </div>
    <br>
    <br>
    <b style="font-size: 16px">Mutations</b>
    <br>
    <div>
        A mutation is the permanent alteration of the nucleotide sequence of the genome of an organism.
        Mutations in proteins can either have no effect, alter the product, or prevent the protein from functioning properly or completely.
        Mutated protein can have single amino acid change (minor, but still in many cases significant change leading to disease) or wide range amino acid changes.
        User can enter multiple mutations. User must input mutations in below specified format.
        <br>
        <b>Example: </b>ala10glu,arg24cys,his650met
        <br>
        Three letter code to be mutated, its position followed by three letter code of amino acid, user wants to replace
        the original amino acid with.
    </div>
</div>
</body>
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

</html>

