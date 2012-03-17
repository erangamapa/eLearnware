<?php
/**
 * eContentDeleteTemplate - a class to verify weather user needs to delete existing content
 *
 * @author Eranga Bandara Mapa
 * @file
 * @ingroup Class
 */
	class eContentDeleteTemplate{
                /**
                 * Retriview delete verfying view
                 * @return  $html Html script for content delete verify
                 */
		function getHTML($params){
			$html='	<html>
						<head>
							<title>Content exist for the given video name</title>
						</head>
						<body>
                                                Do you want to delete existing content for the given video name
                                                and start to create new content to the video
							<form name="uploadform" action="'.$_SERVER['PHP_SELF'].'">
								<input type="submit" value="Proceed" /><input type="hidden" id="videoname" name="videoname" value="'.$params['videoid'].'" /><input type="hidden" id="delete" name="delete" value="delete" />
							</form>
						</body>
					</html>';
			return $html;
		}
	}

?>