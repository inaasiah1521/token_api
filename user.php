<?php
require_once "method.php";
$user = new User();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $user->get_user($id);
         } elseif(!empty($_GET["token"]))
         {
            $token=$_GET["token"];
            $user->get_token($token);
         }
         else
         {
            $user->get_users();
         }
         break;
   case 'POST':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $user->update_user($id);
         }
         else
         {
            $user->insert_user();
         }     
         break; 
   case 'DELETE':
         $id=intval($_GET["id"]);
         $user->delete_user($id);
         break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
}
?>