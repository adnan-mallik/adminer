<?php

	function adminer_object()
	{
		// Required to run any plugin.
		include_once "./plugins/plugin.php";

		// Plugins auto-loader.
		foreach (glob("plugins/*.php") as $filename) {
			include_once "./$filename";
		}

		// Specify enabled plugins here.
		$plugins = [
		    new AdminerEditForeign(),
		    new AdminerEditTextarea(),
		    new AdminerEnumOption(),
		    new AdminerTablesFilter(),
		    new AdminerDumpArray(),
		    new AdminerJsonPreview(),
			// AdminerTheme has to be the last one!
			new AdminerTheme('default-green'),
			new AdminerImportFromFolder("upload"), 
			
			// Color variant can by specified in constructor parameter.
			// new AdminerTheme("default-orange"),
// 			new AdminerTheme("default-blue"),
// 			new AdminerTheme("default-green"),
		];

		return new AdminerPlugin($plugins);
	}

	// Include original Adminer or Adminer Editor.
	include "./adminer.php";