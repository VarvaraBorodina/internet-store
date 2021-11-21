<?php

namespace App\Controllers;

use App\Models\Product;

class CatalogController
{
    public function index(){
        render('catalog.php');
    }

    public function showProduct(){
        $product = Product::findById($_GET['id']);
        $allProducts = Product::selectAll();

        render('product.php', [
            'product' => $product,
            'products' => $allProducts
        ]);
    }

    public function showForm() {
        render("addProductForm.php");
    }
    public function saveProduct() {
        for($i = 0; $i < count($_FILES['images']['name']);$i++) {

            $MAX_SIZE = 1048576;

            $name = $_FILES['images']['name'][$i];
            $name = self::toCamelCase($name);

            $filePath = $_SERVER['DOCUMENT_ROOT'] . '/download/' . $name;
            $type = explode('/', $_FILES['images']['type'][$i]);

            if(filesize($_FILES['images']['tmp_name'][$i]) > $MAX_SIZE) {
                print_r('File '.$name.' is too big <br>');
            } else {
                if($type[0]!=="image") {
                    print_r('File '.$name.' has wrong file extension <br>');
                } else {
                    while (file_exists($filePath)) {
                        $filePath = $_SERVER['DOCUMENT_ROOT'] .'/download/'.self::renameFile($name);
                    }
                    move_uploaded_file($_FILES['images']['tmp_name'][$i], $filePath);
                }
            }
        }
    }

    private static function renameFile($name) {
        $symbols = 'qwertyuiopasdfghjklzxcvbnm1234567890';
        $extension = explode('.', $name);
        $extension = $extension[count($extension) - 1];
        return str_shuffle($symbols) . '.' . $extension;
    }

    private static function toCamelCase($str){
        $letterArray = [];
        preg_match_all('#.{1}#uis', $str, $letterArray);
        $letterArray = $letterArray[0];
        $result = "";
        for($i = 0; $i < count($letterArray); $i++) {
            if($letterArray[$i] == '_') {
                $i++;
                $result = $result.mb_strtoupper($letterArray[$i]);
            } else {
                $result = $result.$letterArray[$i];
            }
        }
        return $result;
    }

}