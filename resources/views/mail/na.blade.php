<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Asap:wght@400;600&display=swap" rel="stylesheet">
</head>


<body>
	<h1 style="font-family:Lalezar; color:#F50E1C; text-align: center; font-size: 50px">
		Work Now Cursos
	</h1>
	

	<div style="display:block; color:white;">
    <div>
      <div style="padding: 10px;text-align:center;"> 
      		<h2 style="font-family:Asap; color:white; text-align: center"> 
	     		<span style="background-color: #F50E1C; padding:10px">
	     			¡Hola {{$dato->name ?? "Nombre sin especificar"}}!
	     		</span>
			</h2>
		 </div>
    </div>

    <div style="margin:auto; width:220px;">

      <img src="https://worknow-cursos.com/img/megafono.jpg" width="220px" alt="worker-running-with-a-lot-of-documents_1012-192.jpg">
    </div>

	  <div style="display:block; color:white; padding: 40px">
    	<div style="background:linear-gradient(#F50E1C, #F5850E);margin-bottom: 25px; margin-left: 50px; margin-right: 50px; padding: 10px;text-align:center">
            <h2 style="font-family:Asap"> 
                <p>
                    Buenas tardes! Te estamos contactando de Work Now cursos por la capacitacion 
                    de {{$dato->pedido ?? 'Curso'}}. Queriamos saber que dia y horario te podemos llamar ya que 
                    en el horario que dejaste en el formulario de facebook no pudimos dar con vos.
                </p>
            </h2>
      	</div>
    </div>
    <div style="background:linear-gradient( #F5850E,#F50E1C);margin-bottom: 25px; margin-left: 50px; margin-right: 50px; padding: 10px;text-align:center">
        <h3>¡Esperamos tu respuesta!</h3>
        <h2>Tambien podes llamarnos al 0810 345 0527 de 10 a 18hs de lun a vie.</h2>
        <h1>¡¡ Saludos !!</h1>
    </div>

  <div style="text-align: center;">
      <a href="https://wa.me/5492236772444?text=Hola%20me%20comunico%20por%20el%20curso%20de%20{{$dato->pedido ?? "nombre curso"}}" 
        style="
                font-size: 25px;
                display: block; 
                background: orange;
                width: 20%;
                color:white;
                text-decoration: none; 
                padding: 10px; 
                border-radius: 7px;
                margin-left: auto; 
                margin-right: auto; 
                font-family:Lalezar;
            "
        >
        ¡Presiona aqui!
        <img style="width: 90%;" src="https://worknow-cursos.com/img/whatsapp.png" >
    </a>
  </div>



</body>


</html>