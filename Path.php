<?php
/**
 * eRecorderTemplate - a class for video recorder template
 *
 * @author Eranga Bandara Mapa
 * @file
 * @ingroup Class
 */
	class Path{
                /**
                 * Retriview paths for multimedia content
                 * @return  path directory for content folder
                 */
		 function getContentPath(){
                        global $myPath;
			return $myPath.'content/';
		 }
                 /**
                 * Retriview paths for main
                 * @return  path directory for extention folder
                 */
		 function getMainPath(){
                        global $myPath;
			return $myPath;;
		 }
                 /**
                 * Retriview paths scripts
                 * @return  path directory for scripts folder
                 */
		 function getScriptPath(){
                        global $myPath;
			return $myPath.'scripts/';
		 }
	}
?>