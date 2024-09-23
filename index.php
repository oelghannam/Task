<?php
    include('config/conn.php');
    
    //Reset
    if(isset($_POST['reset']))
    {
        $qu = "Delete from users";
        $res = mysqli_query($con , $qu);

        if($res == true)
        {
            echo '<script>
                        if ( window.history.replaceState )
                        {
                        window.history.replaceState( null, null, window.location.href );
                        }
                    </script>';
        }
        else
        {
            echo '<script>
                    alert("A problem has happened! Please try again..");
                    if ( window.history.replaceState )
                    {
                    window.history.replaceState( null, null, window.location.href );
                    }
                </script>';
        }
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
  xml:lang="en-US"
  lang="en-US"
  dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task</title>
        
        <link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css">
        <script type="text/javascript" src="js/vendor/jquery.min.js"></script>
    </head>
    
    <body>
        <section class="main">
            <div class="container">
                
                <script>
                    /*keep updating the table data in every 0.01 second*/
                    var auto_refresh = setInterval(
                    function ()
                    {
                    $('#tableResult').load('get_data.php').fadeIn("slow");
                    }, 10);
                    
                    /*Adding new user*/
                    $(document).ready(function(){
                        var username = document.getElementById("name");
                        var usermail = document.getElementById("email");
                        $('#add').click(function(e){
                            if(username.value == '' || usermail.value == '') {
                              alert('Please fill all data required!');
                            }
                            else
                            {
                                e.preventDefault();
                                var data=$('#user_form').serialize()+'&add=add';
                                $.ajax({
                                    url:'insert_data.php',
                                    type:'post',
                                    data:data,
                                    success:function(response){
                                        $('#msg').text(response);
                                    }
                                });
                                username.value = ""
                                usermail.value = ""
                            }
                        });
                    });
                </script>
                
                <div class="text-center mt-3 mb-4">
                    <h1>TASK</h1>
                </div>

                <form method="post" id="user_form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                            <div class="form-group">
                                <input required id="name" name="name" type="text" class="form-control" autocomplete="on" placeholder="* Name" />
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                            <div class="form-group">
                                <input required id="email" name="email" type="email" class="form-control" autocomplete="on" placeholder="* E-mail" />
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="form-group">
                                <button id="add" name="add" type="submit" class="btn btn-success w-100 py-2" style="border-radius: 15px;">Add user</button>
                            </div>
                        </div>
                    </div>
                </form>
                
                <hr/>
<!--                <p id="msg"></p>-->
                <div class="payment mt-5">
                    <h2 class="pb-2">Users to pay:</h2>
                    <table class="table text-center table-bordered table-striped">
                        <thead>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>To pay</th>
                        </thead>

                        <tbody id="tableResult">
                                                       
                        </tbody>
                    </table>
                    
                    <div class="mt-3">
                        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="form-group">
                                <button name="reset" type="submit" class="btn btn-danger w-100 py-2" style="border-radius: 15px;">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
        <script type="text/javascript" src="js/vendor/popper.min.js"></script>
        <script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
    </body>
</html>