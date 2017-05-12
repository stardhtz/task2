<?php
class player {
    public $player = "";
    public $blood;
    public $mana = 40;

    function setPlayer($n){
        $this->player=$n;
    }
    function getPlayer(){
        return $this->player;
    }
    function getBlood(){
        return rand(50,100);
    }
    function getMana(){
        return $this->mana;
    }
}    

echo "#==========================================#\n";
echo "#       Welcome to the Battle Arena        #\n";
echo "#==========================================#\n";
echo "#               Description                #\n";
echo "#1. Type 'new' to create character         #\n";
echo "#2. Type 'start' to begin the fight        #\n";
echo "#------------------------------------------#\n";
echo "#Your choice : ";

$mainmenu = trim (fgets (STDIN));
if ($mainmenu=="new"){
    echo "#--------------Create Character------------#\n";            
    echo "#Put Player Name 1 : ";
    $pl1 = trim (fgets (STDIN));
    $player1 = new Player();
    $player1->setPlayer($pl1);
    echo "#Player Name 1 : ".$player1->getPlayer();
    echo "\n#Put Player Name 2 : ";
    $pl2 = trim (fgets (STDIN));
    $player2 = new Player();
    $player2->setPlayer($pl2);
    echo "#------------------------------------------#\n";    
    echo "#-------------- PLAYER NAME ---------------#\n";    
    echo "#Player 1 : ".$player1->getPlayer()."\n";
    echo "#Player 2 : ".$player2->getPlayer()."\n";
    echo "#Do you want to START ? < yes/no >         \n";
    $alert = trim (fgets (STDIN));
    if ($alert=="yes"){
        $p1 = $player1->getPlayer();
        $p2 = $player2->getPlayer();
        $p1blood = $player1->getBlood();
        $p1mana = $player1->getMana();
        $p2blood = $player2->getBlood();
        $p2mana = $player2->getMana();
        $hit = rand(10,25);
        echo "#------------------------------------------#\n";    
        echo "#-------------- BATTLE START --------------#\n";
        echo "#Who will attack : ";
        $atk = trim (fgets (STDIN));
        echo "#Who will deffend : ";
        $def = trim (fgets (STDIN));
        if($atk==$p1){
            while($p1mana >= 0 || $p2blood >= 0){
                $p1mana = $p1mana - 10;
                $p2blood = $p2blood - $hit;
                if ($p1mana < 0 ) {
                    echo "#------------------------------------------#\n"; 
                    echo "#-------------- END of BATTLE -------------#\n";
                    echo "# Player : ".$p2." WIN !!!!\n";
                    break;
                }
                elseif ($p2blood < 0) {
                    echo "#------------------------------------------#\n"; 
                    echo "#-------------- END of BATTLE -------------#\n";
                    echo "# Player : ".$p1." WIN !!!!\n";
                    break;                    
                }
            echo "#------------------------------------------#\n"; 
            echo "#-------------- DESCRIPTION  --------------#\n";
            echo "#Player 1 : ".$p1." || Blood : ".$p1blood." || Mana : ".$p1mana."\n";    
            echo "#Player 2 : ".$p2." || Blood : ".$p2blood." || Mana : ".$p2mana."\n";                
            }
        }elseif($atk==$p2){
            while($p2mana >= 0 || $p1blood >= 0){
                $p2mana = $p2mana - 10;
                $p1blood = $p1blood - $hit;
                if ($p2mana < 0 ) {
                    echo "#------------------------------------------#\n"; 
                    echo "#-------------- END of BATTLE -------------#\n";
                    echo "# Player : ".$p1." WIN !!!!\n";
                    break;
                }
                elseif ($p1blood < 0) {
                    echo "#------------------------------------------#\n"; 
                    echo "#-------------- END of BATTLE -------------#\n";
                    echo "# Player : ".$p2." WIN !!!!\n";
                    break;                    
                }
            echo "#------------------------------------------#\n"; 
            echo "#-------------- DESCRIPTION  --------------#\n";
            echo "#Player 1 : ".$p1." || Blood : ".$p1blood." || Mana : ".$p1mana."\n";    
            echo "#Player 2 : ".$p2." || Blood : ".$p2blood." || Mana : ".$p2mana."\n";                
            }
        }else{
            echo "#---------------- ALERT! ------------------#\n";
	        echo "#Wrong player !!!                          #\n";    
        }
        
    }elseif($alert=="no"){
    echo "#------------------------------------------#\n";    
    echo "#------------- NO BATTLE !!! --------------#\n";    
    }else{
    echo "#---------------- ALERT! ------------------#\n";
	echo "#Wrong keyword                             #\n";    
    }    
    
}
elseif($mainmenu=="start") {
    echo "#---------------- ALERT! ------------------#\n";
	echo "You haven't create player yet !!!\n";
}else{
    echo "#---------------- ALERT! ------------------#\n";
	echo "#Wrong keyword                             #\n";
}

?>