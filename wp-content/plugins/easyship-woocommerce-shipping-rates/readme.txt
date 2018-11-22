=== Easyship WooCommerce Shipping Rates ===
Contributors: goeasyship, sunnycyk, alohachen, paulld
Tags: shipping, shipping rates, shipping price, shipping cost, shipping quotes, free shipping, dynamic shipping, automatic shipping, shipping calculator, calculate shipping cost, easyship, taxes, international shipping, ups, dhl, fedex, post, woocommerce, multiple shipping rates, shipping api, shipping discount, shipping labels, courier calculated shipping
Requires at least: 4.4
Tested up to: 4.9
Stable tag: 0.5.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easyship is a one-stop shipping platform used by 15,000+ eCommerce sellers. Save up to 70% on shipping costs, expand your sales worldwide, increase revenues and conversion rates, and provide a better experience to your customers. Integrated with 100+ solutions, we provide complete visibility on taxes and duties, available couriers, and shipping costs from one single account. Our user-friendly platform seamlessly integrates with WooCommerce, providing an all-in-one shipping management tool from your store’s checkout to delivery.

== Description ==

= Simplify your shipping and save money =

One account is all you need to access 100+ shipping solutions and benefit from the lowest rates available on the market, both domestically and internationally.

= Built for your WooCommerce store =

Get your WooCommerce orders automatically updated with tracking numbers, courier names, and orders marked as Completed. Activate calculated rates at checkout to give your customers flexibility in choosing between the best shipping solutions available. By default, your customers will always be able to choose from 3 shipping solutions: the cheapest, fastest, and best value for money.

= Start fulfilling those international orders =

Make international shipping as easy as domestic shipping with ready-to-go shipping documents such as labels, customs invoices, and declarations available. See the exact amount of import taxes, VATs, GSTs, and other fees upfront.

= No subscription or monthly fees =

Easyship is the only real FREE shipping platform; you only pay for the shipping costs.

= Automate and centralize your shipping needs =

Create shipping rules to choose your preferred shipping solution based on shipping destination, product type, or weight.

== Installation ==

= Minimum Requirements =

* WordPress 4.4 or greater
* WooCommerce 2.4 or greater
* PHP version 5.3.0 or greater
* PHP OpenSSL Library is required
* PHP CURL Library is required

= Countries supported =

Easyship Shipping Rates are currently available for stores located in the **United States**, **Hong Kong**, **Singapore** and **Australia**.
Shipping rates and tax calculation are available to **all countries** worldwide outbound of these 4 countries.
For more details about the release of new countries, please [contact us](https://www.easyship.com/contact) directly.

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don't need to leave your browser. To do an automatic install of Easyship-WooCommerce-Plugin, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type **Easyship WooCommerce Shipping Rates** and click Search Plugins. Once you’ve found our plugin you can view details about it such as the point release, rating and description. Most importantly of course, you can install it by simply clicking “Install Now”.

= Manual installation =

1. Unzip the files and upload the folder into your plugins folder (/wp-content/plugins/) overwriting older versions if they exist

2. Activate the plugin in your WordPress admin area.

= Set up =

There are 2 ways to integrate with Easyship.

Method 1:

1. After you activate the plugin, in the WooCommerce Setting page, go to the Shipping Tab and choose “Easyship Shipping”.

2. Click "Enable". After few steps, your rates are now available for all your customers!

Method 2:

1. Sign up for free at [www.easyship.com](https://app.easyship.com/signup) and go to [Connect > Add New](https://app.easyship.com/connect) to connect your WooCommerce store. You can then retrieve your Access Token from your store’s page by clicking on “Activate Rates”. This is also the place where you will be able to set all your shipping options and rules.

2. After you activate the plugin, in the WooCommerce Setting page, go to the Shipping Tab and choose “Easyship Shipping”.

3. The plugin is enabled by default after activation. Enter your API Token and save. Your rates are now available for all your customers!


== Frequently Asked Questions ==

= What WordPress version does the plugin support? =

The plugin is tested on WordPress version 4.4 to 4.9.7.

= What WooCommerce version does the plugin support? =

The plugin is tested on WooCommerce version 2.4 to 3.4.3

For all other questions, please visit [www.easyship.com](https://www.easyship.com)

= The plugin is installed successfully, but the request timed out, what do I do? =

Your `wp-config.php` may have `WP_HTTP_BLOCK_EXTERNAL` set as true. You will need to add `https://*.easyship.com` url to your `WP_ACCESSIBLE_HOSTS` settings in order to allow requests going to the Easyship API server.

== Screenshots ==

1. Show real-time dynamic shipping rates on your checkout page, and let your customers choose their preferred option
2. Synchronize all your orders in a click from the Easyship dashboard
3. Compare all the shipping options available
4. Once the shipping documents are ready, the status of the order is automatically updated on WooCommerce
5. Store your product catalog on Easyship to facilitate the sync of your orders and provide more accurate rates to your customers
6. Install Step1. Create a free account on www.easyship.com, then go to "Connect" > "Add New". Select WooCommerce and follow the instructions to link your store with Easyship. Click "Activate" to generate your Easyship Access Token
7. Install Step2. Install the plugin on your store: go to "Plugins" > "Add New".
8. Install Step3. Go to "WooCommerce Settings" > "Easyship", paste your Easyship Access Token to activate the plugin

== Changelog ==
= 0.5.1 - 2018-08-01 =
* Hotfix - no need to enable if Access Token existed

= 0.5.0 - 2018-07-30 =
* Hotfix - js file

= 0.4.9 - 2018-07-30 =
* Enhance - integrate Easyship from WooCommerce
* NOTE - PHP package: 'php-curl' is required

= 0.4.8 - 2018-07-04 =
* Enhance - send city when requesting rates

= 0.4.7 - 2018-06-14 =
* Enhance - add Easyship into shipping method
* Enhance - remove non-ship items

= 0.4.6 - 2018-06-11 =
* Enhance - send state when requesting rates

= 0.4.5 - 2018-06-11 =
* Hotfix - no rates on cart page

= 0.4.4 - 2018-05-15 =
* Enhance - support discount

= 0.4.3 - 2017-11-23 =
* Enhance - extend timeout

= 0.4.2 - 2017-11-01 =
* Enhance - Links to Settings from installed plugins page

= 0.4.1 - 2017-11-01 =
* Enhance - WooCommerce Currency Switcher support

= 0.4.0 - 2017-9-25 =
* support access token
* support product feature
* remove settings

= 0.2.9 - 2017-7-19 =
* Update Easyship endpoints

= 0.2.8 - 2017-7-6 =
* Enhance - fix WCML cache
* Update Easyship sandbox endpoint

= 0.2.7 - 2017-6-26 =
* Enhance - WooCommerce 3.0 support

= 0.2.6 - 2017-6-6 =
* Enhance - WCML support
* Add Easyship header to API request

= 0.2.5 - 2017-05-22 =
* Enhance - fix warning and update Easyship url

= 0.2.4 - 2017-02-10 =
* Enhance - wording

= 0.2.3 =
* Feature - Easyship shipping method
* Feature - Auto create category
* Feature - Sandbox mode
