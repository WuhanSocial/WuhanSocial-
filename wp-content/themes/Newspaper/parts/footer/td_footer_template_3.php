<div class="td-footer-wrapper td-footer-template-3">
    <div class="td-container">

	    <div class="td-pb-row">
		    <div class="td-pb-span12">
                <?php
                $tds_footer_top_title = td_util::get_option('tds_footer_top_title');
                // ad spot
                echo td_global_blocks::get_instance('td_block_ad_box')->render(array('spot_id' => 'footer_top', 'spot_title' => $tds_footer_top_title));
                ?>
		    </div>
	    </div>

        <div class="td-pb-row">

            <div class="td-pb-span4">
                <?php

                    td_util::vc_set_column_number(1);

                    locate_template('parts/footer/td_footer_extra.php', true);
                    dynamic_sidebar('Footer 1');

                ?>
            </div>

            <div class="td-pb-span4">
                <?php
                    td_util::vc_set_column_number(1);
                    dynamic_sidebar('Footer 2');
                ?>
            </div>

            <div class="td-pb-span4">
                <?php
                    td_util::vc_set_column_number(1);
                    dynamic_sidebar('Footer 3');
                ?>
            </div>
        </div>
    </div>
</div>