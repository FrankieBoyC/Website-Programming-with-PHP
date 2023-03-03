<?php
$exam1 = 0;
$exam2 = 0;
$average = "";
$status = "";
$grade = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["exam1"])) {
        $exam1 = test_input($_POST["exam1"]);
    }

    if (!empty($_POST["exam2"])) {
        $exam2 = test_input($_POST["exam2"]);
    }

    $average = ($exam1 + $exam2) / 2;
    $average = round($average, 2);

    if ($average >= 70) {
        $status = "Passing";
    } else {
        $status = "Failing";
    }

    if ($average >= 90) {
        $grade = "A";
    }
    elseif ($average >=80) {
        $grade = "B";
    }
    elseif ($average >=70) {
        $grade = "C";
    }
    elseif ($average >=60) {
        $grade = "D";
    }
    else {
        $grade = "F";
    }
}
?>
<html>
<head>
    <title> PHP Grade Calculator </title>
</head>

<body>
<h2> PHP Grade Calculator </h2>
Franklin Covington <p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Exam 1: <input type="text" name="exam1" value="<?php echo $exam1;?>"> <p>
Exam 2: <input type="text" name="exam2" value="<?php echo $exam2;?>"> <p>

<input type="submit" value="Calculate Answer"> <p>
Average: <input type="text" name="average" value="<?php echo $average;?>"> <p>
Status: <input type="text" name="status" value="<?php echo $status;?>"> <p>
Grade: <input type="text" name="grade" value="<?php echo $grade;?>"> <p>

</form>

</body>
</html>