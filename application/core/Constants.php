<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* ===== Documentation ===== 
Name: Constants::General
Role: Include
Description: Holds all the constants used by the app. Required in the construct of the core controller, MY_Controller, which makes it global to the entire application.
Date Created: 4th January, 2020
*/


$business_name = '12th City Real Estate Developers';
$business_initials = '12THCITY';
$business_phone_number = '+234 803-474-2430';
$business_phone_number2 = '+234 916-476-8748';
$business_phone_number3 = '';
$business_address = 'Suite C19, Saham Plaza, 10 Alexander Crescent, Wuse 2, Abuja FCT';
$business_contact_email = 'info@12thcityrealestate.ng';
$sub_tagline = 'Own your dream home now!';
$business_keywords = '12thCity Real Estate, 12th City, 12thCity, 12th, 12th City Real Estate, 12th City Real Estate Developers, Real Estate, Estate, Housing, Land, Property, Real Estate in Africa, Real Estate in Nigeria, Real Estate in Abuja, Real Estate in Lagos, Real Estate in Portharcourt, Real Estate in Calabar, Real Estate in Enugu, Top 10 Real Estate, Top Real Estate, Housing Estate, Housing in Africa, Housing in Nigeria, Housing in Abuja, Housing in Lagos, Housing in Portharcourt, Housing in Calabar, Housing in Enugu, Legit investment, best real estate websites';
$business_description = "12th City Real Estate Developers is a real estate agency in Nigeria that specializes in residential and commercial properties. The company was founded in 2015 by two experienced real estate professionals, and it has since grown to become one of the leading real estae agencies in Nigeria.";


//Software Info
define('business_name', $business_name);
define('business_initials', $business_initials);
define('business_phone_number', $business_phone_number);
define('business_phone_number2', $business_phone_number2);
define('business_phone_number3', $business_phone_number3);
define('business_address', $business_address);
define('business_contact_email', $business_contact_email);
define('sub_tagline', $sub_tagline);
define('business_keywords', $business_keywords);
define('business_description', $business_description);
define('business_website', base_url());
define('business_logo', base_url('assets/img/12th_city_logo.png'));
define('business_logo_white', base_url('assets/img/12th_city_logo_white.png'));
define('business_favicon', base_url('assets/img/favicon.png'));


//Developer Info
define('software_vendor', 'Kodebros');
define('software_vendor_site', 'https://overlandpips.com');



//MySQL-PHP server time difference. Change to zero if both are on same server
define('mysql_time_difference', 0); //if negative, write as -x, else, x


//Email config
define('business_web_mail', business_contact_email);


//defaults
define('default_admin_password', '12thcity');


//Others
define('pdf_icon', base_url('assets/img/pdf_icon.png'));
define('user_avatar', base_url('assets/img/user.png'));
