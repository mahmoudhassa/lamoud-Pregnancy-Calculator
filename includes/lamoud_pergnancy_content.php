<?php 

$last = mktime (0,0,0,$month, $day, $year) ;
 $gest = 24192000;
 $due = $last + $gest;
 $fertilization = $last + 1209600;
  
 $First_trimester_start = $last;
 $First_trimester_end = $last + 8064000;

$Second_trimester_start = $First_trimester_end;
$Second_trimester_end = $Second_trimester_start + 8064000;

$Third_trimester_start = $Second_trimester_end;
$Third_trimester_end = $Third_trimester_start + 8064000;


$date1 = date("M-d-Y");
$date2 = date("M-d-Y", $due);

$diff = strtotime($date2) - strtotime($date1);
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));



$perentage =  round((($gest - $diff) / $gest * 100));
$perg_in_days = $diff / 86400;


$week = array(
    "Sat"=>__("Saturday", "lamoud"),
    "Sun"=>__("Sunday", "lamoud"),
    "Mon"=>__("Monday", "lamoud"),
    "Tue"=>__("Tuesday", "lamoud"),
    "Wed"=>__("Wednesday", "lamoud"),
    "Thu"=>__("Thursday", "lamoud"),
    "Fri"=>__("Friday", "lamoud")
);

