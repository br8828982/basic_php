<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: consolas;
        }
    </style>
</head>
<body>
<div id="display">
    <?php
    function calculateSum(...$nums)
    {
        return array_reduce($nums, fn($acc, $num) => $acc + $num, 0);
    }

    function sumResult(...$nums)
    {
        return "Sum of " . implode(', ', $nums) . ": " . calculateSum(...$nums);
    }

    function calculateSquare(...$nums)
    {
        return array_map(fn($num) => $num ** 2, $nums);
    }

    function squareResult(...$nums)
    {
        return "Square of " . implode(', ', $nums) . ": " . implode(', ', calculateSquare(...$nums));
    }

    function findEvenNumbers(...$nums)
    {
        return array_filter($nums, fn($num) => $num % 2 === 0);
    }

    function evenResult(...$nums)
    {
        return "Even numbers in " . implode(', ', $nums) . ": " . implode(', ', findEvenNumbers(...$nums));
    }

    function sortDescending(...$nums)
    {
        usort($nums, fn($a, $b) => $b - $a);
        return $nums;
    }

    function descendResult(...$nums)
    {
        return "Descending order of " . implode(', ', $nums) . ": " . implode(', ', sortDescending(...$nums));
    }

    function sliceArray($start, $end, ...$nums)
    {
        return array_slice($nums, $start, $end - $start);
    }

    function slicedResult($indexes, ...$nums)
    {
        list($start, $end) = $indexes;
        return "Slice Array of " . implode(', ', $nums) . " from index $start to index $end: " . implode(', ', sliceArray($start, $end, ...$nums));
    }

    $fullName = 'First Middle Last';
    $splitName = explode(' ', $fullName);

    $commaSeparatedNames = 'First, Middle, Last';
    $removeCommas = str_replace(',', '', $commaSeparatedNames);

    function fetchData($success)
    {
        if (!$success) {
            throw new Exception('Unable to fetch data');
        }
        return 'Data fetched successfully';
    }

    function fetchDataSuccess()
    {
        try {
            $data = fetchData(true);
            echo "<br>Fetch data success: $data";
        } catch (Exception $error) {
            echo "<br>Fetch data error: {$error->getMessage()}";
        }
    }

    function fetchDataError()
    {
        try {
            $data = fetchData(false);
            echo "<br>Fetch data success: $data";
        } catch (Exception $error) {
            echo "<br>Fetch data error: {$error->getMessage()}<br><br>";
        }
    }

    echo sumResult(10, 20, 30, 40) . "<br><br>";
    echo squareResult(1, 2, 3, 4) . "<br><br>";
    echo evenResult(1, 2, 3, 4) . "<br><br>";
    echo descendResult(2, 1, 4, 3) . "<br><br>";
    echo slicedResult([0, 2, 3], 1, 2, 3, 4) . "<br><br>";
    echo "Current URL: {$_SERVER['REQUEST_URI']}<br><br>";
    echo "Remove Commas from Name: $removeCommas<br>";
    fetchDataSuccess();
    fetchDataError();

    foreach ($splitName as $i => $name):
        echo "Get Array from name " . ++$i . ": $name<br>";
    endforeach;

    class Person
    {
        private $name;
        private $age;

        public function __construct($name, $age)
        {
            $this->name = $name;
            $this->age = $age;
        }

        public function sayHello()
        {
            return "Hello, my name is $this->name and I am $this->age years old.";
        }
    }

    $person = new Person("John", 30);
    echo "<br>Class Example: {$person->sayHello()}<br>";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])):
        $submittedName = $_POST["name"];
        echo "<br>Submitted Name: $submittedName<br>";
    endif;
    ?>
</div>
<form action="" method="post" id="form">
    <input type="text" name="name">
    <input type="submit" value="submit">
</form>
</body>
</html>
