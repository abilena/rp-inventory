<?php

require_once('rp-inventory-database.php');

function rp_inventory_merchant_html($name) {

    $path_local = plugin_dir_path(__FILE__);
    $path_url = plugins_url() . "/rp-inventory";

    $output = "";

    $owner = rp_inventory_get_hero_id_by_name($name);
    if (empty($owner) or ($owner < 0)) {
        $owner = 0;
    }

    if ($owner > 0) {
        $hero = rp_inventory_get_hero($owner);

        $tpl_inventory_merchant = new Template($path_local . "../tpl/inventory_merchant.html");
        $tpl_inventory_merchant->set("Name", $hero->name);
        $tpl_inventory_merchant->set("Biography", $hero->biography);
        $tpl_inventory_merchant->set("Flavor", $hero->flavor);
        $tpl_inventory_merchant->set("Portrait", $hero->portrait);
        $tpl_inventory_merchant->set("DisplayName", $hero->display_name);
        $output .= $tpl_inventory_merchant->output();

    }

	return $output;
}

?>