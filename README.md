<p align="center">
  <img src="https://github.com/sonyarianto/doitsu/blob/main/doitsu-logo.png?raw=true" width="150" height="150" />
</p>

# Doitsu
Simple and generic web framework based on PHP, mostly only routing and templating.

## Requirements

- Make sure PHP is available on your system. We recommend PHP 8 or above. [[PHP installation manual]](https://www.php.net/manual/en/install.php)
- Make sure Composer is available on your system. [[Composer installation manual]](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)

> Still confuse about above things? Just ask on Discussions channel

## How to run

- Clone this repository
- Go to the project directory (usually using `cd` command)
- Run `composer -vvv install` (this command is to install the dependencies, will create `vendor` directory)
- Run `php -S 0.0.0.0:4000 -t public` (this command is to run the built-in PHP web server for development purpose)
- Open the web on your browser at `http://localhost:4000` (until this point it means we already have `/` route that handle the home page)

## Sample output

![My image](https://github.com/sonyarianto/doitsu/blob/main/doitsu.png?raw=true)

## What next?

It depends on your imagination. For example in our use case, we use this framework with Alpine.js to handle the reactivity, add date-fns to manipulate date, add Tailwind CSS for nice styling flow and sometimes add Flowbite to take the component advantage of nice visual UI. The limit is your creativity.

## Quick FAQs

- **Want to add new route such as /about or anything?** Just go to `src/_routes.php` and add there. Observe the current code. After you create new route usually you will create a method on `Application` class (located at `src/Application.php`) to execute some code (a.k.a controller) before you render some visual page (a.k.a view).
- **Can I deploy to shared hosting?** Yes, but you should point the website to the `public` folder, since that folder is the entry point or commonly said as web root directory. There is `index.php` file there and everything starts from that script.
- **Can I deploy using Docker?** Yes, we will give the docker-compose sample later.
- **Why another framework? Is Laravel or Symfony not enough?** Hmmmm, you know my motivation create this framework is just for fun and learn. So nothing can stop me to create something haha.
- **Why the name is Doitsu?** [Rian Cintiyo](https://github.com/riancintiyo) propose the name and I think that's very good name, so we continue with that. It's Japanese word that means Germany.
- **What do you use for doing routing?** We use Symfony Routing component.
- **What template engine do you use?** We use Twig template engine.

## Adding Alpine JS

- **There are 2 ways to add Alpine JS** :
> 1. Adding Alpine JS by including it from a `<script>` tag
> 2. Importing it as a module<br>

#### **1. Adding Alpine JS from `<script>` tag.**<br> ####
You can add Alpine Js using CDN by adding it on **template/base.html.twig** file and place it before end of `</head>` markup like image bellow.
```html
<html>
    <head>
        ...
 
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    ...
</html> 
```
`defer` inside script tag in here to make the script is downloaded in parallel to parsing the page, and executed after the page has finished parsing. [Read more in here](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script).<br>

#### **2. Adding Alpine JS as a module.**<br> ####
You can also add Alpine JS as a module!, and how to do that is shown on the list bellow:<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1. Run the following command to install it:<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; `npm install alpinejs`<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. Import Alpine into your bundle and initialize it like so:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`
import Alpine from 'alpinejs'`  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; `Alpine.start()`

To read more detail how to install Alpine, [Read here.](https://alpinejs.dev/essentials/installation)

## License

MIT

Copyright (c) 2023-present, Sony Arianto Kurniawan <<sony@sony-ak.com>> and contributors.
