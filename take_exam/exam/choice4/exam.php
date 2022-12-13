<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบทดสอบออนไลน์</title>
    <link rel="stylesheet" href="exam.css">
    <?php
    $id = $_GET['id'];
    include('connectdb.php');
    $sql = "SELECT COUNT('questionname') AS questioncount FROM question WHERE questionid = '$id' ";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $width = (int)$row['questioncount'] * 100;
    ?>
    <style>
        .pages {
            display: flex;
            width: <?php echo $width . "%"; ?>;
            box-sizing: border-box;
        }

        .question {
            border: 2px solid #000;
            padding: 10px;
            border-radius: 5px;
            font-size: 20px;
            background-color: rgba(0, 0, 0, .5);
        }

        input[type=text] {
            font-size: 20px;
            margin: 5px;
            padding: 3px 5px;
            width: 85%;
            color: #000;
            background-color: rgb(255, 255, 255, 0.9);
            border: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="check_answer.php" method="post">
            <div class="pages">
                <?php
                $id = $_GET['id'];
                include('connectdb.php');
                $sql = "SELECT *  FROM question WHERE questionid = '$id' ";
                $result = mysqli_query($conn, $sql);
                $order = 1;
                $by = 0;
                $count = mysqli_num_rows($result);

                // loop ข้อมูล
                while ($row = mysqli_fetch_assoc($result)) { $by++ ?>
                    <?php if ($order == '1') { ?>
                        <div class="page two">
                            <div class="question">
                                <label>ข้อที่ <?php echo $order++; ?></label>
                                <label><?php echo $row['questionname']; ?></label>
                                <br>
                                <input type="radio" name="ans<?php echo $by ?>" value="ก" required>
                                <input type="text" value="<?php echo $row['choice1'] ?>" disabled>
                                <br>
                                <input type="radio" name="ans<?php echo $by ?>" value="ข" required>
                                <input type="text" value="<?php echo $row['choice2'] ?>" disabled>
                                <br>
                                <input type="radio" name="ans<?php echo $by ?>" value="ค" required>
                                <input type="text" value="<?php echo $row['choice3'] ?>" disabled>
                                <br>
                                <input type="radio" name="ans<?php echo $by ?>" value="ง" required>
                                <input type="text" value="<?php echo $row['choice4'] ?>" disabled>
                            </div>
                            <div>
                                <!-- <button onClick="slide('prev')">Previous</button> -->
                                <button onClick="slide('next')" type="button">Next</button>
                            </div>
                        </div>
                    <?php } else if ($order < $count) { ?>
                        <div class="page two">
                            <div class="question">
                                <label>ข้อที่ <?php echo $order++; ?></label>
                                <label><?php echo $row['questionname']; ?></label>
                                <br>
                                <input type="radio" name="ans<?php echo $by ?>" value="ก" required>
                                <input type="text" value="<?php echo $row['choice1'] ?>" disabled>
                                <br>
                                <input type="radio" name="ans<?php echo $by ?>" value="ข" required>
                                <input type="text" value="<?php echo $row['choice2'] ?>" disabled>
                                <br>
                                <input type="radio" name="ans<?php echo $by ?>" value="ค" required>
                                <input type="text" value="<?php echo $row['choice3'] ?>" disabled>
                                <br>
                                <input type="radio" name="ans<?php echo $by ?>" value="ง" required>
                                <input type="text" value="<?php echo $row['choice4'] ?>" disabled>
                            </div>
                            
                            <div>
                                <button onClick="slide('prev')" type="button">Previous</button>
                                <button onClick="slide('next')" type="button">Next</button>
                            </div>
                        </div>
                    <?php } else if($order = $count) { ?>
                        <div class="page two">
                            <div class="question">
                                <label>ข้อที่ <?php echo $order++; ?></label>
                                <label><?php echo $row['questionname']; ?></label>
                                <br>
                                <input type="radio" name="ans<?php echo $by ?>" value="ก" required>
                                <input type="text" value="<?php echo $row['choice1'] ?>" disabled>
                                <br>
                                <input type="radio" name="ans<?php echo $by ?>" value="ข" required>
                                <input type="text" value="<?php echo $row['choice2'] ?>" disabled>
                                <br>
                                <input type="radio" name="ans<?php echo $by ?>" value="ค" required>
                                <input type="text" value="<?php echo $row['choice3'] ?>" disabled>
                                <br>
                                <input type="radio" name="ans<?php echo $by ?>" value="ง" required>
                                <input type="text" value="<?php echo $row['choice4'] ?>" disabled>
                            </div>
                            <div>
                                <button onClick="slide('prev')" type="button">Previous</button>
                                <button type="submit" onclick="return confirm('คุณต้องการลบหรือไม่!?')">ส่งคำตอบ</button>
                            </div>
                        </div>
                    <?php } ?>
                    <input type="hidden" name="anshidden<?php echo $by ?>" value="<?php echo $row['answer'] ?>">
                <?php } ?>
                <input type="hidden" value="<?php echo $by ?>" name="by">
            </div>
        </form>
    </div>

    <script>
        const pages = document.querySelectorAll(".page");
        const translateAmount = 100;
        let translate = 0;

        slide = (direction) => {

            direction === "next" ? translate -= translateAmount : translate += translateAmount;

            pages.forEach(
                pages => (pages.style.transform = `translateX(${translate}%)`)
            );
        }
    </script>

</body>

</html>