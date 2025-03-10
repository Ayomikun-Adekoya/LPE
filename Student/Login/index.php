<!doctype html>
<html lang="en">
  <head>
	<style>
		    .small-image {
        width: 70px; /* Set desired width */
        height: auto; /* Maintain aspect ratio */}

		.logo_placement {
			padding-left: 5%;
			padding-top: 5%;

		}
		#navchecker {
            background: #fff;
            display: flex;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
		#navchecker .h3{
			color: #03182e;
			line-height: 1.7rem;

		}
		.mr {
            margin-right: 1rem;
        }

        .ml {
            margin-left: 1rem;
        }
		#main-footer .footer{
    display: flex;
    justify-content: space-around;
    text-align: left;
}

#main-footer .footer h1{
    font-size: 1.3rem;
    color: #fff;
    margin-bottom: 3rem;
}

#main-footer{
  text-align: center;
  padding: 1.5rem;
  color: #ccc;
}
.bg-d{
  background: #03182e;
}

input[type=text],input[type=password] {
            padding-left: 2rem !important;
            margin-bottom: 0.5rem;
            border-radius: 1rem !important;
            outline: none;
            border: 1px solid #0a2b4f !important;
			background-color: #fff !important;



        }
		.btn-primary{
			
            border-radius: 1rem !important;
            outline: none;
            border: 1px solid #0a2b4f !important;
			background-color: #0a2b4f !important;
		}
	</style>
	    

  	<title>Student Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
		<nav id="navchecker">
			<div class="mr">
				<img style="width:50px" src="images/ui-logo.png" class="logo">
			</div>
	
			<div>
				<h1 class="h3 m-0 font-weight-100">University of Ibadan,<br>The&nbsp;Postgraduate&nbsp;College</h1>
	
			</div>
			<div class="ml">
				<img style="width:50px" src="images/logo.png" class="logo">
			</div>
	
		</nav>
	<section class="ftco-section">
		<div class="container" style="align-items: center;">

			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to Quality Assurance</h2>

								<p style="margin-top: 10%;">Don't have an account?</p>
								<a href="#" class="btn btn-white btn-outline-white">Sign Up</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
						
			      	</div>
							<form action="login.php" method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" >Application Number</label>
			      			<input type="text" class="form-control" name="numeration" placeholder="Application Number" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" >Password</label>
		              <input type="password" class="form-control" name="password" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<input type="submit" name="submit" class="form-control btn btn-primary submit px-3">
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<footer id="main-footer" class="bg-d">

        <p>Copyright &copy;The Postgraduate College, All Rights Reserved</p>
    </footer>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>


</form>

