<?php
       session_start();
       require_once('../../services/Admin_Service/about_us.php');
       if(!isset($_SESSION['username'])){
   
           header('location: ../login.php?error=invalid_request');
       }

 ?> 
<!DOCTYPE html>
<html>
    <head>
        <title>
            MY Page
        </title>
        <link rel="stylesheet" type="text/css" href="../../asset/all_designs/Admin_designs/about_us.css">
        <meta charset = "UTF-8"/>
      
        <body>
            <header>
                <p class="logo">MNP ACADEMY</p>
                <nav>
                    <ul class="nav-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Service</a></li>
                    </ul>
                </nav>
                <nav>
                    <ul class="nav-links">
                    <a  href="#"><buttonp> </buttonp></a>
                    <a  href="#"><button>logout</button></a>
                   </ul>
            </nav>
            </header>
            <main >
                <div class="Gridviewdiv" >
                	<ul>
                    <li class="imgbtn">jsbujruer</li>
                    <li><?php echo $_SESSION['name'];?></li>
                		<li><a href="#">Dashboard</a></li>
                		<li><a href="Add_Admin.php">Admin Profile</a></li>
                		<li>Manage Users</li>
                		<li>Courses</li>
                		<li>Learners</li>
                		<li><a href="about_us.php">About Us</a></li>
                		<li><a href="Manage_Blog.php">Manage Blog</a></li>
                    </ul>
                    </div>
                    <div >
                        <div class="div-search">
                        <input type="text" name="search" placeholder="Search by title">
                        <input type="button">
                        </div>

                        <div class="div-show">
                              <div class="button-container-div">
                                  <input type="button" value="About Us">
                                  <input type="button" value="Add">
                                  <input type="button" name="View" value="View click" onclick="load()">
                              </div>
                              
                               
                    
                              <div class="Table">
                                  <table>
                                      <tr>
                                          <th >Id</th>
                                          <th>Title</th>
                                          <th>Sub Title</th>
                                          <th>Descriptions</th>
                                          <th>Actions</th>
                                
                                      </tr>
                                      <?php
                                          $aboutData=getAboutUs();
                                          for($i=0; $i<count( $aboutData);$i++)
                                          {
                                              ?>
                                            <tr>
                                                <td><?=$aboutData[$i]['Id']?></td>
                                                <td><?=$aboutData[$i]['Title']?></td>
                                                <td><?=$aboutData[$i]['SubTitle']?></td>
                                                <td><?=$aboutData[$i]['Descriptions']?></td>
                                               
                                          <td><a href="#">Edit</a>
                                          <a href="#">Delete</a>
                                          </td>
                                          </tr><?php
                                          }

                                 
                                         ?>
                                  </table>
                              </div>
                        </div>
                   </div>
                    
                 </div> 
                

                
                
            </main>
        
        </body>
    </head>
</html>