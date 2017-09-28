<?php

namespace App\database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Base{		

		public static function EloConfig(){

			$ini_array = parse_ini_file("config.ini");
			$capsule = new Capsule();		
			$capsule->addConnection(array(
			    'driver'    => 'mysql',
			    'host'      => $ini_array['hostname'],
			    'database'  => $ini_array['dbname'],
			    'username'  => $ini_array['user'],
			    'password'  => $ini_array['password'],
			    'charset'   => 'utf8',
			    'collation' => 'utf8_general_ci',
			    'prefix'    => ''
			));

		// Set the event dispatcher used by Eloquent models... (optional)
		/*use Illuminate\Events\Dispatcher;
		use Illuminate\Container\Container;
		$capsule->setEventDispatcher(new Dispatcher(new Container));*/

		// Make this Capsule instance available globally via static methods... (optional)
		$capsule->setAsGlobal();

		// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
		$capsule->bootEloquent();

		}
}