<?php
/*
 * This is an example usage file for iTunesLibrary.
 * The script will find any songs and output them in a table, providing a list of tracks
 */

function get_star_rating($rating) {
  switch ($rating) {
    case 100:
      return "*****";
    case 80:
      return "****";
    case 60:
      return "***";
    case 40:
      return "**";
    case 20:
      return "*";
    default:
      return "";
  }
}


/*
iTunesLibrary Object
(
    [_tracks:iTunesLibrary:private] => Array
        (
            [0] => track Object
                (
                    [Track_ID] => 3118
                    [Size] => 5838756
                    [Total_Time] => 284001
                    [Track_Number] => 7
                    [Track_Count] => 19
                    [Year] => 1992
                    [Date_Modified] => 2003-12-19T23:09:33Z
                    [Date_Added] => 2004-02-09T00:09:07Z
                    [Bit_Rate] => 160
                    [Sample_Rate] => 44100
                    [Play_Count] => 12
                    [Play_Date] => 3267805447
                    [Play_Date_UTC] => 2007-07-20T17:44:07Z
                    [Rating] => 100
                    [Album_Rating] => 100
                    [Artwork_Count] => 1
                    [Persistent_ID] => E369455C114F05D8
                    [Track_Type] => File
                    [File_Type] => 1295270176
                    [File_Folder_Count] => 4
                    [Library_Folder_Count] => 1
                    [Name] => I Have A Dream
                    [Artist] => ABBA
                    [Composer] => ABBA
                    [Album] => Gold
                    [Genre] => Pop
                    [Kind] => AAC audio file
                    [Location] => file:///Users/wohlfarth/Music/iTunes/iTunes%20Music/ABBA/Gold/07%20I%20Have%20A%20Dream.m4a
                )
*/


function iTunes_display($form, &$form_state) { 
  $breadcrumb = array();
  $breadcrumb[] = l('Home', '<front>');
  $breadcrumb[] = l('Drupal', 'iTunes/library');
  drupal_set_breadcrumb($breadcrumb);
  $library = new iTunesLibrary('sites/all/modules/custom/iTunesLibraryParser/iTunes Music Library.xml');
  // print_r($library);
  $count = count($library->getTracks());
  $data = &drupal_static(__FUNCTION__);
  
  if (!isset($data)) {
    // if ($cache = cache_get('iTunesLibraryParser')) {
      //$result = 'Cached Data';
      //$result .= $cache->data;
     // return $result;
    //} else {
      // generate new cache
    // $result .= 'New Data';
    $header = array(
      array('data' => 'Artist', 'class' => 'location',  'data-role' => 'LocationFilter'),
      // not interesting: array('data' => 'Album'),
      array('data' => 'Name'),
      array('data' => 'Time'),
      array('data' => 'Rating'),
      array('data' => 'Genre'),
      array('data' => 'Play'),
    );
    
    foreach( $library->getTracks() as $track ) {
      if ( strstr( $track->Kind, 'audio file') and $track->Artist != '') { 
        //$minsandsecs = date('i:s',$track->Total_Time);
        $rows[] = array(
          array('data' => $track->Artist),
          // not interesting: array('data' => $track->Album),
          array('data' => $track->Name),
          array('data' => date('i:s', floor($track->Total_Time/1000))), // convert miliseconds into minutes:seconds
          array('data' => get_star_rating($track->Rating)),
          array('data' => $track->Genre),
          array('data' => '<a href="'.$track->Location. '" class="fa fa-play-circle-o"></a>'),

        );
      }
    }

    $result = theme('table',
      array(
        'header' => $header,
        'rows' => $rows,
        'attributes' => array('id' => array('music'), 'style' => array('width:100%'))
      )
    );
    $timeout = 100000;
    // cache_set($cacheName, $response, 'cache',time() + $timeout);
    cache_set('iTunesLibraryParser', $result, 'cache',time() + $timeout);
    //}
  }
  return $result;


}
