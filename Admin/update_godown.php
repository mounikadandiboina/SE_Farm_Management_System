<?php
 session_start();
if(isset($_SESSION['admin'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
 if(isset($_REQUEST['update'])=="true")
 {
 	include("connect.php");
	$i=$_REQUEST['upid'];
	$t=$_REQUEST['ta'];
	$g=$_REQUEST['t1'];
	$s=$_REQUEST['t2'];
	 
	mysql_query("update god_mngt set taluka='$t', godown_name='$g',stock='$s' where gid=$i") or die ("query fail");
	
	header("location:show_godown.php?msg=Godown has bee refilled...");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Farmer Land Information System</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
<script language="javascript" type="text/javascript">
function validate()
{
  
	if(document.getElementById('ta').value=="Somnath")
    { 
	   alert('plz select taluka');
	   document.getElementById('ta').focus();
	   return false;
	}
	
}
</script>

</head>

<body>
<table width="100%" border="1" align="center" class="background">
  <tr>
    <td colspan="3"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td width="22%"><table width="100%" border="1" class="table">
      <tr>
        <td><a href="add_godown.php">Add News</a></td>
      </tr>
      <tr>
        <td><a href="show_godown.php">Show News</a></td>
      </tr>
    </table></td>
    <td width="74%"><?php 
		include("connect.php");
		$i=$_REQUEST['uid'];
		$q=mysql_query("select * from god_mngt where gid=$i") or die ("query fail");
		$data=mysql_fetch_array($q);
	?>
        <form id="form1" name="form1" method="post" action="" onsubmit="return validate();">
          <input type="hidden" name="update" value="true" />
          <input type="hidden" name="upid" value="<?php echo $data['gid'];?>" />
          <table width="100%" border="1" class="table">
            <tr>
              <td colspan="3"><div align="center" class="font style1">Update Godown </div></td>
            </tr>
            <tr>
              <td class="font">Taluka</td>
              <td>&nbsp;</td>
              <td><input name="ta" type="text" id="ta" value="<?php
			  include("connect.php");
			  $a=$_REQUEST["uid"];
			  $q=mysql_query("select * from god_mngt where gid=$a");
			  $data=mysql_fetch_array($q);
			  echo $data['taluka'];
			  ?>" /></td>
            </tr>
            <tr>
              <td width="33%" class="font">Godown Name </td>
              <td width="2%">&nbsp;</td>
              <td width="65%"><label>
                <input name="t1" type="text" id="t1" value="<?php include("connect.php");
		        $a=$_REQUEST["uid"];
			    $q=mysql_query("select * from god_mngt where gid=$a");
				$data2=mysql_fetch_array($q);
				echo $data2['godown_name'];
				?>
				" size="20" maxlength="20" / readonly="">
              </label></td>
            </tr>
            <tr>
              <td class="font">Stock Available </td>
              <td>&nbsp;</td>
              <td><input name="t2" type="text" id="t2" value="<?php
			    $a=$_REQUEST["uid"];
			    $q=mysql_query("select * from god_mngt where gid=$a");
				$data2=mysql_fetch_array($q);
				echo $data2['stock'];
				?>
				
			  " /></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="center"><label>
                <input type="submit" name="Submit" value="Update" />
              </label></td>
            </tr>
          </table>
        </form></td>
    <td width="4%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
