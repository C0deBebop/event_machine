<?php include '../includes/header.php'; ?>
<header>
    <h2><a href="/event_machine/">Event Machine</a></h2>
    <nav>
      <div><a href="/event_machine/signout/">Sign out</a></div>
    </nav>
</header>
  <div class="container">  
      <div id="">
      <?php
            require '../src/User.php'; 
            session_start();

            $db = new Database('host', 'username', 'password', 'database');
            $user = new User($db);
            $user_data = $user->check_for_profile($_POST['email'], $_POST['password']);
            $_SESSION['id'] = $user_data[0];
            $_SESSION['name'] = $user_data[1];
            $_SESSION['email'] = $user_data[2];
            $data = array('name' => $_SESSION['name'], 'email' => $_SESSION['email'], 'id' => $_SESSION['id']);
            echo "Hello, {$data['name']}";

        ?>
       </div>
    </div>   
<?php include '../includes/footer.php'; ?>
