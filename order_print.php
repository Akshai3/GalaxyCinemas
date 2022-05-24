<!DOCTYPE HTML>
<html>

<head>
  <title>GCTB</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    table {
      border-collapse: collapse;
      width: 50%;
      align-items: center;
      margin-left: auto;
      margin-right: auto;
      margin-top: 3%;
      border: 5px solid black;
    }

    th,
    td {
      padding: 15px;

    }

    th {
      text-align: center;
    }

    a {
      margin-left: 90%;
      margin-top: 8%;
    }
  </style>
</head>

<body>
  
    <div class="table-wrapper" id="empty">

      <div class="col-sm-9">
        <a href="#" onclick="printDiv()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
        
      </div>
      <div id="printArea">
        <table>
          <tr style="border: 5px solid black;">
            <th>Theatre Name</th>
            <th colspan="2" style="border: 5px solid black;   ">Date: 12/05/22</th>

          </tr>
          <tr>
            <td>Customer Name</td>
            <td rowspan="2" style="text-align:center; border-left:5px solid black; ">Quantity x 2</td>
          </tr>
          <tr>
            <td>Order Id</td>

          </tr>
          <tr>
            <td>Snack Name</td>
            <td rowspan="2" style="text-align:center; border-left:5px solid black">RS. 140</td>
          </tr>
          <tr>
            <td>Screen Name</td>

          </tr>
        </table>
      </div>
    </div>

</body>

</html>

<script>
  function printDiv() {
            var divContents = document.getElementById("printArea").innerHTML;
            var a = window.open('', '', 'height=1000, width=1000');
            a.document.write('<html>');
            a.document.write('<body >');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
</script>