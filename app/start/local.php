<?php

	if(!Session::has('adminAccess'))
	{
		if(Sentry::getUser()->inGroup(Cache::get('adminGroup')))
		{
			Session::put('adminAccess', true);
		}
		else
		{
			Session::put('adminAccess', false);
		}
	}
	if(!Session::has('adminAccess'))
	{
		if(Sentry::getUser()->inGroup(Cache::get('dealerGroup')))
		{
			Session::put('dealerAccess', true);
		}
		else
		{
			Session::put('dealerAccess', true);
		}
	}
	if(!session::has('userAccess'))
	{
		if(Sentry::getUser()->inGroup(Cache::get('userGroup')))
		{
			Session::put('userAccess', true);
		}
		else
		{
			Session::put('dealerAccess', true);
		}
	}