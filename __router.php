<?
/**
* @author enCoo Developments © Vladyslav Halimskyi 2018
* @package enCoo/Plugins/ec-base/Router
*/

	$this->routes['admin/log([0-9a-z])'] = 'admin/login/$1';
	$this->routes['admin/log'] = 'admin/login';
	//$this->routes['admin/plugins/list'] = 'admin/plugins/list';
	$this->routes['admin/plugins/import'] = 'admin/plugins/import';
	$this->routes['admin/plugins/info/([a-z0-9]+)'] = 'admin/plugins/info/$1';
	$this->routes['admin/plugins/list'] = 'admin/plugins/list';
	$this->routes['admin/plugins/([a-z]+)/([a-z0-9]+)'] = 'admin/plugins/$1/$2';
	$this->routes['admin/pages/list'] = 'admin/pages/list';
	$this->routes['admin/pages/([a-z]+)/([0-9]+)'] = 'admin/pages/$1/$2';
	$this->routes['admin/settings'] = 'admin/settings';
	$this->routes['admin/mail'] = 'admin/mail';
	$this->routes['admin/version/([a-z]+)'] = 'admin/version/$1';
	$this->routes['admin/mycogs'] = 'admin/mycogs';
	$this->routes['admin/profile/([a-z0-9]+)'] = 'admin/profile/$1';
	$this->routes['admin'] = 'admin/check';
	$this->routes['test'] = 'test/index';