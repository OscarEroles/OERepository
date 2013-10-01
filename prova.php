<?PHP
// Crear una imagen en blanco.
$imagen = imagecreatetruecolor(400, 400);
$nums=array(0,32,15,19,4,21,2,25,17,34,6,27,13,36,11,30,8,23,10,5,24,16,33,1,20,14,31,9,22,18,29,7,28,12,35,3,26);
// Seleccionar el color de fondo.
$fondo = imagecolorallocate($imagen, 255, 255, 255);
$blanco = imagecolorallocate($imagen, 255, 255, 255);
$negro = imagecolorallocate($imagen, 0, 0, 0);
$verde = imagecolorallocate($imagen, 0, 255, 0);
$rojo = imagecolorallocate($imagen, 255, 0, 0);
$grados=360/count($nums);
$actual=0;


$fuente = 'agencyb.ttf';   //el archivo .ttf debe de estar en el mismo directorio que nuestro archivo .php  
//$numero=in_array(0,$nums);

// Rellenar el fondo con el color seleccionado arriba.
imagefill($imagen, 0, 0, $fondo);
for($i=0;$i<count($nums);$i++){
	if($i==0){
	$color=$verde;
	}	
	elseif($i%2==0){
		$color=$negro;
	}
	else{
		$color=$rojo;
	}
	imagefilledarc($imagen, 200, 200, 400, 400, $grados*$i -90, $grados*($i+1) -90, $color, IMG_ARC_PIE);
	//						#ancho,#altura,#x,#y,donde empieza el sector(270º), donde acaba el sector,#color,#forma de arco??
	imagefilledarc($imagen, 200, 200, 325, 325, $grados*$i -90, $grados*($i+1) -90, $blanco, IMG_ARC_PIE);	
	imagefilledarc($imagen, 200, 200, 320, 320, $grados*$i -90, $grados*($i+1) -90, $color, IMG_ARC_PIE);
	imagefilledarc($imagen, 200, 200, 250, 250, $grados*$i -90, $grados*($i+1) -90, $blanco, IMG_ARC_PIE);
	imagefilledarc($imagen, 200, 200, 235, 235, $grados*$i -90, $grados*($i+1) -90, $color, IMG_ARC_EDGED); //se dice que edged ayuda a perfilar las lineas de los sectores, 
	imagettftext($imagen, 12,(-1*$grados)*$i ,199+0.90*200*cos(((($grados)*($i+pi()))*(pi()/180)-90)) , 199+0.90*200*sin(((($grados)*($i+pi()))*(pi()/180)-90)), $blanco, $fuente, $nums[$i]);
}//						#size  #angulo del texto, #x(se supone que debe de ser el centro cerca del extremo de la circumferencia(por eso 0.90(se acerca a 1) de cada sección, #y = sinus, #color a pintar, #fuente, #contenido
// Escoger un color para la elipse.
$col_circumferencia = imagecolorallocate($imagen, 255, 255, 255);

// Dibujar la elipse
imageellipse($imagen, 200, 200, 50, 50, $col_circumferencia);

// Imprimir la imagen
header("Content-type: image/png");
imagepng($imagen);
?>
