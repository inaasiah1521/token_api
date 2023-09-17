<?php
require_once "koneksi.php";

//CRUD Tabel User
class User
{
   public  function get_users()
   {
      global $mysqli;
      $query="SELECT * FROM tbl_user";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get List Mahasiswa Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   public function get_user($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM tbl_user";
      if($id != 0)
      {
         $query.=" WHERE id=".$id." LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get Mahasiswa Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }

   public function get_token($token='')
   {
      global $mysqli;
      $query="SELECT * FROM tbl_user where token='".$token."'";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Token is valid',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   public function insert_user()
      {
         global $mysqli;
         $arrcheckpost = array('username' => '', 'password' => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         $token = md5($_POST['username']);
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($mysqli, "INSERT INTO tbl_user SET
               username = '$_POST[username]',
               password = '$_POST[password]',
               token = '$token'");
                
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'User Added Successfully.'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'User Addition Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function update_user($id)
      {
         global $mysqli;
         $arrcheckpost = array('username' => '', 'password' => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         $token = md5($_POST['username']);
         if($hitung == count($arrcheckpost)){
          
              $result = mysqli_query($mysqli, "UPDATE tbl_user SET
               username = '$_POST[username]',
               password = '$_POST[password]',
               token = '$token'
               WHERE id='$id'");
          
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'User Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'User Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function delete_user($id)
   {
      global $mysqli;
      $query="DELETE FROM tbl_user WHERE id=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'User Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'User Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
}

// CRUD tabel Mahasiswa
class Mahasiswa 
{
   public  function get_mhss()
   {
      global $mysqli;
      $query="SELECT * FROM tbl_mahasiswa";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get List Mahasiswa Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   public function get_mhs($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM tbl_mahasiswa";
      if($id != 0)
      {
         $query.=" WHERE id=".$id." LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get Mahasiswa Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   public function insert_mhs()
      {
         global $mysqli;
         $arrcheckpost = array('nim' => '', 'nama' => '', 'jk' => '', 'alamat' => '', 'jurusan'   => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         $token = md5($_POST['nim']);
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($mysqli, "INSERT INTO tbl_mahasiswa SET
               nim = '$_POST[nim]',
               nama = '$_POST[nama]',
               jk = '$_POST[jk]',
               alamat = '$_POST[alamat]',
               jurusan = '$_POST[jurusan]',
               token = '$token'");
                
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Mahasiswa Added Successfully.',
                     'token'=> $token
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Mahasiswa Addition Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function update_mhs($id)
      {
         global $mysqli;
         $arrcheckpost = array('nim' => '', 'nama' => '', 'jk' => '', 'alamat' => '', 'jurusan'   => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         $token = md5($_POST['nim']);
         if($hitung == count($arrcheckpost)){
          
              $result = mysqli_query($mysqli, "UPDATE tbl_mahasiswa SET
              nim = '$_POST[nim]',
              nama = '$_POST[nama]',
              jk = '$_POST[jk]',
              alamat = '$_POST[alamat]',
              jurusan = '$_POST[jurusan]',
              token = '$token'
              WHERE id='$id'");
          
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Mahasiswa Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Mahasiswa Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function delete_mhs($id)
   {
      global $mysqli;
      $query="DELETE FROM tbl_mahasiswa WHERE id=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Mahasiswa Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Mahasiswa Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
}
 
 ?>