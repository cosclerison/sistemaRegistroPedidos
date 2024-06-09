<?php 

require_once('Product.php');

class ProductController{

    function create($input)
    {
        $create = new Product();
        $create->create($input);
    }

    function read($input = null)
    {
        
        $read = new Product();
        $products = $read->read($input);
        
        // var_dump("CONTROLLER", $products); exit;

        return $products;
    }

    function update($input)
    {
        $update = new Product();
        $update->delete($input);
    }


   function delete($input)
    {
        $delete = new Product();
        $delete->delete($input);
    }

}
