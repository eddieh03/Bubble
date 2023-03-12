<?php 
   include '../../Php/ContactCrudModel.php';
   $contactModel = new ContactCrudModel();
   $id = $_REQUEST['id'];
   $delete = $contactModel->delete($id);
    if ($delete) {
        echo "<script>alert('The contact has been deleted successfully!');</script>";
        echo "<script>window.location.href = 'ContactDashboard.php';</script>";
    }else {
        echo "<script>alert('Deletion failed!');</script>";
    }
