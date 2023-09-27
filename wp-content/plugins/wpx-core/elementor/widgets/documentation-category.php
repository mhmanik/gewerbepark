<?php
/**
 * @author  WpX
 * @since   1.0
 * @version 1.0
 */

namespace wpx\wpx_elements;

use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
 


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class wpx_documentation_category extends Widget_Base {

 public function get_name() {
        return 'wpx-documentation-category';
    }    
    public function get_title() {
        return __( 'Section: Documentation Category', 'wpx-elements' );
    }
    public function get_icon() {
        return 'eicon-posts-grid';
    }
    public function get_categories() {
        return [ WPX_ELEMENTS_THEME_PREFIX . '-widgets' ];
    }

    public function wpx_get_img( $img )
    {
        $img = WPX_ELEMENTS_BASE_URL . 'assets/media/' . $img;
        return $img;
    }  

    private function axil_cat_dropdown() {
            $terms = get_terms( array( 'taxonomy' => 'documentation-category','parent' => 0,  'orderby' => 'count', 'hide_empty' => 0 ) );
            $category_dropdown = array( '0' => esc_html__( 'All Categories', 'etrade-elements' ) );
            foreach ( $terms as $category ) {  
                $category_dropdown[$category->term_id] = $category->name; 
            }
            return $category_dropdown;
      }


    protected function register_controls() { 

       $this->start_controls_section(
            'wpx_content',
            [
                'label' => esc_html__( 'Category List', 'wpx-elements' ),
                  
            ]
        );

           $this->add_control(      
            'select_categories',
                [
                'label'         => esc_html__( 'Select Categories', 'etrade-elements' ),
                'type'          => Controls_Manager::SELECT2,
                'options'       => $this->axil_cat_dropdown(),            
                'label_block'   => true,                
                'default'       => '0',
               
                'multiple'     => true,
                   
                ] 
            );
  
        $this->add_control(
            'btn_link_text',
            [
                'label' => esc_html__('Button Text','wpx-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read Tips',
                'title' => esc_html__('Enter button text','wpx-elements'),
                 
            ]
        );

        $this->end_controls_section();


  }
	protected function render() {
	    $settings = $this->get_settings();
        
        ?> 
        <div class="container">   
            <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-lg-3">
                <?php   
                $filter_cat_arg = array(
                    'include'    => $settings['select_categories'],
                );
                $cat_arg = array(
                    'taxonomy'   => 'documentation-category',
                    'hide_empty' => 1,
                    'orderby'    => 'date',
                    'order'      => 'DESC',
                ); 
                $cat_args    = array_merge( $cat_arg, $filter_cat_arg);
                $documentation_categories   = get_categories( $cat_args ); 
                foreach ($documentation_categories as $documentation_categorie) : 
                ?>
                <div class="col">
                    <div class="documentation-category-box">
                        <div class="category-icon"> 
                            <?php
                            $category_image_id  = get_term_meta( $documentation_categorie->term_id, 'documentation-categories-img', true );
                            $documentation_image = wp_get_attachment_url($category_image_id);
                            if ($documentation_image){ ?>
                                <div class="thumbnail">
                                    <img src="<?php echo esc_url($documentation_image); ?>" alt="<?php echo esc_html($documentation_categorie->name); ?>">
                                </div>
                            <?php } ?> 
                                 
                        </div>
                        <div class="category-content">
                            <h3 class="title"><?php echo esc_html( $documentation_categorie->name );?></h3>
                        </div>                       
                        <div class="category-border"> 
                            <a class="axil-btn btn-text" href="<?php echo get_term_link($documentation_categorie->term_id);?>" target="_blank" rel="nofollow"><?php echo esc_attr($settings['btn_link_text']); ?>
                                <div class="icon-holder">
                                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.328125 5.32812V4.67188C0.328125 4.57812 0.359375 4.5 0.421875 4.4375C0.494792 4.36458 0.578125 4.32812 0.671875 4.32812H11.4531L8.48438 1.375C8.45312 1.34375 8.42708 1.30729 8.40625 1.26562C8.38542 1.22396 8.375 1.18229 8.375 1.14062C8.375 1.08854 8.38542 1.04167 8.40625 1C8.42708 0.958333 8.45312 0.927083 8.48438 0.90625L8.95312 0.4375C8.98438 0.40625 9.02083 0.380208 9.0625 0.359375C9.10417 0.338542 9.14583 0.328125 9.1875 0.328125C9.23958 0.328125 9.28125 0.338542 9.3125 0.359375C9.35417 0.380208 9.39062 0.40625 9.42188 0.4375L13.5156 4.51562C13.5677 4.56771 13.6042 4.625 13.625 4.6875C13.6562 4.73958 13.6719 4.80208 13.6719 4.875V5.125C13.6719 5.19792 13.6562 5.26562 13.625 5.32812C13.6042 5.38021 13.5677 5.43229 13.5156 5.48438L9.42188 9.5625C9.39062 9.59375 9.35417 9.61979 9.3125 9.64062C9.28125 9.66146 9.23958 9.67188 9.1875 9.67188C9.14583 9.67188 9.10417 9.66146 9.0625 9.64062C9.02083 9.61979 8.98438 9.59375 8.95312 9.5625L8.48438 9.09375C8.45312 9.0625 8.42708 9.02604 8.40625 8.98438C8.38542 8.94271 8.375 8.90104 8.375 8.85938C8.375 8.81771 8.38542 8.77604 8.40625 8.73438C8.42708 8.69271 8.45312 8.65625 8.48438 8.625L11.4531 5.67188H0.671875C0.578125 5.67188 0.494792 5.64062 0.421875 5.57812C0.359375 5.50521 0.328125 5.42188 0.328125 5.32812Z" fill="white"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>                        
                    </div>
                </div> 
                <?php  endforeach; ?>      
            </div>
        </div>
    <?php
  
	}
}