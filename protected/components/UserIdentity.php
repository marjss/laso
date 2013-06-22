<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
        
	public function authenticate()
	{
		$user = Users::model()->findByAttributes(array('username'=>$this->username));
		
		if($user === NULL){
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}
		else {
			if($user->password !== $this->password){
				$this->errorCode = self::ERROR_PASSWORD_INVALID;
			}
			else if($user->status !== '1'){
				$this->errorCode = self::ERROR_USERNAME_INVALID;
			}
			else {
				$this->_id = $user->id;
				if(null === $user->add_date){
					$lastLogin = date('Y-m-d h:i:s');
				}
				else {
					$lastLogin = strtotime($user->add_date);
				}
				$this->errorCode=self::ERROR_NONE;
			}
		}
		
		return !$this->errorCode;

	}
	
}