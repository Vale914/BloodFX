<?php
declare(strict_types=1);

namespace Vale914\BloodFX;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->saveDefaultConfig();
    }
}