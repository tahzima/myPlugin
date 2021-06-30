<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<table class="table" >
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
      <th scope="col">Content</th>
      <th scope="col" >response</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $connection = mysqli_connect('localhost','root','');
        mysqli_select_db($connection,"wordpress2");
            $query = "SELECT * FROM `contactus` order by id desc";
            $result = mysqli_query($connection, $query);
            while ($row = $result->fetch_assoc()) {
                echo '<tr ><td>'. $row["fullname"] . '</td><td>' . $row["email"] . '</td><td>' . $row["subjecte"] . '</td><td>' . $row["content"] . '</td><td><button type="button" class="btn btn-sm btn-dark" onclick="affiche(`'.$row["email"].'`)"><span class="dashicons dashicons-redo"></span></button>  <a href="./admin.php?page=contact-dashbord&id='.$row['id'].'" class="btn btn-sm btn-danger"><span class="dashicons dashicons-trash"></span></a></td></tr>';
            }
            ?>
  </tbody>
</table>
    <div class="content">
    <form method="post" action="" class="repanse">
        <h1>response</h1>
            <input type="hidden" class="email" name="email" value="tahzima.i@gmail.com">
            <textarea    placeholder="Your Message" name="repanse"></textarea><br>
            <input type="submit" name="save" value="Save" class="btn btn-light" name="save" />
      </form>
    </div>
    <?php
    if(isset($_POST['save'])){
        $to='tahzima.i@gmail.com';
        $subject='repanse';
        $msg=$_POST['repanse'];
        mail($to,$subject,$msg);
    }
   
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $connection = mysqli_connect('localhost','root','');
        mysqli_select_db($connection,"wordpress2");
        $query = "DELETE FROM `contactus` WHERE id=".$_GET['id'];
        mysqli_query($connection, $query);
        global $wp;
        $urlv=add_query_arg( $wp->query_vars, home_url() );
    }
    ?>
</body>
<style>
    h1{
        color: white;
    }
.content{
        display: none;
        text-align: center;
        position:fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(116, 115, 115, 0.5);
}
.repanse{
    padding-top: 40px;
    margin-top:30vh;
    height: 300px;
    width: 20%;
    border-radius: 10px;
    margin-left: 40%;
    background-color: black;
    color: white;
}
.repanse textarea{
    margin: 10px 0px 10px 0px;
}
</style>
<script>
    function affiche(val){
        document.querySelector('.content').style.display="block";
        document.querySelector('.email').value=val;
    }
    window.onclick = function(event) {
        if (event.target == document.querySelector('.content')) {
            document.querySelector('.content').style.display="none";
        }
    }
</script>
</html>

