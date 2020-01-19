<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Registration Using Ajax </title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Email">Email *:</label>
                            <input id="email" class="form-control" type="email" name="mail" placeholder="example@mail" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password *:</label>
                            <input id="password" class="form-control" type="password" placeholder="Enter Password" name="password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpassword">Confirm Password *:</label>
                            <input id="cpassword" class="form-control" type="password" placeholder="Enter Password" name="cpassword">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-success btn-sm" id="save">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        // check if email exists
        $("#email").blur(function(e) {
            e.preventDefault();
            var mail = $(this).val();
            if (mail) {
                $.ajax({
                    type: "post",
                    url: "process.php",
                    data: {
                        validate: "check",
                        mail: mail,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response == true) {
                            $("#email").val("");
                            console.log("Email already in use");
                        } else {
                            console.log("Good to go brother");
                        }
                    }
                });
            }
        });
        $("#save").click(function(e) {
            e.preventDefault();
            var mail = $("#email").val();
            var password = $("#password").val();
            var cpassword = $("#cpassword").val();

            // /validation
            if (mail == "") {
                console.log("Email Is required");
            }
            if (password == "") {
                console.log("Password field required");
            }
            if (cpassword == "") {
                console.log("Confirm Password field required");
            } else {
                if (password != cpassword) {
                    console.log("This fields should match");
                }
            }

            if (password && email && cpassword) {
                $.ajax({
                    type: "post",
                    url: "process.php",
                    data: {
                        register: "new",
                        password: password,
                        mail: mail
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                    }
                });
            }

        });
    </script>
</body>

</html>