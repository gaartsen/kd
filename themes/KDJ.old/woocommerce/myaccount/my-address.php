<?php
/**
 * My Addresses
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */
if (!defined('ABSPATH')) {
    exit;
}

$customer_id = get_current_user_id();

if (!wc_ship_to_billing_address_only() && get_option('woocommerce_calc_shipping') !== 'no') {
    $page_title = apply_filters('woocommerce_my_account_my_address_title', __('My Addresses', 'woocommerce'));
    $get_addresses = apply_filters('woocommerce_my_account_get_addresses', array(
        'billing' => __('Billing Address', 'woocommerce'),
        'shipping' => __('Shipping Address', 'woocommerce')
            ), $customer_id);
} else {
    $page_title = apply_filters('woocommerce_my_account_my_address_title', __('My Address', 'woocommerce'));
    $get_addresses = apply_filters('woocommerce_my_account_get_addresses', array(
        'billing' => __('Billing Address', 'woocommerce')
            ), $customer_id);
}

$col = 1;
?>

<h3 class="head"><?php echo $page_title; ?></h3>
<div class="panel">
    <span class="p_info"><?php _e('The following addresses will be used on the checkout page by default.', 'woocommerce'); ?></span>
</div>

<?php if (!wc_ship_to_billing_address_only() && get_option('woocommerce_calc_shipping') !== 'no') echo '<div class="col2-set addresses">'; ?>

<?php foreach ($get_addresses as $name => $title) : ?>

    <div class="col-<?php echo ( ( $col = $col * -1 ) < 0 ) ? 1 : 2; ?> address">
        <h3 class="head"><?php echo $title; ?></h3>
        <div class="panel">
            <span class="p_info">
                <?php
                $address = apply_filters('woocommerce_my_account_my_address_formatted_address', array(
                    'first_name' => get_user_meta($customer_id, $name . '_first_name', true),
                    'last_name' => get_user_meta($customer_id, $name . '_last_name', true),
                    'company' => get_user_meta($customer_id, $name . '_company', true),
                    'address_1' => get_user_meta($customer_id, $name . '_address_1', true),
                    'address_2' => get_user_meta($customer_id, $name . '_address_2', true),
                    'city' => get_user_meta($customer_id, $name . '_city', true),
                    'state' => get_user_meta($customer_id, $name . '_state', true),
                    'postcode' => get_user_meta($customer_id, $name . '_postcode', true),
                    'country' => get_user_meta($customer_id, $name . '_country', true)
                        ), $customer_id, $name);

                $formatted_address = WC()->countries->get_formatted_address($address);

                if (!$formatted_address)
                    _e('You have not set up this type of address yet.', 'woocommerce');
                else
                    echo str_replace("<br/>", " ", $formatted_address);
                ?></span><ul class="p_nav"><li><a href="<?php echo wc_get_endpoint_url('edit-address', $name); ?>" class="edit"><?php _e('Edit', 'woocommerce'); ?></a></li></ul>
        </div>
    </div>

<?php endforeach; ?>

<?php if (!wc_ship_to_billing_address_only() && get_option('woocommerce_calc_shipping') !== 'no') echo '</div>'; ?>
