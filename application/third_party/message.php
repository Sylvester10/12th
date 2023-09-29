<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style type="text/css">
			*{

				box-sizing: border-box;
	    		padding:0;
	    		margin: 0;
	    		font-family: "Montserrat", sans-serif;
	    		font-size: 13px;

		}
		</style>
	</head>
	<body>
		<!--styling the container-->
		<div id="container" style="width: 100%; height: auto; padding: 10px 10px 10px 10px; background-color:rgb(255, 255, 255); position: relative; border-radius:5px; ">
			
			<div id="paymentContainer" style="max-width: 400px; height: auto; background-color: rgb(240, 240, 240); margin:auto; position: relative; padding:10px 0px 10px 0px; border-radius:20px; ">

				<!--Message -->
				<div id="msg" style="position: relative; width: 80%; margin:auto; text-align: center; color: rgb(90,90,90); margin-top: 20px;"><b style="color:rgb(40,40,40); font-size: 1.2em;">Hello '.$last_name.'! &#128075;
				</div>
				
				<!--Icon-->
				<div id="icon_cont" style="position: relative; width: 100%;height: 100px; margin-top: 30px; margin-bottom: 30px;">
					<div id="icon" style="position: relative; width: 100px; height: 100px; margin:auto;">
						<img src="image/document.png" style="width:100px;" width="100">
					</div>
				</div>						

				<!--Activate -->
				<div id="amount" style="position: relative; text-align: center; font-size: 13px; margin-top: 20px;">
					Your document has been verified and approved. You can now fully access your account.
				</div>

				<div id="amount" style="position: relative; text-align: center; font-size: 13px; margin-top: 20px; margin-bottom: 20px;">
					Happy investing!
				</div>

			</div>


			<div id="fooooo" style="width: 100%; text-align: center; margin-top: 20px; color: #494949; margin-bottom: 10px; ">
				<span>&copy;</span>2022 Cryptoma. All rights reserved.
			</div>

		</div>

	</body>
</html>