<?php include '../includes/header.php'; ?>
<header>
    <h2><a href="/event_machine/">Event Machine</a></h2>
    <nav>
      <div><a href="/event_machine/signin/">Sign in</a></div>
    </nav>
</header>
  <div class="container">  
      <div id="signup">
        <h4>Sign up</h4>
        <form method="post" action="/event_machine/get-started/">
           <input type="text" name="name" placeholder="Name" required>
           <input type="email" name="email" placeholder="E-mail" required>
           <input type="password" name="password" placeholder="Password" required>
           <input type="password" name="confirm-password" placeholder="Confirm password" required>
           <input type="submit" name="submit" value="Sign up">
        </form>
       </div>
    </div>   
<?php include '../includes/footer.php'; ?>