$months = array(
    "Jan" =>__("January", "lamoud"),
    "Feb" =>__("February", "lamoud"),
    "Mar" =>__("March", "lamoud"),
    "Apr" =>__("April", "lamoud"),
    "May" =>__("May", "lamoud"),
    "Jun" =>__("June", "lamoud"),
    "Jul" =>__("July", "lamoud"),
    "Aug" =>__("August", "lamoud"),
    "Sep" =>__("September", "lamoud"),
    "Oct" =>__("October", "lamoud"),
    "Nov" =>__("November", "lamoud"),
    "Dec" =>__("December", "lamoud")
);
//echo "<br>" . $week[Tue];
?>
<div class="lm-container lm-pergnancy-content">

    <?php

        if( $perg_in_days > 280){
        ?>
            <div class="lm-alert-box">
            <h4><?php echo __('Attention!', 'lamoud'); ?></h4>
                <p><?php echo __('You set a future date for the start of your last menstrual period, though! The results will be displayed assuming that you are planning to become pregnant at this time!', 'lamoud'); ?></p>
            </div>
        <?php
        }elseif ($perg_in_days < 0 && $perg_in_days >= -14) {
        ?>
            <div class="lm-alert-box">
            <h4><?php echo __('Attention!', 'lamoud'); ?></h4>
                <p><?php echo __('Your due date has passed, however, don\'t worry ma\'am, it\'s perfectly safe to be two weeks late for your due date!', 'lamoud'); ?></p>
            </div>
        <?php
        }elseif ($perg_in_days < -14){
        ?>
            <div class="lm-alert-box">
                <h4><?php echo __('Attention!', 'lamoud'); ?></h4>
                <p><?php echo __('You entered a very old date for your last menstrual period. The maximum duration of pregnancy is 9 months and two weeks!', 'lamoud'); ?></p>
            </div>
        <?php

        }

    ?>
    
    <div class="lm-progress">
        <span class="lm-prog-txt"><?php echo __('Pregnancy progress...', 'lamoud'); ?></span>
    <span class="lm-prog"><p class="persentage"><?php echo $perentage; ?></p></span>
        <span class="pers-flag"></span>
        <span class="pers-flag-text"><?php echo $perentage; ?>%</span>
    </div>

    <div class="lm-days-left">
        <span class="lm-left"><?php echo __('Left ', 'lamoud') ?></span>
    <?php
            
            if( floor($perg_in_days / 30.4368499167) == 1){

                echo __('One month', 'lamoud');

            }else if(floor($perg_in_days / 30.4368499167) == 2){

                echo __('Two months', 'lamoud');

            }else if(floor($perg_in_days / 30.4368499167) > 2 && floor($perg_in_days / 30.4368499167) < 11){

                echo floor($perg_in_days / 30.4368499167) . __(' months', 'lamoud');

            }else if(floor($perg_in_days / 30.4368499167) > 10){

                echo floor($perg_in_days / 30.4368499167) . __(' month', 'lamoud');

            }else if(floor($perg_in_days / 30.4368499167) < 1){

                echo '0' . __(' month', 'lamoud');
            }

            echo ' ' . __('and', 'lamoud') . ' ';

            if( $perg_in_days % 30.4368499167 === 1){

                echo __('One day', 'lamoud');

            }else if($perg_in_days % 30.4368499167 === 2){

                echo __('Two days', 'lamoud');

            }else if($perg_in_days % 30.4368499167 > 2 && $perg_in_days % 30.4368499167 < 11){

                echo $perg_in_days % 30.4368499167 . __(' days', 'lamoud');

            }else if($perg_in_days % 30.4368499167 > 10){

                echo $perg_in_days % 30.4368499167 . __(' day', 'lamoud');

            }else if($perg_in_days % 30.4368499167 < 1 ){

                echo '0' . __(' day', 'lamoud');
            }
        ?>
        <span class="lm-left"><?php echo __(' approximately', 'lamoud') ?></span>
    </div>

    <h2><?php echo __('Expected due date:', 'lamoud') ?></h2>
    <div class="due-date-results">
        <div class="due-date-results-bin-right"></div>
        <div class="due-date-results-bin-left"></div>
        <div class="due-date-results-month"><?php echo $months[date("M", $due)]; ?></div>
        <div class="due-date-results-day"><?php echo date("d", $due); ?></div>
        <div class="due-date-results-day-text"><?php echo $week[date("D", $due)]; ?></div>
        <div class="due-date-results-year"><?php echo date("Y", $due); ?></div>
    </div>

    <h2><?php echo __('stages of your pregnancy:', 'lamoud') ?></h2>
    <div class="lm-perg-dtls-container">
    
        <div class="lm-perg-dtls">
            <div class="lm-perg-item"><?php echo __('Your last cyle started on', 'lamoud') ?></div>
            <div class="lm-perg-value"><?php echo date("d", $last) . ' ' . $months[date("M", $last)] . ' ' . date("Y", $last); ?></div>
        </div>

        <div class="lm-perg-dtls">
            <div class="lm-perg-item"><?php echo __('Estimated fertilization date', 'lamoud') ?></div>
            <div class="lm-perg-value"><?php echo date("d", $fertilization) . ' ' . $months[date("M", $fertilization)] . ' ' . date("Y", $fertilization); ?></div>
        </div>

        <div class="lm-perg-dtls">
            <div class="lm-perg-item"><?php echo __('1st Trimester', 'lamoud'); ?></div>
            <div class="lm-perg-value"><?php echo date("d", $First_trimester_start) . ' ' . $months[date("M", $First_trimester_start)] . ' ' . date("Y", $First_trimester_start); ?></div>
        </div>

        <div class="lm-perg-dtls">
            <div class="lm-perg-item"><?php echo __('2nd Trimester', 'lamoud'); ?></div>
            <div class="lm-perg-value"><?php echo date("d", $Second_trimester_start) . ' ' . $months[date("M", $Second_trimester_start)] . ' ' . date("Y", $Second_trimester_start); ?></div>
        </div>

        <div class="lm-perg-dtls">
            <div class="lm-perg-item"><?php echo __('3rd Trimester', 'lamoud'); ?></div>
            <div class="lm-perg-value"><?php echo date("d", $Third_trimester_start) . ' ' . $months[date("M", $Third_trimester_start)] . ' ' . date("Y", $Third_trimester_start); ?></div>
        </div>

        <div class="lm-perg-dtls">
            <div class="lm-perg-item"><?php echo __('Your due date is', 'lamoud'); ?></div>
            <div class="lm-perg-value"><?php echo date("d", $due) . ' ' . $months[date("M", $due)] . ' ' . date("Y", $due); ?></div>
        </div>

    <!--<span class="lm-perg-creater">
        <?php //echo __('Advanced Pregnancy Calculator By:', 'lamoud'); ?>
        <a href="https://wa.me/00201062332549"><?php //echo __(' Mahmoud Hassan ', 'lamoud') ?></a>
        <?php //echo __('sponsored by', 'lamoud'); ?>
        <a href="https://tabeibweb.com"><?php //echo __(' tabeibweb ', 'lamoud') ?></a>
    </span>-->

    </div>

    <span class="lm-recalc-perg" onclick="lmReCalcPerg()"><?php echo __('Re-calc', 'lamoud') ?></span>

</div>