<?php

// This is an example addon that will prevent players from chatting. Use this example to add features to the server.

namespace Addon;

class Example implements \pocketmine\event\Listener{

    private $plugin;
    
    public function __construct(){
        $this->plugin = $this->plugin = Main::getInstance();
    }

    public function onPlayerChat(\pocketmine\event\player\PlayerChatEvent $event){
        $player = $event->getPlayer();
        $playerNameTag = $player->getNameTag();
        $message = $event->getMessage();
        $event->setCancelled();
    }

}
