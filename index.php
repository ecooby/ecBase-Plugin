<?
/**
* @author enCoo Developments © Vladyslav Halimskyi 2018
* @package enCoo/Plugin/ec-base
*/

define('ECBASE_ROOT', dirname(__FILE__));
define('ECBASE_NAME', 'ec-base');
include_once(ECBASE_ROOT.'/source/funcs.php');
include_once('/ec-inc/version.php');
include_once('/ec-inc/langCore.php');
class TestClass {
	public function actionIndex() {
		$file = file_get_contents(ECBASE_ROOT.'/logs/log.php');
		$fileline = explode('*', $file);
		echo '<pre>';
		for ($i=0; $i < count($fileline); $i++) {
			$arr = json_decode($fileline[$i], true);
			$arr_D = explode('-', $arr['datetime']);
			$arr['datetime'] = $arr_D;
			print_r($arr);
		}
		echo '</pre>';
		return 1;
	}
}

class AdminClass {
	private $myfuncs;
	private function tpl() { // get template name
		$core = new Core();
		return $core->getTpl();
	}
	public function actionCheck() {
		if(isset($_COOKIE['ec_uId'])) { // if you logged
			//if you have groupe 'Admin'
			$DB = new DB();
			$root = dirname(__FILE__);
			$myfuncs = new BaseFuncs();
			$content = $myfuncs->getContentAdminPage('main');
			$arr_l = array();$arr = array();
			$arr_l = Funcs::getOption('logs_arr');
			$arr = Funcs::getOption('admin_home_arr');
			$arr_l = json_decode($arr_l, true);
			$arr = json_decode($arr, true);
			if($arr_l['date'] !== date('d-m-Y', time())) {
				$arr_l['regs'] = 0;
				$arr_l['auths'] = 0;
				$arr_l['date'] = date('d-m-Y', time());
				$arr__l = json_encode($arr_l);
				$DB->query("UPDATE `ec_settings` SET `value`='$arr__l' WHERE `op_name` = 'logs_arr'");
			} if($arr['date'] !== date('d-m-Y', time())) {
				$arr['date'] = date('d-m-Y', time());
				$arr['visitors'] = 0;
				$arr['unique_vs'] = 0;
				$arr['lastweek'] = 0;
				$arr__h = json_encode($arr);
				$DB->query("UPDATE `ec_settings` SET `value`='$arr__h' WHERE `op_name` = 'admin_home_arr'");
			}
			$content = str_replace('%{ec-admin visits tod}%', $arr['visitors'], $content);
			$content = str_replace('%{ec-admin uni visits tod}%', $arr['unique_vs'], $content);
			$content = str_replace('%{ec-admin visits week}%', $arr['lastweek'], $content);
			$content = str_replace('%{ec-admin regs tod}%', $arr_l['regs'], $content);
			$content = str_replace('%{ec-admin auths tod}%', $arr_l['auths'], $content);
			echo $content;
			return true;
		} else {
			// show login
			//setcookie('ec_uId', 1, time()+24*3600, '/');
			$root = dirname(__FILE__);
			return include($root.'/html/signin.tpl');
		}
	}
	public function actionLogin($params=null) {
		if(!isset($params)) {
			if(!isset($_COOKIE['ec_uId'])) {
				if(isset($_POST['login']) && isset($_POST['password'])) {
					if($_POST['login'] != '' && $_POST['password'] != '') {
						$myfuncs = new BaseFuncs();
						if($hash = $myfuncs->getUserBase($_POST['login'], $_POST['password'])) {
						    setcookie('ec_uId', $hash['id'], time()+3*3600);
						    setcookie('ec_uHash', $hash['hash'], time()+3*3600);
						    $myfuncs->logs_arr('auths');
							echo '<div class="res_case">
							      <span class="times"><a href="#">&times</a></span>
							      <div class="clear"></div>
							      <p>'.AUTH_SUCCESS.'</p>
							    </div>
							    <script>setTimeout(function(){ top.location.reload(); }, 1500);</script>';

							return true;
						} else
							echo '<div class="res_case">
							      <span class="times"><a href="#">&times</a></span>
							      <div class="clear"></div>
							      <p>'.AUTH_ERROR.'</p>
							    </div>';
					} else 
						echo '<div class="res_case">
						      <span class="times"><a href="#">&times</a></span>
						      <div class="clear"></div>
						      <p>'.AUTH_ERROR_NO_POST.'</p>
						    </div>';
				} else 
					echo '<div class="res_case">
					      <span class="times"><a href="#">&times</a></span>
					      <div class="clear"></div>
					      <p>'.AUTH_ERROR_NO_POST.'</p>
					    </div>';
			} else
				exit();
		} else if($params == 'out') {
			if(isset($_COOKIE['ec_uId'])) {
			    setcookie('ec_uId', '', time()-3*3600);
			    setcookie('ec_uHash', '', time()-3*3600);
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				header("Location: http://$host$uri/admin");
				exit;
			} else {
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				header("Location: http://$host$uri/admin");
				exit;
			}
		}
		return 1;
	}
	public function actionSettings() {
		if(isset($_COOKIE['ec_uId'])) { // if you logged
			$root = dirname(__FILE__);
			$myfuncs = new BaseFuncs();
			$content = $myfuncs->getContentAdminPage('settings');
			echo $content;
			return true;
		} else
			return $this->actionCheck();
	}
	public function actionMail($p=null) {
		$root = dirname(__FILE__);
		$myfuncs = new BaseFuncs();
		if(isset($_COOKIE['ec_uId']) && isset($p) && $p == 'create') {
			$content = $myfuncs->getContentAdminPage('mail', 'create');
			$content = str_replace('%{ec-admin domain}%', $_SERVER['SERVER_NAME'], $content);
			echo $content;
			return true;
		} else if(isset($_COOKIE['ec_uId'])) { // if you logged
			$content = $myfuncs->getContentAdminPage('mail');
			echo $content;
			return true;
		} else
			return $this->actionCheck();
	}
	public function actionPlugins($p=null, $item=null) {
		$root = dirname(__FILE__);
		$myfuncs = new BaseFuncs();
		if(isset($p) && isset($_COOKIE['ec_uId']) && ($p == 'list' || $p == 'import' || $p == 'info')) {
			if($p == 'list') {
				$content = $myfuncs->getContentAdminPage('plugins');
				echo $content;
				return true;
			} else if($p == 'import') {
				//exit($item);
				return true;
			} else if($p == 'info') {
				exit($item);
				return true;
			}
		} else 
			return $this->actionCheck();
	}
	public function actionPages($p=null, $item=null) {
		$root = dirname(__FILE__);
		$myfuncs = new BaseFuncs();
		if(isset($p) && isset($_COOKIE['ec_uId']) && ($p == 'open' || $p == 'create' || $p == 'list' || $p == 'edit')) {
			if($p == 'open') {
				if(isset($item)) {
					$pageData = array();
					if($pageData = $myfuncs->getPageData($item)) {
						$content = $myfuncs->getContentAdminPage('pages', 'open');
						$content = str_replace('%{ec-admin pages title}%', $pageData['title'], $content);
						$content = str_replace('%{ec-admin pages content}%', $pageData['content'], $content);
						$content = str_replace('%{ec-admin pages url}%', $pageData['url'], $content);
						$content = str_replace('%{ec-admin pages id}%', $pageData['id'], $content);
						$content = str_replace('%{ec-admin pages date}%', date('d/m/Y H:i', $pageData['time']), $content);
						$content = str_replace('%{ec-admin pages author_name}%', '<a href="/admin/profile/'.$pageData['author_id'].'">'.$myfuncs->getUserData($pageData['author_id'])['login'].'</a>', $content);
					} else {
						$content = $myfuncs->getContentAdminPage('404');
					}
					echo $content;
				}
				return true;
			} else if($p == 'create') {
				//exit($item);
				return true;
			} else if($p == 'list') {
				exit($item);
				return true;
			} else if($p == 'edit') {
				if(isset($item)) {
					$pageData = array();
					if($pageData = $myfuncs->getPageData($item)) {
						$content = $myfuncs->getContentAdminPage('pages', 'edit');
						$content = str_replace('%{ec-admin pages title}%', $pageData['title'], $content);
						$content = str_replace('%{ec-admin pages content}%', htmlentities($pageData['content']), $content);
						$content = str_replace('%{ec-admin pages url}%', $pageData['url'], $content);
						$content = str_replace('%{ec-admin pages id}%', $pageData['id'], $content);
						$content = str_replace('%{ec-admin pages date}%', date('d/m/Y H:i', $pageData['time']), $content);
						$content = str_replace('%{ec-admin pages author_name}%', '<a href="/admin/profile/'.$pageData['author_id'].'">'.$myfuncs->getUserData($pageData['author_id'])['login'].'</a>', $content);
					} else {
						$content = $myfuncs->getContentAdminPage('404');
					}
					echo $content;
				}
				return true;
			}
		} else 
			return $this->actionCheck();
	}
	public function actionVersion($p=null) {
		$root = dirname(__FILE__);
		$myfuncs = new BaseFuncs();
		if(isset($p) && isset($_COOKIE['ec_uId']) && ($p == 'show' || $p == 'update')) {
			if($p == 'show') {
				$content = $myfuncs->getContentAdminPage('version', 'show');
				$content = str_replace('%{ec-admin core version}%', ecVersion, $content);
				$content = str_replace('%{ec-admin core}%', ecCore, $content);
				echo $content;
				return true;
			} else if($p == 'update') {
				$content = $myfuncs->getContentAdminPage('version', 'update');
				$content = str_replace('%{ec-admin lastupdate}%', date('d/m/Y H:i', Funcs::getOption('update')), $content);
				$content = str_replace('%{ec-admin domain}%', $_SERVER['HTTP_HOST'], $content);
				$content = str_replace('%{ec-admin license}%', Funcs::getOption('license'), $content);
				echo $content;
				return true;
			}
		} else 
			return $this->actionCheck();
	}
	public function actionProfile($id=null) {
		if(!isset($id)) {
			$id = $_COOKIE['ec_uId'];
		}
		$root = dirname(__FILE__);
		$myfuncs = new BaseFuncs();
		if(isset($_COOKIE['ec_uId']) && isset($id)) {
			if($userData = $myfuncs->getUserData($id)) {
				$content = $myfuncs->getContentAdminPage('profile');
				$content = str_replace('%{ec-admin profile login}%', $userData['login'], $content);
				$content = str_replace('%{ec-admin profile avatar}%', $userData['avatar'], $content);
				$content = str_replace('%{ec-admin profile email}%', $userData['email'], $content);
				$content = str_replace('%{ec-admin profile online}%', date('d/m/Y', $userData['online']), $content);
				$content = str_replace('%{ec-admin profile lastname}%', $userData['lastname'], $content);
				$content = str_replace('%{ec-admin profile firstname}%', $userData['firstname'], $content);
				$content = str_replace('%{ec-admin profile group}%', $userData['aRank'], $content);
				$content = str_replace('%{ec-admin profile id}%', $userData['id'], $content);
				$content = str_replace('%{ec-admin profile birthdate}%', $userData['bd'], $content);
				$content = str_replace('%{ec-admin profile regdate}%', date('Y-m-d',$userData['registration_date']), $content);
			} else {
				$content = $myfuncs->getContentAdminPage('404');
			}
			echo $content;
			return true;
		} else
			return $this->actionCheck();
	}
	public function actionMycogs() {
		$root = dirname(__FILE__);
		$myfuncs = new BaseFuncs();
		if(isset($_COOKIE['ec_uId'])) {
			$content = $myfuncs->getContentAdminPage('mycogs');
			echo $content;
			return true;
		} else
			return $this->actionCheck();
	}
}