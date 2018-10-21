<?php
session_start();
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Result Management System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" />
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/layout.css"/>
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" />
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" />
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" />
         <link rel="stylesheet" href="css/main.css" media="screen" /> 

	<style>
        td:nth-child(odd) {background-color: #567C07}
		.td_1{
		  width:250px;
		  font-family: Poppins-Regular;
          font-size: 20px;
          line-height: 0.8;
          font-weight: unset !important;
          border:2px solid #fff;
          border-radius: 5px;
          }
          td{
            background-color: #4CAF50;
            color: white;
          }
		 #td_2{
		     border:2px solid #fff;
             border-radius: 5px;
		     font-size: 20px;
             font-family: verdana !important;
             width: 400px;
             padding: 10px;
             text-align: left;
             color: #fff;
             height: 50px;
             text-transform: uppercase;
		}
        
#main-menu > ul.menu {
    float: right;
    margin: 0px;
    padding: 0px;
    font-size: 16px;
    position: relative;
    z-index: 100;
        
}
#menu-main-menu {
    font-family: 'Droid Serif', serif;
    
}

ul {
    margin-bottom: 20px;
    list-style: none;
    list-style-position: inside;
    
}
li{
    display: inline;
    text-align: center;
    list-style: none;
    margin: 14px;
    font-size: 18px;
}
        
	</style>
		
    </head>
   <body style="background-image: url(images/back.png);">
    
    <div class="header3">
    <a><img  src="images/lagos.png" width="100%"/> </a> 
    
    <div class="nav">
    
    <nav  id="main-menu">
    <ul id="menu-main-menu" class="menu">
    <li> <a href="http://lsmjcmeiran.org/">Home</a></li> 
    <li> <a href="http://lsmjcmeiran.org/index.php/about/"> About  </a> </li> 
    <li> <a href="http://lsmjcmeiran.org/index.php/academics/">Academics</a></li> 
    <li>  <a href="http://lsmjcmeiran.org/index.php/gallery/">Gallery</a></li> 
    <li> <a href="http://lsmjcmeiran.org/index.php/parents-forum/">Parents&apos; Forum</a></li>
    <li> <a href="http://localhost/modelportal/portal.php" class="active">Result Portal </a></li>
    <li> <a href="http://lsmjcmeiran.org/index.php/news/">News</a> </li>
    <li><a href="http://lsmjcmeiran.org/index.php/contact/">Contact</a></li>
    </ul>
    </nav>
    </div>  <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">

         
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <!-- /.row -->
                          
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                                <div class="row">
                              
                             

                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
