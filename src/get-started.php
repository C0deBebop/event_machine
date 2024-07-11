<?php include '../includes/header.php'; ?>
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
           <input type="text" name="age" placeholder="Age" required>
          <select name="marital_status"> 
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
<?php include '../includes/footer.php'; ?>