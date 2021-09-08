<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    
    <body>
        <h1>Titre principal</h1>
    <table width=60% border=1>
        <tr>
            <td width=33%>Periode</td>
            <td width=33%>Point</td>
            <td width=34%>Euro</td></tr>
        <tr>
            <td width=33%>Periode1</td>
            <td width=33%></td>
            <td width=34%></td>
        </tr>
        <tr>
            <td width=33%>Periode2</td>
            <td width=33%></td>
            <td width=34%></td>
        </tr>
        <tr>
            <td width=33%>Periode3</td>
            <td width=33%></td>
            <td width=34%></td>
        </tr>
    </table>
    
    <?php 
function csv2table ($celldata, $delim, $numcols, $headerrow, $tablestyle) {
	// $celldata 	delimited data
	// $delim		delimiter
	// $numcols		number of columns in table
	// $headerrow	non-zero value will give <th></th> row
	// $tablestyle  anything you want included in the <TABLE> tag
	// $col indice de la colonne
	// hrow les lignes presente dans la colonne
	// La boucle for permet de parcourir les colonnes
	// Le switch permet de tester l'indice de la colonne
	// Quand la colonne est égale a 0 qui est le debut du tableau

	
	echo "<TABLE $tablestyle>\n";
	$b = explode($delim, $celldata); 
	for ($i = 0; $i <= sizeof($b); $i++) {
	    $col = $i % $numcols;
	    $hrow = ($i < $numcols) && $headerrow ;
		
		switch ($col){
			
	    	case 0:		
				echo "<TR>\n";
				if ($hrow) {
					echo "  <TH>\n"; 
				} 
				else { 
					echo "  <TD class=tdinfo>\n"; 
				}
				echo $b[$i] . "\n";
				break;
			default:
				if ($hrow) {
		 	 		echo "	</TH>\n  <TH>\n"; 
		 	 	} else { 
		 	 		echo "	<TD class=tdinfo>\n"; 
		 	 	}
		 		echo $b[$i] ."\n";
				 break;
				 
                 
		}
		if($col == $numcols - 1) { 
			if ($hrow) {
	 	 		echo "	</TH>\n</TR>\n"; 
	 	 	} else {
				echo "	</TD>\n</TR>\n"; 
			}
		}	 
	}
	echo "</TABLE>\n";
}

//Example

$a = "
Utilisateur ,Produit 1,Produit 2,Produit 3,Produit 4, Date,Euro
,123456789,5,2,10, 7,12/01/2021,10,
123456789,1,1,11,3,02/02/201,15,
123456789,3,1,12,2,15/03/2021,20,
123456789,3,1,12,2,16/03/2021,20,
123456789,3,1,12,2,16/0408/2021,20,
123456789,3,1,12,2,01/09/2021,20,
123456789,3,1,12,2,15/11/2021,20,
123456789,3,1,12,2,31/12/2021,20
";

$style = "BORDER=\"1\" CELLSPACING=\"4\" CELLPADDING=\"4\" WIDTH=\"600\"";
csv2table ($a, ",", 7, 1, $style);

?>
           
           
            
        

        
        
    </body>
</html>