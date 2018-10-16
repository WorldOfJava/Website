<?php

function print_html_header($title)
{
	echo "<!DOCTYPE html>\n <html lang=\"de\">\n <head>\n <meta charset=\"utf-8\">\n <title>".$title."</title>\n </head>\n <body>\n";
}

/* In den Eingaben sollen SQL- und HTML-Anteile maskiert werden */
function sichere_eingaben($db_link, $eingabe)
{ 
	return mysqli_real_escape_string($db_link,htmlentities($eingabe,ENT_QUOTES, "UTF-8"));
}
?>