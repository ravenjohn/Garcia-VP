<?php
	defined('AUTH') or die;
	
	if(!defined('RCONFIG'))
		include_once 'bin/RConfig.php';
	
	DEFINE('MODULE_MGR',1);

	final class RModuleMgr{
	
		public static function renderModules($modules,$position){
			foreach($modules as $module)
				if($module['position'] == $position){
					if(file_exists('modules/'.$module['name']."/tmpl/index.php"))
						include 'modules/'.$module['name']."/tmpl/index.php";
					else
						echo "Module \"".$module['name']."\" not found.<br />";
				}
		}
		
		public static function renderScripts(){
			if(RConfig::replaceCSS){
				$js = "";
				foreach(glob("static/js/*") as $file)
					$js.=file_get_contents($file);
				foreach(glob("modules/*") as $file)
					if(file_exists($file."/js/default.js"))
						$js.=file_get_contents($file."/js/default.js");
				$js = RModuleMgr::minifyJS($js);
				$f = fopen("_auto/auto.min.js",'w');
				fwrite($f,$js);
				fclose($f);
			}?><script src="_auto/auto.min.js" type="text/javascript"></script>
<?php }
		
		
		public static function renderStyles(){
			if(RConfig::replaceJS){
				$css = "";
				foreach(glob("static/css/*") as $file)
					$css.=file_get_contents($file);
				foreach(glob("modules/*") as $file)
					if(file_exists($file."/css/default.css"))
						$css.=file_get_contents($file."/css/default.css");
				$css.=file_get_contents("static/css/custom.css");
				$css = RModuleMgr::minifyCSS($css);
				$f = fopen("_auto/auto.min.css",'w');
				fwrite($f, $css);
				fclose($f);
			}?><link rel="stylesheet" href="_auto/auto.min.css" type="text/css"/>
<?php }
		
		private static function minifyJS($js){
			$js = str_replace(array("\t")," ",$js);
			$js = str_replace(array("\n","\r")," ",$js);
			$js = preg_replace("/\s+/"," ",$js);
			$js = preg_replace('#/\*.*?\*/#s','',$js);
			$js = str_replace(array(" }","} "," } "),"}",$js);
			$js = str_replace(array("{ "," {"," { "),"{",$js);
			$js = str_replace(array(" )",") "," ) "),")",$js);
			$js = str_replace(array(" (","( "," ( "),"(",$js);
			$js = str_replace(array('+ ',' +'),'+',$js);
			$js = str_replace(array(' =','= '),'=',$js);
			$js = str_replace(array(' ,',', '),',',$js);
			$js = str_replace(array('; ',' ;'),';',$js);
			$js = str_replace(array(': ',' :'),':',$js);
			return trim($js);
		}
		
		private static function minifyCSS($css){
			$css = str_replace(array("\t"),"",$css);
			$css = str_replace(array("\n","\r"),"",$css);
			$css = preg_replace("/\s+/"," ",$css);
			$css = preg_replace('#\s+#',' ',$css);
			$css = preg_replace('#/\*.*?\*/#s','',$css);
			$css = str_replace(array(" }","} "),"}",$css);
			$css = str_replace(array("{ "," {"),"{",$css);
			$css = str_replace(array(' =','= '),'=',$css);
			$css = str_replace(array(' ,',', '),',',$css);
			$css = str_replace(array('; ',' ;'),';',$css);
			$css = str_replace(array(': ',' :'),':',$css);
			return trim($css);
		}
	}
?>