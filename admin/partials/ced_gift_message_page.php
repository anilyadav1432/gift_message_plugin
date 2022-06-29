<?php
if(isset($_POST['submit'])){
    $allow_check = $_POST['allow_check'];
    $at_position = $_POST['card_on_position'];
    // echo $at_position;die;
    $deprecated = null;
    $autoload = 'no';
    if ( get_option( 'allow_gift_check' ) !== false) {       
        update_option( "allow_gift_check", $allow_check );
    }else{
        add_option( "allow_gift_check", $allow_check, $deprecated, $autoload );
    }
    if ( get_option( 'gift_position' ) !== false) {       
        update_option( "gift_position", $at_position );
    }else{
        add_option( "gift_position", $at_position, $deprecated, $autoload );
    }
}


?>
<html>
    <head>
    </head>
    <body>
        <div style="height: 400px;width:100%;">
        <h1 style="text-align:center">Allow Gift Message For User</h1><br/>
            <form action="" method="post" style="width:50%;margin:auto;">

                <label for="showcheck">Hide / Show</label><br/>
                <input type="checkbox" name="allow_check" id="showcheck" <?php echo get_option( 'allow_gift_check' )=="on"?'checked':'';?>><br/>
                <hr/>
                <input type="radio" name="card_on_position" value="before_on_button" <?php echo get_option( 'gift_position' )=="before_on_button"?'checked':'';?>>Before of button<br/><br/>
                <input type="submit" value="Save Data" name="submit">
            </form>
        </div>
    </body>
</html>