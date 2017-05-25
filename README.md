# NotifyBundle
A symfony bundle, making it easy to send email, sms and other notifications

## Requirements
* PHP 7.x
* Symfony 2.8.x LTS

## Installation
```shell
composer require andreas-glaser/notify-bundle dev-master
```

## Usage

### Define Emails
```yaml
# app/config/config.yml
andreas_glaser_notify:
  enabled: true
  channels:
    email:
      from_name: "Default From"
      from_email: my-default-from-email@email.com
      template_layout: 'AndreasGlaserNotifyBundle:Email:layout.html.html.twig'

      emails:

        example_email:
          from_name: "Welcome :name"
          subject: "This is a test email"
          template_content: "AppBundle:Email:exampleEmail.html.twig"
```

### Send Email
```php
<?php

$subjectData = [
    ':name' => 'Some name'    
];

$bodyData = [];

/** @var \AndreasGlaser\NotifyBundle\Channel\Email\Email $email */
$email = $this
    ->container
    ->get('andreas_glaser_notify.channel_email.loader')
    ->load('example_email', $bodyData, $subjectData);

$this->container
    ->get('andreas_glaser_notify.channel.email.dispatcher')
    ->dispatch($email);
```