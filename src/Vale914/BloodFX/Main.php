<?php

declare(strict_types=1);

namespace Vale914\BloodFX;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{

    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->saveDefaultConfig();
		
        if($this->getConfig()->exists("version") !== true || $this->getConfig()->get("version") != $this->getDescription()->getVersion()){
            $this->getLogger()->info(TextFormat::AQUA . "Updating configuration..");
            @unlink($this->getDataFolder() . "config.yml");
            $this->saveDefaultConfig();
        }
    }
}