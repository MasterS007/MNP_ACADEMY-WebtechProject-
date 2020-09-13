<?php
     session_start();
     require_once('../../services/courseService.php');
     require_once('../../services/instructor_service/course_instructorService.php');
     require_once('../../services/instructor_service/learner_instructorService.php');
     if(!isset($_SESSION['username'])){
 
         header('location: ../login.php?error=invalid_request');
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../asset/all_designs/instructor_designs/insideclassdesign.css">
    <title>Class Materials</title>
</head>
<body>
    <header>
        <nav>
            <select class="comboBox">
                <option value="Course" selected disabled hidden>Cources</option>
                <optgroup label="Science">
                <?php
                    $courseN = getByCategory('Science');
                    for ($i=0; $i<count($courseN); $i++)
                    { ?>
                        <option value="<?php echo $courseN[$i];?>"><?php echo $courseN[$i]['course_name'];?>
                        </option>
                    <?php }?>
                    </optgroup>
                <optgroup label="Computer Science">
                <?php
                    $courseN = getByCategory('Computer Science');
                    for ($i=0; $i<count($courseN); $i++)
                    { ?>
                        <option value="<?php echo $courseN[$i];?>"><?php echo$courseN[$i]['course_name'];?>
                        </option>
                    <?php }?>

                </optgroup>
                <optgroup label="Programming Language">
                <?php
                    $courseN = getByCategory('Programming Language');
                    for ($i=0; $i<count($courseN); $i++)
                    { ?>
                        <option value="<?php echo $courseN[$i];?>"><?php echo$courseN[$i]['course_name'];?>
                        </option>
                    <?php }?>

                </optgroup>
            </select>
            <ul class="navigation">
                <li class="searchBox"><input type="text" name="search" placeholder="Search.."></li>
                <li class="logo"><a href="dashboard.php">MNP Academy</a></li>
            </ul>
        </nav>
   </header>

       <div class="verticleLine"></div>
    <main>
        <div>
            <h4 class="class_headeing"><?= 'Class:'.$_GET['courseName']?></h4>
        </div>

        <div class="class_materials">
            <ul>
                <li><a href="../view/insideClass.php">Students</a></li>
                <li><a href="../view/postComment.php">Post</a></li>
                <li><a href="../view/files.php">Files</a></li>
                <li><a href="#">Assignments</a></li>
                <li><a href="../view/grade.php">Grades</a></li>
                <li><a href="../view/grade.php">Settings</a></li>
             
            </ul>
        </div>

        <div class="students">
            <form>
                <fieldset>
                   <legend class="title">Enrolled Students List</legend>
                   <table class="student_table">
                    <tr>
                        <td>Student Name</td>
                        <td>Email</td>

                    <tr>
                    <tr>
                        <td colspan="3"><hr></td>
                    </tr>
                    <?php
                     $Insid=$_SESSION['userid'];
                     $courseName=$_GET['courseName'];
                     $learnersId=showLearners($Insid, $courseName);
                     for($i=0; $i<count($learnersId);$i++)
                     {
                        $learners_info=getByID($learnersId[$i]['learner_id']);
                        ?>
                        <tr>
                        <td><?=$learners_info['u_name']?></td>
                        <td><?=$learners_info['email']?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><hr></td>
                    </tr>
                    <?php
                     }
                    
                    ?>
                   </table>        
                </fieldset>
            </form>
        </div>
    </main>

    <footer>
    
    </footer>
</body>
</html>
