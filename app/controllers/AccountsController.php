<?php

class AccountsController extends Controller {

	public function index()
	{
		if (Auth::user()) {
			return Redirect::to('dashboard');
		}
		return View::make('accounts.sign-in');
	}

	/**
	 * Handle a POST request to sign-in a user.
	 *
	 * @return Response
	 */
	public function postSignIn()
	{
		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|email',
				'password' => 'required'
			)
		);

		if ($validator->passes()) {
			try {
				Auth::attempt(array(
					'identifier' => Input::get('email'),
					'password' => Input::get('password')
				), true);

				return Redirect::route('jobs.index');

			} catch (Exception $e) {
				return Redirect::back()->withErrors($e->getMessage())->withInput(Input::except('password'));
			}
		} else {
			return Redirect::back()->withErrors($validator);
		}
	}

	/**
	 * Logs a user out and return to home View.
	 *
	 * @return Response
	 */
	public function getSignOut()
	{
		Auth::logout();
		return Redirect::home();
	}
	/**
	 * Display the password changer view.
	 *
	 * @return Response
	 */
	public function getChangePassword()
	{
		return View::make('accounts.change_password');
	}

	/**
	 * Handle a POST request to change the user password.
	 *
	 * @return Response
	 */
	public function postChangePassword()
	{
		$rules = array(
			'password' => 'required|confirmed',
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {

			Auth::user()->password = Input::get('password');
			Auth::user()->save();

			Notification::success('Password changed');
			return Redirect::route('home');
		} else {
			return Redirect::back()->withErrors($validator);
		}
	}
}