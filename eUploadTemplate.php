<?php
/**
 * eRecorderTemplate - a class for video upload template
 *
 * @author Eranga Bandara Mapa
 * @file
 * @ingroup Class
 */
	class eUploadTemplate{
                /**
                 * Retriview upload view
                 * @return  $html Html script for video upload
                 */
		function getHTML(){
			$html='	<html>
						<head>
							<title>Uplad a video file</title>
						</head>						 
						<body>
							<form name="uploadform" action="'.$_SERVER['PHP_SELF'].'">
								<input type="text" id="videoname" name="videoname" />
								<input type="submit" value="Save" />
							</form>
						</body>
					</html>';
			return $html;	
		}
	}

?>