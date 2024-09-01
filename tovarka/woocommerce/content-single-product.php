<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;
$product_title = $product->get_title();

$short_description = $product->get_short_description();
$attr = $product->get_attributes();

// обращаемся по ключу к каждому атрибуту
$product_sku = $product->get_sku();

$product_price = $product->get_price_html();
$product_id = $product->get_id();
$product_desc = $product->get_description();
$product_amount = $product ->get_stock_quantity();






// echo '<pre>';
// print_r($array);
// echo '</pre>';

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div class="container">
	<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
		<h1 class="title single-product">
				<?php echo $product_title ?>
		</h1>
		<div class="single-product__wrapper">
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action('woocommerce_before_single_product_summary');
			?>

			<div class="single-product__description">
				<h2>Характеристики товара</h2>
				<ul class="single-product__list">
					<li style="justify-content: space-between;">
						<p class="font-medium text-black md:text-[16px] text-[14px]">Артикул:</p>
						<p style="color: rgb(13, 43, 0);">
							<?php echo $product_sku; ?>
						</p>
					</li>
					<li style="justify-content: space-between;">
						<p class="font-medium text-black md:text-[16px] text-[14px]">Остаток на складе</p>
						<p style="color: rgb(13, 43, 0);">
							<?php echo $product_amount; ?>
						</p>
					</li>
					<li style="justify-content: space-between;">
						<p class="font-medium text-black md:text-[16px] text-[14px]">ЕДИНИЦА ИЗМЕРЕНИЙ</p>
						<p style="color: rgb(13, 43, 0);">
							шт.
						</p>
					</li>
				</ul>

				<p class="description__text">Описание</p>
				<div>
					<?php echo $product_desc; ?>
				</div>

				<div class="summary entry-summary">
					<div class="entry-summary-wrapper">
						<?php
						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action('woocommerce_single_product_summary');
						?>
					</div>
				</div>
			</div>

		</div>

		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action('woocommerce_after_single_product_summary');
		?>

		<div>
			<h2 class="title-news">Статьи</h2>
			<?php wc_get_template('news-template.php'); ?>
		</div>

	</div>
</div>

<?php do_action('woocommerce_after_single_product'); ?>