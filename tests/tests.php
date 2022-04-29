<?php
include '../utils/Constants.php';
include './TestRequestParsing.php';
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
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .font-test-style {
        color: white;
        font-weight: bold;
        text-align: center;
    }
    .red {
        background-color: red;
    }
    .green {
        background-color: green;
    }

    table {
        width: 800px;
    }

    .table-title {
        font-size: 20px;
        border-bottom: 2px solid red;
    }

    .test-title {
        border-left: 5px solid orange;
    }
</style>
<?php
$test = new TestRequestParsing();
$shouldParseQueryIsCorrect = $test->shouldParseQueryIsCorrect();
$shouldParseQueryIsCorrectLabel = $shouldParseQueryIsCorrect ? Constants::$TEST_OK : Constants::$TEST_KO;
$shouldParseQueryIsCorrectClass = $shouldParseQueryIsCorrect ? Constants::$CLASS_GREEN : Constants::$CLASS_RED;

$shouldGetRequestMethodIsCorrect = $test->shouldGetRequestMethodIsCorrect();
$shouldGetRequestMethodIsCorrectLabel = $shouldGetRequestMethodIsCorrect ? Constants::$TEST_OK : Constants::$TEST_KO;
$shouldGetRequestMethodIsCorrectClass = $shouldGetRequestMethodIsCorrect ? Constants::$CLASS_GREEN : Constants::$CLASS_RED;


?>
<body>
    <table>
        <tr>
            <td class="table-title">Tests</td>
            <td class="table-title">Resultats</td>
        </tr>
        <tr>
            <td class="test-title">Query String Parsing</td>
            <td class="font-test-style <?= $shouldParseQueryIsCorrectClass ?>">
                <?= $shouldParseQueryIsCorrectLabel ?>
            </td>
        </tr>
        <tr>
            <td class="test-title">Get Request Method</td>
            <td class="font-test-style <?= $shouldGetRequestMethodIsCorrectClass ?>">
                <?= $shouldGetRequestMethodIsCorrectLabel ?>
            </td>
        </tr>
    </table>
</body>
</html>