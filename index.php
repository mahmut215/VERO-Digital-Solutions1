<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta charset="UTF-8">
        <title>VERO Digital Solutions</title>
        
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
	<style type="text/css" class="init">
	
	</style>
	
	<script src="https://media.ethicalads.io/media/client/ethicalads.min.js"></script>

	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

	<script type="text/javascript" class="init">
	
function refresh (){
     const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("data").innerHTML = this.responseText;
    }
  xhttp.open("GET", "showTable.php", true);
  xhttp.send();
}
$(document).ready(function () {
	$('#example').DataTable();
        
        setInterval(refresh, 1000*60*60);
        
        $("input").change(function(e) {

    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

        var file = e.originalEvent.srcElement.files[i];

        var reader = new FileReader();
        reader.onloadend = function() {
             $('#blah').attr('src', reader.result);
        }
        reader.readAsDataURL(file);        }
});
});


	</script>
    </head>
    <body>
        
       
        
        <?php
//        include 'api_datas/first_api.php';
//        include 'pagenation/top.php';
//        , ,  and colorCode
       // include 'api/connect.php';
        ?>
    <div style="margin: 0 5% 0 5%" class="contaiar">
         <h1>VERO Digital Solutions</h1>
        <table id="example" class="table table-hover contaiar ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Color Code</th>
                    
                </tr>
            </thead>
            <tbody id="data">
      <?php
//include 'pagenation/bottom.php';
include 'showTable.php';
      ?>

            </tbody>
        </table>
         
         <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch Modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type='file' onchange="readURL(this);" /></label>
   <p>
      <strong>(Image will display below)</strong>
   </p>
      <div style="max-width: 100px; height: 100px; border:1px dashed black;">
   <img id="blah" width="100px" height="100px" src="#" alt="Your image goes here..." />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
