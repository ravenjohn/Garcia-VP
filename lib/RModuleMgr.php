<?php
	defined('AUTH') or die;
	
	if(!defined('RCONFIG'))
		include_once 'bin/RConfig.php';
	
	DEFINE('MODULE_MGR',1);

	final class RModuleMgr{
	
	
		public static function renderModules($modules){
			$js = '';
			foreach($modules as $module){
				if(file_exists('modules/'.$module."/tmpl/index.php"))
					include 'modules/'.$module."/tmpl/index.php";
				else
					echo "Module \"".$module."\" not found.<br />";
				if(file_exists('modules/'.$module.'/js/default.js'))
					$js .= file_get_contents('modules/'.$module."/js/default.js");
			}
			if(RConfig::minifyJS) $js = RModuleMgr::minifyJS($js);
			$js .= "$('script').remove();";
			?><script type="text/javascript"><?php echo $js ?></script><?php
		}
		
		
		public static function renderScripts(){
			if(RConfig::replaceJS){
				$js = "";
				foreach(glob("static/js/*.js") as $file)
					$js.=file_get_contents($file);
				$objects = RModuleMgr::dirfiles('static/img');
				$imgs = '';
				foreach($objects as $name)
					$imgs .= '"'.$name.'",';
				$imgs = str_ireplace("\\","/",$imgs);
				$imgs = substr($imgs,0,strlen($imgs)-1);
				$js .= "window.imgs = [$imgs];";
				if(RConfig::minifyJS) $js = RModuleMgr::minifyJS($js);
				$f = fopen("_auto/auto.min.js",'w');
				fwrite($f,$js);
				fclose($f);
			}?><script type="text/javascript" src="_auto/auto.min.js"><?php //echo $js;?></script><?php
		}
		
		
		public static function renderStyles(){
			if(RConfig::replaceCSS){
				$css = "";
				foreach(glob("static/css/*.css") as $file)
					$css.=file_get_contents($file);
				foreach(glob("modules/*") as $file)
					if(file_exists($file."/css/default.css"))
						$css.=file_get_contents($file."/css/default.css");
				if(RConfig::minifyCSS) $css = RModuleMgr::minifyCSS($css);
				$f = fopen("_auto/auto.min.css",'w');
				fwrite($f, $css);
				fclose($f);
			}?><link rel="stylesheet" href="_auto/auto.min.css" type="text/css"/><?php
		}
		
		
		private static function strToHex($string){
			$hex='';
			for ($i=0; $i < strlen($string); $i++)
				$hex .= '%'.dechex(ord($string[$i]));
			return $hex;
		}
			
		
		public static function minifyHTML($html){
			if(RConfig::minifyHTML){
				$html = str_replace(array("\t")," ",$html);
				$html = str_replace(array("\n","\r")," ",$html);
				$html = preg_replace("/\s+/"," ",$html);
				$html = str_replace(array("> <"),"><",$html);
			}
			if(RConfig::encryptHTML){
				?><script>document.write(unescape('<?php echo trim(RModuleMgr::strToHex($html)); ?>'))</script><?php
			}else{
				echo $html;
			}
		}
	
	
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

		private static function dirfiles($dirname = '.') {
			if($dirname == '')
				$dirname = '.';
			else if (!is_dir($dirname) || !is_readable($dirname))
				return false;
			$a = array();
			$handle = opendir($dirname);
			while (false !== ($file = readdir($handle))) {
				if ($file != '.' && $file != '..' && is_readable($dirname . DIRECTORY_SEPARATOR . $file)) {
					if (is_dir($dirname . DIRECTORY_SEPARATOR . $file))
						$a = array_merge($a,RModuleMgr::dirfiles($dirname . DIRECTORY_SEPARATOR . $file));
					else
						$a[] = $dirname . DIRECTORY_SEPARATOR . $file;
				}
			}
			closedir($handle);
			return $a;
		}
	}