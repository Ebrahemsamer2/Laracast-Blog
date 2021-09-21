<?php

namespace App\Services;

use \MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements NewsletterInterface
{
	public $client;
	public function __construct(ApiClient $client)
	{
		$this->client = $client;
	}

	public function subscribe(string $email, string $list = null)
	{
		// if list is null assign it to // config('services.mailchimp.lists.subscribers');
		$list ??= config('services.mailchimp.lists.subscribers');

		return $this->client->lists->addListMember($list,[
            "email_address" => $email,
            "status" => "subscribed",
        ]);
	}
	
}