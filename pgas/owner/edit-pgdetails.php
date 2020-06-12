<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
    $eid=$_GET['editid'];
    $statename=$_POST['state'];
    $cityname=$_POST['city'];
    
    $pgname=$_POST['pgname'];
    $typepg=$_POST['typepg'];
    $rpmonth=$_POST['rpmonth'];
    $norooms=$_POST['norooms'];
    $address=$_POST['address'];
    $roomimages=$_POST['roomimages'];
    $electricity=$_POST['electricity'];

    $parking=$_POST['parking'];
    $ref=$_POST['refregerator'];
    $furnished=$_POST['furnished'];
    $ac=$_POST['ac'];
    $balcony=$_POST['balcony'];
    $table=$_POST['table'];
    $laundry=$_POST['laundry'];
    $security=$_POST['security'];
    $brekfast=$_POST['breakfast'];
    $lunch=$_POST['lunch'];
    $dinner=$_POST['dinner'];
     
    $query=mysqli_query($con, "update tblpg set StateName='$statename', CityName='$cityname', PGTitle='$pgname', Type='$typepg', RPmonth='$rpmonth',norooms='$norooms',Address='$address',Electricity='$electricity',Parking='$parking',Refregerator='$ref',Furnished='$furnished',AC='$ac',Balcony='$balcony',StudyTable='$table',Laundry='$laundry',Security='$security',MealsBreakfast='$brekfast',MealLunch='$lunch',MealDinner='$dinner' where ID='$eid'");
    if ($query) {
    $msg="PG details has been Updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  }
}
  ?>
<!DOCTYPE html>
<head>
<title>PG Accomodation System  | PG Updation </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script>
function getCity(val) { 
  $.ajax({
type:"POST",
url:"get-city.php",
data:'sateid='+val,
success:function(data){
$("#city").html(data);
}});
}
 </script>


</head>
<body>
<section id="container">
<!--header start-->
<?php include_once('includes/header.php');?>
<!--header end-->
<!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
    
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update Your PG
            </header>

            <div class="panel-body">
