<?php

namespace uepon;
# Base
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

# Player
use pocketmine\Player;

#Command
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;

# Utils
use pocketmine\utils\config;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        $this->getLogger()->info("Windows PowerShellを起動しました！");
        if(!file_exists($this->getDataFolder())){
            mkdir($this->getDataFolder(), 0744, true);
        }
        new Config($this->getDataFolder() . "config.yml", Config::YAML, array(
            'post' => 'うえぽんだお',
        ));
    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
        switch($command->getName()) {
            case "ps":
            if(!isset($args[0]))return true;
                            $output = shell_exec("powershell.exe {$args[0]} {$args[1]} {$args[2]} {$args[3]}");
                            $sender->sendMessage($output);
                            $this->getLogger()->notice("実行完了！ powershell.exe {$args[0]} {$args[1]} {$args[2]} {$args[3]}");
                            return true;
            
        }
    }
}