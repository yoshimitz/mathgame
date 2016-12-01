<?php 
session_start(); 

if (!(isset($_SESSION["email"]) && isset($_SESSION["password"]))) {
    header("Location: login.php"); 
    die();
}

if (isset($_POST["answer"])) {
    // Error message for wrong guess
    $message3 = "INCORRECT, ".$_SESSION["firstNum"]." ".$_SESSION["signVal"]." ".$_SESSION["secondNum"]." is ".$_SESSION["answer"];
    
    if (!(is_numeric($_POST["answer"]))) {
        header("Location: index.php?message1=You must enter a number for your answer."); 
        die();
    } elseif ($_POST["answer"] == $_SESSION["answer"]) {
        $_SESSION["guessed"] = $_SESSION["guessed"] + 1;
        $_SESSION["correct"] = $_SESSION["correct"] + 1;
        header("Location: index.php?message2=Correct."); 
        die();   
    } else {
        global $message3;
        
        $_SESSION["guessed"] = $_SESSION["guessed"] + 1;
        header("Location: index.php?message3=".$message3); 
        die();  
    }
}

?>
<?php include("include/header.php"); ?>
<form action="logout.php" method="post" role="form">
    <input type="submit" name="logout" value="logout" class="btn btn-default" />
</form>
<h1>Math Game</h1> 
<br />
<?php


// My random integers to add or subtract
$num1 = rand(0,20);
$num2 = rand(0,20);

$_SESSION["firstNum"] = $num1;
$_SESSION["secondNum"] = $num2;

// Decides whether to add or substract
$sign = rand(0,1);

if ($sign === 0) {
    echo "$num1 + $num2";
    
    $_SESSION["answer"] = $num1 + $num2;
    $_SESSION["signVal"] = "%2B";
} elseif ($sign === 1) {
    echo "$num1 - $num2";
    
    $_SESSION["answer"] = $num1 - $num2;
    $_SESSION["signVal"] = "-";
    }
?>
<form action="index.php" method="post" role="form" class="form-horizontal">
    <div>
        <br />
        <input type="text" class="form-control" name="answer" id="answer" 
               placeholder="Enter answer" />
    </div>
    <div>
        <br/>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
    </div>
</form>
<div>
    <hr />
</div>
<div class="error">
    <?php
    $message;
    $message3;
    if (!empty($_GET['message1'])) {
        $message = $_GET['message1'];
        echo $message;
    }
    
    if (!empty($_GET['message3'])) {
        $message3 = $_GET['message3'];
        echo $message3;
    }
    ?>
</div>
<div class="correct">
    <?php
        $message2;
    if (!empty($_GET['message2'])) {
        $message2 = $_GET['message2'];
         echo $message2;
    }
    ?>
</div>
<div>
    <?php
    echo "Score: ".$_SESSION["correct"]." / ".$_SESSION["guessed"];
    ?>
</div>
<?php include("include/footer.php"); ?>