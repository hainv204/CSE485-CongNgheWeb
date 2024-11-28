<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <h2>Bài thi trắc nghiệm</h2>
    <?php
        $filePath="Quiz.txt";
        if (file_exists($filePath)){
            $content=file($filePath);
            $question="";
            $opption=[];
            $answer="";
            foreach ($content as $line){
                if (strpos($line, "ANSWER:")===0){
                    $answer=trim(str_replace("ANSWER:","",$line));
                    if(!empty($question)){
                    echo '<div class="container mx-0 p-2">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<p class="question">'.htmlspecialchars($question).'</p>';
                    echo '<div class="options">';
                    foreach ($opption as $op){
                        echo '<p>'.htmlspecialchars($op).'</p>';
                    }
                    echo '</div>';
                    echo '<b>ANSWER: '.htmlspecialchars($answer).'</b>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    //Reset
                    $question="";
                    $opption=[];
                    $answer="";
                    }
                }else{
                    if (empty($question)){
                        $question=$line;
                    }else{
                        $opption[]=$line;
                    }
                }
            }
        }else{
            echo "File không tồn tại";
        }    
        ?>
    </div>
</body>

</html>