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
    "Sat"=>__("Saturday", "lamoud-pregnancy-calculator"),
    "Sun"=>__("Sunday", "lamoud-pregnancy-calculator"),
    "Mon"=>__("Monday", "lamoud-pregnancy-calculator"),
    "Tue"=>__("Tuesday", "lamoud-pregnancy-calculator"),
    "Wed"=>__("Wednesday", "lamoud-pregnancy-calculator"),
    "Thu"=>__("Thursday", "lamoud-pregnancy-calculator"),
    "Fri"=>__("Friday", "lamoud-pregnancy-calculator")
);

$months = array(
    "Jan" =>__("January", "lamoud-pregnancy-calculator"),
    "Feb" =>__("February", "lamoud-pregnancy-calculator"),
    "Mar" =>__("March", "lamoud-pregnancy-calculator"),
    "Apr" =>__("April", "lamoud-pregnancy-calculator"),
    "May" =>__("May", "lamoud-pregnancy-calculator"),
    "Jun" =>__("June", "lamoud-pregnancy-calculator"),
    "Jul" =>__("July", "lamoud-pregnancy-calculator"),
    "Aug" =>__("August", "lamoud-pregnancy-calculator"),
    "Sep" =>__("September", "lamoud-pregnancy-calculator"),
    "Oct" =>__("October", "lamoud-pregnancy-calculator"),
    "Nov" =>__("November", "lamoud-pregnancy-calculator"),
    "Dec" =>__("December", "lamoud-pregnancy-calculator")
);
//echo "<br>" . $week[Tue];
?>
<div class="lm-container lm-pergnancy-content">

    <?php

        if( $perg_in_days > 280){
        ?>
            <div class="lm-alert-box">
            <h4><?php echo esc_html__('Attention!', 'lamoud-pregnancy-calculator'); ?></h4>
                <p><?php echo esc_html__('You set a future date for the start of your last menstrual period, though! The results will be displayed assuming that you are planning to become pregnant at this time!', 'lamoud-pregnancy-calculator'); ?></p>
            </div>
        <?php
        }elseif ($perg_in_days < 0 && $perg_in_days >= -14) {
        ?>
            <div class="lm-alert-box">
            <h4><?php echo esc_html__('Attention!', 'lamoud-pregnancy-calculator'); ?></h4>
                <p><?php echo esc_html__('Your due date has passed, however, don\'t worry ma\'am, it\'s perfectly safe to be two weeks late for your due date!', 'lamoud-pregnancy-calculator'); ?></p>
            </div>
        <?php
        }elseif ($perg_in_days < -14){
        ?>
            <div class="lm-alert-box">
                <h4><?php echo esc_html__('Attention!', 'lamoud-pregnancy-calculator'); ?></h4>
                <p><?php echo esc_html__('You entered a very old date for your last menstrual period. The maximum duration of pregnancy is 9 months and two weeks!', 'lamoud-pregnancy-calculator'); ?></p>
            </div>
        <?php

        }

    ?>
    
    <div class="lm-progress">
        <span class="lm-prog-txt"><?php echo esc_html__('Pregnancy progress...', 'lamoud-pregnancy-calculator'); ?></span>
    <span class="lm-prog"><p class="persentage"><?php echo esc_html($perentage); ?></p></span>
        <span class="pers-flag"></span>
        <span class="pers-flag-text"><?php echo esc_html($perentage); ?>%</span>
    </div>

    <div class="lm-days-left">
        <span class="lm-left"><?php echo esc_html__('Left ', 'lamoud-pregnancy-calculator') ?></span>
    <?php
            
            if( floor($perg_in_days / 30.4368499167) == 1){

                echo esc_html__('One month', 'lamoud-pregnancy-calculator');

            }else if(floor($perg_in_days / 30.4368499167) == 2){

                echo esc_html__('Two months', 'lamoud-pregnancy-calculator');

            }else if(floor($perg_in_days / 30.4368499167) > 2 && floor($perg_in_days / 30.4368499167) < 11){

                echo floor($perg_in_days / 30.4368499167) . esc_html__(' months', 'lamoud-pregnancy-calculator');

            }else if(floor($perg_in_days / 30.4368499167) > 10){

                echo floor($perg_in_days / 30.4368499167) . esc_html__(' month', 'lamoud-pregnancy-calculator');

            }else if(floor($perg_in_days / 30.4368499167) < 1){

                echo '0' . esc_html__(' month', 'lamoud-pregnancy-calculator');
            }

            echo ' ' . esc_html__('and', 'lamoud-pregnancy-calculator') . ' ';

            if( $perg_in_days % 30.4368499167 === 1){

                echo esc_html__('One day', 'lamoud-pregnancy-calculator');

            }else if($perg_in_days % 30.4368499167 === 2){

                echo esc_html__('Two days', 'lamoud-pregnancy-calculator');

            }else if($perg_in_days % 30.4368499167 > 2 && $perg_in_days % 30.4368499167 < 11){

                echo $perg_in_days % 30.4368499167 . esc_html__(' days', 'lamoud-pregnancy-calculator');

            }else if($perg_in_days % 30.4368499167 > 10){

                echo $perg_in_days % 30.4368499167 . esc_html__(' day', 'lamoud-pregnancy-calculator');

            }else if($perg_in_days % 30.4368499167 < 1 ){

                echo '0' . esc_html__(' day', 'lamoud-pregnancy-calculator');
            }
        ?>
        <span class="lm-left"><?php echo esc_html__(' approximately', 'lamoud-pregnancy-calculator') ?></span>
    </div>

    <h2><?php echo esc_html__('Expected due date:', 'lamoud-pregnancy-calculator') ?></h2>
    <div class="due-date-results">
        <div class="due-date-results-bin-right"></div>
        <div class="due-date-results-bin-left"></div>
        <div class="due-date-results-month"><?php echo esc_html($months[date("M", $due)]); ?></div>
        <div class="due-date-results-day"><?php echo esc_html(date("d", $due)); ?></div>
        <div class="due-date-results-day-text"><?php echo esc_html($week[date("D", $due)]); ?></div>
        <div class="due-date-results-year"><?php echo esc_html(date("Y", $due)); ?></div>
    </div>

    <h2><?php echo esc_html__('stages of your pregnancy:', 'lamoud-pregnancy-calculator') ?></h2>
    <div class="lm-perg-dtls-container">
    
        <div class="lm-perg-dtls">
            <div class="lm-perg-item"><?php echo esc_html__('Your last cyle started on', 'lamoud-pregnancy-calculator') ?></div>
            <div class="lm-perg-value"><?php echo esc_html(date("d", $last) . ' ' . $months[date("M", $last)] . ' ' . date("Y", $last)); ?></div>
        </div>

        <div class="lm-perg-dtls">
            <div class="lm-perg-item"><?php echo esc_html__('Estimated fertilization date', 'lamoud-pregnancy-calculator') ?></div>
            <div class="lm-perg-value"><?php echo esc_html(date("d", $fertilization) . ' ' . $months[date("M", $fertilization)] . ' ' . date("Y", $fertilization)); ?></div>
        </div>

        <div class="lm-perg-dtls">
            <div class="lm-perg-item"><?php echo esc_html__('1st Trimester', 'lamoud-pregnancy-calculator'); ?></div>
            <div class="lm-perg-value"><?php echo esc_html(date("d", $First_trimester_start) . ' ' . $months[date("M", $First_trimester_start)] . ' ' . date("Y", $First_trimester_start)); ?></div>
        </div>

        <div class="lm-perg-dtls">
            <div class="lm-perg-item"><?php echo esc_html__('2nd Trimester', 'lamoud-pregnancy-calculator'); ?></div>
            <div class="lm-perg-value"><?php echo esc_html(date("d", $Second_trimester_start) . ' ' . $months[date("M", $Second_trimester_start)] . ' ' . date("Y", $Second_trimester_start)); ?></div>
        </div>

        <div class="lm-perg-dtls">
            <div class="lm-perg-item"><?php echo esc_html__('3rd Trimester', 'lamoud-pregnancy-calculator'); ?></div>
            <div class="lm-perg-value"><?php echo esc_html(date("d", $Third_trimester_start) . ' ' . $months[date("M", $Third_trimester_start)] . ' ' . date("Y", $Third_trimester_start)); ?></div>
        </div>

        <div class="lm-perg-dtls">
            <div class="lm-perg-item"><?php echo esc_html__('Your due date is', 'lamoud-pregnancy-calculator'); ?></div>
            <div class="lm-perg-value"><?php echo esc_html(date("d", $due) . ' ' . $months[date("M", $due)] . ' ' . date("Y", $due)); ?></div>
        </div>

    <!--<span class="lm-perg-creater">
        <?php //echo esc_html__('Advanced Pregnancy Calculator By:', 'lamoud-pregnancy-calculator'); ?>
        <a href="https://wa.me/00201062332549"><?php //echo esc_html__(' Mahmoud Hassan ', 'lamoud-pregnancy-calculator') ?></a>
        <?php //echo esc_html__('sponsored by', 'lamoud-pregnancy-calculator'); ?>
        <a href="https://tabeibweb.com"><?php //echo esc_html__(' tabeibweb ', 'lamoud-pregnancy-calculator') ?></a>
    </span>-->

    </div>

    <span class="lm-recalc-perg" onclick="lmReCalcPerg()"><?php echo esc_html__('Re-calc', 'lamoud-pregnancy-calculator') ?></span>

</div>