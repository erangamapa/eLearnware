<?php
/**
 * eRecorderTemplate - a class for video viewer template
 *
 * @author Eranga Bandara Mapa
 * @file
 * @ingroup Class
 */
	class eViewerTemplate{
                /**
                 * Retriview viewer view
                 * @return  $html Html script for video viewer
                 */
		function getHTML($params){
                        $script=eDataController::getSlideData($params['videoid']);                   
			$html=' <html>
						 <head>
						   <script src="'.Path::getScriptPath().'popcorn-complete.js"></script><script>'.$script.'</script>
						 </head>
						 <body>
						<table border="1">
							<th>
								<video height="360" width="600" id="ourvideo" controls>								 
								 <source src="'.Path::getContentPath().$params['videoid'].'.ogv"><source src="'.Path::getContentPath().$params['videoid'].'.mp4"><source src="'.Path::getContentPath().$params['videoid'].'.webm">
								</video>
						   </th>
						   <th width="480" style="background-image:url('.Path::getContentPath().'background.jpg);" ><div id="footnote"></div></th>
						</table> 
						 </body>
					</html>';
			return $html;	
		}
	}

?>