<?php if($msg){ ?>
<div class="alert alert-info" role="alert">
                    <strong>Message !</strong>  
    <?php echo $msg;}  ?>
                </div>

 

     <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblpg where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <form class="form-horizontal bucket-form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">PG Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="pgname" class="form-control" required="true" value="<?php  echo $row['PGTitle'];?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Choose State</label>
                        <div class="col-lg-6">
                           
                 <select class="form-control m-bot15" name="state" id="state" onChange="getCity(this.value);">
                                <option value="<?php echo $row['StateName'];?>"><?php echo $row['StateName'];?></option>
                                <?php $query1=mysqli_query($con,"select * from tblstate");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['StateName'];?>"><?php echo $row1['StateName'];?></option>
                  <?php } ?> 
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Choose City</label>
                        <div class="col-lg-6">
                          <select class="form-control m-bot15" name="city" id="city" required="true">
                 <option value="<?php echo $row['CityName'];?>"><?php echo $row['CityName'];?></option>
                            </select>  


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rent Per Month</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="rpmonth" name="rpmonth" type="text" required="true" value="<?php echo $row['RPmonth'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Number of Rooms</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="norooms" id="norooms" required="true" value="<?php echo $row['norooms'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-6">
                            <textarea type="text" class="form-control" name="address" id="address" value="" required="true"><?php echo $row['Address'];?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-sm-3 control-label">Pictures</label>
                        <div class="col-lg-6">
                             <img src="roomimages/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"><a href="changeimage.php?editid=<?php echo $row['ID'];?>">Edit Image</a>
                        </div>
                    </div>
                    <hr />
                    <div class="form-group has-success">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess" style="text-align: center; color: red">Facilities</label>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Electricity</label>
                        <div class="col-lg-6">
                            
<?php  if($row['Electricity']=="Yes"){ ?>
<input type="radio" id="electricity" name="electricity" value="Yes" checked="ture"> Yes
<input type="radio" id="electricity" name="electricity" value="No" > No
<?php } else { ?>
<input type="radio" id="electricity" name="electricity" value="Yes"> Yes
<input type="radio" id="electricity" name="electricity" value="No" checked="ture"> No
<?php } ?>
                            
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Parking</label>
                        <div class="col-lg-6">
<?php  if($row['Parking']=="Yes"){ ?>
<input type="radio" id="parking" name="parking" value="Yes" checked="ture"> Yes
<input type="radio" id="parking" name="parking" value="No" > No
<?php } else { ?>
<input type="radio" id="parking" name="parking" value="Yes"> Yes
<input type="radio" id="parking" name="parking" value="No" checked="ture"> No
<?php } ?>
                               
                           
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Refregerator</label>
                        <div class="col-lg-6">
<?php  if($row['Refregerator']=="Yes"){ ?>
<input type="radio" id="refregerator" name="refregerator" value="Yes" checked="ture"> Yes
<input type="radio" id="refregerator" name="refregerator" value="No" > No
<?php } else { ?>
<input type="radio" id="refregerator" name="refregerator" value="Yes"> Yes
<input type="radio" id="refregerator" name="refregerator" value="No" checked="ture"> No
<?php } ?>

                          </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Full Furnished</label>
                        <div class="col-lg-6">

<?php  if($row['Furnished']=="Yes"){ ?>
<input type="radio" id="furnished" name="furnished" value="Yes" checked="ture"> Yes
<input type="radio" id="furnished" name="furnished" value="No" > No
<?php } else { ?>
<input type="radio" id="furnished" name="furnished" value="Yes"> Yes
<input type="radio" id="furnished" name="furnished" value="No" checked="ture"> No
<?php } ?>
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">AC</label>
                        <div class="col-lg-6">
<?php  if($row['AC']=="Yes"){ ?>
<input type="radio" id="ac" name="ac" value="Yes" checked="ture"> Yes
<input type="radio" id="ac" name="ac" value="No" > No
<?php } else { ?>
<input type="radio" id="ac" name="ac" value="Yes"> Yes
<input type="radio" id="ac" name="ac" value="No" checked="ture"> No
<?php } ?>

                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Balcony</label>
                        <div class="col-lg-6">

<?php  if($row['Balcony']=="Yes"){ ?>
<input type="radio" id="balcony" name="balcony" value="Yes" checked="ture"> Yes
<input type="radio" id="balcony" name="balcony" value="No" > No
<?php } else { ?>
<input type="radio" id="balcony" name="balcony" value="Yes"> Yes
<input type="radio" id="balcony" name="balcony" value="No" checked="ture"> No
<?php } ?>
                           
                          </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Table/Study Lamp</label>
                        <div class="col-lg-6">
                           
<?php  if($row['StudyTable']=="Yes"){ ?>
<input type="radio" id="table" name="table" value="Yes" checked="ture"> Yes
<input type="radio" id="table" name="table" value="No" > No
<?php } else { ?>
<input type="radio" id="table" name="table" value="Yes"> Yes
<input type="radio" id="table" name="table" value="No" checked="ture"> No
<?php } ?>
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Laundry</label>
                        <div class="col-lg-6">
                           
<?php  if($row['Laundry']=="Yes"){ ?>
<input type="radio" id="laundry" name="laundry" value="Yes" checked="ture"> Yes
<input type="radio" id="laundry" name="laundry" value="No" > No
<?php } else { ?>
<input type="radio" id="laundry" name="laundry" value="Yes"> Yes
<input type="radio" id="laundry" name="laundry" value="No" checked="ture"> No
<?php } ?>

                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Security</label>
                        <div class="col-lg-6">
                           
<?php  if($row['Security']=="Yes"){ ?>
<input type="radio" id="security" name="security" value="Yes" checked="ture"> Yes
<input type="radio" id="security" name="security" value="No" > No
<?php } else { ?>
<input type="radio" id="security" name="security" value="Yes"> Yes
<input type="radio" id="security" name="security" value="No" checked="ture"> No
<?php } ?>
                          </div>
                    </div>
                    <hr />
                    <div class="form-group has-success">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess" style="text-align: center; color: red">Meals</label>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Choose meals which you offer with PG</label>
                  </div>


           <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Breakfast</label>
                        <div class="col-lg-6">
                           
<?php  if($row['MealsBreakfast']=="Yes"){ ?>
<input type="radio" id="breakfast" name="breakfast" value="Yes" checked="ture"> Yes
<input type="radio" id="breakfast" name="breakfast" value="No" > No
<?php } else { ?>
<input type="radio" id="breakfast" name="breakfast" value="Yes"> Yes
<input type="radio" id="breakfast" name="breakfast" value="No" checked="ture"> No
<?php } ?>
                          </div>
                    </div>


      <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Lunch</label>
                        <div class="col-lg-6">
                           
<?php  if($row['MealLunch']=="Yes"){ ?>
<input type="radio" id="lunch" name="lunch" value="Yes" checked="ture"> Yes
<input type="radio" id="lunch" name="lunch" value="No" > No
<?php } else { ?>
<input type="radio" id="lunch" name="lunch" value="Yes"> Yes
<input type="radio" id="lunch" name="lunch" value="No" checked="ture"> No
<?php } ?>
                          </div>
                    </div>

      <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Dinner</label>
                        <div class="col-lg-6">
                           
<?php  if($row['MealDinner']=="Yes"){ ?>
<input type="radio" id="dinner" name="dinner" value="Yes" checked="ture"> Yes
<input type="radio" id="dinner" name="dinner" value="No" > No
<?php } else { ?>
<input type="radio" id="dinner" name="dinner" value="Yes"> Yes
<input type="radio" id="dinner" name="dinner" value="No" checked="ture"> No
<?php } ?>
                          </div>
                    </div>


                    <hr />
<div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                    </div>
                                </div>

                </form>
            </div>
            <?php } ?>
        </section>



        <!-- page end-->
        </div>
</section>
 <!-- footer -->
		  <?php include_once('includes/footer.php');?>
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>

