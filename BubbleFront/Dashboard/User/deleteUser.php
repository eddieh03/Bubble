<?php 
   include '../../Php/UserCrudModel.php';
   $userModel = new UserCrudModel();
   $id = $_REQUEST['id'];
   $delete = $userModel->delete($id);
    if ($delete) {
        echo "<script>alert('The user has been deleted successfully!');</script>";
        echo "<script>window.location.href = 'UsersDashboard.php';</script>";
    }else {
        echo "<script>alert('Deletion failed!');</script>";
    }
