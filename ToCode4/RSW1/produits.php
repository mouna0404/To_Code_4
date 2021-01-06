<?php
  // Se connecter à la base de données
  header('Content-Type: application/json');
  include("db_connect.php");
  $request_method = $_SERVER["REQUEST_METHOD"];
 function getProducts()
 {
   global $conn;
   $query = "SELECT * FROM produit";
   $response = array();
   $result = mysqli_query($conn, $query);
   while($row = mysqli_fetch_array($result))
   {
     $response[] = $row;
   }
   echo json_encode($response, JSON_PRETTY_PRINT);
  }
  function AddProduct()
   {
     global $conn;
     $name = $_POST["name"];
     $description = $_POST["description"];
     $price = $_POST["price"];
     $category = $_POST["category"];
     $created = date('Y-m-d H:i:s');
     $modified = date('Y-m-d H:i:s');
     echo $query="INSERT INTO produit(name, description, price, category_id, created, modified) VALUES('".$name."', '".$description."', '".$price."', '".$category."', '".$created."', '".$modified."')";
     if(mysqli_query($conn, $query))
     {
       $response=array(
         'status' => 1,
         'status_message' =>'Produit ajoute avec succes.'
       );
     }
     else
     {
       $response=array(
         'status' => 0,
         'status_message' =>'ERREUR!.'. mysqli_error($conn)
       );
     }
     
     echo json_encode($response);
   }
  switch($request_method)
  {
    case 'GET':
      if(!empty($_GET["id"]))
      {
        // Récupérer un seul produit
        $id = intval($_GET["id"]);
        getProducts($id);
      }
      else
      {
        // Récupérer tous les produits
        getProducts();
      }
      break;
      case 'POST':
        // Ajouter un produit
        AddProduct();
        break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }
?>
