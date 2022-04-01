<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
$color=$notify=$error="";
    if(isset($_GET["feedback_status"])){
     if($_GET["feedback_status"]=="true")
        {   
         $color="color:green;";
         $notify= "Thank you for leaving a message, I will contact you as soon as possible !";
         }
    else{
        $color="color:red;";
        if(isset($_GET["error"]))
        {
            $error="Invalid Email !";
        }
        else{
            $notify ="Please enter full information !";
        }
        }
    }
    ?>
    <section id="contact" class="four">
        <div class="container">

            <header>
                <h2>Contact</h2>
            </header>

            <p>If you want to contact me or discuss something with me,
                 you can leave a message here or you can talk to me directly on facebook or instagram
                  at the bottom corner of the screen.</p>

            <form method="post" action="feedbackCustomer/feedback.php">
                <div class="row">
                    <div class="col-6 col-12-mobile"><input type="text" name="name" placeholder="Name" /></div>
                    <div class="col-6 col-12-mobile"><input type="text" name="email" placeholder="Email" /></div>
                    <div class="col-12">
                        <textarea name="message" placeholder="Message"></textarea>
                    </div>
                    <div class="col-12">
                        <input type="hidden" name="username" value ="<?php echo $_GET["username"]; ?>">
                        <input type="submit" value="Send Message" />
                    </div>
                </div>
            </form>
        </div>
        <p style ="margin-top:30px;<?php echo $color; ?>;"><?php if(isset($_GET["feedback_status"])){
                echo $notify;
                echo $error;
            } ?></p>

    </section>
</body>
</html>

