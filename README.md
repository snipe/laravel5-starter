## Laravel 5 + Bootstrap 3 + Socialite

This is the beginning of a starter site for Laravel 5.1, Bootstrap 3 and Socialite (the Laravel package that lets you use social authentication in your Laravel app).

Socialite has been set up to allow a user to login to the same account with multiple social networks, so if a user created an account using an email and password, but then later wanted to login using their Facebook, Twitter, Google or Github account, a record for each network will be created in the new `social` table, tying them all back to the user.

It handles this by comparing the registered email addresses with the ones returned in the scopes of the social network response. (Twitter doesn't include an email address in the returned scope, and Github can only return an email address if the user has specified a publicly viewable email address.)

### Developing

All CSS changes should be done through the `resources/assets/sass/app.scss` file, with the generated CSS output to  `public/css/app.css`. We use Elixer, so this is easy to do using Gulp with the included `gulpfile.js`.

If you wish to contribute to this project, all pull requests must include unit and/or Codeception tests. Pull requests that break the build will not be accepted. 

### To Do

- Finish the email interstitial that requires an email address if the social network doesn't pass one back.
