<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz_db";

// Connect database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"]["tmp_name"];
    
    if (is_uploaded_file($file)) {
        $content = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $question = "";
        $option = [];
        $answer = "";

        foreach ($content as $line) {
            $line = trim($line); // rm space begin and end of line
            if (empty($line)) continue;

            if (strpos($line, "ANSWER:") === 0) {
                // get answer
                $answer = trim(str_replace("ANSWER:", "", $line));
                
                // save question to database
                if (!empty($question) && count($option) === 4 && !empty($answer)) {
                    $stmt = $conn->prepare("INSERT INTO tbquizz (question, optiona, optionb, optionc, optiond, answer) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param(
                        "ssssss",
                        $question,
                        $option[0],
                        $option[1],
                        $option[2],
                        $option[3],
                        $answer
                    );

                    

                    // Reset question and option
                    $question = "";
                    $option = [];
                    $answer = "";
                }
            } elseif (preg_match('/^[A-D]\./', $line)) {
                // save option
                $option[] = trim(substr($line, 2)); // get content rm "A. "...
            } else {
                // create question
                $question .= $line . " ";
            }
        }

        echo "<div>Save data successfully!</div>";
    } else {
        echo "<div>Upload failed</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Quiz</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Upload Quiz</h1>

        <form action="./index.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file" class="form-label">Upload file</label>
                <input type="file" class="form-control" id="file" name="file" accept=".txt" required>
            </div>
            <button type="submit" class="btn btn-primary">Save to database</button>
        </form>
    </div>
</body>

</html>