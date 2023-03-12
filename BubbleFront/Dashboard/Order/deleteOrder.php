<?php 
   include '../../Php/OrderCrudModel.php';
   $orderModel = new OrderCrudModel();
   $id = $_REQUEST['id'];
   $delete = $orderModel->delete($id);
    if ($delete) {
        echo "<script>alert('The order has been deleted successfully!');</script>";
        echo "<script>window.location.href = 'OrderDashboard.php';</script>";
    }else {
        echo "<script>alert('Deletion failed!');</script>";
    }
