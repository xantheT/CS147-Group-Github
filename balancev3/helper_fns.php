<?php 

// DISPLAYS COMMENT POST TIME AS "1 year, 1 week ago" or "5 minutes, 7 seconds ago", etc...
//This 'time_ago' fn is open source and was found here:
//http://www.mdj.us/web-development/php-programming/another-variation-on-the-time-ago-php-function-use-mysqls-datetime-field-type/
function time_ago($date,$granularity=2) {
    $date = strtotime($date);
    $difference = time() - $date;
    $periods = array('decade' => 315360000,
        'yr' => 31536000,
        'mo' => 2628000,
        'wk' => 604800, 
        'd' => 86400,
        'hr' => 3600,
        'm' => 60,
        's' => 1);
    if ($difference < 5) { // less than 5 seconds ago, let's say "just now"
        $retval = "posted just now";
        return $retval;
    } else {                            
        foreach ($periods as $key => $value) {
            if ($difference >= $value) {
                $time = floor($difference/$value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '').$time.'';
                $retval .= /*(($time > 1) ? $key.'s' : */$key /*)*/;
                $granularity--;
            }
            if ($granularity == '0') { break; }
        }
        return $retval; //.' ago';      
    }
}



//Takes in a db row (must be a story object from the db) and returns the string of html
//that will represent that story in a list of thumbnail stories... ie. on the home page, search results, profile.
function output_story_brief($row){

        $date = time_ago($row["time"]); //this calls fn to sanitize the timestamp to 'ago' format

        //compile html output for the story in its list format
        $html_output = "";
        $html_output.= "<ul class=\"nav nav-tabs nav-stacked story\">";
        $html_output.= "<li>";
        $html_output.= "<div><a href=\"story.php?id=".$row["id"]."\">";
        $html_output.= "<img src=\"img/stories/".$row["picture"]."\" class=\"subStory\">";
        $html_output.= $row["title"];
        $html_output.= "<br/>";
        $html_output.= "<p class=\"muted small\">".$row["source"]." - ".$date."<br />";
        $html_output.= get_social_score_html_ARRAY($row)." ";
        $html_output.= get_fiscal_score_html_ARRAY($row)."  ";
        $html_output.= "<i class=\"icon-chevron-right\"></i>";
        $html_output.= "</p>";
        $html_output.= "</a></div>";
        $html_output.= "</li>";
        $html_output.= "</ul>";
    return $html_output;
}

//Takes in a db row (must be a story object from the db) and returns the string of html
//that will represent the main story on the home page - the one that comes first, with the bigger pic
function output_main_story_brief($row){

        $date = time_ago($row["time"]); //this calls fn to sanitize the timestamp to 'ago' format

        //compile html output for the main story brief format
        $html_output = "";
        $html_output .= "<div class=\"mainStory\"><div class=\"mainStory-inner story\">";
        $html_output .= "<a href=\"story.php?id=".$row["id"]."\">";
        $html_output .= "<div class=\"item\">";
        $html_output .= "<img src=\"img/stories/".$row["picture"]."\">";
        $html_output .= "<div class=\"mainStory-caption\">";
        $html_output .= "<p>".$row["title"]."</p>";
        $html_output.= "<span class=\"muted small\">".$row["source"]." - ".$date." ago <br />";
        $html_output.= get_social_score_html_ARRAY($row)." ";
        $html_output.= get_fiscal_score_html_ARRAY($row)."  ";
        $html_output.= "<i class=\"icon-chevron-right icon-white\"></i>";
        $html_output.= "</span></div></div></a></div></div>";

    return $html_output;
}




//Takes in a db row and returns the string of html for the fiscal score label
function get_fiscal_score_html($row)
{
            if ($row->fiscal_scale > 75) {
                    $fiscString = "class= 'label label-cons'"; //displays red
                    $fiscLabel = "Conservative";
                } elseif (($row->fiscal_scale >= 40) && ($row->fiscal_scale <= 60)) { //this case should be fairly rare... I think
                    $fiscString = "class = 'label'"; //displays grey
                    $fiscLabel = "Moderate";
                } elseif ($row->fiscal_scale < 25) { //this case should be fairly rare... I think
                    $fiscString = "class= 'label label-lib'"; //displays grey
                    $fiscLabel = "Liberal";
                } elseif (($row->fiscal_scale >= 25) && ($row->fiscal_scale < 40)) { //this case should be fairly rare... I think
                    $fiscString = "class = 'label label-mod-lib'"; //displays grey
                    $fiscLabel = "Liberal";
                } elseif (($row->fiscal_scale > 60)&&($row->fiscal_scale <= 75)) { //this case should be fairly rare... I think
                    $fiscString = "class = 'label label-mod-cons'"; //displays grey
                    $fiscLabel = "Conservative";
                }
        return "<span ".$fiscString."><img src='img/icons/pricetag.png' class='scoreImgPrice'>".$fiscLabel."</span>";
}

