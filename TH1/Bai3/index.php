<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
// Đường dẫn tới file CSV
$filename = "Accounts.csv";

// Mảng chứa dữ liệu sinh viên
$students = [];

// Mở file CSV
if (($handle = fopen($filename, "r")) !== FALSE) {
    // Remove BOM
    $bom = fgets($handle, 4);
    if (!preg_match('/^\xEF\xBB\xBF/', $bom)) {
        rewind($handle);
    }
    // Đọc dòng đầu tiên (tiêu đề)
    $headers = fgetcsv($handle, 1000, ",");

    // Đọc từng dòng dữ liệu
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if (count($data) == count($headers) && !empty($data[0])) {
            $students[] = array_combine($headers, $data);
        }
    }
    // var_dump(file_exists($filename)); // Kiểm tra file tồn tại
    // var_dump($headers); // Xem header đọc được
}
// print_r($students);// In mảng sinh viên=>check
?>
    <div class="container mt-4">
        <h1 class="text-center">Student List</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <!-- username,password,lastname,firstname,city,email,course -->
                <?php foreach ($students as $st) {
                    if (!empty($st['username'])) {
                        echo "<tr>";
                        echo "<td>{$st['username']}</td>";
                        echo "<td>{$st['password']}</td>";
                        echo "<td>{$st['lastname']}</td>";
                        echo "<td>{$st['firstname']}</td>";
                        echo "<td>{$st['city']}</td>";
                        echo "<td>{$st['email']}</td>";
                        echo "<td>{$st['course']}</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>