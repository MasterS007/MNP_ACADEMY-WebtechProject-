<?php
       session_start();
       require_once('../../services/courseService.php');
       $id= $_SESSION['userid'];
       if(!isset($_COOKIE['username']) ){
   
           header('location: ../login.php?error=invalid_request');
       }

 ?> 
<!DOCTYPE html>
<html>
    <head>
    <meta charset = "UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../../asset/all_designs/Admin_designs/coursesStyle.css">
    <script type="text/javascript" src="../../asset/js/Admin_js/add_coursesScript.js"></script>
    <title>All Courses</title>
    </head>
    <body>
            <header>
                <p class="logo">MNP Academy</p>
                <nav>
                    <ul class="nav-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="AboutView.php">About</a></li>
                        <li><a href="#">Service</a></li>
                    </ul>
                </nav>
                <nav>
                    <ul class="nav-links">
                    <a  href="#"><button> </button></a>
                    <a  href="../../php/logout.php"><button>logout</button></a>
                   </ul>
               </nav>
            </header>
            <main>
                <div>
                	<ul>
                    <li class="imgbtn">jsbujruer</li>
                    <li><?php echo $_SESSION['name'];?></li>
                		<li><a href="AdminHome.php">Dashboard</a></li>
                		<li><a href="Add_Admin.php">Admin Profile</a></li>
                		<li>Manage Users</li>
                		<li><a href="coursesView.php">Courses</a></li>
                		<li>Learners</li>
                		<li><a href="about_us.php">About Us</a></li>
                		<li><a href="Manage_Blog.php">Manage Blog</a></li>
                	</ul>
                </div>
<!-- course design -->
                <div>
                   
                    <div class="UpperContainer">
                    <li><h2>Courses</h2></li>
                	<li><h2><input type ="button" value="Add new course" style="cursor:pointer;" onclick="popup_open()"> </h2></li>
                    </div>
                     

                    <div class="TableContainer">
                        <form>
                    <table>
                    
                        <tr >
                        
                            <td><h3>Course Name</h3></td>
                            <td><h3>Course Category</h3></td>
                            <td>Action</td>
                        </tr>
                        <?php 
                       $course=getAllCourse();
                       for($i=0;$i<count($course);$i++)
                       {
                        ?>
                        <tr>
                            <td><a href="course_info.php?course_id=<?=$course[$i]['course_id']?> &&course_name=<?=$course[$i]['course_name']?>"><h4 style="color:black;"><?=$course[$i]['course_name'];?></h4></a></td>
                            <td><h4><?=$course[$i]['course_category'];?></h4></td>
                            <td><a href="../../php/admin_php/CoursesCheck.php?courseName=<?=$course[$i]['course_name']?>"><input type="button" value="Delete"  onclick="return confirm('Are you want to delete<?=$course[$i]['course_name'];?>')"></a></td>
                        </tr>
                       <?php } ?>
                       
                        
                    </table> 
                   </form>
                    <!-- add course form -->
                    <div class="bg-modal" id="bg-modal">
                        <div class="modal-content">
                        <div class="close" onclick="popup_close()">+</div>
                     <form>
					        <table>
						    <tr>
							<td>Course Name</td>
							<td>:</td>
							<td><input id="course_name" name="title" type="text" onblur="courseValidation()" onkeyup="C_Remover()" ></td>
							<td><i  id="course_nameMsg" style="color:red; font-size: 10px;"></i></td>
						</tr>		
			
						<tr>
							<td>Course Category</td>
							<td>:</td>
							<td>
                                <select name="course_category" id="course_category">
                                <option></option>
                                    <?php
                                    $course_category=getAllCategory(); //from courseService.php;
                                    for($i=0;$i<count($course_category);$i++)
                                    {
                                    ?>
                                    <option value="<?=$course_category[$i]['category_name']?>"><?=$course_category[$i]['category_name']?></option>
                                    <?php
                                    }
                                    ?>
                                 </select>
							</td>
							<td ><i id="ST_Msg" style="color:white;font-size: 10px; white-space: pre;"  ></i></td>
						</tr>		
						
					 </table>
                     <input type="button" name="submit" value="add-course"  id="add-course" onclick="add_course()">
            		</form> 


                     </div>
                     </div>
                </div>

             </div>



            </main>
    </body>
    
</html>