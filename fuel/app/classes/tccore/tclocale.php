<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TCLocale
 *
 * @author juise_man
 */
class TCLocale {
	public static function get_current_leng_id() {
		Session::get('lang') ? ($curr_lang = Session::get('lang')) : ($curr_lang = Config::get('language'));
		return Model_Local::query()->where('name', '=', $curr_lang)->get_one()->id;
	}
	
	public static function set_locale_from_name($locale) {
		Session::set('lang', $locale);
	}
}

?>
