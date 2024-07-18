<?php include '../includes/header.php'; ?>
<header>
    <h2><a href="/event_machine/">Event Machine</a></h2>
</header>
  <div class="container">  
      <div id="signin">
        <h4>Sign in</h4>
        <form method="post" action="/event_machine/profile/">
           <input type="text" name="email" placeholder="E-mail" required>
           <input type="password" name="password" placeholder="Password" required>
           <input type="submit" value="Sign in">
        </form>
       </div>
    </div>   
<?php include '../includes/footer.php'; ?>