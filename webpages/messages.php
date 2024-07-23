<?php include '../includes/header.php'; ?>
<header>
    <h2><a href="/event_machine/">Event Machine</a></h2>
    <nav>
     <ul>
       <li><a href="/event_machine/">Browse</a></li>  
       <li><a href="/event_machine/">Your events</a></li> 
       <li><a href="/event_machine/messages/">Messages</a></li>  
       <li><a href="/event_machine/">Settings</a></li> 
     </ul>   
      <div><a href="/event_machine/signout/">Sign out</a></div>
    </nav>
</header>

<div class="container">
<?php require '../src/Message.php';
    $db = new Database('host', 'username', 'password', 'database');
    $messages = new Message($db);
    $all_messages = $messages->get_all_messages(4);
    if(!$all_messages) {
        echo "<div id='content-card'>";
        echo "<h1>Your have no messages</h1>";
        echo "<img src='../images/envelope-solid-1.svg'>";
        echo "</div>";
    } else {
        echo "<div id='message-content-card'>";
        echo "<div id='message-header-card'>";
        echo "<h4>Messages</h4>";
        echo "<div id='messages-menu'>";
        echo "<div><img src='../images/friends-icon.png' alt=''></div>";
        echo "<div><img src='../images/send-messages-icon.png' alt=''></div>";
        echo "</div>";
        echo "</div>";
        foreach($all_messages as $messages){
            echo "<div id='messages-flex-container'>";
            echo "<div>";
            echo "<img src='../images/profiles/" . $messages[0]['image'] . "'>";
            echo "</div>";
            echo "<div>";
            echo "<p class='dates'>" . date_format(date_create($messages[0]['message_date']), "M,d Y H:i a") . "</p>";
            echo "<p>{$messages[0]['name']}</p>";
            echo "<p>{$messages[0]['subject']}</p>";
            echo "<p>{$messages[0]['message']}</p>";
            echo "<a href='/event_machine/{$messages[0]['user_id']}'>Reply</a>";
            echo "<a href='/event_machine/{$messages[0]['user_id']}'>Delete</a>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    } 

?>
</div>

<?php include '../includes/footer.php'; ?>
