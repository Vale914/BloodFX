<?php

declare(strict_types=1);

namespace Vale914\BloodFX;

use pocketmine\block\VanillaBlocks;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\world\particle\BlockBreakParticle;

class EventListener implements Listener{

    /** @var Main $plugin */
    private $plugin;

    /**
     * EventListener constructor.
     * @param Main $plugin
     */
    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }

    /**
     * @param EntityDamageEvent $event
     * @ignoreCancelled false
     */
    public function onDamage(EntityDamageEvent $event) : void{
        if($event instanceof EntityDamageByEntityEvent){
            $player = $event->getEntity();
            if($player instanceof Player){
                for($i = 0; $i < intval($this->plugin->getConfig()->get("particle-count")); $i++){
                    $pos = $player->getPosition()->add(mt_rand(-50, 50) / 100, 1 + mt_rand(-50, 50) / 100, mt_rand(-50, 50) / 100);
                    $particle = new BlockBreakParticle(VanillaBlocks::REDSTONE());
                    $player->getWorld()->addParticle($pos, $particle);
                }
            }
        }
    }
}
