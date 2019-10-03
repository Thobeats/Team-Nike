<?php 
     
    $msg = '';

    if (isset($_POST['Submit'])) {

        $data = json_decode(file_get_contents("users.json"), true);

        $email = $_POST['email'];

        if (empty($email)) {
            $msg = "<label class='text-danger'>Please fill in the field</label>";
        
        } else {
            foreach ($data['users'] as $users)
            {

                


               if ($email == $users['Email'])
               {

                    $Name = $users['Name'];
                    $to = $email;
                    $subject = 'donotreply, Password Reset';
                    $body = "<h2>Hi $Name</h2>, follow the link to reset your password";

                    $headers = "From: Team Nike Networth Tracker\n";
                    $headers .= "MIME-Version: 1.0\n";
                    $headers .= "Content-type: text/html; charset=iso-8859-1\n";

                    mail($to, $subject, $body, $headers);
                    
                } 
                
                
                

                
            }

            $msg = "<label class='text-danger text-center'>This Email does not belong to an account</label>";


        }

        
    }




?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body >

        <style>
            body{
                background: #EEEEEE;
            }

            header{
                padding: 10px;
                background: #fff;
            }

            .P-R{
                background: #fff;
                margin-top: 10px;
                margin-left: 30%;
                padding: 5px;
                padding-bottom: 70px;
                height: 70vh;
                text-align: center;
                width: 45%;
            }

            form input{
                display: block;
                padding: 3px;
                width: 300px;
                margin: 5px;
                margin-left: 23%;
                border: none;
                border-bottom: 2px solid #344a84;
            }

            .btn-sub{
                background: #344a84;
                color: #fff;
                border-radius: 5px;
                width: 200px;
                margin: 5px;
                padding: 5px;
                border: none;
            }

            .btn-sub:hover {
                background: #0b3270;
            }

            .response {
                margin: 5px;
                margin-left: 40%;
                padding: 3px;
            }


        
        
        
        
        </style>

        <header class="container-fluid">

            <img src="images/My Post.png" alt="logo" width="100px" height="50px">
        
        </header>

        <div class="container">

            <div class="response">
                <?php if ($msg != '') {
                    echo  $msg;
                } ?> 
            </div>

            

            <div class="P-R">
                <p style="font-size: 26px; margin-top: 20px;"> Let us retrieve your account for you <p>

                <p> Provide the E-mail registered with your account </p>


                <form method="POST">

                    <input type="email" placeholder="Email address" name="email"> 
                    <button type="submit" class= "btn-sub" name="Submit">Submit</button>

                </form>

            </div>

        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>