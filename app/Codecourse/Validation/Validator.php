<?php 

namespace Codecourse\Validation;

use Violin\Violin;
use Codecourse\User\User;

// Injecting user model 

class Validator extends Violin
{
		protected $user;
	

	public function __construct (User $user)
	{
		$this->user = $user;

		$this->addFieldMessages([
				'email' => [
					'uniqueEmail' => 'That email is already in use'
				],
				'username' => [
					'uniqueUsername' => 'That username is already in use'
				]
			]);
	}

	public function validate_uniqueEmail($value, $input, $args)
	{
		$user = $this->user->where('email', $value); // Pulls user from the database where the user matches the email


		return ! (bool) $user->count();
	}

	public function validate_uniqueUsername($value , $input, $args)
	{
		return ! (bool) $this->user->where('username', $value)->count(); // Checks data base if the username exists. If so it produces a count and will mean its true
	}
}