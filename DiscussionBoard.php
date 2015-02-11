<!-- 
Created by Colleen Kimball
October, 2013
Ithaca, NY
This program creates a simple discussion board for users to add comments
-->

<html>
	<head><title>
	PHP Discussion Board
	</title></head>
	<body>
	<h1>Leave Colleen a Comment...</h1>
                <form method="post" action="phpDiscussionBoard.php">
                        UserName: <input name="uname" type="text" value="Student" /> <br />
                        Password: <input name="pword" type="password" value="password"/><br />
			Header: <input name = "pheader" type="text"  value="Header"/> <br />
                        Comment: <br><textarea name="tpost" rows="5" cols="50"> Add your comment...
                        </textarea><br />
                        <input type="submit" name="submit" value="Submit"/>
                </form>

                <?php
					/*saves comments to text file*/
                        $filename = "myData.txt";
		        $filename2 = "accounts.txt";

                        if (isset($_POST['submit'])){
		                $fp = fopen($filename2, "a+");
		                if ($fp == false){
		                        echo("<p>Post NOT Submitted: File permissions issue</p>");
		                        return;
		                }
		                fwrite($fp, $_POST['uname']."\t". $_POST['pword']."\n");

		                fclose($fp);

                                $fp = fopen($filename, "a+");
                                if ($fp == false){
                                        echo("<p>Post NOT Submitted: File permissions issue</p>");
                                        return;
                                }
								/*write the comment to the text file*/
                                fwrite($fp, $_POST['uname']."\n".$_POST['pheader']."\n".date("F j, Y, g:i a")."\n".$_POST['tpost']."\n"."*!*");

                                fclose($fp);
                                }

                                $fp = fopen($filename, "r");
                                $data = fread($fp, filesize($filename));

								/*comments are separated by *!**/
                                $lines = array_reverse(explode("*!*", $data));

                                echo("<h1>Previous Comments: </h1>");

                                foreach ($lines as $currentPost){
                                        $comment = explode("\n", $currentPost);

                                        if (count($comment)>3){
                                                echo("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>");

		                                                echo("<h2>$comment[1] \n</h2>");
                                                echo("<i><p>Submitted by: $comment[0]<br>");
                                                echo("$comment[2] </p></i>");
                                                for ($i=3; $i<count($comment); $i++){
                                                        echo("<p>$comment[$i]</p>");
                                                        }
                                                echo("<a href=deleteComment.php>Delete This Comment.</a>");
						}
                                        }

                                fclose($fp);

	?>
	</body>
</html>
