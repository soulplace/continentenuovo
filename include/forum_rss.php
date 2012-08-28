 <?  
    /*** phpBB3 - Last Active Topics System ***/
    //Show last x topics
    define('TOPICS_LIMIT',10);

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
?>
<?
        
    foreach($topics as $t)
    {
        // Get folder img, topic status/type related information
        $topic_tracking_info = get_complete_topic_tracking($t['forum_id'], $t['topic_id']);
        $unread_topic = (isset($topic_tracking_info[$t['topic_id']]) && $t['topic_last_post_time'] > $topic_tracking_info[$t['topic_id']]) ? true : false;
        $folder_img = $folder_alt = $topic_type = '';
        topic_status($t, $t['topic_replies'], $unread_topic, $folder_img, $folder_alt, $topic_type);
        
        // output the link
        ?>
            <img style="vertical-align: text-bottom" src="<?=$user->img($folder_img, $folder_alt, false, '', 'src');?>" title="<?=$user->lang[$folder_alt];?>" alt="<?=$user->lang[$folder_alt];?>" />
            <a href="<?=$phpbb_url . 'viewtopic.php?f=' . $t['forum_id'] . '&amp;t=' . $t['topic_id'] . '&amp;p=' . $t['topic_last_post_id'] . '#p' . $t['topic_last_post_id'];?>"><?=html_entity_decode($t['topic_title']);?></a><br />
    <?
    }
    ?>
