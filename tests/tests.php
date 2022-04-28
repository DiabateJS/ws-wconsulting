<?php
include 'TestQueryStringParse.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST WS-WCONSULTING</title>
</head>
<style>
    .red {
        background-color: red;
    }
    .green {
        background-color: green;
    }
</style>
<?php
$test = new TestQueryStringParse();
$shouldParseQueryIsCorrect = $test->shouldParseQueryIsCorrect();
$shouldParseQueryIsCorrectLabel = "KO";
$shouldParseQueryIsCorrectClass = "red";
if ($shouldParseQueryIsCorrect){
    $shouldParseQueryIsCorrectLabel = "OK";
    $shouldParseQueryIsCorrectClass = "green";
}
?>
<body>
    <table border=1>
        <tr>
            <td>Test</td>
            <td>Resultat</td>
        </tr>
        <tr>
            <td>Query String Parsing</td>
            <td class="<?php echo $shouldParseQueryIsCorrectClass; ?>">
                <?php
                    echo $shouldParseQueryIsCorrectLabel;
                ?>
            </td>
        </tr>
    </table>
</body>
</html>