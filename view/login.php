
<!DOCTYPE html>
<html>
<head>
	<title>association medianet</title>
	
</head>
<body>
		<div class="container
		content">
		<div class="main block">
			<article class="post">
				<h2>enregistrement</h2>
				<p class="meta"></p>
				<p>
			    <form action="../projetweb/index.php/userlogin" method="post">
			    	 <p><label for="login">login</label> <input type="text" name="login" id="login"/></p>
			    	 <p><label for="password">password</label> <input type="text" name="password" id="password"/></p>
			    	 <input type="hidden" name="action" value="userlogin" />
			    	 <p><input type="submit" value="enregistrer" /></p>
			    	 <?php if(isset($_SESSION["existeuser"])){
                        $existe=$_SESSION["existeuser"];
                        if ($existe==0){
                            ?>
                            <p>vous n'etes pas encore enregistré?
                            <a href="../index.php/enregistrer">enregistrer vous</a></p>
                            <?php
                        }
                        }?>
			    </form>
				</p>
			<div>
			<div class="container">
				<footer class="main-footer">
					<div class="f_left">
						<p>&amp;copy; 2017 - association medianet</p>
					</div>
				</footer>
			</div>
		</div>
	</body>
	</html>

