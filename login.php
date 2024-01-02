<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div class="banner">
        <div class="navbar">
            <img src="assets/images/2324225.png" alt="" class="logo">
            <ul>
                <li><a href="index">Home</a></li>
                <li><a href="about_us">About Us</a></li>
                <li><a href="login">Login</a></li>

            </ul>

        </div>

        <div class="content2">
            <h1>INVENTORY SYSTEM</h1>
            <p id="login">
                <CENTER>
                    <form method="post" name="login_sform">
                        <div class="">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">USERNAME</label>
                                <input type="text" class="form-control" alt="username"  autocomplete="off" required>

                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">PASSWORD</label>
                                <input type="password" class="form-control" alt="password"  autocomplete="off" required>

                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02"></label>
                            <button class="btn btn-outline-warning btn-block" id="btn-admin" name="btn-admin">LOG IN</button>

                                 <div class="form-group mt-2" id="alert-msg">
                        </div>
                    </form>
                </CENTER>
            </p>
       </div>
    </div>

      <script type="text/javascript">
            jQuery(function(){
                $('form[name="login_sform"]').on('submit', function(e){
                    e.preventDefault();

                    var u_username = $(this).find('input[alt="username"]').val();
                    console.log(u_username);
                    var p_password = $(this).find('input[alt="password"]').val();
                     console.log(p_password);
                   // var s_status = 1;

                    if (u_username === '' && p_password ===''){
                        $('#alert-msg').html('<div class="alert alert-danger"> Required Username and Password!</div>');
                    }else{
                        $.ajax({
                            type: 'POST',
                            url: 'function/controllers/process.php',
                            data: {

                                username: u_username,
                                password: p_password
                               // status: s_status
                            },
                            beforeSend:  function(){
                                $('#alert-msg').html('');
                            }
                        })
                        .done(function(t){
                        	console.log('================t===================');
                        	console.log(t);
                            if (t == 0){
                                $('#alert-msg').html('<div class="alert alert-danger">Incorrect username or password!</div>');
                            }else{
                                $("#btn-admin").html('<img src="assets/images/loading.gif" /> &nbsp; Signing In ...');
                                setTimeout(' window.location.href = "Sinventory_panel/dashboard"; ',2000);
                            }
                        });
                    }
                });
           });
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>