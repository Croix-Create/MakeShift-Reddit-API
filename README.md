<h1>Rebro - a MakeShift Reddit API</h1>

## About Rebro

Rebro is a Makeshift Reddit API built with Laravel and PHP

Specifications:



- A user should be able to create posts as well as update and delete those posts.
- Users should be able to upvote (like) or downvote (dislike) those posts.
- Users should be able to comment on posts.
- A User should be able to upvote or downvote comments.
- A user should be able to query all the posts that they have created.
- A user should be able to query all the posts that they have upvoted or downvoted.
- A user should be able to see all the posts created by a specific user by using their username.
- Viewing any post should show you all the comments for that post as well as how many people upvoted or downvoted the post.

## Booting the App

Laravel requires Composer as its PHP package manager. Navigate to <a src="https://getcomposer.org"> composer's web page /</a> if you don't have composer on your machine. A global install is recommended. Once you have composer installed you will have to run some commands to get the app working.

Before we get into those commands, configure the .env for your local app. This repo contains ".env.example" so that you may easily get the app up and running, by removing ".example"



Run: php artisan key:generate

By default, the app is set to sqllite.

Run: php artisan migrate

This initiates the tables required for users to register, login post and vote!

You can set the database medium to MySQL or others in the .env file.


