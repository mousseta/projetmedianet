<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>association medianet</title>

</head>
<body>
		<div class="containercontent">
		<div class="main block">
			<article class="post">
				<h2>enregistrement</h2>
				<p class="meta"></p>
				<p>
			    <form action="../index.php/userlogin" method="POST">
			    	 <p><label for="nom">nom</label> <input type="text" name="nom" id="nom"/></p>
			    	 <p><label for="prenom">prenom</label> <input type="text" name="prenom" id="prenom"/></p>
			    	 <p><label for="datenaissance">date de naissance</label> <input type="text" name="datenaiss" id="datenaiss"/></p>
			    	 <p><label for="login">login</label> <input type="text" name="login" id="login"/></p>
			    	 <p><label for="password">password</label> <input type="text" name="password" id="password"/></p>
			    	 <p><label for="email">email</label> <input type="text" name="email" id="email"/></p>
			    	 <p><input type="hidden" value="ajouteruser" name="action" />
			    	 <p><input type="submit" value="enregistrer" /></p>
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
