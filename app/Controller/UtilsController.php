<?php 
namespace App\Controller;
use \HTMLPurifier;

Class UtilsController{

	 //------ PURIFY HTML TAG IN STRING GIVEN ------//
  static function configHtmlPurifier(){
      $config = \HTMLPurifier_Config::createDefault();
      $config->set('Core.Encoding', 'UTF-8'); // Spécifier encodage HTML
      $config->set('HTML.Doctype', 'HTML 4.01 Transitional'); // Spécifier Doctype HTML
      $config->set('HTML.Allowed', '');
      $purifier = new HTMLPurifier($config);
      return $purifier;
  }

}