<?php
// code Student Data
//print_r($_POST);//die("stop am testing");
//$email='amit@gmail.com';
//$classid="4";//$_POST['class'];
function filter_inputs($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$examno  = isset($_POST['examno'])?     $_POST['examno']   : "";
$session = isset($_POST['session'])?    $_POST['session']  :"";
$classes = isset($_POST['classes'])?    $_POST['classes']  :"";
$term    = isset($_POST['term'])?       $_POST['term']     : "";
$arm     = isset($_POST['arm'])?        $_POST['arm']      : "";

$examno     = filter_inputs($examno);
$classes    = filter_inputs($classes);
$term       = filter_inputs($term);
$session    = filter_inputs($session);
$arm        = filter_inputs($arm);

//echo "exam no = $examno....classes = $classes.....term =  $term.....session  = $session... arm = $arm<br/>";//die();

    //$_POST['examno'];
if(strlen($examno)> 6){
    $examno  = substr($examno,9,10);
}


//$qery = "SELECT   tblstudents.StudentName,tblstudents.examno,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.examno=:examno and tblstudents.ClassId=:classid ";
$qery = "SELECT * from  users where Class='$classes' and Admission_No ='$examno' 
                                    and Arm='$arm' and Session ='$session'
                                    and Term='$term'";
                                    
//echo"qry = $qery<br/>";//die("Stop here");
 $result = mysqli_query($connect, $qery);
/*
$stmt = $dbh->prepare($qery,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//$stmt->bindParam(':examno',$examno,PDO::PARAM_STR);
//$stmt->bindParam(':classid',$classid,PDO::PARAM_STR);
$stmt->bindParam(':classes',$classes,PDO::PARAM_STR);
$stmt->bindParam(':examno',$examno,PDO::PARAM_STR);
$stmt->bindParam(':term',$term,PDO::PARAM_STR);
$stmt->bindParam(':session',$session,PDO::PARAM_STR);
$stmt->bindParam(':arm',$arm,PDO::PARAM_STR);
//$stmt->bindParam(':examno',$examno,PDO::PARAM_STR);
*//*
$result = mysqli_query($connect, $qery);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);//print_r($resultss);*/


if (mysqli_num_rows($result) > 0){//echo "affected records = ".count($result)."<br>";
$cnt=1;

//foreach($resultss as $row);
while($row = mysqli_fetch_assoc($result)) {//print_r($row);
$term = $row['Term']
?>
 <table>
 <tr>
 <td class="td_1"><b>Student Name :</b></td>
 <td id='td_2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$row['Name'];?></td>
 </tr>
 
 <tr>
 <td class="td_1"><b>Student Exam Id :</b></td>
 <td id='td_2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$row['Admission_no'];?></td>
 </tr>
 
 <tr>
 <td class="td_1"><b>Academic Session:</b></td>
 <td id='td_2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$row['Session'];?></td>
 </tr>
 
 <tr>
 <td class="td_1"><b>Term:</b></td>
 <td id='td_2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row['Term'])." TERM ". $row['Session'];?></td>
 </tr>
 </table>
 

 <!--
<p><b>Student Name :</b></p> &nbsp;<span><?php //echo $row['Name'];?></span>
<p><b>Student Exam Id :</b>&nbsp; <span><?php //echo $row['Admission_no'];?></span></p>
<p><b>Student Class:</b> <span>&nbsp;<?php //echo $row['Class'];?></span></p>
<p><b>Academic Session:</b>&nbsp;<span>(<?php //echo $row['Session'];?>)</span></p> 
<p><b>Term:</b><span> &nbsp; <?php //echo strtoupper($row['Term']). " TERM";?> (<?php //echo $row['Session']?>)</span></p>-->
<?php 
  }
?>
                                            </div>
                                            <div class="panel-body p-20">







                                                <table class="table table-hover table-bordered">
                                                


                                                	
                                                	<tbody>
<?php                                              
// Code for result
//$qery = "SELECT * from  photo2 WHERE (1 = 1)";
$qery = "SELECT filename from  photo2 WHERE filename LIKE '%$examno%'";
//echo"qry = $qery<br/>";die();
 //$query ="select * from  photo2 as tr on tr.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.examno=:examno and t.ClassId=:classid)";

                                    
 //echo"qry 2= $qery<br/>";//die("Stop here");
 $results = mysqli_query($connect, $qery);//print_r(mysqli_num_rows($results));
 $cnt=1;     
if (mysqli_num_rows($results) > 0)
{
    
while($row = mysqli_fetch_assoc($results)) {
    //
    //echo "am here <br/>";
    $file_name = htmlentities($row['filename']);
    if(!empty($file_name)){
        //
        $trimmed_filename = str_replace(".pdf", "", $file_name);
        //echo "filename = $file_name....trimmed filename = $trimmed_filename<br>";
    } 
    
    if (strpos($examno,$trimmed_filename) !== false) {
         //$trimmed_filename.='.pdf';
         //echo "2. examno = $examno....trimmed filename = $trimmed_filename<br>";
       echo" <tr>
            <th scope='row' colspan='2'>Your Result for $term TERM is available</th>           
            <td style='text-align:center'><b><a id='download1' onclick='downloads()'  href='#'>Click here to download </a> </b></td>
            </tr>";
         /*<td style='text-align:center'><b><a id='download1' onclick='downloads()'  target='_blank'  href='#'>Click here to download </a> </b></td>
         
         echo "<a class='menu' href='http://www.royallays.co.uk'
> onmouseover='status=\"Royal Lays (UK SITE)\"; return true'
> onmouseout='status=\"\"; return true'
> target='_top'>Royal Lays</a>";*/
         break;
    }
    /*else{
        //
        //echo htmlentities("Your Result is not yet uploaded! Please check again next time");
        //break;
    }*/
}
    ?>
<!-- 
                                                		<tr>
                                                <th scope="row"><?php //echo htmlentities($cnt);?></th>
                                                			<td><?php //echo htmlentities($result->SubjectName);?></td>
                                                			<td><?php //echo htmlentities($totalmarks=$result->marks);?></td>
                                                		</tr>
<?php 
//$totlcount+=$totalmarks;
//$cnt++;}
?>
<tr>
                                                <th scope="row" colspan="2">Total Marks</th>
<td><b><?php //echo htmlentities($totlcount); ?></b> out of <b><?php //echo htmlentities($outof=($cnt-1)*100); ?></b></td>
                                                        </tr>
<tr>
                                                <th scope="row" colspan="2">Percntage</th>           
                                                            <td><b><?php //echo  htmlentities($totlcount*(100)/$outof); ?> %</b></td>
                                                             </tr>
<tr>
                                                <th scope="row" colspan="2">Download Result</th>           
                                                            <td><b><a href="download-result.php">Download </a> </b></td>
                                                             </tr>-->

 <?php } else { ?>     
<div class="alert alert-warning left-icon-alert" role="alert">
                                            <strong>Notice!</strong> Your result not declare yet
 <?php }
?>
                                        </div>
 <?php 
 } else
 {?>

<div class="alert alert-danger left-icon-alert" role="alert">
<strong>Oh snap!</strong>
<?php
echo htmlentities("Invalid STudent Registration Id");
 }
?>
                                        </div>



                                                	</tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                    <div class="form-group">
                                                           
                                                            <div class="col-sm-6" >
                                                               <a href="index.php" style="color: #fff;"><span style="color: green;">Back to Home</span></a>
                                                            </div>
                                                        </div>

                                </div>
                                <!-- /.row -->
  
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                  
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <div class="row" style="background-color: #3A863A; text-align: center;">
             <div class="col-md-6">
             <small>
             <p class="text-muted text-center" style=" background-color: #3A863A; color:white; text-align: center; padding: 20px;" > Copyright &copy; <?php echo date("Y");?> Lagos State Model College - Meiran </p>
             </small>
             
             </div>
              <div class="col-md-6">
              <small>
             <p  class="text-muted text-center" style=" background-color: #3A863A; gray; text-align: center; padding: 20px;">
             <span style="color: #fff;">Developed By</span><a style="text-decoration:none; color: #fff;"href="http://boldlinks.com.ng/"> Boldlinks Technology Solutions</a>
             
             </p> </small>
             </div>
         </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="jquery/jquery-2.2.4.min.js"></script>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" />
        <script src="js/modernizr/modernizr.min.js"></script>
       

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== 
        <script src="js/main.js"></script>-->
        <script>
        
        /*function downloads(){
            document.getElementById("download1").src = "download-result.php?file=./result_uploads/uploads/filename";
        }*/
        function downloads(){
          
          var filenames = '<?=$trimmed_filename; ?>';
          $("#download1").on('click', function() {
              //alert("inside onclick And filename "+ filenames);
              window.location = "download-result.php?file=./result_uploads/uploads/"+filenames;
          });  
        }
        
        </script> 

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

    </body>
</html>
