<?php
/**
 * eRecorderTemplate - a class for video recorder template
 *
 * @author Eranga Bandara Mapa
 * @file
 * @ingroup Class
 */
	class eEditorTemplate{
                /**
                 * Retriview editor view
                 * @return  $script Html script for editor view
                 */
		function getHTML($params){
			$html='<html>
						 <head>
								<script src="'.Path::getScriptPath().'richtext.js"></script>
								<script src="'.Path::getScriptPath().'sampler.js"></script>
                                                                <style type="text/css">
                                                                  div.box  {
                                                                        width: 900px;
                                                                        border: 2px solid black;
                                                                  }
                                                                </style>
						 </head>
						 <body>
						 <table border="1">
						<th>
							<video id="movies" oncanplay="startVideo()" onended="stopTimeline()" autobuffer="true" width="400px" height="300px" controls>
								<source src="'.Path::getContentPath().$params['videoid'].'.ogv" ><source src="'.Path::getContentPath().$params['videoid'].'.mp4" ><source src="'.Path::getContentPath().$params['videoid'].'.webm" >
							</video>
                                                        <div align="center"><button id="btn1" onclick="updateFrame()">Sample here</button></div>
						</th>
                                                <th>						
							<form name="myform" action="'.$_SERVER['PHP_SELF'].'" onsubmit="return submitJArray();">
								<script>
									initRTE("'.Path::getScriptPath().'images/", "'.Path::getScriptPath().'", "'.Path::getScriptPath().'");
									writeRichText("rte1", content, 100, 300, true, false);
								</script>
								<input type="submit" value="Save content"/><input type="hidden" id="slidedata" name="slidedata" value=""><input type="hidden" id="times" name="times" value=""><input type="hidden" id="sampled" name="sampled" value="false"><input type="hidden" id="videoname" name="videoname" value="'.$params['videoid'].'">
							</form>                                                        
                                                 </th>
                                                 </table>
                                                 <div class="box"><canvas id="timeline" width="900px" height="300px"></div>
						 </body>
					</html>';
			return $html;	
		}
	}

?>