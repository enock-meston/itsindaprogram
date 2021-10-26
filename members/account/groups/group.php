<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
</head>
<body>


<div class="container">
    <div class="row">
        <h1>
            My Groups
        </h1>
       
    </div>
    <div class="row">
        <div class="m-b-30">
            <hr>
                    <button  class="btn waves-effect waves-light" style="background-color: #044598;" 
                    data-toggle="modal" data-target="#login">Add Group
                    <i class="mdi mdi-plus-circle-outline"></i></button>
            </div>
            <!-- model -->
 <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-md">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          
          <h4 class="modal-title"><strong> Add Your Group</strong></h4>
          <button type="button" class="close pull-left" data-dismiss="modal">&times</button>
        </div>
        <div class="modal-body">

            <form class="form-horizontal"  method="POST">
                
                        <div class="form-group">
                                    <label for="text">Group Name:</label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter Grroup Name" name="groupName">
                        </div>
                    
                        <div class="form-group">
                                    <label for="exampleTextarea1">Group Details</label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4" name="groupDetails"></textarea>
                                </div>
                 
                <div class="form-group">
                    <button class="btn bg-primary" type="submit" name="submit">
                        Save
                    </button>
                </div>

            </form>

        </div>
      </div>

    </div>
  </div>
<!-- end of model -->
    </div>


<!-- Group table -->
    <div class="row">
        <h4>Group Table</h4>
        <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Serial NUmber</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                <td>ID</td>
                                <td>Serial NUmber</td>
                                <td>Date</td>
                                </tr>
                           
                        </tbody>

                    </table>
                    <!-- end of table scaned computer -->
    </div>

    <!-- Ends of Group table -->
</div>



    
</body>
</html>
