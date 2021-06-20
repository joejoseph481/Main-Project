<head>
    <style type="text/css">
    #plant 
    {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #plant td, #plant th 
    {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #plant tr:nth-child(even){background-color: #f2f2f2;}

    #plant tr:hover {background-color: #ddd;}

    #plant th 
    {
      padding-top: 20px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
    #d1
    {
      padding: 20px;
    }
    #btnExport {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
 float: center;
}
.vertical-center {
  margin: 0;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
    </style>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>

<body>
       
  <div class="container" id="d1">
   <h1 style="text-align: center;padding: 10px;">REPORTS OF CATEGORY</h1> 
<?php
  require('config.php');
  $q2="SELECT * FROM `tblcategory` ;
  $result=mysqli_query($con,$q2);
?>
  <table id="Cat">

  <tr> <th> CAtegory name</th>
  <th>Description</th></tr>

<?php // start a table tag in the HTML
  while ($row = mysqli_fetch_array($result)){
  if ($result->num_rows > 0) { 
      // output data of each row
      while($row = $result->fetch_assoc()) 
      {
        echo "<tr><td>"  . $row['id'] . "</td><td>" . $row['CategoryName'] . "</td><td>" . $row['Description'] . "</td></tr>"; 
      }  
      echo "</table>";
       }
      else 
      {
        echo "0 results";
      }
?></div>
<div style="padding: 20px;">
  <center><button class="btn" id="btnExport" ><i class="fa fa-download"></i> Export</button></center>



</div>
<?php
  }
?>
<script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#d1')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Report.pdf");
                }
            });
        });
    </script>
</body>