//Takes in a db row and returns the string of html for the social score label
function get_social_score_html($row)
{
            if ($row->social_scale > 75) {
                    $socString = "class= 'label label-cons'"; //displays red
                    $socLabel = "Conservative";
                } elseif (($row->social_scale >= 40) && ($row->social_scale <= 60)) { //this case should be fairly rare... I think
                    $socString = "class = 'label'"; //displays grey
                    $socLabel = "Moderate";
                } elseif ($row->social_scale < 25) { //this case should be fairly rare... I think
                    $socString = "class= 'label label-lib'"; //displays grey
                    $socLabel = "Liberal";
                } elseif (($row->social_scale >= 25) && ($row->social_scale < 40)) { //this case should be fairly rare... I think
                    $socString = "class = 'label label-mod-lib'"; //displays grey
                    $socLabel = "Liberal";
                } elseif (($row->social_scale > 60)&&($row->social_scale <= 75)) { //this case should be fairly rare... I think
                    $socString = "class = 'label label-mod-cons'"; //displays grey
                    $socLabel = "Conservative";
                }                
    return "<span ".$socString."><img src='img/icons/group.png' class='scoreImgGroup'>".$socLabel."</span>";
}

//Takes in a db row and returns the string of html for the fiscal score label
//NB: does this for objects that have to be accessed via the array notation and not -> notation
function get_social_score_html_ARRAY($row)
{
            if ($row['social_scale'] > 75) {
                    $socString = "class= 'label label-cons'"; //displays red
                    $socLabel = "Conservative";
                } elseif (($row['social_scale'] >= 40) && ($row['social_scale'] <= 60)) { //this case should be fairly rare... I think
                    $socString = "class = 'label'"; //displays grey
                    $socLabel = "Moderate";
                } elseif ($row['social_scale'] < 25) { //this case should be fairly rare... I think
                    $socString = "class= 'label label-lib'"; //displays grey
                    $socLabel = "Liberal";
                } elseif (($row['social_scale'] >= 25) && ($row['social_scale'] < 40)) { //this case should be fairly rare... I think
                    $socString = "class = 'label label-mod-lib'"; //displays grey
                    $socLabel = "Liberal";
                } elseif (($row['social_scale'] > 60)&&($row['social_scale'] <= 75)) { //this case should be fairly rare... I think
                    $socString = "class = 'label label-mod-cons'"; //displays grey
                    $socLabel = "Conservative";
                }                
    return "<span ".$socString."><img src='img/icons/group.png' class='scoreImgGroup'>".$socLabel."</span>";
}


//Takes in a db row and returns the string of html for the social score label
//NB: does this for objects that have to be accessed via the array notation and not -> notation
function get_fiscal_score_html_ARRAY($row)
{
            if ($row['fiscal_scale'] > 75) {
                    $fiscString = "class= 'label label-cons'"; //displays red
                    $fiscLabel = "Conservative";
                } elseif (($row['fiscal_scale'] >= 40) && ($row['fiscal_scale'] <= 60)) { //this case should be fairly rare... I think
                    $fiscString = "class = 'label'"; //displays grey
                    $fiscLabel = "Moderate";
                } elseif ($row['fiscal_scale'] < 25) { //this case should be fairly rare... I think
                    $fiscString = "class= 'label label-lib'"; //displays grey
                    $fiscLabel = "Liberal";
                } elseif (($row['fiscal_scale'] >= 25) && ($row['fiscal_scale'] < 40)) { //this case should be fairly rare... I think
                    $fiscString = "class = 'label label-mod-lib'"; //displays grey
                    $fiscLabel = "Liberal";
                } elseif (($row['fiscal_scale'] > 60)&&($row['fiscal_scale'] <= 75)) { //this case should be fairly rare... I think
                    $fiscString = "class = 'label label-mod-cons'"; //displays grey
                    $fiscLabel = "Conservative";
                }
        return "<span ".$fiscString."><img src='img/icons/pricetag.png' class='scoreImgPrice'>".$fiscLabel."</span>";
}


//queries the current user who is logged in. Acesses this via the session info that we store
function getCurrUser()
{
    include("config.php");
    $query = sprintf("SELECT * FROM balance_users WHERE id = %d",
        mysql_real_escape_string($_SESSION['user_id'])); //constructs query
    $result = mysql_query($query);  // Perform Query
    return mysql_fetch_object($result);  //get user object
}


//given an id parameter, queries the db to get the story object that matches that id
function getCurrStory($id)
{
    include("config.php");
    $query = sprintf("SELECT * FROM balance_stories WHERE id = %d",
        mysql_real_escape_string($id)); //constructs query
    $result = mysql_query($query);  // Perform Query
    return mysql_fetch_object($result);  //get story object
}



?>