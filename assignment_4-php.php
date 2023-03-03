<?php
$tax = 0;
$total = 0;
$membership = "gold";
$tennis = "no";
$racquetball = "no";
$golf = "no";
$child_care = "no";
$personal_trainer = "no";
$swimming_pool = "no";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["tax"])) {
        $tax = test_input($_POST["tax"]);
    }

if (!empty($_POST["membership"])) {
    $membership = test_input($_POST["membership"]);
}

    if ($membership == "basic") {
        $total = 80;
    }
    elseif ($membership == "platinum") {
        $total = 100;
    }
    else {
        $total = 120;
    }

    if (isset($_POST["tennis"])) {
        $tennis = "yes";
        $total = $total + 15;
    }
    if (isset($_POST["racquetball"])) { 
        $racquetball = "yes";
        $total = $total + 20;
    }
    if (isset($_POST["golf"])) {
        $golf = "yes";
        $total = $total + 25;
    }

    if (isset($_POST["child_care"])) {
        $child_care = "yes";
        $total = $total + 15;
    }
    if (isset($_POST["personal_trainer"])) { 
        $personal_trainer = "yes";
        $total = $total + 20;
    }
    if (isset($_POST["swimming_pool"])) {
        $swimming_pool = "yes";
        $total = $total + 25;
    }

    $total = $total + $total * $tax;
    $total = round($total, 2);
}

?>

<html>
    <head>
        <title>Health Club (PHP)</title>
    </head>

    <body style="padding: 30px">
    <h2>Health Club (PHP)</h2>
    Franklin Covington <p>

    <form method="post" name="healthClubForm" id="healthClubForm"
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div style="float:left; width:130px; background-color:pink;">
        <dl>
            <dt>Membership
            <dt><input type="radio" name="membership" onchange="reloadForm"
                <?php if (isset($membership) && $membership=="basic") echo "checked";?>
                value="basic"> Basic
            <dt><input type="radio" name="membership" onchange="reloadForm"
                <?php if (isset($membership) && $membership=="platinum") echo "checked";?>
                value="platinum"> Platinum
            <dt><input type="radio" name="membership" onchange="reloadForm"
                <?php if (isset($membership) && $membership=="gold") echo "checked";?>
                value="gold"> Gold
        </dl>
    </div>

    <div style="float:left; width:180px; background-color:yellow;">
        <dl>
            <dt>Additional Charges (1)
            <dt><input type="checkbox" onchange="reloadForm"
                <?php if (isset($tennis) && $tennis=="yes") echo "checked";?> 
                name="tennis"> Tennis
            <dt><input type="checkbox" onchange="reloadForm"
                <?php if (isset($racquetball) && $racquetball=="yes") echo "checked";?>
                name="racquetball"> Racquetball
            <dt><input type="checkbox" onchange="reloadForm"
                <?php if (isset($golf) && $golf=="yes") echo "checked";?>
                name="golf"> Golf    
        </dl>
    </div>

    <div style="float:left; width:180px; background-color:red;">
        <dl>
            <dt>Additional Charges (2)
            <dt><input type="checkbox" onchange="reloadForm"
                <?php if (isset($child_care) && $child_care=="yes") echo "checked";?> 
                name="child_care"> Child Care
            <dt><input type="checkbox" onchange="reloadForm"
                <?php if (isset($personal_trainer) && $personal_trainer=="yes") echo "checked";?>
                name="personal_trainer"> Personal Trainer
            <dt><input type="checkbox" onchange="reloadForm"
                <?php if (isset($swimming_pool) && $swimming_pool=="yes") echo "checked";?>
                name="swimming_pool"> Swimming Pool    
        </dl>
    </div>

    <div style="clear:both">&nbsp;</div>

    <div style="float:left; width:150px; background-color:lightcoral;">
        <dl>
            <dt><input type="submit" value="Calculate Total">
            <dt><input type="submit" value="Clear">
        </dl>
    </div>

    <div style="float:left; background-color:lightgreen;">
        <dl>
            <dt>Tax: <input type="text" onchange="reloadForm" name="tax" value="<?php echo $tax;?>" size="10">
            <dt>Total: <input type="text" name="total" value="<?php echo $total;?>" size="10">
        </dl>
    </div>

<script>
    function reloadForm() {
        document.getElementById("healthClubForm").submit();
    }
</script>

</form>
</body>
</html>