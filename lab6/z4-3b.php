<!DOCTYPE html>
<html>

<head>
    <title>Результаты теста</title>
</head>

<body>
    <?php
    $correctAnswers = array(6, 9, 4, 1, 3, 2, 5, 8, 7);

    $name = $_POST['name'];
    $userAnswers = $_POST['answers'];

    $score = 0;
    foreach ($userAnswers as $index => $answer) {
        if ($answer == $correctAnswers[$index]) {
            $score++;
        }
    }

    echo '<h1>Результаты теста</h1>';
    echo '<p>Имя тестируемого: ' . $name . '</p>';
    echo '<p>Количество правильных ответов: ' . $score . '</p>';
    echo '<p>Оценка: ';
    switch ($score) {
        case 9:
            echo "великолепно знаете географию";
            break;
        case 8:
            echo "отлично знаете географию";
            break;
        case 7:
            echo "очень хорошо знаете географию";
            break;
        case 6:
            echo "хорошо знаете географию";
            break;
        case 5:
            echo "удовлетворительно знаете географию";
            break;
        case 4:
            echo "терпимо знаете географию";
            break;
        case 3:
            echo "плохо знаете географию";
            break;
        case 2:
            echo "очень плохо знаете географию";
            break;
        default:
            echo "вообще не знаете географию";
            break;
    }
