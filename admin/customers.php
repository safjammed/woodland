<?php
$page_title="Manage Users";
include_once('../partials/adminhead.php');

function printAlluserDetails($db){
    try{
    $sql= "SELECT * FROM users";
    $statement = $db->prepare($sql);
    $statement -> execute();
    $html='';
    while ($row = $statement->fetch()) {
       $html .=  '<tr> <td>'.$row['fname'].'</td> <td>'.$row['lname'].'</td> <td>'.$row['email'].'</td> <td>'.$row['join_date'].'</td> <td>'.$row['phone_number'].'</td> <td>'.($row['verified'] == 1 ? 'Yes' : 'No').'</td> </tr>'; 

    }
    echo $html;
}catch(PDOException $ex){
    echo $ex->getMessage();
}
}
?>
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body">
                    <div class="page-title">                        
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-header">
                                    <h4> All Users</h4>
                                </div>
                                <div class="panel-body">
                                    <table class="datatable table table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Last Modified</th>
                                                <th>Phone Number</th>
                                                <th>Verified</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Last Modified</th>
                                                <th>Phone Number</th>
                                                <th>Verified</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>                                            
                                            <?php printAlluserDetails($db);?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
include_once('../partials/adminfooter.php');
?>