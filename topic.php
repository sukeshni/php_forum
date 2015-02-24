<?php
include 'connect.php';
include 'header.php';
 
//first select the topic based on $_GET['topic_id'] 
$sql = "SELECT
            topic_id,
            topic_subject
        FROM
            topics
        WHERE
            topics.topic_id = " . mysql_real_escape_string($_GET['id']);

$result = mysql_query($sql);
 
if(!$result)
{
    echo 'The topic could not be displayed, please try again later.' . mysql_error();
}
else
{
    if(mysql_num_rows($result) == 0)
    {
        echo 'This topic does not exist.';
    }
    else
    {
        //prepare the table
        echo '<table border="1">
              <tr>
                <th>'. $row[topic_subject].'</th>
              </tr>';
        
        $sql = "SELECT
                    posts.post_topic,
                    posts.post_content,
                    posts.post_date,
                    posts.post_by,
                    users.user_id,
                    users.user_name
                FROM
                    posts
                LEFT JOIN
                    users
                ON
                    posts.post_by = users.user_id
                WHERE
                    posts.post_topic = " . mysql_real_escape_string($_GET['id']);
        
        $result = mysql_query($sql);
         
        if(!$result)
        {
            echo 'The posts could not be displayed, please try again later.';
        }
        else
        {
            if(mysql_num_rows($result) == 0)
            {
                echo 'There are no posts in this topic yet.';
            }
            else
            {
                while($row = mysql_fetch_assoc($result))
                {              
                    echo '<tr>';
                        echo '<td class="rightpart">';
                            echo date('d-m-Y', strtotime($row['post_date']));
                        echo '</td>';
                        echo '<td class="leftpart">';
                            echo '<h3>' . $row['post_content'] . '<h3>';
                        echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}
 
include 'footer.php';
?>