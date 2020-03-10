<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style>
	
	
	.cabecera{
		text-align: center;
		font-size: x-large;
		font-family: Tahoma, Geneva, sans-serif;
		margin-bottom: 100px;
		color: #904A06
	}
	.contenido form,table{
		width: 400px;
		margin: 0 auto
			
	}
	
	
</style>	
</head>

<body>
<div class="cabecera">
	
	@yield("cabecera")
	
</div>
	
<div class="contenido" >
	 @yield("contenido")
</div>
	
</body>
</html>
