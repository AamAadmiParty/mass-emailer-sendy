SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `apps` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `app_name` varchar(100) DEFAULT NULL,
  `from_name` varchar(100) DEFAULT NULL,
  `from_email` varchar(100) DEFAULT NULL,
  `reply_to` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `delivery_fee` varchar(100) DEFAULT NULL,
  `cost_per_recipient` varchar(100) DEFAULT NULL,
  `smtp_host` varchar(100) DEFAULT NULL,
  `smtp_port` varchar(100) DEFAULT NULL,
  `smtp_ssl` varchar(100) DEFAULT NULL,
  `smtp_username` varchar(100) DEFAULT NULL,
  `smtp_password` varchar(100) DEFAULT NULL,
  `bounce_setup` int(11) DEFAULT '0',
  `complaint_setup` int(11) DEFAULT '0',
  `app_key` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `apps` (`id`, `userID`, `app_name`, `from_name`, `from_email`, `reply_to`, `currency`, `delivery_fee`, `cost_per_recipient`, `smtp_host`, `smtp_port`, `smtp_ssl`, `smtp_username`, `smtp_password`, `bounce_setup`, `complaint_setup`, `app_key`) VALUES
(1, 1, 'Brand 1', 'Prakhar', 'sendy1@prakhargoel.com', 'sendy1@prakhargoel.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, 'hpzll5g3nta1tdJCWhO6B26NxHXHTb'),
(2, 1, 'Brand 2', 'Prakhar2', 'testsendy@prakhargoel.com', 'testsendy@prakhargoel.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, 'nxrZm4quSb10aykcFQYTfNsXlP08p8');

CREATE TABLE IF NOT EXISTS `ares` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `list` int(11) DEFAULT NULL,
  `custom_field` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `ares_emails` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ares_id` int(11) DEFAULT NULL,
  `from_name` varchar(100) DEFAULT NULL,
  `from_email` varchar(100) DEFAULT NULL,
  `reply_to` varchar(100) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `plain_text` mediumtext,
  `html_text` mediumtext,
  `time_condition` varchar(100) DEFAULT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `recipients` int(100) DEFAULT '0',
  `opens` longtext,
  `wysiwyg` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `app` int(11) DEFAULT NULL,
  `from_name` varchar(100) DEFAULT NULL,
  `from_email` varchar(100) DEFAULT NULL,
  `reply_to` varchar(100) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `plain_text` mediumtext,
  `html_text` mediumtext,
  `sent` varchar(100) DEFAULT '',
  `to_send` int(100) DEFAULT NULL,
  `to_send_lists` text,
  `recipients` int(100) DEFAULT '0',
  `timeout_check` varchar(100) DEFAULT NULL,
  `opens` longtext,
  `wysiwyg` int(11) DEFAULT '0',
  `send_date` varchar(100) DEFAULT NULL,
  `lists` text,
  `timezone` varchar(100) DEFAULT NULL,
  `errors` longtext,
  `bounce_setup` int(11) DEFAULT '0',
  `complaint_setup` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

INSERT INTO `campaigns` (`id`, `userID`, `app`, `from_name`, `from_email`, `reply_to`, `title`, `plain_text`, `html_text`, `sent`, `to_send`, `to_send_lists`, `recipients`, `timeout_check`, `opens`, `wysiwyg`, `send_date`, `lists`, `timezone`, `errors`, `bounce_setup`, `complaint_setup`) VALUES
(1, 1, 1, 'Prakhar', 'sendy1@prakhargoel.com', 'sendy1@prakhargoel.com', 'Test campaign 1', '', '<html>\r\n<head>\r\n</head>\r\n<body>\r\n</body>\r\n</html>', '', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(2, 1, 1, 'Prakhar', 'sendy1@prakhargoel.com', 'sendy1@prakhargoel.com', 'Test campaign 1', '', '<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>\r\n	Test campaign 1\r\n</p>\r\n<p>\r\n	hehehehehehehehehe\r\n</p>\r\n</body>\r\n</html>', '1380390892', 7, '1,5,6', 7, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(5, 1, 1, 'Prakhar', 'sendy1@prakhargoel.com', 'sendy1@prakhargoel.com', 'testtttt', '', '<html>\r\n<head>\r\n</head>\r\n<body>\r\n</body>\r\n</html>', '', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(6, 1, 1, 'Prakhar', 'sendy1@prakhargoel.com', 'sendy1@prakhargoel.com', 'Untitled', '', '<html>\r\n<head>\r\n</head>\r\n<body>\r\n<table>\r\n<tbody>\r\n<tr>\r\n	<td>\r\n	</td>\r\n	<td>\r\n	</td>\r\n	<td>\r\n	</td>\r\n</tr>\r\n<tr>\r\n	<td>\r\n	</td>\r\n	<td>\r\n	</td>\r\n	<td>\r\n	</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</body>\r\n</html>', '', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(7, 1, 1, 'Prakhar', 'sendy1@prakhargoel.com', 'sendy1@prakhargoel.com', 'Untitled', '', '', '', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0),
(8, 1, 1, 'Prakhar', 'sendy1@prakhargoel.com', 'sendy1@prakhargoel.com', 'Untitled', '', '<p>New WysIwyg campaign</p>\r\n', '', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0),
(9, 1, 1, 'Prakhar', 'sendy1@prakhargoel.com', 'sendy1@prakhargoel.com', 'new wys', '', '<p>New WysIwyg campaign</p>\r\n\r\n<form id="form1" name="TestForm">\r\n<p><input name="Chkbox" type="checkbox" />Chk1</p>\r\n\r\n<p><input name="TxtField" type="text" value="sample text" /></p>\r\n\r\n<p><select name="Selection"><option selected="selected" value=""></option><option selected="selected" value=""></option><option value="ff1">field 1</option><option value="ff2">field2</option><option value="ff3">field 3</option></select></p>\r\n\r\n<p><input name="Button1" type="button" value="Text of button 1" /></p>\r\n</form>\r\n\r\n<hr />\r\n<p><img alt="sad" src="http://localhost/sendy/ckeditor/plugins/smiley/images/sad_smile.png" style="height:23px; width:23px" title="sad" /></p>\r\n\r\n<p>N∆˙&copy;∆&copy;&copy;∆∆&copy;∆&yen;&reg;&uml;&reg;&yen;&uml;&yen;&dagger;&yen;&uml;&uml;&ccedil;&int;&ccedil;&tilde;&int;&radic;&int;&tilde;∆˚∆˙</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>Row 1</td>\r\n			<td>this is sample text of first row in table</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Row 2</td>\r\n			<td>sample text 2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><img alt="arvind" src="http://www.fakingnews.firstpost.com/wp-content/uploads/2012/10/arvind-kejriwal.jpg" style="float:left; height:233px; line-height:1.6em; width:310px" /><strong>New De</strong><strong>lhi.</strong>&nbsp;A little-known politician from a remote part of India has requested Arvind Kejriwal to expose him so that at least he is known for his deeds. This unidentified politician has sent a big parcel containing dozens of documents that allegedly prove how he has amassed huge wealth through corrupt practices.</p>\r\n\r\n<p>&ldquo;Yes, we have received such papers but are not sure if they are genuine and authentic,&rdquo; Manish Sisodia, a close aide of Arvind Kejriwal confirmed, &ldquo;We even googled about this person, but it seems there is absolutely no news about him or his claimed corrupt deeds.&rdquo;</p>\r\n\r\n<p>The documents received by IAC (India Against Corruption), which are accompanied by a passionately written letter, claim that this little-known politician is frustrated with people like Salman Khurshid hogging all the limelight for an alleged scam of just 71 lakhs while no one even knows his name.</p>\r\n\r\n<div class="wp-caption alignright" id="attachment_13079" style="padding: 6px 5px 5px 0px; margin: 0px 0px 10px 10px; outline: 0px; float: right; background-color: rgb(247, 247, 247); text-align: center; border: 1px solid rgb(230, 230, 230); color: rgb(34, 34, 34); font-family: Georgia, Helvetica, sans-serif; font-size: 14px; line-height: 21px; width: 310px;"><a class="highslide" href="http://www.fakingnews.firstpost.com/wp-content/uploads/2012/10/arvind-kejriwal.jpg" style="padding: 0px; margin: 0px; outline: 0px; text-decoration: none; color: rgb(22, 56, 124);"><img alt="Arvind Kejriwal" class="size-medium wp-image-13079" src="http://www.fakingnews.firstpost.com/wp-content/uploads/2012/10/arvind-kejriwal-300x225.jpg" style="border:none; height:225px; margin:0px 0px 5px 5px; outline:0px; padding:0px; width:300px" title="Arvind Kejriwal" /></a>\r\n\r\n<p>Experts&nbsp;<a href="https://twitter.com/fakingnews/status/259551118017843200" style="padding: 0px; margin: 0px; outline: 0px; text-decoration: none; color: rgb(22, 56, 124);" target="_blank">believe</a>&nbsp;that if IAC starts selling t-shirts with&nbsp;<em>&ldquo;I was exposed by Kejriwal&rdquo;</em>&nbsp;printed on them, the organization can make good money.</p>\r\n</div>\r\n\r\n<p>&ldquo;Sir, I siphon off 71 lakhs rupees from government funds almost on a daily basis. Don&rsquo;t you think I need at least some recognition from you or the people of this country?&rdquo; the letter addressed to Arvind Kejriwal read.</p>\r\n\r\n<p>The politician claims that no welfare or development schemes by any government have ever been implemented in his constituency, yet he wins the elections regularly as an independent candidate in a far off region in the country assumed to be under the control of Naxalites.</p>\r\n\r\n<p>&ldquo;Apart from being a community leader, which gets me votes on caste basis, I&rsquo;ve also created an ecosystem, where everyone is earning, even though peanuts, through corrupt means, and hence corruption is almost a non-issue here,&rdquo; the politician explained his politics in the letter.</p>\r\n\r\n<p>This yet-to-be-identified little-known politician further claimed that he was &ldquo;reasonably certain&rdquo; that being accused of massive corruption will not harm his career; instead it could help him get an entry into national level politics.</p>\r\n\r\n<p>&ldquo;All this wealth is meaningless if people don&rsquo;t even know me,&rdquo; the politician is reported to have argued in his letter to Kejriwal.</p>\r\n\r\n<p>Arvind Kejriwal and his team members are currently trying to ascertain the identity and &ldquo;achievements&rdquo; of this politician, but are not sure if they should expose him.</p>\r\n\r\n<p>&ldquo;The numbers he has quoted are impressive, almost CAG level, but then what&rsquo;s the point if no one knows him?&rdquo; an activist of IAC told Faking News on conditions of anonymity, &ldquo;It&rsquo;s almost like Karan Johar signing a Bhojpuri actor opposite Kareena Kapoor in a high budget movie, just because that Bhojpuri actor&rsquo;s movie have been a hit in some parts of Bihar.&rdquo;</p>\r\n', '', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0),
(10, 1, 1, 'Prakhar', 'sendy1@prakhargoel.com', 'sendy1@prakhargoel.com', 'wsg5', '', '<p>wsg5 typo correction.</p>\r\n\r\n<form id="form1" name="TestForm">\r\n<p><input name="Chkbox" type="checkbox" />Chk1</p>\r\n\r\n<p><input name="TxtField" type="text" value="sample text" /></p>\r\n\r\n<p><select name="Selection"><option selected="selected" value=""></option><option selected="selected" value=""></option><option value="ff1">field 1</option><option value="ff2">field2</option><option value="ff3">field 3</option></select></p>\r\n\r\n<p><input name="Button1" type="button" value="Text of button 1" /></p>\r\n</form>\r\n\r\n<hr />\r\n<p><img alt="sad" src="http://localhost/sendy/ckeditor/plugins/smiley/images/sad_smile.png" style="height:23px; width:23px" title="sad" /></p>\r\n\r\n<p>N∆˙&copy;∆&copy;&copy;∆∆&copy;∆&yen;&reg;&uml;&reg;&yen;&uml;&yen;&dagger;&yen;&uml;&uml;&ccedil;&int;&ccedil;&tilde;&int;&radic;&int;&tilde;∆˚∆˙</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>Row 1</td>\r\n			<td>this is sample text of first row in table</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Row 2</td>\r\n			<td>sample text 2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><img alt="arvind" src="http://www.fakingnews.firstpost.com/wp-content/uploads/2012/10/arvind-kejriwal.jpg" style="float:left; height:233px; line-height:1.6em; width:310px" /><strong>New De</strong><strong>lhi.</strong>&nbsp;A little-known politician from a remote part of India has requested Arvind Kejriwal to expose him so that at least he is known for his deeds. This unidentified politician has sent a big parcel containing dozens of documents that allegedly prove how he has amassed huge wealth through corrupt practices.</p>\r\n\r\n<p>&ldquo;Yes, we have received such papers but are not sure if they are genuine and authentic,&rdquo; Manish Sisodia, a close aide of Arvind Kejriwal confirmed, &ldquo;We even googled about this person, but it seems there is absolutely no news about him or his claimed corrupt deeds.&rdquo;</p>\r\n\r\n<p>The documents received by IAC (India Against Corruption), which are accompanied by a passionately written letter, claim that this little-known politician is frustrated with people like Salman Khurshid hogging all the limelight for an alleged scam of just 71 lakhs while no one even knows his name.</p>\r\n\r\n<div class="wp-caption alignright" id="attachment_13079" style="padding: 6px 5px 5px 0px; margin: 0px 0px 10px 10px; outline: 0px; float: right; background-color: rgb(247, 247, 247); text-align: center; border: 1px solid rgb(230, 230, 230); color: rgb(34, 34, 34); font-family: Georgia, Helvetica, sans-serif; font-size: 14px; line-height: 21px; width: 310px;"><a class="highslide" href="http://www.fakingnews.firstpost.com/wp-content/uploads/2012/10/arvind-kejriwal.jpg" style="color: rgb(22, 56, 124); padding: 0px; margin: 0px; outline: 0px; text-decoration: none;"><img alt="Arvind Kejriwal" class="size-medium wp-image-13079" src="http://www.fakingnews.firstpost.com/wp-content/uploads/2012/10/arvind-kejriwal-300x225.jpg" style="border:none; height:225px; margin:0px 0px 5px 5px; outline:0px; padding:0px; width:300px" title="Arvind Kejriwal" /></a>\r\n\r\n<p>Experts&nbsp;<a href="https://twitter.com/fakingnews/status/259551118017843200" style="color: rgb(22, 56, 124); padding: 0px; margin: 0px; outline: 0px; text-decoration: none;" target="_blank">believe</a>&nbsp;that if IAC starts selling t-shirts with&nbsp;<em>&ldquo;I was exposed by Kejriwal&rdquo;</em>&nbsp;printed on them, the organization can make good money.</p>\r\n</div>\r\n\r\n<p>&ldquo;Sir, I siphon off 71 lakhs rupees from government funds almost on a daily basis. Don&rsquo;t you think I need at least some recognition from you or the people of this country?&rdquo; the letter addressed to Arvind Kejriwal read.</p>\r\n\r\n<p>The politician claims that no welfare or development schemes by any government have ever been implemented in his constituency, yet he wins the elections regularly as an independent candidate in a far off region in the country assumed to be under the control of Naxalites.</p>\r\n\r\n<p>&ldquo;Apart from being a community leader, which gets me votes on caste basis, I&rsquo;ve also created an ecosystem, where everyone is earning, even though peanuts, through corrupt means, and hence corruption is almost a non-issue here,&rdquo; the politician explained his politics in the letter.</p>\r\n\r\n<p>This yet-to-be-identified little-known politician further claimed that he was &ldquo;reasonably certain&rdquo; that being accused of massive corruption will not harm his career; instead it could help him get an entry into national level politics.</p>\r\n\r\n<p>&ldquo;All this wealth is meaningless if people don&rsquo;t even know me,&rdquo; the politician is reported to have argued in his letter to Kejriwal.</p>\r\n\r\n<p>Arvind Kejriwal and his team members are currently trying to ascertain the identity and &ldquo;achievements&rdquo; of this politician, but are not sure if they should expose him.</p>\r\n\r\n<p>&ldquo;The numbers he has quoted are impressive, almost CAG level, but then what&rsquo;s the point if no one knows him?&rdquo; an activist of IAC told Faking News on conditions of anonymity, &ldquo;It&rsquo;s almost like Karan Johar signing a Bhojpuri actor opposite Kareena Kapoor in a high budget movie, just because that Bhojpuri actor&rsquo;s movie have been a hit in some parts of Bihar.&rdquo;</p>\r\n', '', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0),
(11, 1, 1, 'Prakhar', 'sendy1@prakhargoel.com', 'sendy1@prakhargoel.com', 'Untitled', '', '', '', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0),
(12, 1, 1, 'Prakhar', 'sendy1@prakhargoel.com', 'sendy1@prakhargoel.com', 'Untitled', '', '', '', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0);

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) DEFAULT NULL,
  `ares_emails_id` int(11) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `clicks` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `opt_in` int(11) DEFAULT '0',
  `confirm_url` varchar(100) DEFAULT NULL,
  `subscribed_url` varchar(100) DEFAULT NULL,
  `unsubscribed_url` varchar(100) DEFAULT NULL,
  `thankyou` int(11) DEFAULT '0',
  `thankyou_subject` varchar(100) DEFAULT NULL,
  `thankyou_message` mediumtext,
  `goodbye` int(11) DEFAULT '0',
  `goodbye_subject` varchar(100) DEFAULT NULL,
  `goodbye_message` mediumtext,
  `confirmation_subject` mediumtext,
  `confirmation_email` mediumtext,
  `unsubscribe_all_list` int(11) DEFAULT '1',
  `custom_fields` mediumtext,
  `prev_count` int(100) DEFAULT '0',
  `currently_processing` int(100) DEFAULT '0',
  `total_records` int(100) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

INSERT INTO `lists` (`id`, `app`, `userID`, `name`, `opt_in`, `confirm_url`, `subscribed_url`, `unsubscribed_url`, `thankyou`, `thankyou_subject`, `thankyou_message`, `goodbye`, `goodbye_subject`, `goodbye_message`, `confirmation_subject`, `confirmation_email`, `unsubscribe_all_list`, `custom_fields`, `prev_count`, `currently_processing`, `total_records`) VALUES
(1, 1, 1, 'List 1', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, 'cust1 large field:Text%s%cust2  large field:Text%s%cust3 large field:Text', 0, 0, 0),
(2, 2, 1, 'List alpha', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0),
(3, 2, 1, 'List Beta', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0),
(4, 2, 1, 'List Gamma', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0),
(5, 1, 1, 'List 2', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0),
(6, 1, 1, 'List 3', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0),
(7, 1, 1, 'List 4', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0);

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `s3_key` varchar(500) DEFAULT NULL,
  `s3_secret` varchar(500) DEFAULT NULL,
  `api_key` varchar(500) DEFAULT NULL,
  `license` varchar(100) DEFAULT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  `tied_to` int(11) DEFAULT NULL,
  `app` int(11) DEFAULT NULL,
  `paypal` varchar(100) DEFAULT NULL,
  `cron` int(11) DEFAULT '0',
  `cron_ares` int(11) DEFAULT '0',
  `send_rate` int(100) DEFAULT '0',
  `language` varchar(100) DEFAULT 'en_US',
  `cron_csv` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `login` (`id`, `name`, `company`, `username`, `password`, `s3_key`, `s3_secret`, `api_key`, `license`, `timezone`, `tied_to`, `app`, `paypal`, `cron`, `cron_ares`, `send_rate`, `language`, `cron_csv`) VALUES
(1, 'Prakhar', 'Halo', 'testaap@prakhargoel.com', '8d5ecfd14246b537c62989d4b46dbc964acab3a0bd9e9032b87c8626bb7f394d6b2397bd0955f4203e2a4b0df1dbcaf56e7ec6dda74c08b13c1660bd601c679f', 'AKIAJTMX7673KOEVVXUA', 'ykQYnFrqpwlvMX1MKkl0I+1d2OPds0ya2JXExd1a', 'BZBqQkN5aAXoaIRnpCcs', '', 'America/New_York', NULL, NULL, '', 0, 0, 1, 'en_US', 0),
(2, 'Prakhar', 'Brand 1', 'sendy1@prakhargoel.com', '8d5ecfd14246b537c62989d4b46dbc964acab3a0bd9e9032b87c8626bb7f394d6b2397bd0955f4203e2a4b0df1dbcaf56e7ec6dda74c08b13c1660bd601c679f', NULL, NULL, NULL, NULL, 'America/New_York', 1, 1, NULL, 0, 0, 1, 'en_US', 0),
(3, 'Prakhar2', 'Brand 2', 'testsendy@prakhargoel.com', 'f741d8d14b59035851a65fa8a3427df91d003647d4ccd68a4fc6b531b9734b07105dc8387fff5a61f19681ffb1707fe14ed2d529bb9f9d07a704bf68c788b858', NULL, NULL, NULL, NULL, 'America/New_York', 1, 2, NULL, 0, 0, 1, 'en_US', 0);

CREATE TABLE IF NOT EXISTS `queue` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `query_str` longtext,
  `campaign_id` int(11) DEFAULT NULL,
  `subscriber_id` int(11) DEFAULT NULL,
  `sent` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `s_id` (`subscriber_id`),
  KEY `st_id` (`sent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `custom_fields` longtext,
  `list` int(11) DEFAULT NULL,
  `unsubscribed` int(11) DEFAULT '0',
  `bounced` int(11) DEFAULT '0',
  `bounce_soft` int(11) DEFAULT '0',
  `complaint` int(11) DEFAULT '0',
  `last_campaign` int(11) DEFAULT NULL,
  `last_ares` int(11) DEFAULT NULL,
  `timestamp` int(100) DEFAULT NULL,
  `join_date` int(100) DEFAULT NULL,
  `confirmed` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `s_list` (`list`),
  KEY `s_unsubscribed` (`unsubscribed`),
  KEY `s_bounced` (`bounced`),
  KEY `s_bounce_soft` (`bounce_soft`),
  KEY `s_complaint` (`complaint`),
  KEY `s_confirmed` (`confirmed`),
  KEY `s_timestamp` (`timestamp`),
  KEY `s_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

INSERT INTO `subscribers` (`id`, `userID`, `name`, `email`, `custom_fields`, `list`, `unsubscribed`, `bounced`, `bounce_soft`, `complaint`, `last_campaign`, `last_ares`, `timestamp`, `join_date`, `confirmed`) VALUES
(1, 1, 'Sendy1', 'sendy1@prakhargoel.com', '%s%%s%', 1, 0, 0, 0, 1, 2, NULL, 1387490978, NULL, 1),
(2, 1, 'Sendy2', 'sendy2@prakhargoel.com', '%s%%s%', 1, 0, 1, 0, 0, 2, NULL, 1387488695, NULL, 1),
(3, 1, 'Sendy3', 'sendy3@prakhargoel.com', '%s%%s%', 1, 0, 0, 0, 0, 2, NULL, 1387492199, NULL, 1),
(4, 1, 'Sendy4', 'sendy4@prakhargoel.com', '%s%%s%', 1, 0, 1, 0, 1, 2, NULL, 1387488697, NULL, 1),
(6, 1, 'Sendy6', 'sendy6@prakhargoel.com', '%s%%s%', 1, 0, 0, 0, 0, 2, NULL, 1387488699, NULL, 0),
(7, 1, 'Sendy7', 'sendy7@prakhargoel.com', '%s%%s%', 1, 0, 0, 0, 0, 2, NULL, 1387488699, NULL, 1),
(8, 1, 'Sendy8', 'sendy8@prakhargoel.com', 'value1 large field%s%value 2  large field%s%', 1, 0, 0, 0, 0, 2, NULL, 1387488700, NULL, 1),
(9, 1, 'Sendy 1', 'sendy1@prakhargoel.com', NULL, 2, 0, 0, 0, 0, NULL, NULL, 1387478425, NULL, 1),
(10, 1, 'Sendy 2', 'sendy2@prakhargoel.com', NULL, 2, 0, 0, 0, 0, NULL, NULL, 1387478426, NULL, 1),
(11, 1, 'Sendy 3', 'sendy3@prakhargoel.com', NULL, 2, 0, 0, 0, 0, NULL, NULL, 1387478425, NULL, 1),
(12, 1, 'Sendy 4', 'sendy4@prakhargoel.com', NULL, 2, 0, 0, 0, 0, NULL, NULL, 1387478428, NULL, 1),
(13, 1, 'Sendy6', 'sendy6@prakhargoel.com', NULL, 2, 0, 0, 0, 0, NULL, NULL, 1387478423, NULL, 1),
(14, 1, 'Sendy7', 'sendy7@prakhargoel.com', NULL, 2, 0, 0, 0, 0, NULL, NULL, 1387478423, NULL, 1),
(15, 1, 'Sendy8', 'sendy8@prakhargoel.com', NULL, 2, 0, 0, 0, 0, NULL, NULL, 1387478424, NULL, 1),
(16, 1, 'Sendy1', 'sendy1@prakhargoel.com', NULL, 3, 0, 0, 0, 0, NULL, NULL, 1387478436, NULL, 1),
(17, 1, 'Sendy2', 'sendy2@prakhargoel.com', NULL, 3, 0, 0, 0, 0, NULL, NULL, 1387478436, NULL, 1),
(18, 1, 'Sendy3', 'sendy3@prakhargoel.com', NULL, 3, 0, 0, 0, 0, NULL, NULL, 1387478437, NULL, 1),
(25, 1, 'Sendy3', 'sendy3@prakhargoel.com', NULL, 4, 0, 0, 0, 0, NULL, NULL, 1387478450, NULL, 1),
(26, 1, 'Sendy4', 'sendy4@prakhargoel.com', NULL, 4, 0, 0, 0, 0, NULL, NULL, 1387478451, NULL, 1),
(27, 1, 'Sendy6', 'sendy6@prakhargoel.com', NULL, 4, 0, 0, 0, 0, NULL, NULL, 1387478451, NULL, 1),
(28, 1, 'Sendy7', 'sendy7@prakhargoel.com', NULL, 4, 0, 0, 0, 0, NULL, NULL, 1387478452, NULL, 1),
(29, 1, 'Sendy8', 'sendy8@prakhargoel.com', NULL, 4, 0, 0, 0, 0, NULL, NULL, 1387478453, NULL, 1),
(30, 1, 'Sendy1', 'sendy1@prakhargoel.com', NULL, 5, 0, 0, 0, 0, NULL, NULL, 1380379476, NULL, 1),
(31, 1, 'Sendy2', 'sendy2@prakhargoel.com', NULL, 5, 0, 0, 0, 0, NULL, NULL, 1380379477, NULL, 1),
(32, 1, 'Sendy3', 'sendy3@prakhargoel.com', NULL, 5, 0, 0, 0, 0, NULL, NULL, 1380379477, NULL, 1),
(33, 1, 'Sendy4', 'sendy4@prakhargoel.com', NULL, 5, 0, 0, 0, 0, NULL, NULL, 1380092611, NULL, 1),
(34, 1, 'Sendy6', 'sendy6@prakhargoel.com', NULL, 5, 0, 0, 0, 0, NULL, NULL, 1380379478, NULL, 1),
(37, 1, 'Sendy1', 'sendy1@prakhargoel.com', NULL, 6, 0, 0, 0, 0, NULL, NULL, 1380379486, NULL, 1),
(38, 1, 'Sendy2', 'sendy2@prakhargoel.com', NULL, 6, 0, 0, 0, 0, NULL, NULL, 1387485040, NULL, 1),
(39, 1, 'Sendy3', 'sendy3@prakhargoel.com', NULL, 6, 1, 0, 0, 0, NULL, NULL, 1387484001, NULL, 1),
(40, 1, 'Sendy4', 'sendy4@prakhargoel.com', NULL, 6, 1, 0, 0, 0, NULL, NULL, 1387484305, NULL, 1),
(41, 1, 'Sendy6', 'sendy6@prakhargoel.com', NULL, 6, 0, 0, 0, 0, NULL, NULL, 1387491967, NULL, 1),
(42, 1, 'Sendy7', 'sendy7@prakhargoel.com', NULL, 6, 0, 0, 0, 0, NULL, NULL, 1380379489, NULL, 1),
(44, 1, 'Sendy1', 'sendy1@prakhargoel.com', NULL, 7, 0, 0, 0, 0, NULL, NULL, 1380092785, NULL, 1),
(45, 1, 'Sendy2', 'sendy2@prakhargoel.com', NULL, 7, 0, 0, 0, 0, NULL, NULL, 1380092785, NULL, 1),
(47, 1, 'Sendy4', 'sendy4@prakhargoel.com', NULL, 7, 0, 0, 0, 0, NULL, NULL, 1380092785, NULL, 1),
(48, 1, 'Sendy6', 'sendy6@prakhargoel.com', NULL, 7, 0, 0, 0, 0, NULL, NULL, 1380092785, NULL, 1),
(49, 1, 'Sendy7', 'sendy7@prakhargoel.com', NULL, 7, 0, 0, 0, 0, NULL, NULL, 1380092785, NULL, 1),
(50, 1, 'Sendy8', 'sendy8@prakhargoel.com', NULL, 7, 0, 0, 0, 0, NULL, NULL, 1380092785, NULL, 1),
(51, 1, 'test user34', 'sendy34@prakhargoel.com', NULL, 2, 0, 0, 0, 0, NULL, NULL, 1387490503, NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
