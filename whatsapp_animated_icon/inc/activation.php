<?php 

class WaActivationIcon{
    public static function activate(){
        global $wpdb;
        $tab_name = $wpdb ->prefix."WhatsIconOption";
        $charset = $wpdb -> get_charset_collate() ;

        $sql = "CREATE TABLE IF NOT EXISTS ".$tab_name ."(
            id int,
            user_number varchar(60),
            mr varchar(60) ,
            mb INT NOT NULL ,
            blur int,
            anim varchar(60),
            del float,
            duration float,
            msg varchar(255)
            ) $charset;";

        $sql2 = "INSERT INTO $tab_name (id , user_number , mr , mb , blur , anim , del,duration,msg)
                    VALUES ('1','0','0','0','0','0','0.0','0.0',' ');";
        
        require_once( ABSPATH."wp-admin/includes/upgrade.php");

        dbDelta(array($sql,$sql2));        
        flush_rewrite_rules();
    }
}