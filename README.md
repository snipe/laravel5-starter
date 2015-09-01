## Laravel 5 + Bootstrap 3 + Socialite

[![Build Status](https://travis-ci.org/snipe/laravel5-starter.svg)](https://travis-ci.org/snipe/laravel5-starter)


This is the beginning of a starter site for [Laravel 5.1](http://laravel.com/docs/5.1), [Bootstrap 3](http://getbootstrap.com) and [Socialite](http://laravel.com/docs/5.1/authentication#social-authentication) (the Laravel package that lets you use social authentication in your Laravel app).

### Features
- Regular email+password registration
- Social login with Twitter, Facebook, Github and Google
- Domain blacklist for user registrations

### Why?

Laravel is a pretty sweet framework, and it comes with built-in authentication functionality, and Socialite makes it easy to add social login, but the basic stuff doesn't cover how to allow multiple social networks to be associated with a single user.  

This project has been set up to allow a user to login to the same account with multiple social networks, so if a user created an account using an email and password, but then later wanted to login using their Facebook, Twitter, Google or Github account, a record for each network will be created in the new `social` table, tying them all back to the user.

It handles this by comparing the registered email addresses with the ones returned in the scopes of the social network response. (Twitter doesn't include an email address in the returned scope, and Github can only return an email address if the user has specified a publicly viewable email address.)

#### Email Domain Blacklisting

This app also includes optional email domain blacklisting, to prevent particular email domains from registering for the site. Right now, this only includes users who sign up using an email+password (versus social signup). This is primarily to block known SPAM domains from being able to register-SPAM your app.

There is currently no admin interface for this, but if you wish to use this feature, just insert the root domain name that you wish to block into the `blacklisted_domains` table.

This blacklister will also include any subdomains (since spammers using fast flux DNS can easily generate new subdomains) so that `mybaddomain.com` will block `baduser@mybaddomain.com`, but will also block `me@baduser.baddomain.com`.

To disable this feature, set the `check_blacklist` value in `config/app.php` to false.


### Developing

All CSS changes should be done through the `resources/assets/sass/app.scss` file, with the generated CSS output to  `public/css/app.css`. We use Elixer, so this is easy to do using Gulp with the included `gulpfile.js`.

If you wish to contribute to this project, all pull requests must include unit and/or Codeception tests. Pull requests that break the build will not be accepted.

To run Codeception tests, use:

```
./vendor/bin/codecept run
```

### To Do

- Finish the interstitial that requires an email address if the social network doesn't pass one back.
- Add admin area for user management
- Add profile editing
