<?php include '../includes/header.php'; ?>
<?php require '../src/User.php'; 

  $name = addslashes($_POST['name']);
  $email = addslashes($_POST['email']);
  $password = addslashes($_POST['password']);
  $db = new Database('host', 'username', 'password', 'database');
  $user = new User($db);
  $user->create_user_account($name, $email, $password);
 
?>
<header>
    <h2><a href="/event_machine/">Event Machine</a></h2>
    <nav>
      <div><a href="../signin/">Sign in</a></div>
    </nav>
</header>
  <div class="container"> 
      <h3>Tell us about your interest</h3> 
      <div id="get-started">
        <h4>Let’s setup your profile</h4>
        <form>
           <input type="text" id="age" name="age" placeholder="Age">
          <select name="marital_status" id="marital_status"> 
              <option value="single" selected>I'm single</option>
              <option value="married">I'm married</option>
              <option value="separated">I'm separated</option>
            </select>
            <div>
              <span>Do you have children?</span>
              <button value="yes">Yes</button>
              <button value="no">No</button>
            </div>
            <div id="profile-photo">
                <label>Add profile photo</label> 
                <input type="file" name="photo">
                <input type="button" value="Next">
            </div>
           
        </form>
       </div>
       <div class="progress-indicator" id="start"></div>
       <div class="progress-indicator" id="end"></div>
    </div>   
    <script src="/event_machine/js/main.js"></script>
<?php include '../includes/footer.php'; ?>