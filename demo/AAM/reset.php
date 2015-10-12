<html>
  <head>
    <title>DEMO</title>
    <META http-equiv="refresh" content="0;URL=index.php">
  </head>
  <body bgcolor="#ffffff">
  <?php
    $con=mysqli_connect("localhost","root","hogsmeade","rfid");
    if (mysqli_connect_errno()){echo "Failed to connect to MySQL:".mysqli_connect_error();}
    $result = mysqli_query($con,"TRUNCATE aggregation_arduino1");
    $result = mysqli_query($con,"TRUNCATE aggregation_arduino2");
    $result = mysqli_query($con,"TRUNCATE aggregation_arduino1_log");
    $result = mysqli_query($con,"TRUNCATE aggregation_arduino2_log");
    $result = mysqli_query($con,"TRUNCATE language_arduino1");
    $result = mysqli_query($con,"TRUNCATE language_arduino2");
    $result = mysqli_query($con,"TRUNCATE log");
    $result = mysqli_query($con,"TRUNCATE log_arduino1");
    $result = mysqli_query($con,"TRUNCATE log_arduino2");    
    
/*    $result = mysqli_query($con,"content_arduino1");
    $result = mysqli_query($con,"content_arduino2");    
    $result = mysqli_query($con,"DROP TABLE content_arduino1");
    $result = mysqli_query($con,"DROP TABLE content_arduino2");    

$result = mysqli_query($con,"    
CREATE TABLE IF NOT EXISTS `content_arduino1` (
  `X` int(11) NOT NULL AUTO_INCREMENT,
  `ID` text NOT NULL,
  `value` text NOT NULL,
  `language` text NOT NULL,
  `text` text NOT NULL,
  `aggregated_text` text NOT NULL,
  `visitor` text NOT NULL,
  PRIMARY KEY (`X`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;    ");

    $result = mysqli_query($con,"
INSERT INTO `content_arduino1` (`X`, `ID`, `value`, `language`, `text`, `aggregated_text`, `visitor`) VALUES
(1, 'B1', '0C00319AFB5C', 'English', 'The colors of this shawl are traditional in clothing from El Salvador.', 'Notice the distinctly darker shades of the colors in this shawl from El Salvador, compared to the dress from Guatemala. The difference in dye color is due to each country''s unique vegetation. \r\n', 'Visitor1'),
(2, 'B2', '0C004745E6E8', 'Spanish', 'Los colores de este chal son tradicionales en la ropa de El Salvador.', 'Observe los tonos claramente más oscuras de los colores en este mantón de El Salvador, en comparación con el vestido de Guatemala. La diferencia en el color de tinte se debe a la vegetación única de cada país.', 'Visitor2'),
(3, 'R1', '10002144F782', 'German', 'Die Farben dieses Schal sind im traditionellen Kleidung aus El Salvador.', 'Beachten Sie die deutlich dunkleren Schattierungen der Farben in dieser Schal aus El Salvador, im Vergleich zu dem Kleid aus Guatemala. Der Unterschied in der Farbstoff-Farbe ist auf einzigartige Vegetation des jeweiligen Landes.', 'Visitor3'),
(4, 'R2', '100021574523', 'Italian', 'I colori di questa scialle sono tradizionali in vestiti da El Salvador.', 'Notate le tonalità nettamente più scure dei colori di questa scialle dal El Salvador, rispetto al vestito dal Guatemala. La differenza di colore della tintura è dovuto alla vegetazione unica di ciascun paese.', 'Visitor4'),
(5, 'Y1', '0F002D84BD1B', 'French', 'Les couleurs de ce châle sont traditionnels dans les vêtements de El Salvador.', 'Remarquez les nuances nettement plus sombres des couleurs dans ce châle du El Salvador, par rapport à la robe de Guatemala. La différence de couleur de teinture est dû à la végétation unique de chaque pays.', 'Visitor5'),
(6, 'Y2', '0F00305F1777', 'Portuguese', 'As cores deste xale são tradicionais em roupas de El Salvador.', 'Observe os tons mais escuros distintamente das cores neste xale da El Salvador, em comparação com o vestido da Guatemala. A diferença na cor da tintura é devido a vegetação única de cada país.', 'Visitor6'),
(7, 'P1', '0D001EFE967B', 'Default', 'The colors of this shawl are traditional in clothing from El Salvador.', 'Notice the distinctly darker shades of the colors in this shawl from El Salvador, compared to the dress from Guatemala. The difference in dye color is due to each country''s unique vegetation. ', '-');
");    
$result = mysqli_query($con,"    
CREATE TABLE IF NOT EXISTS `content_arduino2` (
  `X` int(11) NOT NULL AUTO_INCREMENT,
  `ID` text NOT NULL,
  `value` text NOT NULL,
  `language` text NOT NULL,
  `text` text NOT NULL,
  `aggregated_text` text NOT NULL,
  `visitor` text NOT NULL,
  PRIMARY KEY (`X`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;    ");

    $result = mysqli_query($con,"
INSERT INTO `content_arduino2` (`X`, `ID`, `value`, `language`, `text`, `aggregated_text`, `visitor`) VALUES
(1, 'B1', '0C00319AFB5C', 'English', 'The colors of this dress are traditional in Guatemalan clothing.', 'Notice the distinctly darker shades of the colors in this dress from El Salvador, compared to the dress from Guatemala. The difference in dye color is due to each country''s unique vegetation. \r\n', 'Visitor1'),
(2, 'B2', '0C004745E6E8', 'Spanish', 'Los colores de este vestido son tradicionales en prendas de vestir de Guatemala.', 'Observe los tonos claramente más oscuras de los colores en este mantón de El Salvador, en comparación con el vestido de Guatemala. La diferencia en el color de tinte se debe a la vegetación única de cada país.', 'Visitor2'),
(3, 'R1', '10002144F782', 'German', 'Die Farben des Kleides sind in guatemaltekischen traditionellen Kleidung.', 'Beachten Sie die deutlich dunkleren Schattierungen der Farben in dieser Schal aus El Salvador, im Vergleich zu dem Kleid aus Guatemala. Der Unterschied in der Farbstoff-Farbe ist auf einzigartige Vegetation des jeweiligen Landes.', 'Visitor3'),
(4, 'R2', '100021574523', 'Italian', 'I colori di questo vestito sono tradizionali in vestiti guatemalteco.', 'Notate le tonalità nettamente più scure dei colori di questa scialle dal El Salvador, rispetto al vestito dal Guatemala. La differenza di colore della tintura è dovuto alla vegetazione unica di ciascun paese.', 'Visitor4'),
(5, 'Y1', '0F002D84BD1B', 'French', 'Les couleurs de cette robe sont traditionnels dans les vêtements guatémaltèque.', 'Remarquez les nuances nettement plus sombres des couleurs dans ce châle du El Salvador, par rapport à la robe de Guatemala. La différence de couleur de teinture est dû à la végétation unique de chaque pays.', 'Visitor5'),
(6, 'Y2', '0F00305F1777', 'Portuguese', 'As cores deste vestido são tradicionais em roupas da Guatemala.', 'Observe os tons mais escuros distintamente das cores neste xale da El Salvador, em comparação com o vestido da Guatemala. A diferença na cor da tintura é devido a vegetação única de cada país.', 'Visitor6'),
(7, 'P1', '0D001EFE967B', 'Default', 'The colors of this dress are traditional in Guatemalan clothing.', 'Notice the distinctly darker shades of the colors in this shawl from El Salvador, compared to the dress from Guatemala. The difference in dye color is due to each country''s unique vegetation. ', '-');
    ");    
  */  
    
  ?>              
  </body>
</html>