<?php
declare(strict_types=1);

namespace Vale914\BloodFX;

use pocketmine\block\Block;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\level\particle\DestroyBlockParticle;
use pocketmine\math\Vector3;

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
     */
    public function onDamage(EntityDamageEvent $event) : void{
        if($event instanceof EntityDamageByEntityEvent){
            $player = $event->getEntity();
            if($player instanceof Player){
                $player->getLevel()->addParticle(new DestroyBlockParticle(new Vector3($player->x, $player->y + 1, $player->z), Block::get(Block::REDSTONE_BLOCK)));
            }
        }else{
			return;
		}
    }
}
