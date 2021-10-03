<?php if($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
    <?php
    $day_err = $p_day = $month_err = $p_month =  $year_err = $p_year = '';
        if( empty($_POST['p-day']) ){
            $day_err = esc_html__('Day is required', 'lamoud-pregnancy-calculator');
        }else if( !empty($_POST['p-day']) ){
            $p_day = sanitize_text_field($_POST['p-day']);

            if ( !preg_match('/^[0-9]*$/',$p_day) ) {
                $day_err = esc_html__('Day is required', 'lamoud-pregnancy-calculator');
              }else{
                $day = sanitize_text_field($_POST['p-day']);
              }
        }

        if( empty($_POST['p-month']) ){
            $month_err = esc_html__('Month is required', 'lamoud-pregnancy-calculator');
        }else if( !empty($_POST['p-month']) ){
            $p_month = sanitize_text_field($_POST['p-month']);

            if (!preg_match('/^[0-9]*$/',$p_month)) {
                $month_err =  esc_html__('Month is required', 'lamoud-pregnancy-calculator');
              }else{
                $month = sanitize_text_field($_POST['p-month']);
              }
        }

        if( empty($_POST['p-year']) ){
            $year_err = esc_html__('Year is required', 'lamoud-pregnancy-calculator');
        }else if( !empty($_POST['p-year'])){
            $p_year = sanitize_text_field($_POST['p-year']);

            if (!preg_match('/^[0-9]{4}$/',$p_year)) {
                $year_err =  esc_html__('Year is required', 'lamoud-pregnancy-calculator');;
              }else{
                $year = sanitize_text_field($_POST['p-year']);
              }
        }

    if( $year && $month && $day ){
        include_once dirname(__FILE__) . '/lamoud_pergnancy_content.php';
    }else{
        //echo "errorrrrrrrr";
    }
    ?>
<?php endif; ?>
<?php
$now = new \DateTime("now");
$max_year = new \DateTime("-280 day");
$min_year = new \DateTime("+280 day");

/*echo $now->format('Y-m-d');
echo '<br>';
echo $max_year->format('Y-m-d');*/
?>
<div class="lm-container-form">
    <div class="lm-perg-form-head">
        <p><?php echo esc_html__('Last menstrual period date:', 'lamoud-pregnancy-calculator'); ?></p>
    </div>
    <form name="lamoud-Pregnancy-Calculator" action="" method="post">
        <div class="lm-input-container">
            <div class="lm-input">
                <select name="p-day" id="p_day" value="<?php echo $p_day; ?>">
                <option value="Day"><?php echo esc_html__('Day', 'lamoud-pregnancy-calculator') ?></option>
                    <?php
                        for($d = 1; $d <= 31; $d++){
                            ?>
                                <option value="<?php echo esc_html($d);?>"> <?php echo esc_html($d); ?> </option>
                            <?php
                        }
                    ?>
                </select>
                <span class="p_day_err"><?php echo esc_html($day_err); ?></span>
            </div>
            <div class="lm-input">
                <select name="p-month" id="p_month" value="<?php echo $p_month; ?>">
                    <option value="Month"><?php echo esc_html__('Month', 'lamoud-pregnancy-calculator'); ?></option>
                    <?php
                        for($m = 1; $m <= 12; $m++){
                            ?>
                                <option value="<?php echo esc_html($m);?>"> <?php echo esc_html($m); ?> </option>
                            <?php
                        }
                    ?>
                </select>
                <span class="p_month_err"><?php echo esc_html($month_err); ?></span>
            </div>
            <div class="lm-input">
                <select name="p-year" id="p_year" value="<?php echo esc_html($p_year); ?>">
                    <option value="Year"><?php echo esc_html__('Year', 'lamoud-pregnancy-calculator'); ?></option>
                    <option value="<?php echo esc_html($max_year->format('Y')); ?>"><?php echo esc_html($max_year->format('Y')); ?></option>
                    <?php if($max_year->format('Y') !== $now->format('Y')) : ?>
                        <option value="<?php echo esc_html($now->format('Y')); ?>"><?php echo esc_html($now->format('Y')); ?></option>
                    <?php endif; ?>
                </select>
                <span class="p_year_err"><?php echo esc_html($year_err); ?></span>
            </div>
            <div class="lm-input">
                <input type="submit" id="submit-lm-calc" value="<?php echo esc_html__('CALC', 'lamoud-pregnancy-calculator'); ?>">
            </div>
        </div>

    </form>
    <!--<span class="lm-perg-creater">
        <?php //echo esc_html__('Advanced Pregnancy Calculator By:', 'lamoud-pregnancy-calculator'); ?>
        <a href="https://wa.me/00201062332549"><?php //echo esc_html__(' Mahmoud Hassan ', 'lamoud-pregnancy-calculator'); ?></a>
        <?php //echo esc_html__('sponsored by', 'lamoud-pregnancy-calculator'); ?>
        <a href="https://tabeibweb.com"><?php //echo esc_html__(' tabeibweb ', 'lamoud-pregnancy-calculator') ?></a>
    </span>-->
</div>