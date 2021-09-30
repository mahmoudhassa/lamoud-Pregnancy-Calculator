<?php if($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
    <?php
    $day_err = $p_day = $month_err = $p_month =  $year_err = $p_year = '';
        if( empty($_POST['p-day']) ){
            $day_err = __('Day is required', 'lamoud');
        }else if( !empty($_POST['p-day']) ){
            $p_day = $_POST['p-day'];

            if ( !preg_match('/^[0-9]*$/',$p_day) ) {
                $day_err = __('Day is required', 'lamoud');
              }else{
                $day = $_POST['p-day'];
              }
        }

        if( empty($_POST['p-month']) ){
            $month_err = __('Month is required', 'lamoud');
        }else if( !empty($_POST['p-month']) ){
            $p_month = $_POST['p-month'];

            if (!preg_match('/^[0-9]*$/',$p_month)) {
                $month_err =  __('Month is required', 'lamoud');
              }else{
                $month = $_POST['p-month'];
              }
        }

        if( empty($_POST['p-year']) ){
            $year_err = __('Year is required', 'lamoud');
        }else if( !empty($_POST['p-year'])){
            $p_year = $_POST['p-year'];

            if (!preg_match('/^[0-9]{4}$/',$p_year)) {
                $year_err =  __('Year is required', 'lamoud');;
              }else{
                $year = $_POST['p-year'];
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
        <p><?php echo __('Last menstrual period date:', 'lamoud'); ?></p>
    </div>
    <form name="lamoud-Pregnancy-Calculator" action="" method="post">
        <div class="lm-input-container">
            <div class="lm-input">
                <select name="p-day" id="p_day" value="<?php echo $p_day; ?>">
                <option value="Day"><?php echo __('Day', 'lamoud') ?></option>
                    <?php
                        for($d = 1; $d <= 31; $d++){
                            echo '<option value="' . $d .'">' . $d . '</option>';
                        }
                    ?>
                </select>
                <span class="p_day_err"><?php echo $day_err ?></span>
            </div>
            <div class="lm-input">
                <select name="p-month" id="p_month" value="<?php echo $p_month; ?>">
                    <option value="Month"><?php echo __('Month', 'lamoud') ?></option>
                    <?php
                        for($m = 1; $m <= 12; $m++){
                            echo '<option value="' . $m .'">' . $m . '</option>';
                        }
                    ?>
                </select>
                <span class="p_month_err"><?php echo $month_err ?></span>
            </div>
            <div class="lm-input">
                <select name="p-year" id="p_year" value="<?php echo $p_year; ?>">
                    <option value="Year"><?php echo __('Year', 'lamoud') ?></option>
                    <option value="<?php echo $max_year->format('Y'); ?>"><?php echo $max_year->format('Y'); ?></option>
                    <?php if($max_year->format('Y') !== $now->format('Y')) : ?>
                        <option value="<?php echo $now->format('Y'); ?>"><?php echo $now->format('Y'); ?></option>
                    <?php endif; ?>
                </select>
                <span class="p_year_err"><?php echo $year_err ?></span>
            </div>
            <div class="lm-input">
                <input type="submit" id="submit-lm-calc" value="<?php echo __('CALC', 'lamoud') ?>">
            </div>
        </div>

    </form>
    <!--<span class="lm-perg-creater">
        <?php //echo __('Advanced Pregnancy Calculator By:', 'lamoud'); ?>
        <a href="https://wa.me/00201062332549"><?php //echo __(' Mahmoud Hassan ', 'lamoud') ?></a>
        <?php echo __('sponsored by', 'lamoud'); ?>
        <a href="https://tabeibweb.com"><?php //echo __(' tabeibweb ', 'lamoud') ?></a>
    </span>-->
</div>