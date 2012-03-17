<?php
/**
 * Special:Viewer - a special page to view eLearnware content
 *
 * @author Eranga Bandara Mapa
 * @file
 * @ingroup Special page
 */
class Viewer extends SpecialPage {
        /**
	 * Constructor
	 */
        function __construct() {
                parent::__construct( 'Viewer' );
        }

         /**
	 * Main execution function
	 * @param $par Parameters passed to the page
	 */
        function execute( $par ) {
                global $wgRequest, $wgOut;
                $this->setHeaders();
                $videoname=$wgRequest->getText('videoname');
                $nameinc=$wgRequest->getCheck('videoname');
 
                # Get request data from, e.g.
                        # Do stuff
                 # ...                
                if($nameinc){
                     $output = '<eviewer videoId='.$videoname.'></eviewer>';
                     $wgOut->addWikiText( $output );
                }
                else{
                    $output = '<elist script="" ></elist>';
                    $wgOut->addWikiText( $output );
                }
        }
}
?>