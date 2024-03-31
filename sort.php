<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funda of Web IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Sort The List</h4>
                    </div>
                    <div class="card-body">
                        
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input-group mb-3">
                                        <select name="sort_numeric" class="form-control">
                                            <option value="">--Select Option--</option>
                                            <option value="low-high" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "low-high") { echo "selected"; } ?> > Low - High</option>
                                            <option value="high-low" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "high-low") { echo "selected"; } ?> > High - Low</option>
                                        </select>
                                        <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">
                                            Filter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Name</th>
                                    <th>Address</th>
                                    <th>Previous</th>
                                    <th>Current</th>
                                  
                                    <th>ID</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $con = mysqli_connect("localhost","root","","electricitybill");

                                $sort_option = "";
                                if(isset($_GET['sort_numeric']))
                                {
                                    if($_GET['sort_numeric'] == "low-high"){
                                        $sort_option = "ASC";
                                    }elseif($_GET['sort_numeric'] == "high-low"){
                                        $sort_option = "DESC";
                                    }
                                }
                                $query = "SELECT * FROM ebill ORDER BY previous-current $sort_option";
                                $query_run = mysqli_query($con, $query);
                                 
                                if(mysqli_num_rows($query_run) >0)
                              
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                            <tr>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['address']; ?></td>
                                                <td><?= $row['previous']; ?></td>
                                                <td><?= $row['current']; ?></td>
                                              
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['points']; ?></td>
                                                
                                            </tr>
                                        <?php
                                        
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>