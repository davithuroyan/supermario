<?php

interface MovementStrategy{
	
	public function move();
}

class Walk implements MovementStrategy
{
    public function move()
    {
        echo 'Walk';
    }
}
class Run implements MovementStrategy
{
    public function move()
    {
        echo 'Runing';
    }
}
class FastRun implements MovementStrategy{
	public function move()
    {
        echo 'Fast Runing';
    }
}

interface JumpStrategy
{	
	public function jump();
}
class NormalJump implements JumpStrategy
{
	public function jump(){
		 echo 'Normal Jump';
	}
}

class HighJump implements JumpStrategy
{
	public function jump(){
		 echo 'High Jump';
	}
}

interface AttackStrategy
{
	public function fire();
}
class Attack implements AttackStrategy
{
	public function fire(){
		echo 'Attack';
	}
}
class NoAttack implements AttackStrategy
{
	public function fire(){
		echo 'No Attack';
	}
}

interface SizeState 
{
	public function showSize();
}

class SmallSize implements SizeState
{
	public function showSize(){
		echo " Small ";
	}
}

class BigSize implements SizeState
{
	public function showSize(){
		echo " Big ";
	}
}

class ExtraSize implements SizeState
{
	public function showSize(){
		echo " Extra ";
	}
}

class SuperMario
{
	public $sizeState;
	public $movementStrategy;
	public $jumpStrategy;
	public $attackStrategy;
	
	
	public function __construct(SizeState $sizeState, MovementStrategy $movementStrategy, JumpStrategy $jumpStrategy, AttackStrategy $attackStrategy)
	{
		$this->sizeState = $sizeState;
		$this->movementStrategy = $movementStrategy;
		$this->jumpStrategy = $jumpStrategy;
		$this->attackStrategy = $attackStrategy;
	}
	
	public function getSize(){
		$this->sizeState->showSize();
	}
	
	public function move(){
		$this->movementStrategy->move();
	}
	
	public function jump(){
		$this->jumpStrategy->jump();
	}
	
	public function attack(){
		$this->attackStrategy->attack();
	}
	
	public function setSizeState(SizeState $sizeState){
		$this->sizeState = $sizeState;
	}
	
	public function setMovementStrategy(MovementStrategy $movementStrategy) {
		$this->movementStrategy = $movementStrategy;
	}
	
	public function setJumpStrategy(JumpStrategy $jumpStrategy) {
		$this->jumpStrategy = $jumpStrategy;
	}	
	
	public function setAttackStrategy(AttackStrategy $attackStrategy) {
		$this->attackStrategy = $attackStrategy;
	}
	
}


$mario = new SuperMario(new SmallSize(), new Walk(),new NormalJump(),new Attack());


$mario->move();
$mario->jump();
$mario->setMovementStrategy(new Run());
$mario->setSizeState(new BigSize());
$mario->getSize();
$mario->move();