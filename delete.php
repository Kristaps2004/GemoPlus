<?php
if(isset($_GET['Kategorijas_ID'])){
    DelKategorija();
   }
elseif (isset($_GET['Lietotaja_ID'])) {
    DelLietotaji();
}
elseif (isset($_GET['Preces_ID'])) {
    DelPreces();
}
elseif (isset($_GET['Plaukta_ID'])) {
    DelNoliktava();
}

function DelLietotaji() {
    include 'backend/db_con.php';
    $sql = "DELETE FROM lietotaji WHERE Lietotaja_ID='" . $_GET["Lietotaja_ID"] . "'";
    if (mysqli_query($con, $sql)) {
        header("Location: darbinieki.php");
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
}

function DelKategorija() {
    include 'backend/db_con.php';
    //echo $row["Kategorijas_ID"];
    $sql = "DELETE FROM kategorijas WHERE Kategorijas_ID='" . $_GET["Kategorijas_ID"] . "'";
    if (mysqli_query($con, $sql)) {
        header("Location: kategorijas.php");
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
} 

function DelPreces() {
    $sql = "DELETE FROM preces WHERE Preces_ID='" . $_GET["Preces_ID"] . "'";
    if (mysqli_query($con, $sql)) {
        header("Location: preces.php");
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
}

function DelNoliktava() {
    $sql = "DELETE FROM noliktava WHERE Plaukta_ID='" . $_GET["Plaukta_ID"] . "'";
    if (mysqli_query($con, $sql)) {
        header("Location: noliktava.php");
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
