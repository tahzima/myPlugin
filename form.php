<form method="post" action="">
  <label>Full Name :</label>
  <input type="text" name="fullname"   placeholder="Full name " /><br>
  <label>Email :</label>
  <input type="email" name="email"   placeholder="Email" /><br>
  <label>subject :</label>
  <input type="text" name="subject"   placeholder="Subject" /><br>
  <label>content :</label>
  <textarea name="content"   placeholder="Your Message"></textarea><br>
  <input type="submit" name="save" value="Save" class="button-primary"  />
</form>

<?php
if(isset($_POST['save'])){
    insert_data();
}

function insert_data(){

  $connection = mysqli_connect('localhost','root','');
  mysqli_select_db($connection,"wordpress2");

    $fullName=$_POST['fullname'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $content=$_POST['content'];


    if( empty($fullName) || empty($email) || empty($subject) || empty($content))
    {
     echo '<h1 style="color:red;">All fields are required</h1>';

    }
    else
    {
         $query="INSERT INTO ContactUs (fullname,email,subjecte,content)" . "VALUES ('$fullName','$email','$subject','$content')";
         mysqli_query($connection,$query);
    }
}

?>