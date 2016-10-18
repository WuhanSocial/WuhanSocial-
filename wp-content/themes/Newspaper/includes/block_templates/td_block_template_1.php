<?php
/**
 * this is the default block template
 * Class td_block_header_1
 */
class td_block_template_1 {

    /**
     * @var string the template data, it's set on construct
     */
    var $template_data_array = '';

    /**
     * @param $template_data_array array - all the data for the template
     */
    function __construct($template_data_array) {
        $this->template_data_array = $template_data_array;
    }


    /**
     * renders the CSS for each block, each template may require a different css generated by the theme
     * @return string CSS the rendered css and <style> block
     */
    function get_css() {


	    $header_color = $this->template_data_array['atts']['header_color'];
	    $header_text_color = $this->template_data_array['atts']['header_text_color'];




        // check if we have a header color, do nothing if we don't have a header_color or header_text_color
        if ((empty($header_color) or $header_color == '#') and (empty($header_text_color) or $header_text_color == '#')) {
            return '';
        }


        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class =  $this->template_data_array['unique_block_class'];

        // the css that will be compiled by the block, <style> - will be removed by the compiler
        $raw_css = "
        <style>

            /* @header_color */
            .$unique_block_class .td_module_wrap:hover .entry-title a,
            .$unique_block_class a.td-pulldown-filter-link:hover,
            .$unique_block_class .td-subcat-item a:hover,
            .$unique_block_class .td-subcat-item .td-cur-simple-item,
            .$unique_block_class .td_quote_on_blocks,
            .$unique_block_class .td-opacity-cat .td-post-category:hover,
            .$unique_block_class .td-opacity-read .td-read-more a:hover,
            .$unique_block_class .td-opacity-author .td-post-author-name a:hover,
            .$unique_block_class .td-instagram-user a {
                color: @header_color;
            }

            .$unique_block_class .td-next-prev-wrap a:hover,
            .$unique_block_class .td-load-more-wrap a:hover {
                background-color: @header_color;
                border-color: @header_color;
            }

            .$unique_block_class .block-title span,
            .$unique_block_class .td-trending-now-title,
            .$unique_block_class .block-title a,
            .$unique_block_class .td-read-more a,
            .$unique_block_class .td-weather-information:before,
            .$unique_block_class .td-weather-week:before,
            .$unique_block_class .td-subcat-dropdown:hover .td-subcat-more,
            .$unique_block_class .td-exchange-header:before,
            .$unique_block_class .td-post-category:hover {
                background-color: @header_color;
            }

            .$unique_block_class .block-title {
                border-color: @header_color;
            }

            /* @header_text_color */
            .$unique_block_class .block-title span,
            .$unique_block_class .td-trending-now-title,
            .$unique_block_class .block-title a {
                color: @header_text_color;
            }
        </style>
    ";

        $td_css_compiler = new td_css_compiler($raw_css);
        $td_css_compiler->load_setting_raw('header_color', $header_color);
        $td_css_compiler->load_setting_raw('header_text_color', $header_text_color);

        $compiled_style = $td_css_compiler->compile_css();


        return $compiled_style;
    }


    /**
     * renders the block title
     * @return string HTML
     */
    function get_block_title() {

	    $custom_title = $this->template_data_array['atts']['custom_title'];
	    $custom_url = $this->template_data_array['atts']['custom_url'];

        extract($this->template_data_array['atts']);


        if (empty($custom_title)) {
	        if (empty($this->template_data_array['td_pull_down_items'])) {
		        //no title selected and we don't have pulldown items
		        return '';
	        }
	        // we don't have a title selected BUT we have pull down items! we cannot render pulldown items without a block title
	        $custom_title = 'Block title';
        }


        // there is a custom title
        $buffy = '';
        $buffy .= '<h4 class="block-title">';
        if (!empty($custom_url)) {
            $buffy .= '<a href="' . esc_url($custom_url) . '">' . esc_html($custom_title) . '</a>';
        } else {
            $buffy .= '<span>' . esc_html($custom_title) . '</span>';
        }
        $buffy .= '</h4>';
        return $buffy;
    }


    /**
     * renders the filter of the block
     * @return string
     */
    function get_pull_down_filter() {
        $buffy = '';

        if (empty($this->template_data_array['td_pull_down_items'])) {
            return '';
        }

        //generate unique id for this pull down filter control
        $pull_down_wrapper_id = "td_pulldown_" . $this->template_data_array['block_uid'];

        // wrapper
        $buffy .= '<div class="td-subcat-filter" id="' . $pull_down_wrapper_id . '">';

            // subcategory list
            $buffy .= '<ul class="td-subcat-list" id="' . $pull_down_wrapper_id . '_list">';
                foreach ($this->template_data_array['td_pull_down_items'] as $item) {
                    $buffy .= '<li class="td-subcat-item"><a class="td-subcat-link" id="' . td_global::td_generate_unique_id() . '" data-td_filter_value="' . $item['id'] . '" data-td_block_id="' . $this->template_data_array['block_uid'] . '" href="#">' . $item['name'] . '</a></li>';
                }
            $buffy .= '</ul>';


            // subcategory dropdown list
            $buffy .= '<div class="td-subcat-dropdown">';
                $buffy .= '<div class="td-subcat-more" aria-haspopup="true"><span>' . __td('More', TD_THEME_NAME) . '</span><i class="td-icon-read-down"></i></div>';

                // the dropdown list
                $buffy .= '<ul class="td-pulldown-filter-list">';



                $buffy .= '</ul>';

            $buffy .= '</div>';
        $buffy .= '</div>';

        return $buffy;
    }
}