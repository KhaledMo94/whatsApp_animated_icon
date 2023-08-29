<?php
class wafooter 
{
    public static function WAFooterIcon(){
    global $wpdb;
    $tab_name = $wpdb ->prefix."WhatsIconOption";
    $res = $wpdb -> get_results("SELECT * FROM $tab_name WHERE id=1;");
    $result = $res[0];
    $link='https://wa.me/'.$result->user_number.'/?text='.urlencode($result->msg);
        ?>
    <div class="footerIcon" id="footerIcon" 
    style="bottom:<?php echo $result->mb ;?>px;<?php echo $result->mr; ?>" >
        <a href="<?php echo $link; ?>"><i class="fa-brands fa-whatsapp"></i></a>
        <div style = "display:none">
            <span class="blur"> <?php echo $result->blur ;?> </span>
            <span class ="anim"> <?php echo $result->anim ;?> </span>
            <span class = "del"> <?php echo $result->del ;?> </span>
            <span class = "duration"> <?php echo $result->duration ;?> </span>
        </div>
    </div>
<?php
    }
}

// Array
// (
//     [0] => stdClass Object
//         (
//             [id] => 1
//             [user_number] => 01159175049
//             [mr] => 100% -8
//             [mb] => 6
//             [blur] => 1
//             [anim] => op+drag
//             [del] => 1500
//             [duration] => 1000
//             [msg] => xfgaeg
//         )

// )