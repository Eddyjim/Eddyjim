<?php
class sfAjaxAdminDoctrineThemePluginConfiguration extends sfPluginConfiguration {
	public function initialize() {
		if (!sfConfig::get('sf_ajax_admin_doctrine_theme_plugin_web_dir')) {
			sfConfig::set('ajax_admin_doctrine_theme_plugin_web_dir', '/sfAjaxAdminDoctrineThemePlugin');
		}
	}
}
