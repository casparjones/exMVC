<?php
final class exAutoloader
{
  static public $config;
  static public $actMod;

  public static function autoload($name)
  {
    $dirname = dirname(__FILE__);
    if (strlen(__NAMESPACE__) > 0) {
        $name = str_replace(__NAMESPACE__ . '\\', '', $name);
    }
    
    $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $name) . '.class.php';
    $file = $dirname . DIRECTORY_SEPARATOR . $fileName;
    if (is_readable($file)) {
        require_once $file;
    }
  }
  
  public static function mod_autoload($name)
  {
    $config = self::$config[self::$actMod];
    $dirname = exMOD . '/' . $config['mod'] . '/impl/' . $config['action'];
     
    if (strlen(__NAMESPACE__) > 0) {
        $name = str_replace(__NAMESPACE__ . '\\', '', $name);
    }

    $actionName = 'exAction.class.php';
    $actionFile = $dirname . DIRECTORY_SEPARATOR . $actionName;
    
    $viewName = 'ex' . $config['view'] . 'View.class.php';
    $viewFile = $dirname . DIRECTORY_SEPARATOR . $viewName;
    
    if(is_file($viewFile)) {
      // use Viewfile
      require_once $viewFile;
    } elseif(is_file($actionFile)) {
      // use Actionfile
      require_once $actionFile;
    } else {

      throw new exException('Auto Include failed for "' . $name . ':' . $actionName . '"" in Module: "' . $config['mod'] .'"');
    }
  }
  
  public static function lib_autoload($name) {
    $config = self::$config[self::$actMod];
    $dirname = exMOD . '/' . $config['mod'] . '/lib';
    
    $libFileName = $name . '.class.php';
    $libFile = $dirname . DIRECTORY_SEPARATOR . $libFileName;
    if(is_file($libFile)) {
      require_once $libFile;
    } else {
      // dwoo errors for wrong autoloading
      if($name == "PluginTopLevelBlock") return;
      throw new exException('Lib Include failed for "' . $libFile . '"" in Module: "' . self::$modName .'"');
    }
  }
  
  public static function registerLib($libName, $mod = false) {
    self::$actMod = $mod;
    
    self::$config[$mod]['mod'] = $mod;
    self::$config[$mod]['lib'] = $libName;

    return spl_autoload_register(array(__CLASS__, 'lib_autoload'));
  }
    
  public static function registerMod($mod = false, $action = false, $view = false) {
    self::$actMod = $mod;
    
    self::$config[$mod]['mod'] = $mod;
    self::$config[$mod]['action'] = $action;
    self::$config[$mod]['view'] = $view;

    return spl_autoload_register(array(__CLASS__, 'mod_autoload'));  
  }
    
  public static function register() {
    return spl_autoload_register(array(__CLASS__, 'autoload'));
  }
}
?>