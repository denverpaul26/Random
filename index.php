<!DOCTYPE html>
<html>
<head>
    <title>Grade Calculator</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .calculator { border: 2px solid #ccc; padding: 20px; width: 300px; }
        input, button { margin: 5px; padding: 5px; width: 90%; }
        .result { font-weight: bold; color: #333; margin-top: 15px; }
    </style>
</head>
<body>
    <h1>Grade Calculator</h1>
    
    <div class="calculator">
        <!-- Form para mag-input ng scores -->
        <form method="POST">
            <input type="number" name="quiz" placeholder="Quiz Score (30%)" required>
            <input type="number" name="assignment" placeholder="Assignment Score (30%)" required>
            <input type="number" name="exam" placeholder="Exam Score (40%)" required>
            <button type="submit">Calculate</button>
        </form>
        
        <?php
            // I-check kung na-submit ang form
            if ($_POST) {
                // Kuhanin ang input values mula sa form
                $quiz = $_POST['quiz'];          // Score ng Quiz
                $assignment = $_POST['assignment'];  // Score ng Assignment
                $exam = $_POST['exam'];          // Score ng Exam
                
                // Mag-assign ng weights (0.3 = 30%, 0.4 = 40%)
                $quizWeight = 0.3;     
                $assignmentWeight = 0.3;
                $examWeight = 0.4;

                // I-check kung lahat ng input ay nasa pagitan ng 0 at 100
                if (is_numeric($quiz) && is_numeric($assignment) && is_numeric($exam) && 
                    $quiz >= 0 && $quiz <= 100 &&
                    $assignment >= 0 && $assignment <= 100 &&
                    $exam >= 0 && $exam <= 100) {
                    
                    // Kalkulahin ang weighted average
                    $finalGrade = ($quiz * $quizWeight) + ($assignment * $assignmentWeight) + ($exam * $examWeight);
                    
                    // Tukuyin ang letter grade base sa final grade
                    if ($finalGrade >= 90) {
                        $letter = "A";
                    } elseif ($finalGrade >= 80) {
                        $letter = "B";
                    } elseif ($finalGrade >= 70) {
                        $letter = "C";
                    } elseif ($finalGrade >= 60) {
                        $letter = "D";
                    } else {
                        $letter = "F";
                    }
                    
                    // I-display ang resulta
                    echo "<p class='result'>Final Grade: ".number_format($finalGrade,1)." (Letter Grade: $letter)</p>";
                } else {
                    // Kung mali ang input (hindi number o lagpas sa 100)
                    echo "<p class='result' style='color:red;'>Invalid input! Scores must be between 0 and 100.</p>";
                }
            }
        ?>
    </div>
</body>
</html>
