<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<!-- Mirrored from www.imaginemthemes.com/demo/echoes/echoes-classic/fullwidth.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 06 May 2010 16:30:36 GMT -->
<head>
<title>LAMOS - INPE  -  HOME</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/ddsmoothmenu.css" rel="stylesheet" type="text/css" />

<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" />
<![endif]-->

<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="css/ie7.css" media="screen" />
<![endif]-->

<script type="text/javascript" src="js/menu/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
</script>
<script type="text/javascript" src="js/util/util.js"></script>
<script type="text/javascript" src="js/slide/jquery.min.js"></script>
<script type="text/javascript" src="js/slide/simplegallery.js"></script>
</head>

<body>

<div id="pagecontainer"> <!-- Outside Container -->
	<div id="mainpage"> 
		<div id="header"> 
			<div id="smoothmenu1" class="ddsmoothmenu"><!-- The Menu -->
				<ul>
					<!-- Menu Single Item -->
					<li><a href="index.php">Home</a></li>
					<li><a href="contato.html">Contato</a></li>
				</ul>
				<br style="clear: left" />
			</div>
			<!-- End of Menu -->
			
			<div id="logo"><a href="index.php"><img src="images/logo.png" alt="logo" /></a></div>
		</div> <!-- Close Header -->
		
		
		<!-- carregar as variaveis do php -->
        <?php include "dir_loader.php"?>
        <?php include "camada.php"?>
        <?php include "processa.php"?>

		<div id="fullwidth-categorytitle">
			<table id="mainform" class="studiotable">
				<form name="myform" action="index.php" method="GET">
				    <tr>
					    <th>Data</th>
					    <th>Região</th>
					    <th>Hora</th>
					    <th>Nível</th>
				    </tr>
				    <tr>
					    <td>
					        <select name="Data">
                                <?php
                                    #ler diretorio com as datas
                                    foreach ($dir_data as &$elemento )
                                    { 
                                        echo '<option value="'.$elemento.'">'.$elemento.'</option>';
                                    }
                                ?>
                            </select>
					    </td>
					    <td>
					        <select name="Regiao">
                                <?php
                                    #ler diretorio com as regioes
                                    foreach ($dir_regiao as &$elemento )
                                    { 
                                        echo '<option value="'.$elemento.'">'.$elemento.'</option>';
                                    }
                                ?>
                            </select>
					    </td>
					    <td>
					        <select name="Hora">
                                <?php
                                    #ler diretorio com as regioes
                                    foreach ($dir_hora as &$elemento )
                                    { 
                                        echo '<option value="'.$elemento.'">'.$elemento.'</option>';
                                    }
                                ?>
                            </select>
					    </td>
					    <td>
					        <select name="Nivel">
                                <?php
                                    #ler diretorio com as regioes
                                    foreach ($dir_nivel as &$elemento )
                                    { 
                                        echo '<option value="'.$elemento.'">'.$elemento.'</option>';
                                    }
                                ?>
                            </select> 
					    </td>
				    </tr>
			</table>
			<table id="mainform2" class="studiotable">
			
				    <tr>
					    <th>Primeira cor</th>
					    <th>Segunda cor</th>
					    <th>Primeiro contorno</th>
					    <th>Segundo contorno</th>
					    <th>Vetor</th>
				    </tr>
				<?php
				include "camada.php";
				    #codigo para gerar os radio buttons
				    $i=0;
				    $j=0;
				    for ($i = 0; $i<$tamanho_maior_vetor; $i++)
				    {
				        
				        echo '<tr>';
				        for ($j = 0; $j<sizeof($camada); $j++)
				        {
				            $nome_grupo=$camada[$j];
				            echo '<td>';
				            if (isset($camadas[$j][$i]))
				            {
				                echo '<input type="radio" name="'.$nome_grupo.'" value="'.$camadas[$j][$i].'">'.$camadas[$j][$i];
				            }
				            echo '</td>';
				        }
				        echo '</tr>';
				    }
				
				?>	
			</table>
			    <input type="hidden" name="tempo" value="<?php echo time() ?>">
				<input name="submitb" type="submit" value="Gerar!">
			</form>
			<button onclick="showhide(1)">Hide</button>
		    <button onclick="showhide(2)">Show</button>
		        
		</div>
		
		<?php
		    #gerar titulo da imagem
		    $titulo = $_GET['Regiao'].' - '.$_GET['Data'].' - '.$_GET['Nivel'].' - '.$_GET['Hora'].'<br>';
		    if (strcmp($camada1,"clean.png")!=0)
		        $titulo.=$camada1;
		    if (strcmp($camada2,"clean.png")!=0)
		        $titulo.=' '.$camada2;
		    if (strcmp($camada3,"clean.png")!=0)
		        $titulo.=' '.$camada3;	
		    if (strcmp($camada4,"clean.png")!=0)
		        $titulo.=' '.$camada4;	
		    if (strcmp($camada5,"clean.png")!=0)
		        $titulo.=' '.$camada5;		         
		    if (isset($_GET['tempo']) and strcmp($_GET['Hora'],"Loop")!=0)
            {
                echo '<div id="fullwidth-categorytitle">';
                echo '<div id="imagem_centro"> ';
                echo "<table cellpadding='3' class='studiotable'>";
                echo "<tr>";
                echo  "<th align='center'>".$titulo."</th>";
                echo  "</tr>";
                echo      "<tr>";
                echo       " <td>";
                echo          "<img src='$saida' name='show' class='displayed' border='0'>";
                echo       " </td>";
                echo      "</tr>";

                echo '<tr><td>';
                #echo "<img src='$saida' class='displayed' border='0'>";
                echo '</div></div>';
            }
            elseif (isset($_GET['tempo']) and strcmp($_GET['Hora'],"Loop")==0)
            {
                echo '<div id="fullwidth-categorytitle">';
                echo '<div id="imagem_centro">';
                echo '<form name="ff">';
                echo "<table cellpadding='3' class='studiotable'>";
                echo "<tr>";
                echo  "<th align='center'>".$titulo."</th>";
                echo  "</tr>";
                echo      "<tr>";
                echo       " <td>";
                echo          "<img src='$saida_array[0]' name='show' class='displayed' border='0'>";
                echo       " </td>";
                echo      "</tr>";

                echo '<tr><td>';
                echo "<select name='slide' onChange='rotate(this.selectedIndex);'>";
                $k=0;
                foreach ($saida_array as &$elemento )
                { 
                    echo '<option value="'.$elemento.'">'.$dir_hora[$k].'</option>';
                    $k++;
                }
                echo '</select>';
                echo '</td></tr>';
                
                echo "
                    <tr><td>
                    <input type='button' onclick='rotate(0);' value='ll&lt;&lt;' title='Ir para o Início' />
                    <input type='button' onclick='rotate(x-1);' value='&lt;&lt;' title='Anterior' />
                    
                    <input type='button' name=\"fa\" onClick=\"this.value=((this.value=='Stop')?'Start':'Stop');auto();\" value=\"Start\" title=\"Autoplay\" style=\"width:75px;\" >
                    
                    <input type='button' onclick='rotate(x+1);' value='&gt;&gt;' title='Próximo' />
                    <input type='button' onclick='rotate(this.form.slide.length-1);' value='&gt;&gt;ll' title='Ir para o Final' />
                    </td></tr></table></form>
                    </div></div>";  
            }
              
            
		?>
		


	<!-- Footer start -->
	
		<div id="footerbarwrap">
		<ul>
			<li>Copyright © webmaster. All rights reserved. </li>
			<li>INPE - LAMOS</li>	</ul>
		</div>
	</div>
</div> <!-- Close Container -->
<script type="text/javascript"> Cufon.now(); </script>
</body>

<!-- Mirrored from www.imaginemthemes.com/demo/echoes/echoes-classic/fullwidth.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 06 May 2010 16:30:39 GMT -->
</html>
