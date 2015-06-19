<?php
function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

function getPlayerName($con, $tablepre, $player_id)
{
  $query = $con->prepare("SELECT user FROM " . $tablepre . "user WHERE rowid=?");
  $query->bind_param("i", $player_id);
  $query->execute();
  $user = NULL;
  $query->bind_result($user);
  $query->fetch();
  return $user;
}

function getPlayerId($con, $tablepre, $player)
{
  $query = $con->prepare("SELECT rowid FROM " . $tablepre . "user WHERE user=?");
  $query->bind_param("s", $player);
  $query->execute();
  $user = NULL;
  $query->bind_result($user);
  $query->fetch();
  return $user;
}


function getBansPlayerName($con, $id)
{
  $query = $con->prepare("SELECT name FROM banhammer_players WHERE id=?");
  $query->bind_param("i", $id);
  $query->execute();
  $user = NULL;
  $query->bind_result($user);
  $query->fetch();
  return $user;
}

function getBansPlayerId($con, $player_name)
{
  $query = $con->prepare("SELECT id FROM banhammer_players WHERE name=?");
  $query->bind_param("s", $player_name);
  $query->execute();
  $id = NULL;
  $query->bind_result($id);
  $query->fetch();
  return $id;
}

function getBansReason($con, $id)
{
  $query = $con->prepare("SELECT reason FROM banhammer_bans WHERE state=0 AND player_id=?");
  $query->bind_param("i", $id);
  $query->execute();
  $reason = NULL;
  $query->bind_result($reason);
  $query->fetch();
  return $reason;
}

function getbanner($con, $id)
{
  $query = $con->prepare("SELECT creator_id FROM banhammer_bans WHERE state=0 AND player_id=?");
  $query->bind_param("i", $id);
  $query->execute();
  $reason = NULL;
  $query->bind_result($reason);
  $query->fetch();
  return $reason;
}

function time_elapsed_A($secs){
    $bit = array(
        'y' => $secs / 31556926 % 12,
        'w' => $secs / 604800 % 52,
        'd' => $secs / 86400 % 7,
        'h' => $secs / 3600 % 24,
        'm' => $secs / 60 % 60,
        's' => $secs % 60
        );
        
    foreach($bit as $k => $v)
        if($v > 0)$ret[] = $v . $k;
        
    return join(' ', $ret);
    }
    

function time_elapsed_B($secs){
    $bit = array(
        ' year'        => $secs / 31556926 % 12,
        ' week'        => $secs / 604800 % 52,
        ' day'        => $secs / 86400 % 7,
        ' hour'        => $secs / 3600 % 24,
        ' minute'    => $secs / 60 % 60,
        ' second'    => $secs % 60
        );
        
    foreach($bit as $k => $v){
        if($v > 1)$ret[] = $v . $k . 's';
        if($v == 1)$ret[] = $v . $k;
        }
    array_splice($ret, count($ret)-1, 0);
    
    return join(' ', $ret);
    }
function is_banned($bhcon,$player){
	$banned = false;
	$result = mysqli_query($bhcon,"SELECT * FROM banhammer_bans WHERE player_id='$player'");
	while($row = mysqli_fetch_array($result)) {
		if ($row["state"]=="2"){
			//Not Banned
		}else{
			if ($row["expires_at"]==NULL){
			 $banned = true;
			}else{
				if (strtotime($row["expires_at"])>time()){
					$banned = true;
				}else{
					//Not Banned
				}
			}
		}
	}
	if ($banned==true){
		return true;
	}else{
		return false;
	}
}
?>
