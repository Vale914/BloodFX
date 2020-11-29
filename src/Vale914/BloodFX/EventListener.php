<?php
declare(strict_types=1);

namespace Vale914\BloodFX;

use pocketmine\block\Block;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\level\particle\DestroyBlockParticle;
use pocketmine\math\Vector3;
use pocketmine\Player;

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
     * @ignoreCancelled
     */
    public function onDamage(EntityDamageEvent $event) : void{
        if($event instanceof EntityDamageByEntityEvent){
            $player = $event->getEntity();
            if($player instanceof Player){
                for($i = 0; $i < $this->plugin->getConfig()->get("particle-count"); $i++){
                    $player->getLevel()->addParticle(new DestroyBlockParticle($player->add(mt_rand(-50, 50)/100, 1 + mt_rand(-50, 50)/100, mt_rand(-50, 50)/100), Block::get(Block::REDSTONE_BLOCK)));
                }
            }
        }
    }
}
