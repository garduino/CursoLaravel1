<!doctype html>
<html>
	<head>

		<meta charset="utf-8">

		<title>Titulo</title>

		<style>

			.contenedor{
				background-color:#F00;
				text-align:center;
				 }

			.infoGeneral{
				background-color:#00F;
				margin:200px 0;
				color:#FFF;
				 }

			.pie{
				background-color:#FF0;
				 }





		</style>



	</head>


	<body>

	<div class="contenedor">

		@yield("cabecera")

	</div>


	<div class="infoGeneral">

		@yield("infoGeneral")

	</div>


	<div class="pie">

		@yield("pie")

		Copyright Arduino Software

	</div>





</body>

</html>
