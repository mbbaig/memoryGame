This is the common memory game written in PHP and Javascript.

For those who aren't familiar, the object of the game is find
a pair of matching images. You have to remember each image you 
click on because it won't be visible forever.

If you have PHP installed in your system, you can simply navigate
to the root of the game folder and enter the following command:

php -S localhost:8000

This will PHP's built in web server. Now you can enter that address
(localhost:8000) into you web browser and start playing.

To run the uni test, make sure you have phpunit installed, then 
navigate to the root folder of the game and enter the following
command:

phpunit tests/GameTest

Everything should run smoothly.