<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
// Connect database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"]["tmp_name"];

    if (is_uploaded_file($file)) {

        $handle = fopen($file, "r");

        // Skip title
        fgetcsv($handle);

        // read line by line and insert into database
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $stmt = $conn->prepare("INSERT INTO tbusers (username, password, lastname, firstname, city, email, course) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
            $stmt->execute();
        }

        fclose($handle);

        echo '<div class="container mt-5">Save data successfully!</div>';
    } else {
        echo '<div class="container mt-5">Upload failed</div>';
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload list accounts</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Upload List Accounts</h1>

        <form action="./index.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file" class="form-label">Upload file:</label>
                <input type="file" class="form-control" id="file" name="file" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-primary">Save to database</button>
        </form>
    </div>
</body>

</html>