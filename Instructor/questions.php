<?php
require("../config.php");
?>

<script>
function showUser(str)
 {
 if (str=="")
   {
   document.getElementById("txtHint").innerHTML="";  
 return;
   } 
  if (window.XMLHttpRequest)
   {
// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();   
}
 else
   {
// code for IE6, IE5   
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");   
}
 xmlhttp.onreadystatechange=function()
   {
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
     { 
    document.getElementById("showsubcat").innerHTML=xmlhttp.responseText;
     }
   }
 //  alert(str);
xmlhttp.open("GET","getsubcategory_ajax.php?cat_id="+str,true); xmlhttp.send(); }
</script>


<div class="row">
<div class="col-sm-12">
 <form method="post" action="index.php?option=display_searched_question">
	<div class="form-group">
    <label for="exampleInputEmail1"><?php echo @$err;?></label>   
  	</div> 
  </div>
 </div> 


<div class="row">
<div class="container-fluid">
<div class="col-sm-4">
	 <div class="form-group">
    <label for="exampleInputEmail1">Select Technology</label>
    
  	<select class="form-control" onchange="showUser(this.value)" name="cat" id="catid"  required>
	<option value="">Select Technology</option>
	<?php 
	$que=mysql_query("select * from categories");
	 while($row= mysql_fetch_array($que))
	 {?>
		<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option> 
	 <?php }
	 
	?>	
	
	</select>
  
  </div> 
  </div>

<div class="col-sm-4">
	 <div class="form-group">
    <label for="exampleInputEmail1">Select Topic</label>
    <select class="form-control" id="showsubcat" name="subcat" required>
	<option value="">Select category</option>
	
	</select>
  </div> 
  </div>


  
  <div class="col-sm-4">
  <div class="form-group"><br/>
    <button name="search" class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
	
  </div>
  </div>
 </div> 
</div> 




<table class="table">
<tr class="danger"height="30px">
	<td colspan="11"><a href="index.php?option=add_questions" style="color:blue">Add New Questions</a></td>
</tr>
<tr class="success"height="30">
	<th>Question</th>
	<th>Answer 1</th>
	<th>Answer 2</th>
	<th>Answer 3</th>
	<th>Answer 4</th>
	<th>Right Answer</th>
	<th>Technolgoy</th>
	<th>Topic</th>	
	<th>Delete</th>
	<th>Update</th>	
</tr>

<?php 
$rs=mysql_query("select * from questions");
$i=1;
while($r=mysql_fetch_array($rs))
{
$id=$r[0];
echo "<tr class='active'>";
echo "<td>".$r[1]."</td>";
echo "<td>".$r[2]."</td>";
echo "<td>".$r[3]."</td>";
echo "<td>".$r[4]."</td>";
echo "<td>".$r[5]."</td>";
echo "<td>".$r[8]."</td>";

//technology
$res=mysql_query("select * from categories where id='".$r[9]."'");
$rr=mysql_fetch_array($res);
echo "<td>".$rr[1]."</td>";

//topic
$res=mysql_query("select * from subcategory where id='".$r[10]."'");
$rr=mysql_fetch_array($res);
echo "<td>".$rr[1]."</td>";



echo "<th><a href='delete_question.php?id=$id'><img src='img/delete2.png' width='30' height='30'/></a></th>

<th><a href='index.php?option=update_questions&id=$id'><img src='img/edit1.png' width='30' height='30'/></a>
</th>";
echo "<tr>";
$i++;
}
?>
</table>
</div>