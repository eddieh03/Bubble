<?php 
   include '../../Php/ProductCrudModel.php';
   $productsModel = new ProductCrudModel();
   $id = $_REQUEST['id'];
   $delete = $productsModel->delete($id);
    if ($delete) {
        echo "<script>alert('The product has been deleted successfully!');</script>";
        echo "<script>window.location.href = 'ProductsDashboard.php';</script>";
    }else {
        echo "<script>alert('Deletion failed!');</script>";
    }
