 <?  
    /*** phpBB3 - Last Active Topics System ***/
    //Show last x topics
    define('TOPICS_LIMIT',4);

    // Create arrays
    $topics = array();
    
    // Get forums that current user has read rights to.
    $forums = array_unique(array_keys($auth->acl_getf('f_read', true)));
    
    // Get active topics.
    $sql="SELECT *
    FROM " . TOPICS_TABLE . "
    WHERE topic_approved = '1' AND " . $db->sql_in_set('forum_id', $forums) . "
    ORDER BY topic_last_post_time DESC";
    $result = $db->sql_query_limit($sql,TOPICS_LIMIT);
    while ($r = $db->sql_fetchrow($result))
    {
        $topics[] = $r;
    }
   $db->sql_freeresult($result);
    foreach($topics as $t)
    {
        // Get folder img, topic status/type related information
        $topic_tracking_info = get_complete_topic_tracking($t['forum_id'], $t['topic_id']);
        $unread_topic = (isset($topic_tracking_info[$t['topic_id']]) && $t['topic_last_post_time'] > $topic_tracking_info[$t['topic_id']]) ? true : false;
        $folder_img = $folder_alt = $topic_type = '';
        topic_status($t, $t['topic_replies'], $unread_topic, $folder_img, $folder_alt, $topic_type);
        
        // output the link
        ?>
            <div style="width:100%; margin-bottom:15px;margin-left:50px">
							<div>
								<? $image_src= preg_replace("/\/home\/samu2012\/downloaddeimieisogni\.it\//i","",$user->img($folder_img, $folder_alt, false, '', 'src'));?>
								<img style="width:40px;height:40px" src="<?=$image_src?>" title="<?=$user->lang[$folder_alt];?>" alt="<?=$user->lang[$folder_alt];?>" />
							</div>
							<div>
								<span>
            		<b>Discussione: </b> <a href="<?=$phpbb_url . 'viewtopic.php?f=' . $t['forum_id'] . '&amp;t=' . $t['topic_id'] . '&amp;p=' . $t['topic_last_post_id'] . '#p' . $t['topic_last_post_id'];?>"><?=html_entity_decode($t['topic_title']);?></a><br />
								<b>Postato da: </b><?=$t['topic_first_poster_name'];?> il <?=date('d/m/Y',$t['topic_time']);?><br /> 
								<b>Ultima risposta di: </b><?=$t['topic_last_poster_name'];?> il <?=date('d/m/Y',$t['topic_last_post_time']);?><br />
								</span>
							</div>
						</div>
    <?
    }
    ?>
