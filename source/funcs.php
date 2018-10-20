<?
/**
* @author enCoo Developments © Vladyslav Halimskyi 2018
* @package enCoo/Plugins/ec-base/Functions
*/

class BaseFuncs extends Funcs {
	public $DB;
	public static function getUserBase($login, $password) {
		$DB = new DB();
		$array = array();
		$query = "SELECT * FROM `ec_admins` WHERE `login` = '".$login."'";
		if($query = $DB->query($query)) {
			$row = $DB->fetchAssoc($query);
			if($row['password'] === md5($password)) {
				$array['id'] = $row['id'];
				$array['hash'] = md5($login.'-'.md5($password));
				return $array;
			} else return false;
		} else return false;
	}
	public function getContentAdminPage($page, $file=null) {
		if(!strlen($file)) {
			$file = 'content';
		}
		$file_tpl = ROOT.'/ec-plugins/ec-base/html/template.tpl';
		if(file_exists($file_tpl))
			$file_tpl = file_get_contents($file_tpl);

		$fileurl = ROOT.'/ec-plugins/ec-base/html/contents/'.$page.'/'.$file.'.tpl';
		if(file_exists($fileurl))
			$content = file_get_contents($fileurl);

		$fileurl = ROOT.'/ec-plugins/ec-base/html/contents/otherfiles/footer.tpl';
		$base_footer = file_get_contents($fileurl);

		$fileurl = ROOT.'/ec-plugins/ec-base/html/contents/otherfiles/navbar.tpl';
		$base_navbar = file_get_contents($fileurl);

		$fileurl = ROOT.'/ec-plugins/ec-base/html/contents/otherfiles/navbarleft.tpl';
		$base_navbarleft = file_get_contents($fileurl);
		$DB = new DB(); $pages = '';
		$query = $DB->query("SELECT * FROM `ec_pages` ORDER BY `id` AND `hide` = '0'");
		do {
			if(isset($row['id'])) {
				$pages .= '<a href="/admin/pages/open/'.$row['id'].'">+ '.$row['url'].'</a>';
			}
		} while ($row = $DB->fetchAssoc($query));
		if(strlen($pages) == 0)
			$pages .= '<a href="/admin/pages/create">+ Create page</a>'; // to set
		$objs = $pages;
		$base_navbarleft = str_replace('%{ec-admin navbar-left pages}%', $objs, $base_navbarleft);
		$plugs = self::getPlugins(); $plugins = '';
		for ($i=0; $i < count($plugs); $i++) { 
			$plugins .= '<a href="/admin/plugins/info/'.$plugs[$i].'">- '.$plugs[$i].'</a>';
		}
		if(strlen($plugins) == 0)
			$plugins .= '<a href="/admin/plugins/import">+ Import plugin</a>'; // to set
		$objs = $plugins;
		$base_navbarleft = str_replace('%{ec-admin navbar-left plugins}%', $objs, $base_navbarleft);
		$userData = $this->getUserData($_COOKIE['ec_uId']);
		$file_tpl = str_replace('%{ec-admin navbar}%', $base_navbar, $file_tpl);
		$file_tpl = str_replace('%{ec-admin navbar-left}%', $base_navbarleft, $file_tpl);
		$file_tpl = str_replace('%{ec-admin footer}%', $base_footer, $file_tpl);
		$file_tpl = str_replace('%{ec-admin content}%', $content, $file_tpl);
		$file_tpl = str_replace('%{NAVBAR PROFILE NAME}%', $userData['firstname'].' '.$userData['lastname'], $file_tpl);
		$file_tpl = str_replace('%{NAVBAR PROFILE ID}%', $userData['id'], $file_tpl);
		$file_tpl = str_replace('%{NAVBAR PROFILE IMG}%', $userData['avatar'], $file_tpl);
		$file_tpl = str_replace('%{ec-admin title}%', ucfirst(Funcs::getOption('title')).' - '.ucfirst($page), $file_tpl);
		$file_tpl = LangCore::LangEngine($file_tpl, $page);
		return $file_tpl;
	}
	public static function getUserData($id) {
		$DB = new DB();
		$query = "SELECT * FROM `ec_admins` WHERE `id` = '".$id."'";
		if($query = $DB->query($query)) {
			$row = $DB->fetchAssoc($query);
			return $row;
		} else return false;
	}
	public static function getPlugins() {
		$plugins = array();
		$filelist = glob("./ec-plugins/*", GLOB_ONLYDIR);
		for ($i=0; $i < count($filelist); $i++) { 
		    $filelist[$i] = explode('/', $filelist[$i]);
		    array_push($plugins, $filelist[$i][2]);
		}
		return $plugins;
	}
	public static function getPageData($id) {
		$DB = new DB();
		$query = "SELECT * FROM `ec_pages` WHERE `id` = '".$id."'";
		if($query = $DB->query($query)) {
			$row = $DB->fetchAssoc($query);
			return $row;
		} else return false;
	}

	public function logs_arr($item) {
		$DB = new DB();
		$query = "SELECT * FROM `ec_settings` WHERE `op_name` = 'logs_arr'";
		if($query = $DB->query($query)) {
			$row = $DB->fetchAssoc($query);
			$arr = array();
			$arr = json_decode($row['value'], true);
			if($arr['date'] == date('d-m-Y', time())) {
				$arr[$item]++;
				$arr = json_encode($arr);
				$DB->query("UPDATE `ec_settings` SET `value`='$arr' WHERE `op_name` = 'logs_arr'");
			} else {
				$arr['date'] = date('d-m-Y', time());
				$arr['auths'] = 0;
				$arr['regs'] = 0;
				$arr[$item]++;
				$arr = json_encode($arr);
				$DB->query("UPDATE `ec_settings` SET `value`='$arr' WHERE `op_name` = 'logs_arr'");
			}
		} else return false;

	}
}