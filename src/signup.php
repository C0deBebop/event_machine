<?php include '../includes/header.php'; ?>
<header>
    <h2><a href="/event_machine/">Event Machine</a></h2>
    <nav>
      <div><a href="../signin/">Sign in</a></div>
    </nav>
</header>
  <div class="container">  
      <div id="signup">
        <h4>Sign up</h4>
        <form>
           <input type="text" name="name" placeholder="Name" required>
           <input type="email" name="email" placeholder="E-mail" required>
           <input type="password" name="password" placeholder="Password" required>
           <input type="password" name="confirm-password" placeholder="Confirm password" required>
           <input type="submit" value="Sign up">
        </form>
       </div>
    </div>   
<?php include '../includes/footer.php'; ?>