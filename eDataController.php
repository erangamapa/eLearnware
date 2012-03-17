<?php
/**
 * eDataController - a class for database access
 *
 * @author Eranga Bandara Mapa
 * @file
 * @ingroup Class
 */
	class eDataController{
                 /**
                 * Insert slide content for each slide into the database
                 * @param  $slideString String slide content
                 * @param  $timeString String slide timeing data
                 */
		 function insertSlideData($slideString,$timeString,$videoname){
			$slideData=explode(',elw',$slideString);
                        $timeData=explode(',',$timeString);
                        $timeCount=count($timeData);
                        $timeData[$timeCount]=5000;
                        $i=0;
                        $sql='INSERT INTO my_wikislides VALUES';
                        foreach($slideData as $single){
                                $single=mysql_escape_string($single);
                                $sql.='("'.$videoname.'",'.$timeData[$i].','.$timeData[$i+1].',"'.$single.'")';
                                $i++;
                                if($i<$timeCount){
                                        $sql.=',';
                                }
                                else{
                                        break;
                                }
                        }
                        $dbw=wfGetDB(DB_MASTER);                        
                        $dbw->query( $sql);
			return true;
		 }
                 /**
                 * Retriview slide content for each slide from database
                 * @return  $script Slide content embeded javascript
                 */
		 function getSlideData($videoname){
			$dbr = wfGetDB( DB_SLAVE );
			$sql='SELECT * FROM my_wikislides WHERE video_name="'.$videoname.'" ORDER BY in_time';
			$res = $dbr->query($sql);
			$script='document.addEventListener( "DOMContentLoaded", function() {
								   var popcorn = Popcorn( "#ourvideo" );';
			foreach($res as $row){
				$content=str_replace('"','\'',$row->content);
				$script.='popcorn.footnote({
									 start: '.$row->in_time.',
									 end: '.$row->out_time.',
									 target: "footnote",
									 text: "'.$content.'"
								   });';
			}
			$script.='}, false );';
                        return  $script;
		 }
                 /**
                 * Retriview video content for each slide from database
                 * @return  $script Slide content embeded javascript
                 */
		 function getVideoData(){
			$dbr = wfGetDB( DB_SLAVE );
			$sql='SELECT DISTINCT video_name FROM my_wikislides';
			$res = $dbr->query($sql);
                        $script='<br>';
			foreach($res as $key => $single){
                            $script.=$key.'. <a href="'.$_SERVER['PHP_SELF'].'?videoname='.$single->video_name.'">'.$single->video_name.'</a>';
                            $script.='<br>';
                        }
                        return  $script;
		 }

                 /**
                 * Retriview video content for each slide from database
                 * @return  $script Slide content embeded javascript
                 */
//		 function getVideoData(){
//			$dbr = wfGetDB( DB_SLAVE );
//			$sql='SELECT DISTINCT video_name FROM my_wikislides';
//			$res = $dbr->query($sql);
//                        $script='== Getting started ==<br>';
//			foreach($res as $key => $single){
//                            $script.='* [//'.$_SERVER["SERVER_NAME"].$_SERVER["PHP_SELF"].'?videoname='.$single->video_name.' '.$single->video_name.']';
//                            $script.='<br>';
//                        }
//                        return  $script;
//		 }

                  /**
                 * Insert video data for each uploading video
                 * @param  $videoname String name of the uploaded video
                 */
//		 function insertVideoData($videoname){
//			$sql="INSERT INTO my_wikivideos (name) VALUES('".$videoname."')";
//                        $dbw=wfGetDB(DB_MASTER);
//			$fname='DatabaseBase::insert';
//			$dbw->query( $sql, $fname );
//                        return true;
//		 }
                 function isContentExist($videoName){
                        $dbr = wfGetDB( DB_SLAVE );
			$sql='SELECT * FROM my_wikislides WHERE video_name="'.$videoName.'"';
			$res = $dbr->query($sql);
                        $rowc=$res->numRows();
                        if($rowc==0){
                            return false;
                        }
                        else{
                            return true;
                        }
                 }
                 function deleteExistContent($videoName){
                        $dbw=wfGetDB(DB_MASTER);
			$sql='DELETE FROM my_wikislides WHERE video_name="'.$videoName.'"';
			$dbw->query($sql);
                        return true;
                 }
//                 function deleteExistVideo($videoName){
//                        $dbw=wfGetDB(DB_MASTER);
//			$sql='DELETE FROM my_wikivideos WHERE name="'.$videoName.'"';
//			$dbw->query($sql);
//                        return true;
//                 }
	}
?>