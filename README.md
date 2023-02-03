# Doitsu
Simple and generic web framework, mostly only routing and templating.

## Requirements

- Make sure PHP is available on your system. We recommend PHP 8 or above.
- Make sure Composer is available on your system.

## How to run

- Clone this repository
- Go to the project directory (usually using `cd` command)
- Run `composer -vvv install` (this command is to install the dependencies)
- Run `php -S 0.0.0.0:4000 -t public` (this command is to run the built-in PHP web server for development purpose)
- Open the web on your browser at `http://localhost:4000` (until this point it means we already have `/` route that handle the home page)

## Sample output

![My image](https://github.com/radicalcircle/doitsu/blob/main/doitsu.png?raw=true)

## What next?

It depends on your imagination. For example in our use case, we use this framework with Alpine.js to handle the reactivity, add date-fns to manipulate date, add Tailwind CSS for nice styling flow and sometimes add Flowbite to take the component advantage of nice visual UI. The limit is your creativity.

## License

MIT

Copyright (c) 2023-present, Sony Arianto Kurniawan and contributors
