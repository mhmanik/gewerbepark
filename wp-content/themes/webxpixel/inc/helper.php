<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */

class Helper
{

    public static function get_asset_file($file)
    {
        return get_template_directory_uri() . '/assets/' . $file;
    }

    public static function get_img($img)
    {
        $img = get_template_directory_uri() . '/assets/images/' . $img;
        return $img;
    }

    public static function get_css($file)
    {
        $file = get_template_directory_uri() . '/assets/css/' . $file . '.css';
        return $file;
    }

    public static function get_js($file)
    {
        $file = get_template_directory_uri() . '/assets/js/' . $file . '.js';
        return $file;
    }

    public static function wp_set_temp_query($query)
    {
        global $wp_query;
        $temp = $wp_query;
        $wp_query = $query;
        return $temp;
    }

    public static function wp_reset_temp_query($temp)
    {
        global $wp_query;
        $wp_query = $temp;
        wp_reset_postdata();
    }

}


/**
 * Get a list of all the allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return array
 */
function webxpixel_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b' => [],
        'i' => [],
        'u' => [],
        'em' => [],
        'br' => [],
        'abbr' => [
            'title' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'strong' => [],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
    }

    return $allowed_html;
}

/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param string $string
 * @return string
 */
function wpx_kses_intermediate($string = '')
{
    return wp_kses($string, webxpixel_get_allowed_html_tags('intermediate'));
}

/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param string $string
 * @return string
 */
function webxpixel_kses_basic($string = '')
{
    return wp_kses($string, webxpixel_get_allowed_html_tags('basic'));
}

/**
 * Get a translatable string with allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return string
 */
function webxpixel_get_allowed_html_desc($level = 'basic')
{
    if (!in_array($level, ['basic', 'intermediate'])) {
        $level = 'basic';
    }

    $tags_str = '<' . implode('>,<', array_keys(webxpixel_get_allowed_html_tags($level))) . '>';
    return sprintf(__('This input field has support for the following HTML tags: %1$s', 'wpx-elements'), '<code>' . esc_html($tags_str) . '</code>');
}

 