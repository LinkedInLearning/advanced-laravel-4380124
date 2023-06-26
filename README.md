# Advanced Laravel
This is the repository for the LinkedIn Learning course Advanced Laravel. The full course is available from [LinkedIn Learning][lil-course-url].

![Advanced Laravel][lil-thumbnail-url] 

As an open-source web application framework, Laravel offers you expressive, elegant syntax and an enjoyable creative experience. But how can you make the most of its features? In this course, full-stack web developer and tech educator Shruti Balasa guides you through advanced concepts in Laravel. Go over how to establish project requirements and set up your project. Learn how to create user roles, write your own middleware, use gates, and more. Dive into advanced eloquent features, including many-to-many relationships, eager loading, attaching and detaching relationships, and writing complex queries and query scopes. Find out how to do more with custom commands, events, listeners, and logs. Explore the intricacies of notifications, queueing, and scheduling, then step through the process of testing in Laravel. Plus, gain an understanding of how Laravel works, including the role of service containers and service providers, as well as how Facades work.

## Instructions
This repository has branches for each of the videos in the course. You can use the branch pop up menu in github to switch to a specific branch and take a look at the course at that stage, or you can add `/tree/BRANCH_NAME` to the URL to go to the branch you want to access.

## Branches
The branches are structured to correspond to the videos in the course. The naming convention is `CHAPTER#_MOVIE#`. As an example, the branch named `02_03` corresponds to the second chapter and the third video in that chapter. 
Some branches will have a beginning and an end state. These are marked with the letters `b` for "beginning" and `e` for "end". The `b` branch contains the code as it is at the beginning of the movie. The `e` branch contains the code as it is at the end of the movie. The `main` branch holds the final state of the code when in the course.

When switching from one exercise files branch to the next after making changes to the files, you may get a message like this:

    error: Your local changes to the following files would be overwritten by checkout:        [files]
    Please commit your changes or stash them before you switch branches.
    Aborting

To resolve this issue:
	
    Add changes to git using this command: git add .
	Commit changes using this command: git commit -m "some message"

## Installing
1. To use these exercise files, you must have the following installed:
	- Docker
    - WSL2 (if using Windows OS)
2. Clone this repository into your local machine using the terminal (Mac), CMD (Windows), or a GUI tool like SourceTree.
3. Navigate into your project directory
    ```
    cd <your-project-name>
    ```
4. Install project dependencies using the following command:
    ```
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
    ```
    When using the laravelsail/phpXX-composer image, you should use the same version of PHP that you plan to use for your application (81, 82 etc).
5. Create the .env file from the example file
    ```
    cp .env.example .env
    ```
6. Open the .env file and change the database configuration to the following
    ```
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=<your-project-name>
    DB_USERNAME=sail
    DB_PASSWORD=password
    ```
7. Start Sail in the background
    ```
    sail up -d
    ```
8. Generate application key
    ```
    sail artisan key:generate
    ```
9. Migrate database tables
    ```
    sail artisan migrate
    ```
10. Go to localhost on your browser to view the application

### Instructor

Shruti Balasa 
                            


                            

Check out my other courses on [LinkedIn Learning](https://www.linkedin.com/learning/instructors/shruti-balasa).

[lil-course-url]: https://www.linkedin.com/learning/advanced-laravel-22373805?dApp=59033956&leis=LAA
[lil-thumbnail-url]: https://media.licdn.com/dms/image/D560DAQFlZrRMt3ahvA/learning-public-crop_288_512/0/1686070664741?e=2147483647&v=beta&t=oOWqD3uZY2p70h1YkCIJe4pTocxB-tD-exrZl9W5rPk
