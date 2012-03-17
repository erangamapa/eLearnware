<?php
/**
 * eListTemplate - a class for video list template
 *
 * @author Eranga Bandara Mapa
 * @file
 * @ingroup Class
 */
	class eListTemplate{
                /**
                 * Retriview Vlist view
                 * @return  $html Html script for video list view
                 */
		function getHTML($params){
                        $script=eDataController::getVideoData();
			$html='<html>
					<head>
					</head>
					<body>
                                        Video List
                                        '.$script.'
					</body>
				</html>';
			return $html;	
		}
	}

?>