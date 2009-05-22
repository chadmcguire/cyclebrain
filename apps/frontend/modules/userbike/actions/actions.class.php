<?php
// auto-generated by sfPropelCrud
// date: 2008/12/07 21:34:35
?>
<?php

/**
 * userbike actions.
 *
 * @package    bike
 * @subpackage userbike
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class userbikeActions extends sfActions
{
  public function executeIndex()
  {
    $u_id =  sfContext::getInstance()->getUser()->getAttribute('subscriber_id', '-1', 'subscriber');
    if($u_id){
        $c = new Criteria();
        $c->add(UserBikesPeer::USER_ID, $u_id);
        $this->user_bikess = UserBikesPeer::doSelectJoinAll($c);
    }else{
        $this->user_bikess = array('No Bikes');
    }
  }

  public function executeList()
  {
    $this->user_bikess = UserBikesPeer::doSelect(new Criteria());
  }

  public function executeAdd()
  {
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
         $userId = sfContext::getInstance()->getUser()->getAttribute('subscriber_id',null,'subscriber');
         if($userId)
         {
             $userBike = new UserBikes();
             $userBike->setBikeYear($this->getRequestParameter('bike_year'));
             $userBike->setBikeModel($this->getRequestParameter('bike_model'));
             $userBike->setBikeMake($this->getRequestParameter('bike_make'));
             $userBike->setDescription($this->getRequestParameter('description'));
             $userBike->setUserId($userId);

             $userBike->save();

             return $this->redirect('userbike/index');
         }

    }

   return sfView::SUCCESS;
  }


  public function executeEdit()
  {
    $userId = sfContext::getInstance()->getUser()->getAttribute('subscriber_id',null,'subscriber');
    $this->bikeid = $this->getRequestParameter('bikeid');
    $user_bikes = UserBikesPeer::retrieveByPk($this->bikeid);
    $this->year=$user_bikes->getBikeYear();
    $this->make=$user_bikes->getBikeMake();
    $this->model=$user_bikes->getBikeModel();
    $this->description = $user_bikes->getDescription();
    
    if ($this->getRequest()->getMethod() == sfRequest::POST && $user_bikes)
    {
             $user_bikes->setBikeYear($this->getRequestParameter('bike_year'));
             $user_bikes->setBikeModel($this->getRequestParameter('bike_model'));
             $user_bikes->setBikeMake($this->getRequestParameter('bike_make'));
             $user_bikes->setDescription($this->getRequestParameter('description'));
             $user_bikes->save();
             return $this->redirect('userbike/index');
    }
  }


  public function executeDelete()
  {
    $userId = sfContext::getInstance()->getUser()->getAttribute('subscriber_id',null,'subscriber');
    $this->bikeid = $this->getRequestParameter('bikeid');

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
        //delete user_stat and equipment
        $c = new Criteria();
         $c->add(UserStatsPeer::USER_ID,$userId);
         $c->add(UserStatsPeer::BIKE_ID,$this->bikeid);
         $s=UserStatsPeer::doSelectJoinAll($c);
         foreach($s as $stat){
             foreach($stat->getUserStatEquips() as $equip){
                 $equip->delete();
             }
            $stat->delete();
        }
        //move equipment to shelf
       $c = new Criteria();
       $c->add(UserEquipementPeer::USER_ID,$userId);
       $c->add(UserEquipementPeer::BIKE_ID,$this->bikeid);
       $equip = UserEquipementPeer::doSelect($c);
       foreach($equip as $e){
           $e->setBikeId(null);
           $e->save();
       }

         //now delete bike
          $user_bikes = UserBikesPeer::retrieveByPk($this->bikeid);
          $user_bikes->delete();

        return $this->redirect('userbike/index');
    }


  }

  public function handleErrorAdd()
{
  return sfView::SUCCESS;
}

}