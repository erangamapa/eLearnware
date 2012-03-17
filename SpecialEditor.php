<?php
/**
 * Special:Editor - a special page for create a slideshow to synchronize with video
 *
 * @author Eranga Bandara Mapa
 * @file
 * @ingroup Special page
 */
class Editor extends SpecialPage {
        /**
	 * Constructor
	 */
        function __construct() {
                parent::__construct( 'Editor' );
        }

        /**
	 * Main execution function
	 * @param $par Parameters passed to the page
	 */
        function execute($par){
			global $wgRequest, $wgOut;
			$this->setHeaders();
                        //setting video id parameter
			$param = 'empty';
                        //reading mediawiki web request parameters
			$content=$wgRequest->getArray('slidedata');
			$time=$wgRequest->getArray('times');
                        //reading mediawiki web request type
			//$uploaded=$wgRequest->getCheck('uploaded');
                        $nameinc=$wgRequest->getCheck('videoname');
                        $deleteinc=$wgRequest->getCheck('delete');
			$videoname=$wgRequest->getText('videoname');
                        $sampled=$wgRequest->getText('sampled');
                        //enable video add view
			if(($content==null)&&(!$nameinc)){
				$output='<eupload videoId='.$param.'></eupload>';                
				$wgOut->addWikiText( $output );
			}
                        //enable video edit saved view
			else if($content!=null){
                            //check weather sampling has happned
                            if($sampled=='true'){
                                //add slide data to database
                                if(eDataController::insertSlideData($content[0],$time[0],$videoname)){
                                    $wgOut->addWikiText('<h3>Your changes saved successfully</h3>');
                                }
                                else{
                                    $wgOut->addWikiText('<h3>Video saving error!</h3>');
                                }
                            }
                            else{
                                    $wgOut->addWikiText('<h3>Please sample and add content to your video</h3>');
                            }
			}
                        //enable video edit view
			else if($nameinc&&!$deleteinc){
                        //insert uploaded video data to database
                            if(!eDataController::isContentExist($videoname)){
                                    $output='<eeditor videoId='.$videoname.'></eeditor>';
                                    $wgOut->addWikiText($output);
                            }
                            else{
                                $output='<econtentdelete videoId='.$videoname.'></econtentdelete>';
				$wgOut->addWikiText( $output );
                            }
			}
                        else if($deleteinc){
                            if(eDataController::deleteExistContent($videoname)){
                                    $output='<eeditor videoId='.$videoname.'></eeditor>';
                                    $wgOut->addWikiText($output);
                            }
                        }
        }
}
?>