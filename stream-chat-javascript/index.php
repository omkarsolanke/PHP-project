<?php
 
session_start();
 
if(isset($_GET['logout'])){    
     
    //Simple exit message
    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>". $_SESSION['name'] ."</b> has left the chat session.</span><br></div>";
    file_put_contents("log.html", $logout_message, FILE_APPEND | LOCK_EX);
     
    session_destroy();
    header("Location: index.php"); //Redirect the user
}
 
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}
 
function loginForm(){
    echo
    '<div id="loginform">
    <p class="entercont"> Please enter your name to continue!</p>
    <form class="row g-3 needs-validation" novalidate action="index.php" method="post">
    <div class="input-group flex-nowrap">
      <span class="input-group-text" id="addon-wrapping" for="name">@</span>
      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="name" id="name">
    </div>
    <div class="col-12">
      <button class="btn btn-success" type="submit" name="enter" id="enter">Enter</button>
    </div>
  </form>
  </div>';
}

?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

        <title>Messager</title>
        <meta name="description" content="Tuts+ Chat Application" />
       
    </head>
    <style>
        * {
    margin: 0;
    padding: 0;
  }
   
  body {
    margin: 20px auto;
    font-family: "Lato";
    font-weight: 300;
  }
  
  form {
    padding: 15px 25px;
    display: flex;
    gap: 10px;
    justify-content: center;
  }
   
  form label {
    font-size: 1.5rem;
    font-weight: bold;
  }
   
  input {
    font-family: "Lato";
  }
   
  a {
    color: #0000ff;
    text-decoration: none;
  }
   
  a:hover {
    text-decoration: underline;
  }
   
  #wrapper {
    margin: 0 auto;
    padding-bottom: 25px;
    background: #eee;
    width: 600px;
    max-width: 100%;
    border: 2px solid #212121;
    border-radius: 4px;
  }
   
  
   
 
   
  #chatbox {
    text-align: left;
    margin: 0 auto;
    margin-bottom: 25px;
    padding: 10px;
    background: #fff;
    height: 300px;
    width: 530px;
    border: 1px solid #a7a7a7;
    overflow: auto;
    border-radius: 4px;
    border-bottom: 4px solid #a7a7a7;
  }
   
  #usermsg {
    flex: 1;
    border-radius: 4px;
    border: 1px solid #ff9800;
  }
   
 
   
  
   
  .error {
    color: #ff0000;
  }
   
  #menu {
    padding: 15px 25px;
    display: flex;
  }
   
  #menu p.welcome {
    flex: 1;
  }
   
  a#exit {
    color: white;
    background: #c62828;
    padding: 4px 8px;
    border-radius: 4px;
    font-weight: bold;
  }
   
  .msgln {
    margin: 0 0 5px 0;
  }
   
  .msgln span.left-info {
    color: orangered;
  }
   
  .msgln span.chat-time {
    color: #666;
    font-size: 60%;
    vertical-align: super;
  }
   
  .msgln b.user-name, .msgln b.user-name-left {
    font-weight: bold;
    background: #546e7a;
    color: white;
    padding: 2px 4px;
    font-size: 90%;
    border-radius: 4px;
    margin: 0 5px 0 0;
  }
   
  .msgln b.user-name-left {
    background: orangered;
  }
  .col-12 {
  flex: 0 0 auto;
  width: 83%;
  }.input-group {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  width: 83%;
}
#enter {
  width: 764px;
  margin-left: -1px;
  height: 97px;
  font-size: xxx-large;
}
.entercont {
  margin-top: 93px;
margin-bottom: 15rem;
margin-left: 43px;
font-size: 64px;
}
#addon-wrapping {
  width: 104px;
  text-align: center;
  font-size: xxx-large;
}
.form-control {
  font-size: xxx-large;
} 
@media (max-width:600px) {
  .entercont {
    margin-top: 0px;
    margin-bottom: 3rem;
    margin-left: 198px;
    font-size: xxx-large;
  }
  .col-12 {
    flex: 0 0 auto;
    width: 83%;
  }
}
#chatbox {
  text-align: left;
  margin: 0 auto;
    margin-bottom: 0px;
  margin-bottom: 25px;
  padding: 10px;
  background: #fff;
  height: 943px;
  width: 838px;
  border: 1px solid #a7a7a7;
    border-bottom-color: rgb(167, 167, 167);
    border-bottom-style: solid;
    border-bottom-width: 1px;
  overflow: auto;
  border-radius: 4px;
  border-bottom: 4px solid #a7a7a7;
  font-size: xxx-large;
}
#menu {
  padding: 66px 58px;
  display: flex;
  font-size: xxx-large;
}
#wrapper {
  margin: 0 auto;
  padding-bottom: 50px;
  background: #eee;
  width: 927px;
  max-width: 100%;
  border: 2px solid #212121;
  border-radius: 4px;
}
#usermsg {
  
  flex: 1;
  border-radius: 4px;
  border: 1px solid #ff9800;
  height: 80px;
  font-size: 74px;
  width: 827px;
  margin-left: 45px;
}
#submitmsg {
  width: 177px;
  font-size: xxx-large;
}

.btnnn.primary {
 
  height: 101px;
  font-size: xx-large;
  padding: 15px;
  margin: 13px;
  margin-left: 682px;
}.btn.btn-light {
  height: 91px;
  font-size: xxx-large;
  background-color: gainsboro;
}

</style>
    <body>
    <?php
    if(!isset($_SESSION['name'])){
        loginForm();
    }
    else {
    ?>
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
                <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
            </div>
 
            <div id="chatbox">
            <?php
            if(file_exists("log.html") && filesize("log.html") > 0){
                $contents = file_get_contents("log.html");          
                echo $contents;
            }
            ?>
            </div>
 
            <div class="rowwws">
              <div class="collect">
                <input type="text" class="form-controllr"  id="usermsg" name="usermsg">
              </div>
              <button type="button" class="btnnn primary"  name="submitmsg" id="submitmsg">Send</button>
            </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document  id="submitmsg" id="usermsg" name="submitmsg"  name="usermsg"
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("post.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });
 
                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
 
                    $.ajax({
                        url: "log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div
 
                            //Auto-scroll           
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                            }   
                        }
                    });
                }
 
                setInterval (loadLog, 2500);
 
                $("#exit").click(function () {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                    window.location = "index.php?logout=true";
                    }
                });
            });
        </script>
        <script>
          
        </script>
    </body>
</html>
<?php
}
?>