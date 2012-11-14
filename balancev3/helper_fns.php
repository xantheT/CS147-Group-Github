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


            //This bit adds some color to the  label for the fiscal and social scale!!!
        //get the number in our db then assign to C (>50) or L (<50)
        //Then use the num to give the scale value a % strength for either c or l
        //Where 100% L = 0 in the db, 50% L = 25 in db,
        // 50% C = 75 in the db, 100%C = 100 in db. 
                if ($row["fiscal_scale"] > 50) {
                    $fiscString = "class= 'label label-important'"; //displays red
                    $fNum = (($row["fiscal_scale"] - 50)/50) *100;   
                    $fiscLabel = "% Cons.";
                } elseif ($row["fiscal_scale"]  == 50) { //this case should be fairly rare... I think
                    $fiscString = "class = 'label'"; //displays grey
                    $fNum = "";
                    $fiscLabel = "0%";
                } else {  //LIBERAL
                    $fiscString = "class= 'label label-info'"; //displays blue
                    $fNum = (50-($row["fiscal_scale"]))*2;
                    $fiscLabel = "% Lib.";
                }

                if ($row["social_scale"] > 50) {
                    $socString = "class= 'label label-important'"; //displays red
                    $sNum = (($row["social_scale"] - 50)/50) *100;
                    $socLabel = "% Cons.";
                } elseif ($row["social_scale"] == 50) {
                    $socString = "class = 'label'"; //displays grey
                    $sNum = "";
                    $socLabel = "0%";
                } else { //LIBERAL
                    $socString = "class= 'label label-info'"; //displays blue
                    $sNum = (50 -($row["social_scale"]))*2;
                    $socLabel = "% Lib.";
                }

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
        $html_output.= "<span ".$socString.">S: ".$sNum.$socLabel."</span> ";
        $html_output.= "<span ".$fiscString.">F: ".$fNum.$fiscLabel."</span>  ";
        $html_output.= "<i class=\"icon-chevron-right\"></i>";
        $html_output.= "</p>";
        $html_output.= "</a></div>";
        $html_output.= "</li>";
        $html_output.= "</ul>";
    return $html_output;
}


function output_main_story_brief($row){
        //This bit adds some color to the  label for the fiscal and social scale!!!
        //get the number in our db then assign to C (>50) or L (<50)
        //Then use the num to give the scale value a % strength for either c or l
        //Where 100% L = 0 in the db, 50% L = 25 in db,
        // 50% C = 75 in the db, 100%C = 100 in db. 
                if ($row["fiscal_scale"] > 50) {
                    $fiscString = "class= 'label label-important'"; //displays red
                    $fNum = (($row["fiscal_scale"] - 50)/50) *100;   
                    $fiscLabel = "% Cons.";
                } elseif ($row["fiscal_scale"]  == 50) { //this case should be fairly rare... I think
                    $fiscString = "class = 'label'"; //displays grey
                    $fNum = "";
                    $fiscLabel = "0%";
                } else {  //LIBERAL
                    $fiscString = "class= 'label label-info'"; //displays blue
                    $fNum = (50-($row["fiscal_scale"]))*2;
                    $fiscLabel = "% Lib.";
                }

                if ($row["social_scale"] > 50) {
                    $socString = "class= 'label label-important'"; //displays red
                    $sNum = (($row["social_scale"] - 50)/50) *100;
                    $socLabel = "% Cons.";
                } elseif ($row["social_scale"] == 50) {
                    $socString = "class = 'label'"; //displays grey
                    $sNum = "";
                    $socLabel = "0%";
                } else { //LIBERAL
                    $socString = "class= 'label label-info'"; //displays blue
                    $sNum = (50 -($row["social_scale"]))*2;
                    $socLabel = "% Lib.";
                }

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
        $html_output.= "<span ".$socString.">S: ".$sNum.$socLabel."</span> ";
        $html_output.= "<span ".$fiscString.">F: ".$fNum.$fiscLabel."</span>  ";
        $html_output.= "<i class=\"icon-chevron-right icon-white\"></i>";
        $html_output.= "</span></div></div></a></div></div>";

    return $html_output;

}


//Takes in a db row and returns the string of html for the two <span>s that
// will represent the two %'s for the fiscal and social score of the given object (user or story)
function get_percentage_labels_span($row)
{
        //This bit adds some color to the  label for the fiscal and social scale!!!
        //get the number in our db then assign to C (>50) or L (<50)
        //Then use the num to give the scale value a % strength for either c or l
        //Where 100% L = 0 in the db, 50% L = 25 in db,
        // 50% C = 75 in the db, 100%C = 100 in db. 
                if ($row->fiscal_scale > 50) {
                    $fiscString = "class= 'label label-important'"; //displays red
                    $fNum = (($row->fiscal_scale - 50)/50) *100;   
                    $fiscLabel = "% Cons.";
                } elseif ($row->fiscal_scale  == 50) { //this case should be fairly rare... I think
                    $fiscString = "class = 'label'"; //displays grey
                    $fNum = "";
                    $fiscLabel = "0%";
                } else {  //LIBERAL
                    $fiscString = "class= 'label label-info'"; //displays blue
                    $fNum = (50-($row->fiscal_scale))*2;
                    $fiscLabel = "% Lib.";
                }

                if ($row->social_scale > 50) {
                    $socString = "class= 'label label-important'"; //displays red
                    $sNum = (($row->social_scale - 50)/50) *100;
                    $socLabel = "% Cons.";
                } elseif ($row->social_scale == 50) {
                    $socString = "class = 'label'"; //displays grey
                    $sNum = "";
                    $socLabel = "0%";
                } else { //LIBERAL
                    $socString = "class= 'label label-info'"; //displays blue
                    $sNum = (50 -($row->social_scale))*2;
                    $socLabel = "% Lib.";
                }

        $html_output = "<span ".$socString.">S: ".$sNum.$socLabel."</span> ";
        $html_output.= "<span ".$fiscString.">F: ".$fNum.$fiscLabel."</span>";
        return $html_output;
}

function getCurrUser()
{
    include("config.php");
    $query = sprintf("SELECT * FROM balance_users WHERE id = %d",
        mysql_real_escape_string($_SESSION['user_id'])); //constructs query
    $result = mysql_query($query);  // Perform Query
    return mysql_fetch_object($result);  //get user object
}


?>