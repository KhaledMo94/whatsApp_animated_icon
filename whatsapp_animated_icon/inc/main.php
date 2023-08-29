<?php 
    if($_SERVER['REQUEST_METHOD']==="POST"){
        if($_POST['align']=='l'){
            $_POST['mr'] = "left:".$_POST['mr']."px";
        }else {
            $_POST['mr'] = "right:".$_POST['mr']."px";
        }
        if ($_POST['duration']==0.0){
            $_POST['duration']=1;
        }
        global $wpdb ;
        $tab_name = $wpdb ->prefix."WhatsIconOption";
        $wpdb->update($tab_name,array('user_number'     => $_POST['user_number'],
                                        'mr'            => $_POST['mr'],
                                        'mb'            => $_POST['mb'],
                                        'blur'          =>$_POST['blur'],
                                        'anim'          =>$_POST['anim'],
                                        'del'           =>$_POST['del'],
                                        'duration'      => $_POST['duration'],
                                        'msg'           =>$_POST['msg'])
                                ,array("id"=>"1"));
        
    }
?>
<div class="whatAppIcon">
    <form action="" method="POST">
        <div class="wa-num">
            <label for="tel">WhatsApp Number :</label>
            <input type="text" name="user_number" id="tel" placeholder="your WA number" required><br>
        </div>
        <div class="hm">
            <label for="margin-r">Horizontal Margin :</label>
            <input type="number" name="mr" id="margin-r" required><span>px</span><br>
            <div class="align">
                <h3> Display Widget </h3>
                <input type="radio" name="align" id="r" value ="r" checked >
                <label for="r">Right</label><br>
                <input type="radio" name="align" id="l" value ="l">
                <label for="l">Left</label>
            </div>
        </div>
        <div class="bm">
            <label for="margin-b">Buttom Margin :</label>
            <input type="number" name="mb" id="margin-b" required><span>px</span><br>
        </div>
        <div class="blur">
            <h3> Adding Blur </h3>
            <input type="radio" name="blur" id="yes" value ="1" checked >
            <label for="yes">With Blur</label><br>
            <input type="radio" name="blur" id="no" value ="0">
            <label for="no">Without Blur</label>
        </div>

        <div class="animations">
            <h3> Animation Type </h3>
            <input type="radio" name="anim" id="none" value="none" checked >
            <label for="none">No Animations</label><br>

            <input type="radio" name="anim" id="rot+drag" value ="rot+drag">
            <label for="rot+drag">rotating + draging</label><br>

            <input type="radio" name="anim" id="drag+op" value ="op+drag">
            <label for="rot+op">Opacity + Draging </label><br>

            <input type="radio" name="anim" id="elastic" value ="elastic">
            <label for="elastic">Elastic</label><br>

            <input type="radio" name="anim" id="back" value ="back">
            <label for="back">Drag+back</label><br>

            <input type="radio" name="anim" id="bounce" value ="bounce">
            <label for="bounce">bounce</label><br>
        </div>
        <div class="delay">
            <h3>Delaying after loading page</h3>
            <label for="delay">Delaying</label>
            <input type="number" name="del" id="delay" step="0.1" min="0" required><span> s</span>
        </div>

        <div class="duration">
            <h3>Duration of animation</h3>
            <label for="duration">Duration</label>
            <input type="number" name="duration" id="duration" step="0.1" min="0" required><span> s</span>
        </div>
        <div class="msg">
            <label for="msg" >Message :</label>
            <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Optional Massege sent to you when user hit the widget" maxlength="255" style="resize:none;" rows="4" cols="50"></textarea>
        </div>
        <input type="submit" value="Save">
    </form>
</div>






<?php 