
<html>
<body>
	<form class="#" method="post" enctype="multipart/form-data">
		<label class=" col-sm-3 control-label">Pictures</label>
        <div class="col-lg-6">
             <input type="file" class="form-control" name="roomimages[]" multiple="" id="roomimages" value="">
        </div>
        <div class="col-lg-offset-3 col-lg-6">
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </div>
	</form>
</body>
</html>

<?php

if(!empty($_POST["submit"]))
{
	foreach ($roomimages as $key => $value) {
		# code...
		echo "<script>alert('$value')</script>";
	}
}

?>