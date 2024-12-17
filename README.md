## REQUIREMENTS

[Docker Desktop](https://www.docker.com/products/docker-desktop/) should be installed on your machine.

## INSTALLATION

Copy files from Git repository.

Navigate to project directory. In "laravel" folder copy .env.example file, rename it to .env and configure to your specifications. (In most cases, it won't need any additional configuration.)

Open terminal, navigate to project directory and run following command and wait for process to complete.

<code>docker-compose up --build</code>

When both nginx and php services are running in your Docker Desktop application find rickandmorty conainer, expand it and click on 3 dots on your php container (Show container actions) and select "Open in terminal".

In terminal execute this command and wait for process to complete: 

<code>composer install && npm install && npm run build</code>

Open your browser, enter APP_URL from .env file in your address bar and project should be up and running. (Default is [http://localhost](http://localhost))

Enjoy!

## ADDITIONAL

If there are errors for directory permissions, laravel/storage CHMOD should be 755.
