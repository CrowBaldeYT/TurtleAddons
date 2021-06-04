<?php

namespace Addon;

use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\LoginPacket;

class AntiWindows implements \pocketmine\event\Listener{

    private $plugin;
    
    public function __construct(){
        $this->plugin = $this->plugin = Main::getInstance();
    }
    
    public function onEnable(){
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

   	public function DataPacketReceive(DataPacketReceiveEvent $event){
		$player = $event->getPlayer();
		$packet = $event->getPacket();
		if ($packet instanceof LoginPacket) {
			if (!isset($packet->clientData["DeviceOS"])) return;
			if ((int)$packet->clientData["DeviceOS"] === 7) {
				$player->kick("Windows 10 is not allowed, this server is just for Android and IOS players.");
			}
		}
	}
}
