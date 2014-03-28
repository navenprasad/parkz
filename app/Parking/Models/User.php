<?php namespace Parking\Models;

use Toddish\Verify\Models\User as VerifyUser;

class User extends VerifyUser
{
	public static function factory() {
		$user = new User();
		$user->verified = 1;
		return $user;
	}
}